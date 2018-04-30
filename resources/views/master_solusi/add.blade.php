@extends('index')
@section('content')
<div class="row">
        <div class="col-md-12">
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissable"> {{ Session::get('message') }}</p>
                @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Solusi</h3>
                </div>
                <div class="panel-body">
                        <form action="{{ url('backend/solusi/addproses') }}" method="post">
                            {{ csrf_field() }}
                                
                           <table class="table">
                               <tr>
                                   <td> <label for="nama">Kode</label></td>
                                   <td>:</td>
                                   <td><input type="text" name="kode_solusi" class="form-control"></td>
                               </tr>
                              <tr>
                                    <td> <label for="nama">Solusi</label></td>
                                    <td>:</td>
                                    <td><textarea  name="nama_solusi"  class="form-control"></textarea>
                                </tr>
                                <tr>
                                        <td> </td>
                                        <td></td>
                                        <td><button type="submit" class="btn btn-primary">Submit</button> <a href="{{ URL::to('backend/solusi')}}" class="btn btn-default">Kembali</a></td>
                                    </tr>
                                    
                           </table>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
