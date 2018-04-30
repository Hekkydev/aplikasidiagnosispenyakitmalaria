@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Hasil Diagnosa</div>

                    <div class="panel-body">
                        <legend>Detail Pasien</legend>
                        <table class="table">
                            <thead>

                              <tr>
                                  <th width="200px;">Nama Pasien</th>
                                  <td width="10px;">:</td>
                                  <td>{{ $user->name }}</td>
                              </tr>

                              <tr>
                                  <th>Umur Pasien</th>
                                  <td>:</td>
                                  <td>{{ $user->umur }}</td>
                              </tr>

                              <tr>
                                  <th>Alamat Pasien</th>
                                  <td>:</td>
                                  <td>{{ $user->alamat }}</td>
                              </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>

                            </thead>
                        </table>

                        <legend>Gejala yang di alami oleh pasien</legend>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Kode Gejala</th>
                                <th>Nama Gejala</th>
                                <th>Probabilitas</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($daftar_gejala_dipilih as $d)
                                    <tr>
                                        <td>{{ $d['kode_gejala']}}</td>
                                        <td>{{ $d['nama_gejala']}}</td>
                                        <td>{{ $d['probabilitas'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <legend>Hasil diagnosa berdasarkan gejala pasien</legend>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="200px;">Penyakit yang di derita</th>
                                    <th width="10px;">:</th>
                                    <td>{{ $data->penyakit }}</td>
                                </tr>
                                <tr>
                                    <th width="200px;">Nilai diagnosa</th>
                                    <th width="10px;">:</th>
                                    <td>{{ number_format($data->hasil * 100,2) }} %</td>
                                </tr>
                                <tr>
                                    <th>Penyebab</th>
                                    <th>:</th>
                                    <td>{{ $data->penyebab }}</td>
                                </tr>
                                <tr>
                                    <th>Solusi</th>
                                    <th>:</th>
                                    <td>{{ $data->solusi }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                </tr>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ URL::to('membership/') }}" class="btn btn-primary"><i class="fa fa-chevron-left"></i>  Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
