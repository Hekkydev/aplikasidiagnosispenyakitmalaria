@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <a href="{{ URL::to('membership/') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
                <br><br>
                <div class="panel panel-default">
                    <div class="panel-heading">Informasi Aplikasi</div>

                    <div class="panel-body">


                        <h3>Spesifikasi System</h3>
                        <address>
                            Title : Aplikasi Diagnosa Penyakit Mata <br>
                            Support PHP Version : 5.4 - 7.0 atau lebih <br>
                            Framework : LARAVEL 5.4 <br>
                            Composer : TRUE <br>
                            CSS : CSS3  & SASS <br>
                            Javascript : Jquery Framework <br>
                            Database : XAMPP / PHPmyadmin
                        </address>
                        <h3>Metode Perhitungan</h3>
                        <address>
                            Bayesian Network
                        </address>
                        <h3>Referensi</h3>
                        <address>
                            <a href="https://laravel.com/docs">https://laravel.com/docs/</a> <br>
                            <a href="https://jquery.com">https://jquery.com/</a> <br>
                            <a href="https://bootstrap.com">https://bootstrap.com/</a> <br>
                            <a href="https://wikipedia.com/bayesiannetwork">https://wikipedia.com/bayesiannetwork/</a> <br>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
