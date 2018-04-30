@extends('index')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
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
                                        <a href="{{ URL::to('backend/pasien/'.$p->id.'/info') }}" class="btn btn-danger"><i class="fa fa-search"></i></a>

                                        <a href="{{ url('backnd/pasien'.$p->id.'/delete')}}" class="btn btn-default"><i class="fa fa-trash"></i></a>
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