@extends('index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Nama Pasien</th>
                                <th> Hasil Diagnosa</th>
                                <th>Nilai</th>
                                <th>Persentase</th>
                                <th>Detail</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>@foreach( $history as $u)
                                <tr>
                                    <td><?php echo ++$no?></td>
                                    <td>{{$u->name}}</td>
                                    <td>{{ $u->nama_penyakit }}</td>
                                    <td>{{ $u->nilai }}</td>
                                    <td>{{ number_format($u->nilai * 100 ,2).'%' }}</td>
                                    <td>
                                        <a href="{{ url('backend/history/'.$u->id.'/detail') }}" class="btn btn-default"><i class="fa fa-search"></i></a>
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