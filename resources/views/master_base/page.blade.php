@extends('index')

    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <a href="{{ url('backend/basis-aturan-create')}}" class="btn btn-danger btn-flat">Tambah Rule</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="10em">No</th>
                                    <th>Penyakit</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($rules as $r):?>

                                <?php
                               $getRules = DB::table('master_rules')
                                ->select('master_rules.id',
                                        'master_penyakit.nama_penyakit',
                                        'master_rules.kode_rules',
                                        'master_rules.kode_penyakit',
                                        'master_gejala.nama_gejala',
                                        'master_gejala.bobot'
                                        
                                    )
                                ->leftJoin('master_penyakit', 'master_rules.kode_penyakit', '=', 'master_penyakit.kode_penyakit')
                                ->leftJoin('master_gejala', 'master_rules.kode_gejala', '=', 'master_gejala.kode_gejala')
                                ->where('master_rules.kode_penyakit','=',$r->kode_penyakit)
                                ->get();

                                //dd($getRules);
                                ?>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <b>{{ strtoupper($r->nama_penyakit) }}</b><br><br>
                                         
                                                    @foreach($getRules as $p)
                                                            <p>{{ $p->nama_gejala }} = {{ $p->bobot }}</p>
                                                         @endforeach
                                            
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('backend/basis-aturan/'.$r->id.'/detail')}}" class="btn btn-danger"><i class="fa fa-search"></i></a>
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
