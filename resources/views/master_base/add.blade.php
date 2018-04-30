
@extends('index')

  
    @section('content')
    <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Add Rules</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ URL::to('backend/basis-aturan-created') }}" method="post">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                        <div class="form-group">
                                                <label for="" class="control-label">Pilih Penyakit</label>
                                                <select name="kode_penyakit" id="" class="form-control">

                                                        @foreach($data['penyakit'] as $g)
                                                        <option value="{{ $g->kode_penyakit }}">{{ $g->nama_penyakit }} </option>
                                                         @endforeach

                                                </select>
                                            </div>

                                </div>
                             
                                <div class="col-md-offset-2 col-md-8">

                                   <div class="row">
                                       <div class="col-md-5">
                                            <label for="">Daftar Gejala</label>
                                            <div class="form-group">
                                                    <!-- <select name="gejala" multiple id="" class="form-control multiselect" style="height:300px;">
                                                            @foreach($data['gejala'] as $g)
                                                            <option value="{{ $g->kode_gejala }}">{{ $g->nama_gejala }} </option>
                                                             @endforeach
                                                    </select> -->
                                                    <select name="from[]" class="multiselect form-control" size="25" multiple="multiple" data-right="#multiselect_to_1" data-right-all="#right_All_1" data-right-selected="#right_Selected_1" data-left-all="#left_All_1" data-left-selected="#left_Selected_1">
                                                            @foreach($data['gejala'] as $g)
                                                            <option value="{{ $g->kode_gejala }}">{{ $g->kode_gejala }} - {{ $g->nama_gejala }} </option>
                                                             @endforeach
                                                     </select>

                                                </div>
                                       </div>
                                       <div class="col-md-2">
                                            <label for="">&nbsp;</label>
                                            <button type="button" id="right_All_1" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                            <button type="button" id="right_Selected_1" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                            <button type="button" id="left_Selected_1" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                            <button type="button" id="left_All_1" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                        </div>

                                       <div class="col-md-5">
                                            <label for="">Gejala yang di pilih</label>
                                            <div class="form-group">
                                                    <select name="to[]" id="multiselect_to_1" class="form-control" size="25" multiple="multiple"></select>

                                                </div>
                                       </div>
                                   </div>
                                </div>
                                <div class="col-md-offset-2 col-md-8">
                                    <div class="form-group">
                                        <button class="btn btn-danger btn-flat" type="submit">Save</button>
                                        <a href="{{ url('backend/basis-aturan') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
