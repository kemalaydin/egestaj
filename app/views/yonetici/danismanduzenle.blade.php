@extends('layout2')

@section('title')
 Admin Danışman Düzenle Sayfası | EgeStaj
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
                            <p class="box-title"><i class="fa fa-user"></i> {{mb_strtoupper($Danisman->Adi)}} {{mb_strtoupper($Danisman->Soyadi)}} PROFİL BİLGİLERİ</p>
                        </div>
                        <div class="icerik">
                            <div class="row">
                                @if(Session::get('Basarili') != "")
                                    <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                                @endif
                                @if(Session::get('Uyari') != "")
                                    <div class="alert alert-warning">{{Session::get('Uyari')}}</div>
                                @endif
                            <form action="{{URL('panel/yonetici/danisman/')}}/{{$Danisman->id}}"  enctype="multipart/form-data" id="form" method="post" name="form">  
                            <input name="_method" type="hidden" value="PUT" />
                                <div class="col-md-12 m-t-10" data-toggle="tooltip" data-placement="top" title="Profil Resmini Değiştirmek İçin Yeni Resim Seçiniz...">  
                                    <center>
                                        <img src="{{asset($Danisman->Resim)}}" width="100" height="100" style="border: 1px solid #ccc; border-radius: 999px"/><br><br>
                                       <input id="file" name="Resim" type="file"><br>
                                    </center>
                                </div>
                                <input type="hidden" name="id" value="{{$Danisman->id}}">
                                <input type="hidden" name="slug" value="{{$Danisman->slug}}">
                                <input type="hidden" name="uniqID" value="{{$Danisman->uniqID}}">

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Adı : </div>
                                    <div class="col-md-6"><input type="text" name="Adi" class="form-control" value="{{$Danisman->Adi}}" /></div>
                                </div>
                                <div class="col-md-12 m-t-10" data-toggle="tooltip" data-placement="top" t>  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Soyadı : </div>
                                    <div class="col-md-6"><input type="text" name="Soyadi" class="form-control" value="{{$Danisman->Soyadi}}"  /></div>
                                </div>

                                <div class="col-md-12 m-t-10" >  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Bölümü : </div>
                                    <div class="col-md-6">
                                    <select name="Bolum" class="form-control">
                                    @foreach($Danisman->BolumBilgisi as $Bolum)
                                    <div class="col-md-6"><option disabled selected  value="{{$Bolum->id}}" />{{$Bolum->Bolum}}</option></div>
                                    @endforeach
                                    
                                    </select>
                                    </div>
                                </div>

                                

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Email Adresi : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="email" value="{{$Danisman->email}}" /></div>
                                </div>


                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Telefon Numarası : </div>
                                    <div class="col-md-6"><input type="text" name="Telefon" class="form-control" name="Telefon" value="{{$Danisman->Telefon}}" /></div>
                                </div>

                                


                                 <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifresi : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password" placeholder="Boş Bıraktığınız Taktirde Değişmeyecek" /></div>
                                </div>

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifresi [ Tekrar ] : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password2" placeholder="Yeni Şifreyi Tekrarlayın" /></div>
                                </div>

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Komisyon Özelliği Aktif Olan Danışmanlar Fakülteye Ait Bütün Öğrenciler İçin Not Girişi Yapabilir.">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Komisyon : </div>
                                    <div class="col-md-6"><input type="checkbox" name="Komisyon" value="1" @if($Danisman->Komisyon == "1") checked @endif> Danışman Komisyon Ekibindedir.</div>
                                </div>

                                <div class="col-md-12 m-t-10 m-b-10">
                                    <center><input type="submit" class="btn btn-success" value="Güncelle" /></center>
                                </div>
                            </form>
                            </div>
                        </div>
@stop