@extends('index')
    @section('content')
      <div class="row">
        <div class="col-md-12">
          <a href="{{ url('backend/account/add')}}" class="btn btn-primary">Tambah</a>
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
                <table class="table table-responsive table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                        @foreach($account as $item)
                            <tr>
                              <td>{{$no++}}</td>
                              <td>{{ $item->kode_administrator }}</td>
                              <td>{{ $item->nama_lengkap }}</td>
                              <td>{{ $item->username }}</td>
                              <td>*****</td>
                              <td>
                                <a href="{{ url('backend/account/'.$item->id.'/update')}}" class="btn btn-default"><i class="fa fa-search"></i></a>
                                <a href="{{ url('backend/account/'.$item->id.'/delete')}}" class="btn btn-default"><i class="fa fa-trash"></i></a>
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
