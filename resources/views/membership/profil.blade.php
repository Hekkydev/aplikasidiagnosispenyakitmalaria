@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <a href="{{ URL::to('membership/') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
            <br><br>
            <div class="panel panel-default">
                <div class="panel-heading">Profil</div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nama Member</label>
                        <input type="text" name="" value="{{ $data->name }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="" value="{{ $data->email }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Terdaftar</label>
                        <input type="text" name="" value="{{ $data->created_at }}" class="form-control" readonly>
                      </div>

                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Umur</label>
                        <input type="text" name="" value="{{ $data->umur }} tahun" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Alamat</label>
                       <textarea rows="5" class="form-control" readonly>{{ $data->alamat }}</textarea>
                      </div>
                      
                    </div>
                  </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
