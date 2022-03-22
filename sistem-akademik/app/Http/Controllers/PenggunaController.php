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
        $nama = "alberttest";
        $password = "12345678";

        echo PenggunaService::InsertTest($nama,$password);
    }
}
