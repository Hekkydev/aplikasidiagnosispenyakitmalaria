@extends('index')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Pasien</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Nama Pasien</th>
                            <td>:</td>
                            <td>{{ $pasien->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{ $pasien->email }}</td>
                        </tr>
                        <tr>
                            <th>Umur</th>
                            <td>:</td>
                            <td>{{ $pasien->umur}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td>{{ $pasien->alamat }}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td></td>
                            <td>

                                <a href="{{URL::to('backend/pasien')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>  Kembali</a>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection