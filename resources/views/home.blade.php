@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <a href="{{ url('membership/diagnosa')}}">
        <div class="panel panel-danger">
          <div class="panel-heading">
          </div>
          <div class="panel-body" align="center">
            <h1 style="color:red;"><i class="fa fa-lg fa-stethoscope"></i></h1>
            <small style="color:red;"> FORM DIAGNOSA</small>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-3">
    <a href="{{ url('membership/hasil-diagnosa')}}">
      <div class="panel panel-danger">
        <div class="panel-heading">
        </div>
        <div class="panel-body" align="center">
          <h1 style="color:red;"><i class="fa fa-lg fa-medkit"></i></h1>
          <small style="color:red;"> HASIL DIAGNOSA</small>
        </div>
      </div>
    </a>
    </div>

    <div class="col-md-3">
    <a href="{{ url('membership/informasi-aplikasi') }}">
      <div class="panel panel-danger">
        <div class="panel-heading">
        </div>
        <div class="panel-body" align="center">
          <h1 style="color:red;"><i class="fa fa-lg fa-info"></i></h1>
          <small style="color:red;"> INFORMATION</small>
        </div>
      </div>
    </a>
    </div>
    <div class="col-md-3">
    <a href="{{ url('membership/profil')}}">
      <div class="panel panel-danger">
        <div class="panel-heading">
        </div>
        <div class="panel-body" align="center">
          <h1 style="color:red;"><i class="fa fa-lg fa-user"></i></h1>
          <small style="color:red;"> PROFIL</small>
        </div>
      </div>
    </a>
    </div>
  </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-dashboard"></i> Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat datang di sistem pakar - Diagnosa Penyakit Pada Mata <br><br>
                    <div class="alert alert-info">
                      Sistem Pakar(dalam bahasa Inggris :expert system) adalah sistem informasi yang berisi dengan pengetahuan dari pakar sehingga dapat digunakan untuk konsultasi. Pengetahuan dari pakar di dalam sistem ini digunakan sebagi dasar oleh Sistem Pakar untuk menjawab pertanyaan (konsultasi).
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-12">
          @if(count($history) > 0)
            @foreach( $history as $h)
              <div class="panel panel-info">
                <div class="panel-heading"> <i class="fa fa-stethoscope"></i> Hallo <strong>{{ $user->name }}</strong> Berikut Diagnosa Terakhir anda </div>

                <div class="panel-body">
                  <table class="table">
                    <thead>
                    <tr>
                      <th>Penyakit : {{ $h->nama_penyakit }}</th>
                    </tr>
                    <tr>
                      <td>Nilai : {{ $h->nilai}}   <br>
                        persentasi : <meter min="0" value="{{ number_format($h->nilai * 100 ,2) }}" max="100"></meter> {{ number_format($h->nilai * 100 ,2).' %'}}
                      </td>

                    </tr>

                    <tr>
                      <td>Keterangan Diagnosa <br>
                        Penyebab : {{ $h->nama_penyebab }}<br>
                        Solusi : {{ $h->nama_solusi }}
                      </td>
                    </tr>
                    <tr>
                      <td>Gejala yang di alami <br>
                        <code>
                          {{ str_replace(',',' , ',$h->gejala) }}
                        </code>
                      </td>
                    </tr>
                    </thead>
                  </table>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>

@endsection
