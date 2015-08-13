@extends('layout2')

@section('title')
 Onay Bekleyen Öğrenci Sayfası
@stop
@section('script')
    <script> 
        @if(Session::get('message') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif
    </script>
@stop
@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">ONAY BEKLEYEN ÖĞRENCİLER</p>
                        </div>
                    </div>
                    @if($OnayBekleyenOgr->Count() >0)
                   @foreach($OnayBekleyenOgr as $OgrBilgisi)
                    <div class="col-md-4 ilan">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="ilan-img" src="{{asset($OgrBilgisi->Resim)}}">
                            </div>
                            <div class="col-md-9"><br>
                                <span><a href="{{URL('panel/ogrencidetay')}}/{{$OgrBilgisi->id}}" class="ilan-bas">{{$OgrBilgisi->Adi}} {{$OgrBilgisi->Soyadi}}</a></span><br>
                                @foreach($OgrBilgisi->BolumBilgisi as $BolumCek)
                                <span class="ilan-tarih">{{$BolumCek->Bolum}}</span><br>
                                @endforeach
                                <ul class="ilan-detay">
                                    <a href="{{URL('panel/yonetici/ogronay')}}/{{$OgrBilgisi->id}}"><span class="label label-primary">Onayla</span></a>
                                    <a href="{{URL('panel/ogrencidetay')}}/{{$OgrBilgisi->id}}" class=""><span class="label label-primary" >Öğrenci Bilgileri</span></a>
                                </ul>
                            </div>
                        </div>
                    </div>
            
                @endforeach 
                @else
                <div class="clearfix"></div>
                
                <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Onay Bekleyen Öğrenci Bulunamadı.</div>
                @endif       
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                             {{$OnayBekleyenOgr->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop