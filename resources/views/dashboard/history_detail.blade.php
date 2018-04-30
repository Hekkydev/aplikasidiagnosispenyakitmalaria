@extends('index')

@section('content')
    <style>
        thead>tr>th{
            height: 60px;
        }
    </style>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ URL::to('backend/history') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
                <br><br>
                @if(count($history) > 0)
                    @foreach( $history as $h)
                        <div class="panel panel-default">
                            <div class="panel-heading">Tanggal Diagnosa : {{ $h->created_at }}</div>

                            <div class="panel-body">
                                <table width="100%">
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
