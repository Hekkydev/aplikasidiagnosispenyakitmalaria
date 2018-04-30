@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <a href="{{ URL::to('membership/') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
            <br><br>
            <div class="panel panel-default">
                <div class="panel-heading">Form Diagnosa</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                      <div class="row">
                         <div class="col-lg-12">
                             <form id="rootwizard-2" class="form-wizard validate-form-wizard validate" action="{{ url('membership/diagnosaproses')}}" method="post">
                                 <div class="wizard-navbar">
                                     {{ csrf_field() }}
                                    <ul>
                                    <?php $no = 1;?>
                                     @foreach($gejala as $d)
                                         @if($no == 1)
                                             <li class="active"><a href="#tab2-1" data-toggle="tab"></a></li>
                                            
                                            @else
                                             <li><a href="#tab2-{{ $no }}" data-toggle="tab"></a></li>
                                        
                                         @endif
                                         <?php $no++;?>
                                     @endforeach
                                    </ul>
                                     
                                  
                                 </div>
                                 <div class="tab-content">
                                  <?php $no = 1;?>
                                     @foreach($gejala as $d)
                                         @if($no == 1)
                                     <div class="tab-pane  active" id="tab2-1" align="center">
                                         <H3 style="margin-bottom:20px;">{{ $d->nama_gejala }} ? </H3>
                                         <span><input type="radio" value="1" name="{{ $d->kode_gejala }}" required=""> YA </span>
                                         <span  style="margin-left:50px;"><input type="radio" value="0" required="" name="{{ $d->kode_gejala }}"> TIDAK</span>
                                     </div>
                                         @else
                                     <div class="tab-pane" id="tab2-{{ $no }}" align="center">
                                        <H3 style="margin-bottom:20px;">{{ $d->nama_gejala }} ? </H3>
                                        <span><input type="radio" name="{{ $d->kode_gejala }}" value="1"  required=""> YA </span>
                                        <span  style="margin-left:50px;"><input type="radio" name="{{ $d->kode_gejala }}" required=""  value="0"> TIDAK</span>
                                     </div>  
                                       @endif
                                         <?php $no++;?>
                                     @endforeach
                                     <ul class="pager wizard">
                                         <li class="previous"><a href="javascript:void(0)"><i class="icon-left-open"></i>Previous</a></li>
                                         <li class="next"><a href="javascript:void(0)">Next<i class="icon-right-open"></i></a> </li>
                                         <li class="finish"><button href="javascript(0)" style="float:right;"  type="submit" class="btn btn-primary btn-md"><i class="icon-right-open"></i> Submit</button>
                                        </ul>
                                 </div>
                             </form>


                         </div>
                    </div>



                </div>
            </div>
        </div>
        <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Gejala</h3>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @foreach($gejala as $g)
                                <li>{{ $g->nama_gejala }}</li>
                            @endforeach
                        </ol>
                    </div>
                 </div>                                             
          </div>
    </div>


    
</div>
@endsection
