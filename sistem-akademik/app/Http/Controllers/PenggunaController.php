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

    public function testInsert(){
        $nama = "newAlbertUser";
        $password = "12345678";

        echo PenggunaService::InsertTest($nama,$password);
    }

    public function testUpdate(){
        $nama = "UPDATATATalberttest";
        $password = "12345678";

        echo PenggunaService::UpdateTest($nama,$password);
    }

    public function testGetAll(){
        $hasil = PenggunaService::GetAll();
        foreach ($hasil as $val){
            echo "<pre>";
            print_r((array) $val);
            echo "</pre>";
            echo "Nama : {$val->getNama()} <br>";
        }
    }

    public function testLogin(){
        $email = "tes22t@mail.com";
        $password = "12345678";
        if(PenggunaService::Login($email,$password) == true){
            echo "SUccess Login";
        }else{
            echo "gagal Login";
        }

    }


    public function testDelete(){
        echo PenggunaService::DeleteTest("119002");
    }
}
