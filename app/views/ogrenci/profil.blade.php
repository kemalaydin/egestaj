@extends('layout2')

@section('title')
  {{Auth::user()->Adi.' '.Auth::user()->Soyadi}} Profil Sayfası
@stop

@section('script')
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

  @if(Session::get('onay') != "")
        $(document).ready(function(){swal('Staj Bilgisi','{{Session::get('onay')}}','info');}); 
        @endif
</script>
@stop

@section('content')

<div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
                    </div>
                    @include('ogrenci.sidebar')
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                       <div class="baslik">
                            <p class="box-title"><i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp;PROFİL BİLGİLERİNİZ</p>
                        </div>
                        <div class="icerik">
                            <div class="row">
                                @if(Session::get('Basarili') != "")
                                    <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                                @endif
                                @if(Session::get('Uyari') != "")
                                    <div class="alert alert-warning">{{Session::get('Uyari')}}</div>
                                @endif
                            <form action=""  enctype="multipart/form-data" id="form" method="post" name="form">  
                                <div class="col-md-12 m-t-10" data-toggle="tooltip" data-placement="top" title="Profil Resminizi Değiştirmek İçin Yeni Resim Seçiniz...">  
                                    <center>
                                        <img src="{{asset(Auth::user()->Resim)}}" width="100" height="100" style="border: 1px solid #ccc; border-radius: 999px"/><br><br>
                                       <input id="file" name="Resim" type="file"><br>
                                    </center>
                                </div>

                                 <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Staj Türü : </div>
                                    <div class="col-md-6">
                                        <select name="StajTuru" class="form-control">
                                                <option value="1" @if(Auth::user()->StajTuru == "1") selected @endif>Tek Staj</option>
                                            @if(Auth::user()->Sinif > 1)
                                                <option value="2" @if(Auth::user()->StajTuru == "2") selected @endif>Çift Staj</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">TC Kimlik Numaranız : </div>
                                    <div class="col-md-6"><input type="text" maxlength="11" class="form-control" name="TCNo" value="{{Auth::user()->TCNo}}" /></div>
                                </div>    

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="İsim Alanı Sadece Staj Departmanı yada Danışman Öğretmen Tarafından Düzenlenebilir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Adınız : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" value="{{Auth::user()->Adi}}" disabled/></div>
                                </div>
                                <div class="col-md-12 m-t-10" data-toggle="tooltip" data-placement="top" title="Soyisim Alanı Sadece Staj Departmanı yada Danışman Öğretmen Tarafından Düzenlenebilir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Soyadınız : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" value="{{Auth::user()->Soyadi}}" disabled /></div>
                                </div>

                                <div class="col-md-12 m-t-10" data-toggle="tooltip" data-placement="top" title="Bölüm Alanı Sadece Staj Departmanı yada Alan Danışmanı Tarafından Düzenlenebilir.">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Bölümünüz : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" disabled value="{{$Bolum->Bolum}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Öğrenci Numaranız : </div>
                                    <div class="col-md-6"><input type="text" maxlength="11" class="form-control" name="OgrenciNo" value="{{Auth::user()->OgrenciNo}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Email Adresiniz : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Sınıfınız : </div>
                                    <div class="col-md-6">
                                        <select name="Sinif" class="form-control">
                                            <option value="1" @if(Auth::user()->Sinif == "1") selected @endif>1. Sınıf</option>
                                            <option value="2" @if(Auth::user()->Sinif == "2") selected @endif>2. Sınıf</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">SGK Durumunuz : </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="SGK">
                                           @foreach($SGK as $Sosyal)
                                                <option value="{{$Sosyal->id}}" @if(Auth::user()->SGK == $Sosyal->id) selected @endif>{{$Sosyal->DurumAdi}}</option>
                                           @endforeach
                                         </select>  
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Okula Giriş Yılınız : </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="GirisYili">
                                           @for($i = Carbon::now()->Format('Y')-3; $i <= Carbon::now()->Format('Y'); $i++)
                                                <option value="{{$i}}" @if(Auth::user()->GirisYili == $i) selected @endif>{{$i}}</option>
                                           @endfor
                                         </select>  
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Telefon Numaranız : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="Telefon" value="{{Auth::user()->Telefon}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Adresiniz : </div>
                                    <div class="col-md-6"><textarea class="form-control" name="Adres">{{Auth::user()->Adres}}</textarea></div>
                                    <div class="col-md-2 m-t-15"><span class="label label-info">Zorunlu Değildir</span></div>
                                </div>


                                 <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifreniz : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password" placeholder="Boş Bıraktığınız Taktirde Değişmeyecek" /></div>
                                </div>

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifreniz [ Tekrar ] : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password2" placeholder="Yeni Şifrenizi Tekrarlayın" /></div>
                                </div>
                                <div class="col-md-12 m-t-10 m-b-10">
                                    <center><input type="submit" class="btn btn-success" value="Kaydet" /></center>
                                </div>
                            </form>
                            </div>
                        </div>
                       
                       
        @stop