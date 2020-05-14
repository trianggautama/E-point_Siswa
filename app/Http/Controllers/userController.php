<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\User;
use Hash;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $data = User::OrderBy('id', 'Desc')->where('role', 1)->get();

        return view('admin.pegawai.index', compact('data'));
    }

    public function profil()
    {

        return view('admin.pegawai.profil');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        if ($request->foto != null) {
            $img = $request->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $request->nama;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/user', $foto);
            $user->foto = $foto;
        } else {
            $user->foto = 'default.png';
        }
        $user->save();

        $pegawai = new Pegawai;
        $pegawai->user_id = $user->id;
        $pegawai->NIP = $request->NIP;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->jabatan = $request->jabatan;

        $pegawai->save();

        return redirect()->route('userIndex')->with('success', 'Berhasil menyimpan data');
    }

    public function edit($uuid)
    {
        $data = User::where('uuid', $uuid)->first();
        return view('admin.pegawai.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        dd($request->all());
        $user = user::where('uuid', $uuid)->first();

        $user->nama = $request->nama;
        $user->username = $request->username;
        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
        } else {
            $user->password = $user->password;
        }
        if ($request->foto != null) {
            $img = $request->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $request->nama;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/user', $foto);
            $user->foto = $foto;
        } else {
            $user->foto = $user->foto;
        }

        $user->update();

        $pegawai = Pegawai::where('user_id', $user->id)->first();

        $pegawai->NIP = $request->NIP;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->jabatan = $request->jabatan;

        $pegawai->update();

        return redirect()->route('userIndex')->with('success', 'Berhasil mengubah data');

    }

    public function destroy($uuid)
    {
        $user = User::where('uuid', $uuid)->first()->delete();

        return redirect()->route('userIndex')->with('success', 'Berhasil menghapus data');

    }
}
