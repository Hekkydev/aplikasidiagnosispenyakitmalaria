@extends('index')
@section('content')
    <div class="row">
      <div class="col-md-12">
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }} alert-dismissable"> {{ Session::get('message') }}</p>
                @endif
        </div>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Gejala</h3>
                </div>
                <div class="panel-body">
                        <form action="{{ url('backend/gejala/updateproses') }}" method="post">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                            {{ csrf_field() }}
                                
                           <table class="table">
                               <tr>
                                   <td> <label for="nama">Kode</label></td>
                                   <td>:</td>
                                   <td><input type="text" name="kode_gejala" class="form-control" value="{{ $data->kode_gejala }}"></td>
                               </tr>
                               <tr>
                                    <td> <label for="nama">Nama Gejala</label></td>
                                    <td>:</td>
                                    <td><input type="text" name="nama_gejala"  class="form-control" value="{{ $data->nama_gejala }}"></td>
                                </tr>
                               <tr>
                                    <td><label for="Present">Present</label></td>
                                    <td>:</td>
                                    <td><input type="text" name="present_positif" value="{{ $data->present_positif }}" placeholder="nilai positif"> <input type="text" value="{{ $data->present_negatif }}" name="present_negatif" placeholder="nilai negatif"></td>
                                </tr>
                                
                                <tr>
                                    <td><label for="Absen">Absen</label></td>
                                    <td>:</td>
                                    <td><input type="text" name="absen_positif" placeholder="nilai positif" value="{{ $data->absen_positif}}"> <input type="text" name="absen_negatif" placeholder=" nilai negatif" value="{{ $data->absen_negatif}}"></td>
                                </tr>
                                 <tr>
                                    <td><label for="Absen">Probabilitas</label></td>
                                    <td>:</td>
                                    <td><input style="background:#f5f5f5" type="text" placeholder="nilai positif" value="{{ $data->probabilitas}}" readonly></td>
                                </tr>
                                <tr>
                                        <td> </td>
                                        <td></td>
                                        <td><button type="submit" class="btn btn-primary">Update</button> <a href="{{ URL::to('backend/gejala')}}" class="btn btn-default">Kembali</a></td>
                                    </tr>
                                    
                           </table>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
