@extends('index')
@section('content')
    <div class="row">
       @if($penyakit == TRUE)
            @foreach($penyakit as $p)
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class=" fa fa-globe"></i> {{ $p->nama_penyakit }} - {{ $p->kode_penyakit}}</h3>
                    </div>
                    <div class="panel-body">
                        <code>{{ $p->definisi }}</code>
                        <article>{{ $p->keterangan}}<article>
                    </div>
                </div>
            </div>
        @endforeach
        @else
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">Tidak ada hasil pencarian </div>
                </div>
            </div>
       @endif
    </div>
@endsection