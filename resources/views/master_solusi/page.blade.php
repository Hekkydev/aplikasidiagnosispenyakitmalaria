@extends('index')
    @section('content')
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('backend/solusi/add')}}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <hr>
             <div class="row">
                <div class="col-md-12">
                        @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissable"> {{ Session::get('message') }}</p>
                        @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">List Data</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Solusi</th>
                                        <th>Nama Solusi</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1;?>
                                   @foreach($solusi as $item)
                                    <tr>
                                        <td>{{ $no++}}</td>
                                        <td>{{ $item->kode_solusi}}</td>
                                        <td>{{ $item->nama_solusi}}</td>
                                        <td>
                                            <a href="{{ url('backend/solusi/'.$item->id.'/update')}}" class="btn btn-default"><i class="fa fa-search"></i></a>
                                            <a href="{{ url('backend/solusi/'.$item->id.'/deleted')}}" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    @endsection