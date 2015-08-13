@extends('layout2')

@section('title')
 Hoş Geldin {{Auth::user()->Adi.' '.Auth::user()->Soyadi}}
@stop
@section('script')
<script>
 @if(Session::get('message') != "")
        $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif

 @if(Session::get('iptalmessage') != "")
        $(document).ready(function(){swal('İşlem İptal Edildi','{{Session::get('iptalmessage')}}','info');}); 
        @endif

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
                            </p> 
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
                      @if(Session::get('Basarili'))
                        <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                      @endif
                      @if(Session::get('Uyari'))
                        <div class="alert alert-warning">{{Session::get('Uyari')}}</div>
                      @endif
                      @if(Session::get('Hata'))
                        <div class="alert alert-danger">{{Session::get('Hata')}}</div>
                      @endif
                        <div class="baslik">
                            <p class="box-title">TERCİH EDEBİLECEĞİNİZ ÖĞRENCİLER</p>
                            <a href="{{URL('panel/isletme/stajyerhavuz')}}" class="sag-link">Tümünü gör...</a>
                        </div>
                        <div class="row">
                            @if($Kullanicilar->count() < 1)
                                <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Firmanıza Uygun Öğrenci Bulunamadı</div>
                            @elseif($Kullanicilar->count() == 1)
                                    @foreach($Kullanicilar as $Kullanici)
                                    <div class="col-md-12 ilan"  style="margin-top:-11px;">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img class="ilan-img" src="{{asset($Kullanici->Resim)}}">
                                            </div>
                                            <div class="col-md-10" style="margin-left: -35px;"><br>
                                                <span><a href="#" class="ilan-bas">{{$Kullanici->Adi.' '.$Kullanici->Soyadi}}</a></span><br>
                                                @foreach($Kullanici->BolumBilgisi as $bolumu)
                                                <span class="ilan-tarih">{{$bolumu->Bolum}}</span><br>
                                                @endforeach
                                                <ul class="ilan-detay" style="margin-top:10px">
                                                    <a style="text-decoration:none" href="{{URL('panel/ogrencidetay')}}/{{$Kullanici->id}}" class=""><span class="label label-primary" >Öğrenci Bilgileri</span></a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            @else
                                @foreach($Kullanicilar as $Kullanici)
                                <div class="col-md-6 ilan"  style="margin-top:-11px;">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="ilan-img" src="{{asset($Kullanici->Resim)}}">
                                        </div>

                                        <div class="col-md-9"><br>
                                            <span><a href="{{URL('panel/ogrencidetay')}}/{{$Kullanici->id}}" class="ilan-bas">{{$Kullanici->Adi.' '.$Kullanici->Soyadi}}</a></span><br>
                                            
                                            <ul class="ilan-detay" style="margin-top:10px">
                                                <a href="{{URL('panel/ogrencidetay')}}/{{$Kullanici->id}}" class=""><span class="label label-primary" >Öğrenci Bilgileri</span></a>
                                            </ul>
                                        </div>


                                </div>
                                 </div>
                                @endforeach
                            @endif
                       
                        <div style="clear:both;"></div>
                        <div class="m-t-10"> </div>

                        <div class="baslik m-t-10">
                            <p class="box-title">BAŞVURU YAPAN ÖĞRENCİLER</p>
                            <a href="{{URL('panel/isletme/basvuruhavuz')}}" class="sag-link">Tümünü gör...</a>
                        </div>
                        
                        @if($YonlendirilenOgrenciler->count() < 1)
                             <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Henüz İlanlarınıza Başvuran Bir Öğrenci Bulunamadı</div>
                        @else
                        <div class="icerik-4">
                            <center>
                                <ul class="basv-ogr">
                                @foreach($YonlendirilenOgrenciler as $OgrenciCek)
                                    <li>
                                    @foreach($OgrenciCek->StajBasvuruOgrBilgisi as $OgrenciBilgileri)
                                        <a href="{{URL('/panel/ogrencidetay')}}/{{$OgrenciCek->OgrenciID}}">
                                            <img class="ogr-img" src="{{asset($OgrenciBilgileri->Resim)}}">
                                            <p class="ogr-isim">{{$OgrenciBilgileri->Adi}} {{$OgrenciBilgileri->Soyadi}}</p></a>
                                            @foreach($OgrenciCek->StajBasvuruIlanBilgisi as $IlanBaslik)
                                            <span><a href="{{URL('/panel/ilan')}}/{{$OgrenciCek->IlanID}}">{{$IlanBaslik->Baslik}}</a></span><br><br>
                                            @endforeach
                                            
                                            <a href="{{URL('/panel/isletme/staj-onay')}}/{{$OgrenciCek->id}}" class="" ><span class="label label-primary">Onayla</span></a>
                                             <a href="{{URL('/panel/isletme/staj-iptal')}}/{{$OgrenciCek->id}}" class="" ><span class="label label-danger">İptal</span></a>
                                        
                                    @endforeach
                                    </li>
                                @endforeach   
                                
                                    <br><br>
                                    <br><br><br>

                                </ul>   
                            </center>
                            <br><br><br><br><br>
                        </div>
                        @endif

                        <div class="baslik m-t-10">
                            <p class="box-title">BAŞVURU DURUMLARI</p>
                            <a href="{{URL('panel/isletme/durumhavuz')}}" class="sag-link">Tümünü gör...</a>
                        </div>
                        
                        @if($IsletmeyiSecenler->count() < 1)
                             <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Henüz İlanlarınıza Başvuran Öğrencilere Onay Vermediniz.</div>
                        @else
                        <div class="icerik-4">
                            <center>
                                <ul class="basv-ogr">
                                @foreach($IsletmeyiSecenler as $DurumCek)
                                    <li>
                                    @foreach($DurumCek->StajBasvuruOgrBilgisi as $DurumBilgisi)
                                        <a href="{{URL('/panel/ogrencidetay')}}/{{$DurumCek->OgrenciID}}">
                                            <img class="ogr-img" src="{{asset($DurumBilgisi->Resim)}}">
                                            <p class="ogr-isim">{{$DurumBilgisi->Adi}} {{$DurumBilgisi->Soyadi}}</p></a>
                                            @foreach($DurumCek->StajBasvuruIlanBilgisi as $IlanBilgisi)
                                            <span><a href="{{URL('/panel/ilan')}}/{{$DurumCek->IlanID}}">{{$IlanBilgisi->Baslik}}</a></span><br><br>
                                            @endforeach
                                            
                                   @endforeach

                                           @if($DurumCek->IsletmeOnay == 1 && $DurumCek->OgretmenOnay == 0 && $DurumCek->OgrenciOnay == 0 && $DurumCek->AdminOnay == 0  )       

                                                            <span class="label label-primary">Yetkili Onay</span>

                                            @elseif($DurumCek->IsletmeOnay == 1 && $DurumCek->OgretmenOnay == 1 && $DurumCek->OgrenciOnay == 0 && $DurumCek->AdminOnay == 0)

                                                            <span class="label label-info">Tercih Bekleniyor</span>                             
                                            
                                            @elseif($DurumCek->OgrenciOnay ==3 || $DurumCek->IsletmeOnay == 2 || $DurumCek->OgretmenOnay == 2 || $DurumCek->AdminOnay == 2 )

                                                            <span class="label label-danger">Başvuru İptal</span>    

                                            @elseif($DurumCek->IsletmeOnay == 1 && $DurumCek->OgretmenOnay == 1 && $DurumCek->OgrenciOnay == 1 && $DurumCek->AdminOnay == 0)
                                                            
                                                            <span class="label label-primary">Departmandan Onay</span>

                                            @elseif($DurumCek->IsletmeOnay == 1 && $DurumCek->OgretmenOnay == 1 && $DurumCek->OgrenciOnay == 1 && $DurumCek->AdminOnay == 1)
                                                            
                                                            <span class="label label-success">Stajyer Alındı</span>
                                                            <i data-toggle="tooltip" data-placement="top" title="En Kısa Sürede Stajyerinizle İletişime Geçiniz.(Stajyerlerim Menüsünden Öğrenci Detaylarına Ulaşabilirsiniz)" class="fa fa-info-circle"></i>

                                                @endif
                                            {{--<a href="{{URL('/panel/isletme/staj-onay')}}/{{$DurumCek->id}}" class="" ><span class="label label-primary">Onayla</span></a>
                                             <a href="{{URL('/panel/isletme/staj-iptal')}}/{{$DurumCek->id}}" class="" ><span class="label label-danger">İptal</span></a>--}}
                                        
                                    
                                    </li>
                                @endforeach
                                
                                    <br><br>
                                    <br><br><br>

                                </ul>   
                            </center>
                            <br><br><br><br><br>
                        </div>
                        
                    </div>
                    @endif
@stop