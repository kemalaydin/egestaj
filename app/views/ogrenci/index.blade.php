@extends('layout2')

@section('title')
 Hoş Geldin {{Auth::user()->Adi.' '.Auth::user()->Soyadi}}
@stop
@section('script')
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

        @if(Session::get('ogryok') != "")
            $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('ogryok')}}','info');}); 
        @endif
        
        @if(Session::get('onay') != "")
            $(document).ready(function(){swal('Staj Bilgisi','{{Session::get('onay')}}','info');}); 
        @endif

        @if(Session::get('tercihmessage') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('tercihmessage')}}','success');}); 
        @endif
</script>
@stop
@section('content')
    <div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>

                        @if(Auth::user()->IsletmeID == "")
                            <div class="alert alert-info">Sistemdeki İlanları Kullanmadan Staj Girişi Yapabilmek İçin "Staj Yeri Ekle" Alanını Kullanabilirsiniz.</div>
                        @endif
                    </div>
                    @include('ogrenci.sidebar')
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                      
                        <div class="baslik">
                            <p class="box-title">İLANLAR</p>
                            <a href="{{URL('/panel/ilan/')}}" class="sag-link">Tümünü gör...</a>
                        </div>
                        <div class="row">
                        @if(Auth::user()->Onay >0)
                        @if($Ilanlar->Count() >0)
                        @foreach($Ilanlar as $Ilan)
                            <div class="col-md-6 ilan" style="margin-top:-11px">
                                <div class="row">
                                    
                                    <div class="col-md-3">
                                        @foreach($Ilan->IlanIsBilgisi as $IlanVeren )
                                        <img class="ilan-img" src="{{asset($IlanVeren->Resim)}}">
                                        @endforeach
                                    </div>
                                    <div class="col-md-9"><br>
                                        <span><a href="{{URL('panel/ilan')}}/{{$Ilan->id}}" class="ilan-bas">{{$Ilan->Baslik}}</a></span><br>
                                        <span class="ilan-tarih">{{$Ilan->Tarih}}</span><br>
                                        <ul class="ilan-detay" style="margin-top:5px;">
                                           <a href="{{URL('panel/ilan')}}/{{$Ilan->id}}" class=""><span class="label label-primary">İlan Detayı</span></a>
                                           
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                        @else
                        <div class="alert alert-info" style="border-radius: 0 0 10px 10px">İlan Bulunamadı.</div>
                        @endif
                        @else
                         <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Üyeliğiniz İçin Danışman Onayı Bekleniyor..</div>
                         @endif
                            </div>
                        <div class="top-10"></div>
                        <div class="baslik">
                            <p class="box-title">BAŞVURULAN İŞLETMELER</p>
                            <a href="{{URL('panel/ogrenci/tercihhavuz')}}" class="sag-link">Tümünü gör...</a>
                        </div>
                         @if($StajBilgisi->Count() == 0)
                                <div class="alert alert-info" style="border-radius: 0 0 10px 10px">İlan Başvurusu Yapılmamış.</div>
                                 @else
                        <div class="icerik-4" style="margin-top:-10px">
                            <center>
                                <ul class="basv-ogr">
                               
                                @foreach($StajBilgisi as $StajBilgi)
                                    
                                    <li>
                                                                           
                                        @foreach($StajBilgi->StajBasvuruIsBilgisi as $IsResim)
                                            <a href="{{URL('panel/isletmedetay')}}/{{$StajBilgi->IsletmeID}}"><img class="ogr-img" src="{{asset($IsResim->Resim)}}"></a>
                                        @endforeach
                                        @foreach($StajBilgi->StajBasvuruIlanBilgisi as $IlanBilgi)
                                            <a href="{{URL('panel/ilan')}}/{{$StajBilgi->IlanID}}" class="ilan-bas"><p class="ogr-isim">{{$IlanBilgi->Baslik}}</p></a>
                                             @if($StajBilgi->IsletmeOnay == "2" || $StajBilgi->OgretmenOnay == "2" || $StajBilgi->OgrenciOnay == "2" || $StajBilgi->AdminOnay == "2")
                                            <span class="label label-danger">Bu Başvuru İptal Edildi</span>
                                            @elseif($StajBilgi->IsletmeOnay == "0" || $StajBilgi->OgretmenOnay == "0")
                                            <span class="label label-primary">Onay Bekleniyor</span>
                                            
                                            @elseif($StajBilgi->IsletmeOnay == "1" && $StajBilgi->OgretmenOnay == "1" && $StajBilgi->OgrenciOnay == "0")
                                            <a href="{{URL('panel/ogrenci/tercih')}}/{{$StajBilgi->id}}" class=""><span class="label label-danger">Tercih Yap</span></a>
                                            
                                            @elseif($StajBilgi->OgrenciOnay == "3")
                                            <span class="label label-primary">Başka Tercih Yapamazsınız</span>


                                            @elseif($StajBilgi->IsletmeOnay == "1" && $StajBilgi->OgretmenOnay == "1" && $StajBilgi->OgrenciOnay == "0" && $StajBilgi->AdminOnay == "2")
                                            <span class="label label-danger">Diğer Tercihler İptal Edildi</span>
                                            

                                            @elseif($StajBilgi->IsletmeOnay == "1" && $StajBilgi->OgretmenOnay == "1" && $StajBilgi->OgrenciOnay == "1" && $StajBilgi->AdminOnay == "0")
                                            <span class="label label-success">Tercih Edildi</span>
                                            <i data-toggle="tooltip" data-placement="top" title="Tercihiniz Onay Bekliyor" class="fa fa-info-circle"></i>    

                                               

                                            @elseif($StajBilgi->IsletmeOnay == "1" && $StajBilgi->OgretmenOnay == "1" && $StajBilgi->OgrenciOnay == "1" && $StajBilgi->AdminOnay == "1")
                                            <span class="label label-primary">Tercih Onaylandı</span>
                                            <i data-toggle="tooltip" data-placement="top" title="En Kısa Sürede Staj Yerinizle İletişime Geçiniz" class="fa fa-info-circle"></i>
                                            
                                            @endif
                                        @endforeach
                                    </li>
                                        @endforeach
                                    
                                </ul>   
                            </center>
                        </div>@endif
                        
                    </div>
@stop

