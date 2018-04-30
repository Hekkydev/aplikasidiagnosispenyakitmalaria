@extends('index')
@section('content')

<div class="row">
        <div class="col-md-12">
                <a href="{{ url('backend/penyakit/add')}}" class="btn btn-success btn-flat">tambah</a>
         </div>
</div>
<hr>
<div class="row">

    
    <div class="col-md-12">
    
        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissable"> {{ Session::get('message') }}</p>
        @endif
        
       <div class="panel">
           <div class="panel-heading">
               <h3 class="panel-title">Daftar Penyakit Mata</h3>
           </div>
           <div class="panel-body">
               <table class="table table-responsive table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Definisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($penyakit as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->kode_penyakit }} </td>
                                <td>{{ $p->nama_penyakit }} </td>
                                <td>{{ $p->definisi }}</td>
                                <td>
                                    <a href="{{url('backend/penyakit/'.$p->id.'/update')}}" class="btn btn-md btn-default"><i class="fa fa-search"></i></a>
                                    
                                    <a href="{{url('backend/penyakit/'.$p->id.'/delete')}}" class="btn btn-md btn-default"><i class="fa fa-trash"></i></a>
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
