@extends('layout2')

@section('title')
 Öğrenci Onay Sayfası | Ege Staj
@stop
@section('script')
    <script> 
        @if(Session::get('message') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif

        @if(Session::get('ogryok') != "")
        $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('ogryok')}}','info');}); 
        @endif
    </script>
@stop
@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">ONAY BEKLEYEN ÖĞRENCİLER</p>
                        </div>
                    </div>
                    @if($Kullanicilar->Count() >0)
                    @foreach($Kullanicilar as $Kullanici)
                    <div class="col-md-4 ilan">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="ilan-img" src="{{asset($Kullanici->Resim)}}">
                            </div>
                            <div class="col-md-9"><br>
                                <span><a href="{{URL('panel/ogrencidetay')}}/{{$Kullanici->id}}" class="ilan-bas">{{$Kullanici->Adi.' '.$Kullanici->Soyadi}}</a></span><br>
                                <span class="ilan-tarih">{{$Kullanici->OgrenciNo}}</span><br>
                                <ul class="ilan-detay" style="margin-top:5px;">
                                    
                                    <a href="{{URL('panel/ogretmen/onay')}}/{{$Kullanici->id}}" class=""><span class="label label-primary">Onayla</span></a>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Onay Bekleyen Öğrenci Bulunamadı.</div>
                    @endif
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                             {{$Kullanicilar ->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop