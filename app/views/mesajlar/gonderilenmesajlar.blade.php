@extends('layout2')

@section('title')
{{Auth::user()->Adi.' '.Auth::user()->Soyadi}} Gönderilen Mesajlar Sayfası | Ege Staj
@stop
@section('script')
<script>
    @if(Session::get('ogryok') != "")
        $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('ogryok')}}','info');}); 
        @endif
</script>
@stop

@section('content')

<div class="container">
                <div class="row">
                    <div class="col-md-3">
                        
                        <a href="{{URL('panel/mesajlar/gelen-mesajlar')}}" class="mesaj-link">
                            <div class="mesaj-buton">
                                <center>
                                    <span class="gri">
                                        <i class="fa fa-envelope"></i>
                                        <span class="mesaj-text">GELEN KUTUSU</span>
                                    </span>
                                </center>
                            </div>
                        </a>
                        <a href="{{URL('panel/mesajlar/gonderilen-mesajlar')}}" class="mesaj-link-active">
                            <div class="mesaj-buton">
                                <center>
                                    <span class="gri">
                                        <i class="fa fa-envelope-o "></i>
                                        <span class="mesaj-text">GİDEN KUTUSU</span>
                                    </span>
                                </center>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-9">
                        <h1>Gönderilen Mesajlar</h1><br>
                    @if($GonderilenMesajlar->count() == 0)
                        <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Gönderilen Mesaj Bulunamadı.</div>
                    @else
                    <table class="table table-hover">
                         <thead>
                         <tr><td><b>Gönderilenler</b></td><td><b>Başlık</b></td><td><b>Tarih</b></td></tr></thead>
                         @foreach($GonderilenMesajlar as $Gonderilen)
                            @foreach($Gonderilen->MesajAlanBilgisi as $Gonderen)
                            @if($Gonderen->Yetki == "2")
                                <tbody> <tr onclick="location.href='{{URL('panel/mesajlar/gonderilenicerik')}}/{{$Gonderilen->id}}';"><td>{{$Gonderen->IsletmeAdi}}</td><td>{{$Gonderilen->Baslik}}</td><td>{{substr($Gonderilen->created_at,0,10)}}</td></tr></tbody>
                            @else
                                <tbody> <tr onclick="location.href='{{URL('panel/mesajlar/gonderilenicerik')}}/{{$Gonderilen->id}}';"><td>{{$Gonderen->Adi}} {{$Gonderen->Soyadi}}</td><td>{{$Gonderilen->Baslik}}</td><td>{{substr($Gonderilen->created_at,0,10)}}</td></tr></tbody>
                            @endif
                            @endforeach
                         @endforeach
                    </table>
                     @endif   
                    
                </div>
                </div>
                <div class="top-10"></div>
            </div>
@stop
