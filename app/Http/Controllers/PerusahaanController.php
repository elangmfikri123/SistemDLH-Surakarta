<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Pimpinan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\NIB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PerusahaanController extends Controller
{
    public function profilperusahaanbaru()
    {
        $user = request()->user();
        $perusahaan = Perusahaan::where('user_id', $user->id)->get();
        return view('profil', compact('perusahaan'));
    }

    public function lokasiAdministrasi(Request $request)
    {
        if (isset($request->type)) {
            $parent = $request->category_id;
            switch ($request->type) {

                case 'kecamatan':
                    $data = Kecamatan::all();
                    break;

                case 'kelurahan':
                    $data = Kelurahan::where('kecamatan_id', $parent)->get();
                    break;

                default:
                    break;
            }
            $json = [
                'status' => 'success',
                'data' => $data->toArray(),
            ];
            return json_encode($json);
        } else {
            $json = [
                'status' => 'failed',
            ];
            return json_encode($json);
        }
    }

    public function profilPimpinan(Request $request)
    {
        $pimpinan = Pimpinan::where('user_id', auth()->user()->id)->first();
        if (!empty($pimpinan)) {
            return redirect('registrasi-perusahaan/profil')->with('message', 'Anda telah mengisi form pimpinan dan perusahaan');
        }
        return view('registrasi-pimpinan');
    }
    public function postPimpinan(Request $request)
    {
        $user = request()->user();
        $validator = Validator::make($request->all(), [
            'nama_pimpinan' => 'required',
            'alamat_pimpinan' => 'required',
            'telf_pimpinan' => 'required',
            'email_pimpinan' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        Pimpinan::create([
            'user_id' => $user->id,
            'nama_pimpinan' => request('nama_pimpinan'),
            'alamat_pimpinan' => request('alamat_pimpinan'),
            'telf_pimpinan' => request('telf_pimpinan'),
            'email_pimpinan' => request('email_pimpinan'),
        ]);
        return redirect('registrasi-perusahaan');
    }
    public function profilperusahaan()
    {
        $kecamatan = Kecamatan::pluck('nama_kecamatan', 'id');
        $kelurahan = Kelurahan::pluck('nama_kelurahan', 'id');
        $bidang = Bidang::pluck('nama_bidang', 'id');
        $nib = NIB::where('user_id', auth()->user()->id)->first();
        return view('registrasi-perusahaan', [
            'bidang' => $bidang,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'nib' => $nib,
        ]);
    }
    public function postPerusahaan()
    {
        $user = request()->user();
        $pimpinan = DB::table('table_pimpinan')->latest()->first();
        $validator = Validator::make(request()->all(), [
            'filescan_perusahaan' => 'required|max:10240|mimes:pdf,doc,docx',
            'foto_perusahaan' => 'required|max:10240|mimes:jpg,png,jpeg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        if (request()->hasFile('filescan_perusahaan')) {
            $filescan = time() . "_" . request()->filescan_perusahaan->getClientOriginalName();
            request()->filescan_perusahaan->move(public_path('fileperusahaan/'), $filescan);
        }
        if (request()->hasFile('foto_perusahaan')) {
            $foto = time() . "_" . request()->foto_perusahaan->getClientOriginalName();
            request()->foto_perusahaan->move(public_path('fotoperusahaan/'), $foto);
        }


        Perusahaan::create([
            'user_id' => $user->id,
            'pimpinan_id' => $pimpinan->id,
            'status_id' => request('status_id'),
            'nib_id' => auth()->user()->nib->id,
            'alamat_perusahaan' => request('alamat_perusahaan'),
            'kelurahan_id' => request('kelurahan_id'),
            'kecamatan_id' => request('kecamatan_id'),
            'bidang_id' => request('bidang_id'),
            'email_perusahaan' => request('email_perusahaan'),
            'telf_perusahaan' => request('telf_perusahaan'),
            'personil_ppa' => request('personil_ppa'),
            'personil_ipal' => request('personil_ipal'),
            'tikor_perusahaan' => request('tikor_perusahaan'),
            'tikor_ipal' => request('tikor_ipal'),
            'tikor_oval' => request('tikor_oval'),
            'tikor_perusahaan' => request('tikor_perusahaan'),
            'tikor_pantau' => request('tikor_pantau'),
            'filescan_perusahaan' => $filescan,
            'foto_perusahaan' => $foto,
        ]);
        return redirect('registrasi-perusahaan/profil');
    }

    public function editPimpinan()
    {
        $pimpinan = Pimpinan::where('user_id', auth()->user()->id)->first();
        if (empty($pimpinan)) {
            return redirect('registrasi-perusahaan/formpimpinan')->with('message', 'Anda BELUM mengisi form pimpinan dan perusahaan');
        }

        return view('edit-pimpinan', compact('pimpinan'));
    }

    public function updatePimpinan(Request $request)
    {
        $user = request()->user();
        $validator = Validator::make($request->all(), [
            'nama_pimpinan' => 'required',
            'alamat_pimpinan' => 'required',
            'telf_pimpinan' => 'required',
            'email_pimpinan' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $pimpinan = Pimpinan::where('user_id', auth()->user()->id)->first();
        $pimpinan->update([
            'nama_pimpinan' => request('nama_pimpinan'),
            'alamat_pimpinan' => request('alamat_pimpinan'),
            'telf_pimpinan' => request('telf_pimpinan'),
            'email_pimpinan' => request('email_pimpinan'),
        ]);
        return redirect('registrasi-perusahaan/perusahan/edit');
    }

    public function editPerusahaan()
    {
        $perusahaan = Perusahaan::where('user_id', auth()->user()->id)->first();
        // dd($perusahaan);
        $bidang = Bidang::pluck('nama_bidang', 'id');
        return view('edit-perusahaan', [
            'bidang' => $bidang,
            'perusahaan' => $perusahaan,
        ]);
    }

    public function updatePerusahan()
    {
        $user = request()->user();
        $perusahaan = Perusahaan::where('user_id', auth()->user()->id)->first();
        $validator = Validator::make(request()->all(), [
            'filescan_perusahaan' => 'max:10240|mimes:pdf,doc,docx',
            'foto_perusahaan' => 'max:10240|mimes:jpg,png,jpeg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        if (request()->hasFile('filescan_perusahaan')) {
            $filescan = time() . "_" . request()->filescan_perusahaan->getClientOriginalName();
            request()->filescan_perusahaan->move(public_path('fileperusahaan/'), $filescan);
            $file = public_path('fileperusahaan/' . $perusahaan->filescan_perusahaan);
            File::delete($file);
        }
        if (request()->hasFile('foto_perusahaan')) {
            $foto = time() . "_" . request()->foto_perusahaan->getClientOriginalName();
            request()->foto_perusahaan->move(public_path('fotoperusahaan/'), $foto);
            $file = public_path('fotoperusahaan/' . $perusahaan->foto_perusahaan);
            File::delete($file);
        }
        $perusahaan->update([
            'no_izin' => request('no_izin'),
            'nama_perusahaan' => request('nama_perusahaan'),
            'alamat_perusahaan' => request('alamat_perusahaan'),
            'kelurahan_id' => request('kelurahan_id'),
            'kecamatan_id' => request('kecamatan_id'),
            'bidang_id' => request('bidang_id'),
            'email_perusahaan' => request('email_perusahaan'),
            'telf_perusahaan' => request('telf_perusahaan'),
            'personil_ppa' => request('personil_ppa'),
            'personil_ipal' => request('personil_ipal'),
            'tikor_perusahaan' => request('tikor_perusahaan'),
            'tikor_ipal' => request('tikor_ipal'),
            'tikor_oval' => request('tikor_oval'),
            'tikor_perusahaan' => request('tikor_perusahaan'),
            'tikor_pantau' => request('tikor_pantau'),
            'filescan_perusahaan' => $filescan,
            'foto_perusahaan' => $foto,
        ]);
        return redirect('registrasi-perusahaan/profil');
    }
}
