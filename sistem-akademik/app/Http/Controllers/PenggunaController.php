<?php

namespace App\Http\Controllers;

use App\Modules\Pengguna\Service\PenggunaService;
use Illuminate\Http\Request;

class PenggunaController extends Controller{
    public function show(){
        print_r(PenggunaService::TestService());
//        return view('user.profile', [
//            'user' => User::findOrFail($id)
//        ]);
    }
    public function getAll(){
        $hasil = PenggunaService::getAll();
        foreach ($hasil as $val){
            echo "<pre>";
            print_r((array) $val);
            echo "</pre>";
            echo "Nama : {$val->getNama()} <br>";
        }
    }

    public function insert(Request $request){
        $input = $request->collect();

        if ($request->hasFile('inputFotoProfile')) {
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Pengguna"] ]);
            return back();
        }
        $nama = $input['inputNama'];
        $password = $input['inputPassword'];
        $nomorInduk = $input['inputNomorInduk'];
        $email = $input['inputEmail'];
        $tanggalLahir = $input['inputTanggalLahir'];
        $tempatLahir = $input['inputTempatLahir'];
        $jenisKelamin = $input['inputJenisKelamin'];
        $alamat = $input['inputAlamat'];
        $notelepon = $input['inputNoTelp'];
        $jabatan = $input['inputTipePengguna'];

        if ($request->hasFile('inputFotoProfile')) {
            $file = $request->file('photo');
            $path = $request->photo->store('inputFotoProfile');

        }

        $hasil = PenggunaService::insert($nama,$password,  $nomorInduk, $email, $tanggalLahir,
            $tempatLahir,$jenisKelamin, $alamat,$notelepon, $jabatan);

        if($hasil == false){
            $request->session()->flash('errors', [ ['type' => "danger" , 'message' => "Gagal Menambah Pengguna"] ]);
        }else{
            $request->session()->flash('errors', [ ['type' => "success" , 'message' => "Success Menambah Pengguna"] ]);
        }
        //return back();
    }

    public function update(){
        $nama = "newUserUpdate";
        $password = "12345678";
        $nomorInduk = "19999002";
        $email = "newUser@gmail.com";
        $tanggalLahir = "10/16/2003";
        $tempatLahir= "Bali";
        $jenisKelamin ="L";
        $alamat ="Dipatiukur";
        $notelepon ="086537956";
        $jabatan ="Mahasiswa";

        echo PenggunaService::update($nama,$password,  $nomorInduk, $email, $tanggalLahir, $tempatLahir,$jenisKelamin, $alamat,$notelepon, $jabatan);
    }

    public function deleteInfo($nomorInduk){
        if(PenggunaService::delete($nomorInduk) == true){
            echo "Success Delete";
        }else{
            echo "Gagal Delete";
        }
    }

    public function userInfo($nomorInduk){
        $hasil = PenggunaService::userInfo("nomor_induk", $nomorInduk);
        echo "<pre>";
        print_r($hasil);
        echo "</pre>";
    }

    public function login(Request $request){
        $email = "tes22t@mail.com";
        $password = "newPWD";
        if(PenggunaService::login($email,$password) == true){
            $curr = PenggunaService::userInfo('email',$email);
            $request->session()->put('currentuser', $curr);
            echo "Success Login";
        }else{
            echo "Gagal Login";
        }
    }

    public function logout(Request $request){
        $currentUser = $request->session()->pull('currentuser');
        if($currentUser == null){
            echo "Tidak login";
            return;
        }else{
            echo "Success logoout";
            return;
        }
    }

    public function resetPassword(){
        $email = "tes22t@mail.com";
        if(PenggunaService::resetPassword($email) == true){
            echo "Success Reset";
        }else{
            echo "Gagal Reset";
        }
    }

    public function gantiPassword(){
        $email = "tes22t@mail.com";
        $password = 'newPWD';
        if(PenggunaService::gantiPassword($email,$password) == true){
            echo "Success Ganti";
        }else{
            echo "Gagal Ganti";
        }
    }


}
