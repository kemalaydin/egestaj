@extends('layout2')

@section('title')
 {{Auth::user()->IsletmeAdi}} İsimli İşletme Profiliniz Düzenle | Ege Staj
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
                    <div class="col-md-3">
                        <center>
                            <div class="logo-cerceve">
                                <img src="{{asset(Auth::user()->Resim)}}"  height="130px">
                            </div>
                            <div class="top-10"></div>
                            <p class="logo-alt">{{Auth::user()->IsletmeAdi}}  - 
                            @foreach($Hesap->HizmetBilgisi as  $Hes)
                                {{$Hes->Bolum}}
                            @endforeach 
                        </center>
                        <div class="top-10"></div>
                        <div class="row">
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/mesajlar/gelen-mesajlar')}}" class="sekme-link">
                                    <i class="fa fa-envelope fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">MESAJLAR ( {{$Mesajlar}} )</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/isletme/stajyerlerim')}}" class="sekme-link">
                                    <i class="fa fa-user fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">STAJYERLERİM</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                               <a href="{{URL('panel/isletme/danismanlar')}}" class="sekme-link">
                                    <i class="fa fa-file-text-o fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">YETKİLİ İLETİŞİM</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/ilan/create')}}" class="sekme-link">
                                    <i class="fa fa-file-text-o fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">İLAN OLUŞTUR</span>
                                </a>
                            </div>
                             <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/isletme/ilanhavuz')}}" class="sekme-link">
                                    <i class="fa fa-file-text-o fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">İLANLARIM</span>
                                </a>
                            </div>
                            
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/isletme/profil')}}" class="sekme-link">
                                    <i class="fa fa-cog fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">AYARLAR</span>
                                </a>
                            </div>
                        </div>
                    </div>
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
                                <div class="col-md-12 m-t-10" data-toggle="tooltip" data-placement="top" title="Firma Logonuzu Değiştirmek İçin Yeni Resim Seçiniz...">  
                                    <center>
                                        <img src="{{asset(Auth::user()->Resim)}}" width="100" height="100" style="border: 1px solid #ccc; border-radius: 999px"/><br><br>
                                       <input id="file" name="Resim" type="file"><br>
                                    </center>
                                </div>

                                
                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="text-align: right;">Onay : </div>
                                    <div class="col-md-6">
                                        @if(Auth::user()->Onay == 1) 
                                            <span style="color:green"><b>Onaylı</b></span>&nbsp&nbsp  <i data-toggle="tooltip" data-placement="top" title="Onaylı Hesapların Paylaştığı İlanlar Onay Gerektirmeksizin Gösterilmektedir." class="fa fa-info-circle"></i>
                                        @else 
                                            <span style="color:red;">Henüz Onaylanmamış</span> &nbsp&nbsp  <i data-toggle="tooltip" data-placement="top" title="Hesabınız Onaylanana Kadar Paylaşacağınız İlanlar Yetkililerin Onayı Alınmadan Gösterilmeyecektir." class="fa fa-info-circle"></i>
                                        @endif</div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="text-align: right;">Kayıt Tarihi : </div>
                                    <div class="col-md-6">{{Auth::user()->created_at}}</div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="text-align: right;">En Son Güncelleme Tarihi : </div>
                                    <div class="col-md-6">{{Auth::user()->updated_at}}</div>
                                </div>


                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Yetkili Adı : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="Adi" value="{{Auth::user()->Adi}}" /></div>
                                </div>
                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Yetkili Soyadı : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="Soyadi" value="{{Auth::user()->Soyadi}}" /></div>
                                </div>

                                 <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Yetkili Görevi : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="Gorevi" value="{{Auth::user()->Gorevi}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İşletme Adı : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="IsletmeAdi" value="{{Auth::user()->IsletmeAdi}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Email Adresiniz : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlgili Hizmet Bölümü : </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="HizmetAlani">
                                          @foreach($Alanlar as $Alan)
                                                <option value="{{$Alan->id}}" @if(Auth::user()->HizmetAlani == $Alan->id) selected @endif>{{$Alan->Bolum}}</option>
                                           @endforeach
                                         </select>  
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Telefon Numaranız : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="Telefon" value="{{Auth::user()->Telefon}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Fax Numaranız : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="Fax" value="{{Auth::user()->Fax}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Vergi Numaranız : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="VergiNo" value="{{Auth::user()->VergiNo}}" /></div>
                                </div>

                                 <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Web Sitesi : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="WebSitesi" value="{{Auth::user()->WebSitesi}}" /></div>
                                </div>


                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Adresiniz : </div>
                                    <div class="col-md-6"><textarea class="form-control" name="Adres">{{Auth::user()->Adres}}</textarea></div>
                                </div>


                                 <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifreniz : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password" placeholder="Boş Bıraktığınız Taktirde Değişmeyecek" /></div>
                                </div>

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifreniz [ Tekrar ] : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password2" placeholder="Yeni Şifrenizi Tekrarlayın" /></div>
                                </div>

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="İşkura Kayıtlı İşletmelerin İlanları Daha Çok Tercih Edilmektedir. Ücretsiz olarak kayıt olabilirsiniz">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İşkur'a Kayıt : </div>
                                    <div class="col-md-6"><input type="checkbox" name="Iskur" value="1" @if(Auth::user()->Iskur == "1") checked @endif> İşletmemiz İşkur'a Kayıtlıdır.</div>
                                </div>

                                <div class="col-md-12 m-t-10 m-b-10">
                                    <center><input type="submit" class="btn btn-success" value="Kaydet" /></center>
                                </div>
                            </form>


                            </div>
                        </div>
                       
                       
        @stop