<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class PengajuanController extends Controller
{
    function index(){
        // return view('layouts.pengajuan');
        $collection = Http::get("http://localhost:8080/api/pengajuan");
        // dd($collection);
        return view('layouts.pengajuan',['collection'=>$collection['data']]);
    }

    public function store(Request $request)
    {
        $namaPengajuanBrg = $request->namaPengajuanBrg;
        $jumlahPengajuanBrg = $request->jumlahPengajuanBrg;
        $tglPengajuanBrg = $request->tglPengajuanBrg;

        $parameter = [
            'namaPengajuanBrg' => $namaPengajuanBrg,
            'jumlahPengajuanBrg' => $jumlahPengajuanBrg,
            'tglPengajuanBrg' => $tglPengajuanBrg,
        ];

        $client = new Client();
        $url = "http://localhost:8080/api/pengajuan";
        $response = $client->request("post", $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents(); 
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('layouts.pengajuan', ['data' => $data]);
    }
}
