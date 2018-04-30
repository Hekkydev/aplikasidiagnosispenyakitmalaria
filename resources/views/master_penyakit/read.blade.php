@extends('index')
@section('content')

<div class="row">
    <div class="col-md-12">
         @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }} alert-dismissable"> {{ Session::get('message') }}</p>
        <br>
        @endif
        <div class="panel">
            <div class="panel-body">
                    <form action="{{ url('backend/penyakit/updateproses') }}" method="post">
                            {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{ $data->id }}">
                           <table class="table">
                               <tr>
                                   <td> <label for="nama">Kode</label></td>
                                   <td>:</td>
                                   <td><input type="text" name="kode_penyakit" value="{{ $data->kode_penyakit }}" class="form-control"></td>
                               </tr>
                               <tr>
                                    <td> <label for="nama">Nama Penyakit</label></td>
                                    <td>:</td>
                                    <td><input type="text" name="nama_penyakit" value="{{ $data->nama_penyakit }}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td> <label for="nama">Definisi</label></td>
                                    <td>:</td>
                                    <td><input type="text" name="definisi" value="{{ $data->definisi }}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td> <label for="nama">Keterangan</label></td>
                                    <td>:</td>
                                    <td><textarea  name="keterangan"  class="form-control">{{ $data->keterangan }}</textarea>
                                </tr>
                                <tr>
                                        <td> </td>
                                        <td></td>
                                        <td><button type="submit" class="btn btn-primary">Update</button> <a href="{{ URL::to('backend/penyakit')}}" class="btn btn-default">Kembali</a></td>
                                    </tr>
                                    
                           </table>
                        </form>
            </div>
        </div>
    </div>
</div>

@stop