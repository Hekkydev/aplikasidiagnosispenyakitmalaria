@extends('index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Gejala</h3>
                </div>
                <div class="panel-body">
                        <form action="{{ url('backend/gejala/addproses') }}" method="post">
                            {{ csrf_field() }}
                                
                           <table class="table">
                               <tr>
                                   <td> <label for="nama">Kode</label></td>
                                   <td>:</td>
                                   <td><input type="text" name="kode_gejala" class="form-control"></td>
                               </tr>
                               <tr>
                                    <td> <label for="nama">Nama Gejala</label></td>
                                    <td>:</td>
                                    <td><input type="text" name="nama_gejala"  class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="Present">Nilai Belief (Bobot)</label></td>
                                    <td>:</td>
                                    <td><input type="text" name="bobot" id="bobot" class="form-control">  </td>
                                </tr>
                                
                               
                                <tr>
                                        <td> </td>
                                        <td></td>
                                        <td><button type="submit" class="btn btn-danger">Insert</button> <a href="{{ URL::to('backend/gejala')}}" class="btn btn-default">Kembali</a></td>
                                    </tr>
                                    
                           </table>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
