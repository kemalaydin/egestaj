@extends('layout2')

@section('title')
Staj Onay Sayfası | EgeStaj
@stop
@section('script')
<script>
 @if(Session::get('message') != "")
        $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif

 @if(Session::get('iptalmessage') != "")
        $(document).ready(function(){swal('İşlem İptal Edildi','{{Session::get('iptalmessage')}}','info');}); 
        @endif

</script>
@stop
@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">STAJYER ONAYLA/İPTAL İŞLEMLERİ</p>
                        </div>
                    </div>
                    @if($AdminStajyerler->Count() > 0)
                  @foreach($AdminStajyerler as $Stajyer)
                    <div class="col-md-4 ilan">
                        <div class="row">
                        @foreach($Stajyer->StajBasvuruOgrBilgisi as $StajyerAd)
                            <div class="col-md-3">
                                <img class="ilan-img" src="{{asset($StajyerAd->Resim)}}">
                            </div>
                            <div class="col-md-9"><br>
                            
                                <span><a href="{{URL('panel/ogrencidetay')}}/{{$Stajyer->OgrenciID}}" class="ilan-bas">{{$StajyerAd->Adi}} {{$StajyerAd->Soyadi}}</a></span><br>
                            @endforeach

                            @foreach($Stajyer->StajBasvuruIlanBilgisi as $StajIlan)
                                <a href="{{URL('panel/ilan')}}/{{$Stajyer->IlanID}}"><span class="ilan-tarih">{{$StajIlan->Baslik}}</span></a><br>
                            @endforeach
                                <ul class="ilan-detay">
                                    <a href="{{URL('panel/yonetici/stajyeronay')}}/{{$Stajyer->id}}"><span class="label label-primary">Onayla</span></a>
                                    <a href="{{URL('panel/yonetici/stajyeriptal')}}/{{$Stajyer->id}}" class=""><span class="label label-danger" >İptal</span></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="clearfix"></div>
                     <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Staj İşlemi Uygulanacak Öğrenci Bulunamadı.</div>
                @endif
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                       {{$AdminStajyerler->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop