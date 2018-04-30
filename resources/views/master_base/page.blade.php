@extends('index')

    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <a href="{{ url('backend/basis-aturan-create')}}" class="btn btn-success btn-flat">Tambah Rule</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="10em">No</th>
                                    <th>Penyebab</th>
                                    <th>Penyakit</th>
                                    <th>Solusi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($rules as $r):?>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $r->nama_penyebab }}</td>
                                        <td>{{ $r->nama_penyakit }}</td>
                                        <td>{{ $r->nama_solusi }}</td>
                                        <td>
                                            <a href="{{ URL::to('backend/basis-aturan/'.$r->id.'/detail')}}" class="btn btn-default"><i class="fa fa-search"></i></a>
                                            <a href="{{ URL::to('backend/basis-aturan/'.$r->kode_rules.'/delete') }}" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
