<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
        body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
        overflow: hidden;
        background-color: #333;
        }

        .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        }

        .topnav a:hover {
        background-color: #ddd;
        color: black;
        }

        .topnav a.active {
        background-color: #04AA6D;
        color: white;
        }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
            <body>
                    <div class="topnav">
                        <a href="#home">Home</a>
                        <a href="dashboard">Barang</a>
                        <a class="active" href="pengajuan">Pengajuan</a>
                    </div>
                    <br>

                    <!-- START FORM -->
                    <div style="padding-right:16px">
                         <div style="padding-left:16px">
                            <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <p style="font-size:25px;">Tambah Data Pengajuan</p><br>
                                <form action="" method="post">
                                @csrf
                                <input type="hidden" id="id">
                                    <div class="mb-3 row">
                                        <label for="namaPengajuanBrg" class="col-sm-2 col-form-label">Nama Barang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name='namaPengajuanBrg' id="namaPengajuanBrg">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="jumlahPengajuanBrg" class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name='jumlahPengajuanBrg' id="jumlahPengajuanBrg">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tglPengajuanBrg" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control w-50" name='tglPengajuanBrg' id="tglPengajuanBrg">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- AKHIR FORM -->

                    <div style="padding-right:16px">
                        <div style="padding-left:16px">
                            <div class="my-3 p-3 bg-body rounded shadow-sm">
                                <table id="tabelBarang" class="w-full text-sm text-left text-black-500 dark:text-black-400">
                                <p style="font-size:25px; center">Data Pengajuan</p><br>
                                    <thead class="text-xs text-black-700 uppercase bg-black-50 dark:bg-black-700 dark:text-black-400">
                                        <tr>
                                            <th style="font-size:15px; scope="col" class="py-3 px-6">NAMA BARANG</th>
                                            <th style="font-size:15px; scope="col" class="py-3 px-6">JUMLAH BARANG</th>
                                            <th style="font-size:15px; scope="col" class="py-3 px-6">TANGGAL PENGAJUAN</th>
                                        </tr>
                                    </thead>
                                    @foreach($collection['data'] as $collections)
                                        <tr>
                                            <td class="py-3 px-6 border-b border-gray-200 whitespace-nowrap ellipsis">{{$collections['namaPengajuanBrg']}}</td>
                                            <td class="py-3 px-6 border-b border-gray-200 whitespace-nowrap ellipsis">{{$collections['jumlahPengajuanBrg']}}</td>
                                            <td class="py-3 px-6 border-b border-gray-200 whitespace-nowrap ellipsis">{{$collections['tglPengajuanBrg']}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </body>
            </main>
        </div>
    </body>
</html>
