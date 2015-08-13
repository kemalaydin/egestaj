@extends('layout2')

@section('title')
 Admin Öğretim Görevlisi Ekleme Sayfası | EgeStaj
@stop

@section('content')
    <div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
                    </div>
                    @include('yonetici.solpanel')
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                      <div class="baslik">
                            <p class="box-title">ÖĞRETİM GÖREVLİSİ EKLE</p>
                            
                        </div>
                        <div class="row">
                        
                                    <div class="icerik">
                                        <div class="row">
                                            <form action="{{URL('panel/yonetici/danisman/')}}" method="post">
                                            <div class="form-group" style="width:40%;margin-top:20px;margin-left:15px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğretim Görevlisi Adı" name="Adi" aria-describedby="inputGroupSuccess4Status">
                                                </div>

                                                <div class="input-group" style="margin-top:10px;">
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğretim Görevlisi Soyadı" name="Soyadi" aria-describedby="inputGroupSuccess4Status">
                                                </div>

                                                <div class="input-group" style="margin-top:10px;">
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğretim Görevlisi Telefonu" name="Telefon" aria-describedby="inputGroupSuccess4Status">
                                                </div>

                                                <div class="input-group" style="margin-top:10px;">
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    <select class="form-control input-sm" id="inputGroupSuccess4" name="Bolum">
                                                    <option value="" selected disabled="">Bölüm Seçiniz</option>
                                                    @foreach($Bolumler as $Bolum)
                                                    <option value="{{$Bolum->id}}">{{$Bolum->Bolum}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-group" style="margin-top:10px;">
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğretim Görevlisi Email" name="email" aria-describedby="inputGroupSuccess4Status">
                                                </div>

                                                <div class="input-group" style="margin-top:10px;">
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    <input type="password" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğretim Görevlisi Şifresi" name="password" aria-describedby="inputGroupSuccess4Status">
                                                </div>

                                                  <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Komisyon Özelliği Aktif Olan Danışmanlar Fakülteye Ait Bütün Öğrenciler İçin Not Girişi Yapabilir.">  
                                                        <div class="col-md-12"><input type="checkbox" name="Komisyon" value="1"> Danışman Komisyon Ekibindedir.</div>
                                                    </div>

                                                <div class="col-md-2" style="margin-left:80px !important;margin-top:15px;">
                                                    <button type="submit" class="btn btn-yesil btn-sm">Kayıt</button>
                                                 </div>
                                                <div class="col-md-2" style="margin-left:20px !important;margin-top:15px;">
                                                     <button type="reset" class="btn btn-yesil btn-sm">Temizle</button>
                                                 </div>
                                        </form>
                                        </div>
                                        <br><br>
                                    </div>
                                    
                        
                        </div>

                        
                    </div>

@stop


