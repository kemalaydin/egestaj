@extends('layout2')

@section('title')
 Admin Öğrenci Düzenle Sayfası | EgeStaj
@stop
@section('script')
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@stop

@section('content')
    <div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
                    </div>
                    @include('yonetici.solpanel')
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                       <div class="baslik">
                            <p class="box-title"><i class="fa fa-user"></i> {{mb_strtoupper($DuzenlencekOgrenci->Adi)}} {{mb_strtoupper($DuzenlencekOgrenci->Soyadi)}} PROFİL BİLGİLERİ</p>
                        </div>
                        <div class="icerik">
                            <div class="row">
                                @if(Session::get('Basarili') != "")
                                    <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                                @endif
                                @if(Session::get('Uyari') != "")
                                    <div class="alert alert-warning">{{Session::get('Uyari')}}</div>
                                @endif
                            <form action="{{URL('panel/yonetici/ogrenci/')}}/{{$DuzenlencekOgrenci->id}}"  enctype="multipart/form-data" id="form" method="post" name="form">  
                            <input name="_method" type="hidden" value="PUT" />
                                <div class="col-md-12 m-t-10" data-toggle="tooltip" data-placement="top" title="Profil Resmini Değiştirmek İçin Yeni Resim Seçiniz...">  
                                    <center>
                                        <img src="{{asset($DuzenlencekOgrenci->Resim)}}" width="100" height="100" style="border: 1px solid #ccc; border-radius: 999px"/><br><br>
                                       <input id="file" name="Resim" type="file"><br>
                                    </center>
                                </div>
                                <input type="hidden" name="id" value="{{$DuzenlencekOgrenci->id}}">
                                <input type="hidden" name="slug" value="{{$DuzenlencekOgrenci->slug}}">
                                <input type="hidden" name="uniqID" value="{{$DuzenlencekOgrenci->uniqID}}">

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Adı : </div>
                                    <div class="col-md-6"><input type="text" name="Adi" class="form-control" value="{{$DuzenlencekOgrenci->Adi}}" /></div>
                                </div>
                                <div class="col-md-12 m-t-10" data-toggle="tooltip" data-placement="top" t>  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Soyadı : </div>
                                    <div class="col-md-6"><input type="text" name="Soyadi" class="form-control" value="{{$DuzenlencekOgrenci->Soyadi}}"  /></div>
                                </div>

                                <div class="col-md-12 m-t-10" >  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Bölümü : </div>
                                    <div class="col-md-6">
                                    <select name="Bolum" class="form-control">
                                    @foreach($DuzenlencekOgrenci->BolumBilgisi as $Bolum)
                                    <div class="col-md-6"><option disabled selected  value="{{$Bolum->id}}" />{{$Bolum->Bolum}}</option></div>
                                    @endforeach
                                    @foreach($Bolums as $Bol)
                                        <option value="{{$Bol->id}}">{{$Bol->Bolum}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Öğrenci Numarası : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="OgrenciNo" value="{{$DuzenlencekOgrenci->OgrenciNo}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Email Adresi : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="email" value="{{$DuzenlencekOgrenci->email}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Sınıfı : </div>
                                    <div class="col-md-6">
                                        <select name="Sinif" class="form-control">
                                            <option value="1" @if($DuzenlencekOgrenci->Sinif == "1") selected @endif>1. Sınıf</option>
                                            <option value="2" @if($DuzenlencekOgrenci->Sinif == "2") selected @endif>2. Sınıf</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Danışman Öğretmeni : </div>
                                    <div class="col-md-6">
                                        <select name="DanismanID" class="form-control">
                                            @foreach($DuzenlencekOgrenci->DanismanBilgisi as $Hoca)
                                                <option>{{$Hoca->Adi}} {{$Hoca->Soyadi}}</option>
                                            @endforeach

                                            @foreach($HocaBul as  $Hocalar)
                                                <option value='{{$Hocalar->id}}'>{{$Hocalar->Adi}} {{$Hocalar->Soyadi}}</option>   
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">SGK Durumu : </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="SGK">
                                           @foreach($SGK as $Sosyal)
                                                <option value="{{$Sosyal->id}}" @if($DuzenlencekOgrenci->SGK == $Sosyal->id) selected @endif>{{$Sosyal->DurumAdi}}</option>
                                           @endforeach
                                         </select>  
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Okula Giriş Yılı: </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="GirisYili">
                                           @for($i = Carbon::now()->Format('Y')-3; $i <= Carbon::now()->Format('Y'); $i++)
                                                <option value="{{$i}}" @if($DuzenlencekOgrenci->GirisYili == $i) selected @endif>{{$i}}</option>
                                           @endfor
                                         </select>  
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Telefon Numarası : </div>
                                    <div class="col-md-6"><input type="text" name="Telefon" class="form-control" name="Telefon" value="{{$DuzenlencekOgrenci->Telefon}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Adresi : </div>
                                    <div class="col-md-6"><textarea class="form-control" name="Adres">{{$DuzenlencekOgrenci->Adres}}</textarea></div>
                                    <div class="col-md-2 m-t-15"><span class="label label-info">Zorunlu Değildir</span></div>
                                </div>


                                 <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifresi : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password" placeholder="Boş Bıraktığınız Taktirde Değişmeyecek" /></div>
                                </div>

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifresi [ Tekrar ] : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password2" placeholder="Yeni Şifreyi Tekrarlayın" /></div>
                                </div>
                                <div class="col-md-12 m-t-10 m-b-10">
                                    <center><input type="submit" class="btn btn-success" value="Güncelle" /></center>
                                </div>
                            </form>
                            </div>
                        </div>
@stop