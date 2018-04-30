@extends('index')
@section('content')
<div class="row">
        <div class="col-md-12">
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }} alert-dismissable"> {{ Session::get('message') }}</p>
                @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Solusi</h3>
                </div>
                <div class="panel-body">
                        <form action="{{ url('backend/solusi/updateproses') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                                
                           <table class="table">
                               <tr>
                                   <td> <label for="nama">Kode</label></td>
                                   <td>:</td>
                                   <td><input type="text" name="kode_solusi" class="form-control" value="{{ $data->kode_solusi }}"></td>
                               </tr>
                              <tr>
                                    <td> <label for="nama">Solusi</label></td>
                                    <td>:</td>
                                    <td><textarea  name="nama_solusi"  class="form-control">{{ $data->nama_solusi }}</textarea>
                                </tr>
                                <tr>
                                        <td> </td>
                                        <td></td>
                                        <td><button type="submit" class="btn btn-primary">Update</button> <a href="{{ URL::to('backend/solusi')}}" class="btn btn-default">Kembali</a></td>
                                    </tr>
                                    
                           </table>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
