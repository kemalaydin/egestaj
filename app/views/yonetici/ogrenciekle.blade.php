@extends('layout2')

@section('title')
 Admin Öğrenci Ekleme Sayfası | EgeStaj
@stop

@section('script')
<script>
@if(Session::get('eklendi') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('eklendi')}}','success');}); 
        @endif
</script>
@stop
@section('content')
    <div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
                    </div>
                    @include('yonetici.solpanel')
                <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                       <div class="baslik">
                            <p class="box-title"><i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp;ÖĞRENCİ EKLE</p>
                        </div>
                        <div class="icerik">
                            <div class="row"><br>
                                   <form method="post" action="{{URL('panel/yonetici/ogrenci/')}}">
                            <div class="col-md-6" style="margin-top:15px;padding-left:0 !important;">
                            
                                <div class="form-group" style="margin-left:30px;">
                                
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" maxlength="11" class="form-control input-sm" id="inputGroupSuccess4" placeholder="TC Kimlik Numarası" name="TCNo" aria-describedby="inputGroupSuccess4Status">
                                    </div>

                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text"  class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci Adı" name="Adi"  aria-describedby="inputGroupSuccess4Status">
                                    </div>

                                    <div class="input-group" style="margin-top:15px;" >
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci Soyadı" name="Soyadi" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci No" name="OgrenciNo" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                        <select class="form-control input-sm" id="inputGroupSuccess4" name="Bolum">
                                            
                                            @foreach($Bolumler as $bolum)
                                            
                                            
                                            <option value='{{$bolum->id}}'>{{$bolum->Bolum}}</option>
                                            @endforeach
                                         </select>                                             
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                        <select name="Sinif" class="form-control input-sm">
                                        <option selected disabled>Öğrenci Sınıfı</option>
                                        <option value="1">1.Sınıf</option>
                                        <option value="2">2.Sınıf</option>
                                        </select>
                                    </div>
                                    </div></div>
                                    <div class="col-md-6">
                                    
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <select name="Donem" class="form-control input-sm">
                                        <option selected disabled>Öğrencinin Dönemi</option>
                                        <option value="2014/2015">2014/2015</option>
                                        <option value="2013/2014">2013/2014</option>
                                        </select>
                                    </div>

                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Giriş Yılı" name="GirisYili" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="E-mail Adresi" name="email" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci Şifresi" name="password" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-mobile"></i></i></span>
                                        <input type="text" maxlength="11" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci Telefonu" name="Telefon" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <select name="SGK" class="form-control input-sm">
                                        <option selected disabled>Öğrencinin SGK Durumu</option>
                                        @foreach($SGK as $SGKBilgisi)
                                            <option value="{{$SGKBilgisi->id}}">{{$SGKBilgisi->DurumAdi}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    
                                    </div>
                                    <div class="col-md-12">
                                     <div class="col-md-4"></div>
                                     <div class="col-md-4">
                                     <div class="col-md-2" style="margin-left:80px !important;margin-top:15px;">
                                         <button type="submit" class="btn btn-yesil btn-sm">Kayıt</button>

                                    </div>
                                    <div class="col-md-2" style="margin-left:20px !important;margin-top:15px;">
                                         <button type="reset" class="btn btn-yesil btn-sm">Temizle</button>
                                        
                                    </div>
                                    <br><br><br><br>
                                    </div>
                                </div>
                            </form>
                        </div>
                     </div>
             @stop