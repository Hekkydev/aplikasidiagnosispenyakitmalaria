@extends('index')
    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form method="post" action="{{ URL::to('backend/penyebab/update_proses') }}" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $penyebab->id }}" name="id">
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-6">
                                        <legend>Form Penyebab</legend>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kode_penyebab" class="control-label col-md-3">Kode Penyebab</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="kode_penyebab" value="{{ $penyebab->kode_penyebab }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penyebab" class="control-label col-md-3">Nama Penyabab</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="nama_penyebab" value="{{ $penyebab->nama_penyebab }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3"><button class="btn btn-primary" type="submit">Update</button></div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection