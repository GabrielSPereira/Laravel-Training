<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request) {
        $nome = 'ga';
        $idade = '10';

        return view('admin.config', ['nome'=>$nome, 'idade'=>$idade]);
    }

    public function info() {
        echo 'info';
    }

    public function permissoes() {
        echo 'permissoes';
    }
}
