@extends('layout2')

@section('title')
 {{$Ilanlar->Baslik}} | Ege Staj
@stop

@section('script')
    <script> 
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

        @if(Session::get('message') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif
    </script>
@stop

@section('content')
    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        
                        <div class="baslik-2">
                            <p class="box-title-2" style="float:left;"><i class="fa fa-file-text-o"></i><b> {{$Ilanlar->Baslik}}</b></p>

                            @if(Auth::user()->Yetki == 1)

                                @if($BasvuruSay > 0)
                                    <a style="float:right; margin-top: 13px; margin-right: 20px;" href="{{URL('panel/basvuru-iptal')}}/{{$BasvuruBak->id}}" class="btn btn-danger">BAŞVURU İPTAL</a>
                                @else
                                    @if(Auth::user()->IsletmeID == "")
                                    <a style="float:right; margin-top: 13px; margin-right: 20px;" href="{{URL('panel/stajbasvuru')}}/{{$Ilanlar->id}}" class="btn btn-primary">BAŞVUR</a>
                                    @else
                                    <a style="float:right; margin-top: 13px; margin-right: 20px;" href="{{URL('panel/stajbasvuru')}}/{{$Ilanlar->id}}" class="btn btn-primary" disabled>BAŞVUR</a>
                                    <i style="float:right; margin-top: 19px; margin-right:-90px;" data-toggle="tooltip" data-placement="top" title="Staj İşleminiz Başlamıştır.Başka İlana Başvuramazsınız" class="fa fa-info-circle"></i>
                                    @endif
                                @endif
                            @elseif(Auth::user()->Yetki == 2)
                                @if(Auth::id() == $Ilanlar->IsletmeID)
                                    <a style="float:right; margin-top: 13px; margin-right: 20px;" href="{{URL('panel/ilan/')}}/{{$Ilanlar->id}}/edit" class="btn btn-primary">DÜZENLE</a>
                                    

                                    <form method="POST" action="{{URL('panel/ilan/')}}/{{$Ilanlar->id}}" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">

                                    <button type="submit" style="float:right; margin-top: 13px; margin-right: 5px;" href="#" class="btn btn-danger">YAYINDAN KALDIR</button>
                                     </form>
                                @endif
                            @elseif(Auth::user()->Yetki == 3)
                                    <form method="POST" action="{{URL('panel/ilan/')}}/{{$Ilanlar->id}}" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">

                                    <button type="submit" style="float:right; margin-top: 13px; margin-right: 5px;" href="#" class="btn btn-danger">YAYINDAN KALDIR</button>
                                     </form>
                            @elseif(Auth::user()->Yetki == 4)
                                    @if($Ilanlar->Onay == "0")
                                    <a style="float:right; margin-top: 13px; margin-right: 20px;" href="{{URL('panel/yonetici/ilanonay')}}/{{$Ilanlar->id}}" class="btn btn-success">ONAYLA</a>
                                    @endif

                                    <a style="float:right; margin-top: 13px; margin-right: 20px;" href="{{URL('panel/ilan/')}}/{{$Ilanlar->id}}/edit" class="btn btn-primary">DÜZENLE</a>

                                    <form method="POST" action="{{URL('panel/ilan/')}}/{{$Ilanlar->id}}" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">

                                    <button type="submit" style="float:right; margin-top: 13px; margin-right: 5px;" href="#" class="btn btn-danger">YAYINDAN KALDIR</button>
                                     </form>
                            @endif
                        </div>

                        <div class="icerik">  
                            @if(Session::get('Basarili') != "")
                                <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                            @endif     
                            @if($Ilanlar->Onay == "0")
                                <div class="alert alert-warning">İlan Henüz Onaylanmamıştır, Öğrenciler İlana Ulaşamamaktadır.</div>
                            @endif<br>
                            <div style="padding: 10px !important">{{$Ilanlar->Aciklama}}</div><br>
                           
                            
                            <div class="alt-bilgi"><b>Dönemi : </b> 
                                @foreach ($Ilanlar->DonemBilgisi as $DonemBil)
                                    {{$DonemBil->Baslangic.' - '.$DonemBil->Bitis}}
                                @endforeach 
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                                <b>Oluşturulduğu Tarih : </b> 
                                {{ substr($Ilanlar->created_at,0,11) }}  

                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                                <b>Firma : </b>
                                    @foreach ($Ilanlar->IlanIsBilgisi as $IsBil)
                                    {{$IsBil->IsletmeAdi}} <a style="color:#3b7893; font-style:none;" href="{{URL('panel/isletmedetay')}}/{{$IsBil->id}}-{{$IsBil->slug}}">( Firma Profili)</a>  
                                    @endforeach
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <b>Bölüm  : </b> 
                                    @foreach($Ilanlar->IlanBolumBilgisi as $BolumBil)
                                    {{$BolumBil->Bolum}}
                                     @endforeach
                                    
                            </div>

                        </div>
                        
    </div>
@stop