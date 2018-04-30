<?php //print_r($rules->nama_penyakit); die();?>
@extends('index')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Edit Rules</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ URL::to('backend/basis-aturan-update') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $rules->kode_rules }}" name="kode_rules">

                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="form-group">
                                    <label for="" class="control-label">Pilih Penyakit</label>
                                    <select name="kode_penyakit" id="" class="form-control">
                                        @foreach($data['penyakit'] as $g)
                                            @if($g->nama_penyakit == $rules->nama_penyakit)
                                                <option value="{{ $g->kode_penyakit }}" selected>{{ $g->nama_penyakit }}</option>
                                                @else
                                                <option value="{{ $g->kode_penyakit }}" >{{ $g->nama_penyakit }}</option>

                                            @endif
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                            <div class="col-md-offset-2 col-md-8">
                                <div class="form-group">
                                    <label for="" class="control-label">Pilih Penyebab</label>
                                    <select name="kode_penyebab" id="" class="form-control">
                                        @foreach($data['penyebab'] as $g)
                                            @if($g->nama_penyebab == $rules->nama_penyebab)
                                                <option value="{{ $g->kode_penyebab }}" selected>{{ $g->nama_penyebab }}</option>
                                                @else
                                                <option value="{{ $g->kode_penyebab }}">{{ $g->nama_penyebab }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                            <div class="col-md-offset-2 col-md-8">
                                <div class="form-group">
                                    <label for="" class="control-label">Solusi</label>
                                    <select name="kode_solusi" id="" class="form-control">

                                        @foreach($data['solusi'] as $g)
                                            @if($g->nama_solusi == $rules->nama_solusi)
                                                <option value="{{ $g->kode_solusi }}" selected>{{ $g->nama_solusi }}</option>
                                            @else
                                            <option value="{{ $g->kode_solusi }}">{{ $g->nama_solusi }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                            <div class="col-md-offset-2 col-md-8">

                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Daftar Gejala</label>
                                        <div class="form-group">

                                            <select name="from[]" class="multiselect form-control" size="8" multiple="multiple" data-right="#multiselect_to_1" data-right-all="#right_All_1" data-right-selected="#right_Selected_1" data-left-all="#left_All_1" data-left-selected="#left_Selected_1">
                                                @foreach($data['gejala'] as $g)
                                                    <option value="{{ $g->kode_gejala }}">{{ $g->kode_gejala }} - {{ $g->nama_gejala }}</option>
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
                                            <select name="to[]" id="multiselect_to_1" class="form-control" size="8" multiple="multiple">
                                                @foreach($data['gejaladipilih'] as $g)
                                                <option value="{{ $g->kode_gejala }}">{{ $g->kode_gejala }} - {{ $g->nama_gejala }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-offset-2 col-md-8">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-flat" type="submit">Update</button>
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