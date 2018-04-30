@extends('index')
    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <a href="{{URL::to('backend/penyebab/add')}}" class="btn btn-primary"> Tambah Penyebab</a> <br><br>
                        <table class="table table-striped table-bordered" id="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penyabab</th>
                                <th>Kode Penyebab</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                               <?php $no = 0 ; ?> @foreach($penyebab as $p)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $p->nama_penyebab }}</td>
                                        <td>{{ $p->kode_penyebab }}</td>
                                        <td>

                                            <a href="{{ URL::to('backend/penyebab/'.$p->id.'/edit') }}" class="btn btn-default"><i class="fa fa-search"></i></a>
                                            <a href="{{ URL::to('backend/penyebab/'.$p->id.'/delete') }}" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@stop