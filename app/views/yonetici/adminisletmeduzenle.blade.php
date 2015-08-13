@extends('layout2')

@section('title')
İşletme Profili Düzenle | Ege Staj
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
                            <p class="box-title"><i class="fa fa-user"></i> {{mb_strtoupper($DuzenlencekIsletme->IsletmeAdi)}} PROFİL BİLGİLERİ</p>
                        </div>
                        <div class="icerik">
                            <div class="row">
            
                                @if(Session::get('Basarili') != "")
                                    <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                                @endif
                                @if(Session::get('Uyari') != "")
                                    <div class="alert alert-warning">{{Session::get('Uyari')}}</div>
                                @endif
                            <form action="{{URL('panel/yonetici/isletme/')}}/{{$DuzenlencekIsletme->id}}"  enctype="multipart/form-data" id="form" method="post" name="form"> 
                             <input name="_method" type="hidden" value="PUT" /> 
                                <div class="col-md-12 m-t-10" data-toggle="tooltip" data-placement="top" title="Firma Logosunu Değiştirmek İçin Yeni Resim Seçiniz...">  
                                    <center>
                                        <img src="{{asset($DuzenlencekIsletme->Resim)}}" width="100" height="100" style="border: 1px solid #ccc; border-radius: 999px"/><br><br>
                                       <input id="file" name="Resim" type="file"><br>
                                    </center>
                                </div>

                                <input type="hidden" name="id" value="{{$DuzenlencekIsletme->id}}">
                                <input type="hidden" name="slug" value="{{$DuzenlencekIsletme->slug}}">
                                <input type="hidden" name="uniqID" value="{{$DuzenlencekIsletme->uniqID}}">
                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="text-align: right;">Onay : </div>
                                    <div class="col-md-6">
                                        @if($DuzenlencekIsletme->Onay == 1) 
                                            <span style="color:green"><b>Onaylı</b></span>&nbsp&nbsp  <i data-toggle="tooltip" data-placement="top" title="Onaylı Hesapların Paylaştığı İlanlar Onay Gerektirmeksizin Gösterilmektedir." class="fa fa-info-circle"></i>
                                        @else 
                                            <span style="color:red;">Henüz Onaylanmamış</span> &nbsp&nbsp  <i data-toggle="tooltip" data-placement="top" title="Hesabınız Onaylanana Kadar Paylaşacağınız İlanlar Yetkililerin Onayı Alınmadan Gösterilmeyecektir." class="fa fa-info-circle"></i>
                                        @endif</div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="text-align: right;">Kayıt Tarihi : </div>
                                    <div class="col-md-6">{{$DuzenlencekIsletme->created_at}}</div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="text-align: right;">En Son Güncelleme Tarihi : </div>
                                    <div class="col-md-6">{{$DuzenlencekIsletme->updated_at}}</div>
                                </div>


                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Yetkili Adı : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="Adi" value="{{$DuzenlencekIsletme->Adi}}" /></div>
                                </div>
                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Yetkili Soyadı : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="Soyadi" value="{{$DuzenlencekIsletme->Soyadi}}" /></div>
                                </div>

                                 <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Yetkili Görevi : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="Gorevi" value="{{$DuzenlencekIsletme->Gorevi}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İşletme Adı : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="IsletmeAdi" value="{{$DuzenlencekIsletme->IsletmeAdi}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Email Adresi : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="email" value="{{$DuzenlencekIsletme->email}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlgili Hizmet Bölümü : </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="HizmetAlani">
                                          @foreach($Alanlar as $Alan)
                                                <option value="{{$Alan->id}}" @if($DuzenlencekIsletme->HizmetAlani == $Alan->id) selected @endif>{{$Alan->Bolum}}</option>
                                           @endforeach
                                         </select>  
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Telefon Numarası : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="Telefon" value="{{$DuzenlencekIsletme->Telefon}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Fax Numarası : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="Fax" value="{{$DuzenlencekIsletme->Fax}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Vergi Numarası : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="VergiNo" value="{{$DuzenlencekIsletme->VergiNo}}" /></div>
                                </div>

                                 <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Web Sitesi : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="WebSitesi" value="{{$DuzenlencekIsletme->WebSitesi}}" /></div>
                                </div>


                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Adresi : </div>
                                    <div class="col-md-6"><textarea class="form-control" name="Adres">{{$DuzenlencekIsletme->Adres}}</textarea></div>
                                </div>
                                
                                 <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlan Sınırı : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="IlanSiniri" value="{{$DuzenlencekIsletme->IlanSiniri}}" /></div>
                                </div>

                                 <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifresi : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password" placeholder="Boş Bıraktığınız Taktirde Değişmeyecek" /></div>
                                </div>

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifre [ Tekrar ] : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password2" placeholder="Yeni Şifrenizi Tekrarlayın" /></div>
                                </div>
                                <div class="col-md-12 m-t-10 m-b-10">
                                    <center><input type="submit" class="btn btn-success" value="Güncelle" /></center>
                                </div>
                            </form>


                            </div>
                        </div>
                       
                       
        @stop