<?php

namespace App\Http\Controllers;

use App\Models\BatasUji;
use App\Models\NIB;
use App\Models\User;
use App\Models\Bidang;
use App\Models\Laporan;
use App\Models\Feedback;
use App\Models\Perusahaan;
use App\Models\Laboratorium;
use CreateTableLaboratorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $lab = Laboratorium::count();
        $user = User::count();
        $perusahaan = Perusahaan::all();
        $pers = $perusahaan->count();
        $data = [
            'perusahaan' => $perusahaan,
            'user' => $user,
            'laboratorium' => $lab,
            'pers' => $pers,
        ];
        return view('admin.dashboard', $data);
    }

    public function storeAdmin(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|min:8',
            'password_confirmasi' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            'password_confirmasi' => Hash::make(request()->password_confirmasi),
            'roles' => 'admin',
        ]);

        return redirect()->back()->with('status', 'Berhasil Registrasi Akun Baru.');
    }

    public function userList()
    {
        $users = User::where('roles', 'user')->get();
        return view('admin.daftar_user', compact('users'));
    }
    public function adminList()
    {
        $users = User::where('roles', 'admin')->get();
        return view('admin.daftar_admin', compact('users'));
    }
    public function aktifasi($id)
    {
        $user = User::find($id);
        if ($user->status == 'aktif') {
            $user->status = 'nonaktif';
            $user->save();
        } else if ($user->status == 'nonaktif') {
            $user->status = 'aktif';
            $user->save();
        }
        return redirect()->back()->with('status', 'Berhasil memperbarui status Akun Baru.');
    }
    public function addFeedback($id)
    {
        $laporan = Laporan::find($id);
        return view('admin.add_feedback', compact('laporan'));
    }

    public function addFeedbackStore(Request $request, $id)
    {
        $user = request()->user();
        $laporan = Laporan::find($id);
        $validator = Validator::make(request()->all(), [
            'file_lampiran' => 'max:10240|mimes:pdf,doc,docx,png,jpg,xlsx',
        ]);
        if (!$laporan) {
            return redirect('admin/laporan');
        }
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $filescan = null;
        if (request()->hasFile('file_lampiran')) {
            $filescan = time() . "_" . request()->file_lampiran->getClientOriginalName();
            request()->file_lampiran->move(public_path('filelampiran/'), $filescan);
        }
        Feedback::create([
            'laporan_id' => $id,
            'deskripsi' => $request->deskripsi,
            'file_lampiran' => $filescan,
        ]);
        return redirect('admin/laporan/' . $id . '/detail')->with('message', 'Feedback Berhasil Ditambahkan.');
    }

    public function deleteFeedback($id)
    {
        Feedback::destroy($id);
        return redirect()->back();
    }
    public function userDelete($userID)
    {
        User::destroy($userID);
        return redirect()->back();
    }

    public function bidangList()
    {
        $bidang = Bidang::all();
        return view('admin.daftar_bidang', compact('bidang'));
    }

    public function bidangPost()
    {
        $user = request()->user();
        $validator = Validator::make(request()->all(), [
            'nama_bidang' => 'required|unique:table_bidang,nama_bidang',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        Bidang::create([
            'user_id' => $user->id,
            'nama_bidang' => request('nama_bidang'),
        ]);
        return redirect()->back()->with('status', 'Bidang Berhasil Ditambahkan.');
    }
    public function editBidang($id)
    {
        $bidang = Bidang::find($id);
        $bidang->update([
            'nama_bidang' => request('nama_lab'),
        ]);
        return redirect()->back();
    }
    public function bidangDelete($bidangID)
    {
        Bidang::destroy($bidangID);
        return redirect()->back();
    }
    public function perusahaanList()
    {
        $perusahaan = Perusahaan::all();
        return view('admin.daftar_perusahaan', compact('perusahaan'));
    }
    public function status_setuju($id)
    {
        $perusahaan = Perusahaan::find($id);
        $perusahaan->status_id = 2;
        $perusahaan->save();
        return redirect('/admin/perusahaan/list')->with('success', 'Disetujui');
    }
    public function status_tolak($id)
    {
        $perusahaan = Perusahaan::find($id);
        $perusahaan->status_id = 3;
        $perusahaan->save();
        return redirect('/admin/perusahaan/list')->with('success', 'Ditolak');
    }
    public function download(Request $request, $filescan_perusahaan)
    {
        return response()->download(public_path('fileperusahaan/' . $filescan_perusahaan));
    }
    public function perusahaanDelete($perusahaanID)
    {
        Perusahaan::destroy($perusahaanID);
        return redirect()->back();
    }
    public function laboratoriumList()
    {
        $lab = Laboratorium::all();
        return view('admin.daftar_laboratorium', compact('lab'));
    }
    public function postLab(Request $request)
    {
        $user = request()->user();
        $validator = Validator::make($request->all(), [
            'nama_lab' => 'required |max:250| unique:table_laboratorium,nama_lab',
            'email_lab' => 'required | email |unique:table_laboratorium,email_lab,'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        Laboratorium::create([
            'user_id' => $user->id,
            'nama_lab' => request('nama_lab'),
            'alamat_lab' => request('alamat_lab'),
            'telf_lab' => request('telf_lab'),
            'email_lab' => request('email_lab'),
        ]);
        return redirect()->back();
    }
    public function editLab($labID)
    {
        $lab = Laboratorium::find($labID);
        $lab->update([
            'nama_lab' => request('nama_lab'),
            'alamat_lab' => request('alamat_lab'),
            'telf_lab' => request('telf_lab'),
            'email_lab' => request('email_lab'),
        ]);
        return redirect()->back()->with('status', 'Data Laboratorium Berhasil Diperbaharui.');
    }
    public function deleteLab($labID)
    {
        Laboratorium::destroy($labID);
        return redirect()->back();
    }

    public function laporanList()
    {
        $laporan = Laporan::all();
        $data = [
            'laporan' => $laporan,
        ];
        return view('admin.daftar_laporan', $data);
    }

    public function status_disetuju($id)
    {
        $laporan = Laporan::find($id);
        $laporan->status_id = 2;
        $laporan->save();
        return redirect('/admin/laporan')->with('success', 'Disetujui');
    }
    public function status_ditolak($id)
    {
        $laporan = Laporan::find($id);
        $laporan->status_id = 3;
        $laporan->save();
        return redirect('/admin/laporan')->with('success', 'Ditolak');
    }
    public function downloadLaporan(Request $request, $filescan_laporan)
    {
        return response()->download(public_path('filelaporan/' . $filescan_laporan));
    }
    public function laporanhapus($lapID)
    {
        Laporan::destroy($lapID);
        return redirect()->back();
    }

    public function seleksirekap()
    {
        return view('admin.cetak-rekapitulasi');
    }

    public function rekapitulasi($tahun, $bulan)
    {
        // dd($bulan);
        $perusahaan = Perusahaan::whereHas(
            'laporan',
            function ($q) use ($bulan, $tahun) {
                $q->whereMonth('created_at', '=', (int)$bulan);
                $q->whereYear('created_at', '=', (int)$tahun);
            }
        )->with('laporan')->get();
        $perusahaan_no = Perusahaan::whereDoesntHave(
            'laporan',
            function ($q) use ($bulan, $tahun) {
                $q->whereMonth('created_at', '=', (int)$bulan);
                $q->whereYear('created_at', '=', (int)$tahun);
            }
        )->with('laporan')->get();
        return view('admin.rekapitulasi', compact('perusahaan', 'perusahaan_no'));
    }

    public function aktifasiPerusahaan($id)
    {
        $user = Laboratorium::find($id);
        if ($user->status == 'aktif') {
            $user->status = 'nonaktif';
            $user->save();
        } else if ($user->status == 'nonaktif') {
            $user->status = 'aktif';
            $user->save();
        }
        return redirect()->back()->with('status', 'Berhasil memperbarui status laboratorium.');
    }

    public function addkadar($id)
    {
        $laporan = Laporan::find($id);
        $batasuji = $this->getBatasUji($id);

        // dd($batasuji);
        return view('admin.add_kadar', compact('laporan', 'batasuji'));
    }

    public function laporandetail($id)
    {
        $laporan = Laporan::find($id);

        $batasuji = $this->getBatasUji($id);
        foreach ($batasuji as $key => $value) {
            $nama = $key;
            if ($value && $laporan->$nama != null) {
                if ((float)$laporan->$nama > (float)$value->batas_bawah && (float) $laporan->$nama < (float)$value->batas_atas) {
                    $batasuji->put($nama . '_normal', true);
                } else {
                    $batasuji->put($nama . '_normal', false);
                }
            } else {
                $batasuji->put($nama . '_normal', true);
            }
        }


        $data = [
            'laporan' => $laporan,
            'batasuji' => $batasuji,
        ];

        return view('admin.detail_laporan', $data);
    }

    public function getBatasUji($id)
    {
        $batasuji = collect([]);
        $batasuji->put('jmlh_ph', BatasUji::where('laporan_id', $id)->where('nama_uji', 'jmlh_ph')->first());
        $batasuji->put('jmlh_suhu', BatasUji::where('laporan_id', $id)->where('nama_uji', 'jmlh_suhu')->first());
        $batasuji->put('jmlh_amoniak', BatasUji::where('laporan_id', $id)->where('nama_uji', 'jmlh_amoniak')->first());
        $batasuji->put('jmlh_pshospat', BatasUji::where('laporan_id', $id)->where('nama_uji', 'jmlh_pshospat')->first());
        $batasuji->put('jmlh_tss', BatasUji::where('laporan_id', $id)->where('nama_uji', 'jmlh_tss')->first());
        $batasuji->put('jmlh_bod', BatasUji::where('laporan_id', $id)->where('nama_uji', 'jmlh_bod')->first());
        $batasuji->put('jmlh_cod', BatasUji::where('laporan_id', $id)->where('nama_uji', 'jmlh_cod')->first());

        return $batasuji;
    }

    public function addkadarStore(Request $request, $id)
    {
        $laporan = Laporan::find($id);
        $batas = collect($request);
        $batas->forget('_token');
        $validator = Validator::make(request()->all(), [
            'jmlh_ph' => 'required',
            'jmlh_suhu' => 'required',
            'jmlh_amoniak' => 'required',
            'jmlh_pshospat' => 'required',
            'jmlh_tss' => 'required',
            'jmlh_bod' => 'required',
            'jmlh_cod' => 'required',
        ]);

        if (!$laporan) {
            return redirect()->back();
        }
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        foreach ($batas as $key => $value) {
            BatasUji::updateOrCreate(
                [
                    //data lama jika ada
                    'laporan_id' => $laporan->id,
                    'nama_uji' => $key,
                ],
                [
                    //data baru  
                    'batas_atas' => $value['atas'],
                    'batas_bawah' => $value['bawah'],
                ]
            );
        }
        return redirect('admin/laporan/' . $id . '/detail')->with('message', 'Kadar Maksimum Ditetapkan.');
    }
}
