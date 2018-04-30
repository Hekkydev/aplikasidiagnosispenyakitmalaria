@extends('index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('backend/gejala/add')}}" class="btn btn-md btn-danger btn-flat">Tambah</a>
        </div>
        <hr> 
       
        <div class="col-md-12">
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }} alert-dismissable"> {{ Session::get('message') }}</p>
                @endif
        </div>

        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">List Data</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Gejala</th>
                                <th>Nama Gejala</th>
                                <th>Nilai Belief (Bobot)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                      <?php $no = 1; ?>
                            @foreach($gejala as $g)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $g->kode_gejala }}</td>
                                    <td>{{ $g->nama_gejala }}</td>
                                    <td>{{ $g->bobot}}</td>
                                    <td>
                                        <a href="{{ url('backend/gejala/'.$g->id.'/update')}}" class="btn btn-danger"><i class="fa fa-search"></i></a>
                                        <a href="{{ url('backend/gejala/'.$g->id.'/deleted')}}" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop