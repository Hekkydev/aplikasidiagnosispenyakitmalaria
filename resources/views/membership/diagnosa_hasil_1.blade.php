@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Hasil Diagnosa</div>

                    <div class="panel-body">
                        <legend>Detail Pasien</legend>
                        <div class="col-lg-12">
                          <table class="table">
                            <thead>

                              <tr>
                                  <th width="200px;">Nama Pasien</th>
                                  <td width="10px;">:</td>
                                  <td>{{ $user->name }}</td>
                              </tr>

                              <tr>
                                  <th>Umur Pasien</th>
                                  <td>:</td>
                                  <td>{{ $user->umur }}</td>
                              </tr>

                              <tr>
                                  <th>Alamat Pasien</th>
                                  <td>:</td>
                                  <td>{{ $user->alamat }}</td>
                              </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>

                            </thead>
                        </table>
                        </div>

                        <legend>Gejala yang di alami oleh pasien</legend>
                               <div class="col-lg-12">
                                  @foreach($daftar_gejala_2 as $d)
                                    <span class="label label-danger">{{ $d['nama_gejala'] }}</span>
                                @endforeach
                                <br>   <br>
                               </div>

                               <?php 
                               $total = 1;
                               $total_2 = 1;
                               $total_3 = 1;
                                $no = 0; 
                               ?> 

                              
                              <div class="col-lg-12">
                                <div class="row">
                                 @foreach($hitung as $h)
                                
                                <div class="col-lg-6" style="height:170px;">
                                  
                                  <table class="table table-bordered table-striped" style="border-top:3px solid red; font-size:12px; width:100%;">
                                    <tr>
                                        <th width="200"> Gejala {{++$no }} </th>
                                        <th width="5"> : </th>
                                        <th> {{$h['nama_gejala']}} - Bel {{ '('.$h['bobot'].')' }}</th>
                                    </tr>
                                    <tr>
                                        <td>Maka  -  {{ $h['hitung'] }}</td>
                                        <td>:</td>
                                        <td>
                                         
                                            @foreach($h['daftar_penyakit'] as $p)
                                               <span style="font-size:13px; margin-bottom:10px;" class="label label-info"> {{ $p->nama_penyakit }}</span>
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>:</td>
                                        <td>

                                            1 - {{ $h['bobot'] }}


                                        </td>
                                    </tr>
                                    <tr>
                                            <td></td>
                                            <td>:</td>
                                            <td>
    
                                                {{ 1 -  $h['bobot'] }}
                                                
    
                                            </td>
                                        </tr>

                                       
                                        
                                </table>
                                </div>
                               
                               @endforeach

                                <div class="col-lg-6" style="height:170px;">
                                   @foreach($hitung_2 as $h)
                              
                               <table class="table table-bordered table-striped" style="border-top:3px solid red;font-size:12px; width:100%;">
                                    <tr>
                                        <th width="200"> Gejala {{++$no }} </th>
                                        <th width="5"> : </th>
                                        <th> {{$h['nama_gejala']}} - Bel {{ '('.$h['bobot'].')' }}</th>
                                    </tr>
                                    <tr>
                                        <td>Maka  -  {{ $h['hitung'] }}</td>
                                        <td>:</td>
                                        <td>
                                         
                                            @foreach($h['daftar_penyakit'] as $p)
                                               <span style="font-size:13px; margin-bottom:10px;" class="label label-info"> {{ $p->nama_penyakit }}</span>
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>:</td>
                                        <td>

                                            1 - {{ $h['bobot'] }}


                                        </td>
                                    </tr>
                                    <tr>
                                            <td></td>
                                            <td>:</td>
                                            <td>
    
                                                {{ 1 -  $h['bobot'] }}
                                                
    
                                            </td>
                                        </tr>

                                        
                                        
                                </table>
                               @endforeach
                                </div>

                              </div>
                              </div>

                             
                              


                        <legend>Hasil diagnosa berdasarkan gejala pasien</legend>
                        <div class="col-lg-12">
                          <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th></th>
                              <th>Nama Penyakit</th>
                              <th>Nilai Presentase</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($dempstershaferResult as $key => $value): ?>
                              <tr>
                                <td></td>
                                <td>{{ $key }}</td>
                                <td>{{ round($value,3) }}</td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                        
                      <?php $i = 0; foreach ($dempstershaferResult as $key => $value): ?>
                        
                          <?php if ($i == 0): ?>
                               <p>


                          Dari hasil perhitungan nilai densitas <strong>M{{ count($hitung)+1}}</strong> kombinasi diatas dapat dilihat bahwa didapatkan hasil jenis penyakit  <span class="label label-danger" style="margin-right: 10px; margin-left: 10px;">{{ $key }}</span>  dengan nilai probabilitas {{ round($value,3) }} atau bila dipresentasikan, menjadi <strong>{{ round($value,3) * 100 }}%</strong>
                        </p>
                             <?php endif ?>   

                      <?php $i++; endforeach;?>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <a href="{{ URL::to('membership/') }}" class="btn btn-danger"><i class="fa fa-chevron-left"></i>  Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


<?php 
    
   $gejala = '';
   foreach($daftar_gejala_2 as $d):
      $gejala .= $d['nama_gejala'].',';
   endforeach;

    $i = 0; foreach ($dempstershaferResult as $key => $value):
        if ($i == 0) {
            $DB = new App\History();
            $DB->kode_user = $user->id;
            $DB->kode_penyakit = $key;
            $DB->gejala = $gejala;
            $DB->nilai = round($value,3);
            $DB->save();
        }
    $i++; endforeach;
 ?>
