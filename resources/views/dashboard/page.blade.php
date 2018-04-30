@extends('index')
@section('content')


<!-- Info boxes -->
     <div class="row" style="margin-top:50px; color:green;">
       <div class="col-md-3 col-sm-6 col-xs-12">
           <a href="{{url('backend/pasien') }}">
               <div class="info-box">
                   <span class="info-box-icon bg-red"><i class="ion ion-ios-gear-outline"></i></span>

                   <div class="info-box-content">
                       <span class="info-box-text">Pasien</span>
                       <span class="info-box-number">{{ $data['pasien']}}</span>
                   </div>
                   <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
           </a>
       </div>
       <!-- /.col -->
       <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="{{ url('backend/gejala')}}">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-stethoscope"></i></span>
 
            <div class="info-box-content">
              <span class="info-box-text">Daftar Gejala</span>
              <span class="info-box-number">{{ $data['gejala']}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
       </div>
       <!-- /.col -->

       <!-- fix for small devices only -->
       <div class="clearfix visible-sm-block"></div>

       <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{ url('backend/penyakit')}}">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-hospital-o"></i></span>
 
            <div class="info-box-content">
              <span class="info-box-text">Daftar Penyakit</span>
              <span class="info-box-number">{{ $data['penyakit']}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
       </div>
       <!-- /.col -->
       <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="{{ url('backend/account')}}">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
 
            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number">{{ $data['users'] }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
         </a>
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->

<div class="row">

    <div class="col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar  Pasien</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Umur</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; ?>   @foreach($pasien as $p)
                        <tr>
                            <td>{{ ++$no}}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->umur }}</td>
                            <td>{{ $p->email }}</td>
                            <td>
                                <a href="{{ URL::to('backend/pasien/'.$p->id.'/info') }}" class="btn btn-default"><i class="fa fa-search"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar Penyakit Yang Banyak diderita oleh pasien</h3>
            </div>
            <div class="panel-body">
                <table width="100%">
                    <thead>

                    @foreach($penyakit as $p)
                        <tr style="height: 40px">
                            <th>{{ $p->nama_penyakit }}</th>
                            <th>:</th>
                            <th><meter min="0" max="100" value="{{ ($p->jumlah_penyakit * 100) / $data['penyakit']  }}"></meter>  {{ number_format(($p->jumlah_penyakit * 100) / $data['penyakit'],2)  }} %</th>
                        </tr>
                    @endforeach
                    </thead>
                </table>
            </div>
            <div class="panel-footer panel-primary">
                <a href="{{ URL::to('backend/history') }}" class="btn btn-default"> <i class="fa fa-stethoscope"></i> Laporan Diagnosa</a>
            </div>
        </div>
    </div>
</div>

@stop
