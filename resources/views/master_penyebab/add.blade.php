@extends('index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <form action="{{ URL::to('backend/penyebab/add_proses') }}" class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-6">
                                    <legend>Form Penyebab</legend>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kode_penyebab" class="control-label col-md-3">Kode Penyebab</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="kode_penyebab">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_penyebab" class="control-label col-md-3">Nama Penyabab</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nama_penyebab" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a href="{{ URL::to('backend/penyebab')}}" class="btn btn-default">Back</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection