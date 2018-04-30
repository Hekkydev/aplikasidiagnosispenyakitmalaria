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
                    <form action="{{ url('backend/account/updateproses') }}" method="post">
                            {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{ $data->id }}">
                           <table class="table">
                               <tr>
                                   <td> <label for="nama">Kode Administrator</label></td>
                                   <td>:</td>
                                   <td><input type="text" name="kode_administrator" value="{{ $data->kode_administrator }}" class="form-control"></td>
                               </tr>
                               <tr>
                                    <td> <label for="nama">Nama Lengkap</label></td>
                                    <td>:</td>
                                    <td><input type="text" name="nama_lengkap" value="{{ $data->nama_lengkap }}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td> <label for="nama">Username</label></td>
                                    <td>:</td>
                                    <td><input type="text" name="username" value="{{ $data->username }}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td> <label for="nama">Password</label></td>
                                    <td>:</td>
                                    <td><input type="password" name="password" value="{{ $data->password }}" class="form-control"></td>
                                </tr>

                                <tr>
                                        <td> </td>
                                        <td></td>
                                        <td><button type="submit" class="btn btn-primary">Update</button> <a href="{{ URL::to('backend/account')}}" class="btn btn-default">Kembali</a></td>
                                    </tr>

                           </table>
                        </form>
            </div>
        </div>
    </div>
</div>

@stop
