@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <a href="{{ URL::to('membership/') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
                <br><br>
                @if(count($history) > 0)
                    @foreach( $history as $h)
                        <div class="panel panel-default">
                            <div class="panel-heading">Tanggal Diagnosa : {{ $h->created_at }}</div>

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
                                    {{--  <tr>
                                        <td>Keterangan Diagnosa <br>
                                            Penyebab : {{ $h->nama_penyebab }}<br>
                                            Solusi : {{ $h->nama_solusi }}
                                        </td>
                                    </tr>  --}}
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
                @else
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informasi Diagnosa</h3>
                        </div>
                        <div class="panel-body">
                            Anda belum melakukan diagnosa !
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
