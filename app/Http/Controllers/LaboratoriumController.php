<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class LaboratoriumController extends Controller
{
    public function listLaboratorium()
    {
        $user = request()->user();
        $labs = Laboratorium::where('user_id', $user->id)->get();
        return view('laboratorium', compact('labs'));
    }
    public function postLab(Request $request)
    {
        $user = request()->user();
        $validator = Validator::make($request->all(), [
            'nama_lab' => 'required | string |max:250|unique:table_laboratorium,nama_lab',
            'email_lab' => 'required | email |unique:table_laboratorium,email_lab'
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

    public function editLab(Request $request, $labID)
    {
        $validator = Validator::make($request->all(), [
            'nama_lab' => 'required | string |max:250|unique:table_laboratorium,nama_lab,' . $labID,
            'email_lab' => 'required | email |unique:table_laboratorium,email_lab,' . $labID
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $lab = Laboratorium::find($labID);
        $lab->update([
            'nama_lab' => request('nama_lab'),
            'alamat_lab' => request('alamat_lab'),
            'telf_lab' => request('telf_lab'),
            'email_lab' => request('email_lab'),
        ]);
        return redirect()->back();
    }
    public function deleteLab($labID)
    {
        Laboratorium::destroy($labID);
        return redirect()->back();
    }
}
