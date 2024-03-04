<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BarangController extends Controller
{
    function index()
    {
        $collection = Http::get("http://localhost:8080/api/barang");
        // dd($collection);
        return view('layouts.barang',['collection'=>$collection['data']]);
    }
}