@extends('layout2')

@section('title')
 Hoş Geldin {{Auth::user()->Adi.' '.Auth::user()->Soyadi}}
@stop
@section('script')
    <script> 
        @if(Session::get('message') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif

        @if(Session::get('ogryok') != "")
            $(document).ready(function(){swal('Arama İşlemi','{{Session::get('ogryok')}}','info');}); 
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
                            <p class="box-title">ONAY BEKLEYEN ÖĞRENCİLER</p>
                            <a href="{{URL('panel/yonetici/ogrhavuz')}}" class="sag-link">Tümünü gör...</a>
                        </div>
                        <div class="row">
                        @if($OnayBekleyenOgr->Count() >0)
                        @foreach($OnayBekleyenOgr as $OnayBekleyenOgrBilgisi)
                                    <div class="col-md-6 ilan"  style="margin-top:-11px;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img class="ilan-img" src="{{asset($OnayBekleyenOgrBilgisi->Resim)}}">
                                            </div>
                                            <div class="col-md-9"><br>
                                                <span><a href="{{URL('panel/ogrencidetay')}}/{{$OnayBekleyenOgrBilgisi->id}}" class="ilan-bas">{{$OnayBekleyenOgrBilgisi->Adi}} {{$OnayBekleyenOgrBilgisi->Soyadi}}</a></span><br>
                                               @foreach($OnayBekleyenOgrBilgisi->BolumBilgisi as $BolumCek)
                                                <span class="ilan-tarih">{{$BolumCek->Bolum}}</span><br>
                                                @endforeach
                                                <a href="{{URL('panel/yonetici/ogronay')}}/{{$OnayBekleyenOgrBilgisi->id}}" class="label label-success">Onayla</a>
                                                <a href="{{URL('panel/ogrencidetay')}}/{{$OnayBekleyenOgrBilgisi->id}}" class="label label-primary">Öğrenci Bilgileri</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                        @endforeach
                        @else
                        <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Onay Bekleyen Öğrenci Bulunamadı.</div>
                        @endif
                        </div>

                        <br><br>

                        <div class="baslik">
                            <p class="box-title">ONAY BEKLEYEN İŞLETMELER</p>
                            <a href="{{URL('panel/yonetici/isletmehavuz')}}" class="sag-link">Tümünü gör...</a>
                        </div>
                        <div class="row">
                        @if($OnayBekleyenIsl->Count() >0)
                        @foreach($OnayBekleyenIsl as $OnayBekleyenIslBilgisi)
                                    <div class="col-md-6 ilan"  style="margin-top:-11px;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img class="ilan-img" src="{{asset($OnayBekleyenIslBilgisi->Resim)}}">
                                            </div>
                                            <div class="col-md-9"><br>
                                                <span><a href="{{URL('panel/isletmedetay')}}/{{$OnayBekleyenIslBilgisi->id}}" class="ilan-bas">{{$OnayBekleyenIslBilgisi->IsletmeAdi}}</a></span><br>
                                               @foreach($OnayBekleyenIslBilgisi->HizmetBilgisi as $HizmetCek)
                                                <span class="ilan-tarih">{{$HizmetCek->Bolum}}</span><br>
                                                @endforeach
                                                <a href="{{URL('panel/yonetici/islonay')}}/{{$OnayBekleyenIslBilgisi->id}}" class="label label-success">Onayla</a>
                                                <a href="{{URL('panel/isletmedetay')}}/{{$OnayBekleyenIslBilgisi->id}}" class="label label-primary">İşletme Bilgileri</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                        @endforeach
                        @else
                        <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Onay Bekleyen İşletme Bulunamadı.</div>
                        @endif
                        </div>
                   
                        
                    </div>
@stop


