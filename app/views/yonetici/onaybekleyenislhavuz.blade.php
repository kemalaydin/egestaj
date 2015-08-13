@extends('layout2')

@section('title')
 Onay Bekleyen İşletme Sayfası
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
                            <p class="box-title-2">ONAY BEKLEYEN İŞLETMELER</p>
                        </div>
                    </div>
                    @if($OnayBekleyenIsl->Count() >0)
                   @foreach($OnayBekleyenIsl as $IslBilgisi)
                    <div class="col-md-4 ilan">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="ilan-img" src="{{asset($IslBilgisi->Resim)}}">
                            </div>
                            <div class="col-md-9"><br>
                                <span><a href="{{URL('panel/isletmedetay')}}/{{$IslBilgisi->id}}" class="ilan-bas">{{$IslBilgisi->IsletmeAdi}}</a></span><br>
                                @foreach($IslBilgisi->HizmetBilgisi as $HizmetCek)
                                <span class="ilan-tarih">{{$HizmetCek->Bolum}}</span><br>
                                @endforeach
                                    <a href="{{URL('panel/yonetici/islonay')}}/{{$IslBilgisi->id}}" class="label label-success">Onayla</a>
                                    <a href="{{URL('panel/isletmedetay')}}/{{$IslBilgisi->id}}" class="label label-primary">İşletme Bilgileri</a>
                            
                            </div>
                        </div>
                    </div>
            
                @endforeach   
                @else
                <div class="clearfix"></div>

                <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Onay Bekleyen İşletme Bulunamadı.</div>
                @endif     
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                             {{$OnayBekleyenIsl->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop