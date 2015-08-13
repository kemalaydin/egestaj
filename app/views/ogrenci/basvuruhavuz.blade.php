@extends('layout2')

@section('title')
Başvuru Havuz Sayfası | EgeStaj
@stop
@section('script')
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@stop
@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">BAŞVURULAN İŞLETMELER</p>
                        </div>
                    </div>
                
                @if($StajBilgisi->Count() >0)
                   @foreach($StajBilgisi as $StajBilgi)
                    <div class="col-md-4 ilan">
                        <div class="row">
                            <div class="col-md-3">
                            @foreach($StajBilgi->StajBasvuruIsBilgisi as $IsResim)
                                <a href="{{URL('panel/isletmedetay')}}/{{$StajBilgi->IsletmeID}}"><img class="ilan-img" src="{{asset($IsResim->Resim)}}"></a>
                            @endforeach
                            </div>
                            <div class="col-md-9"><br>
                                @foreach($StajBilgi->StajBasvuruIlanBilgisi as $IlanBilgi)
                                <span><a href="{{URL('panel/ilan')}}/{{$StajBilgi->IlanID}}" class="ilan-bas">{{$IlanBilgi->Baslik}}</a></span><br>
                                @endforeach
                                <ul class="ilan-detay">
                                   
                                         @if($StajBilgi->IsletmeOnay == "2" || $StajBilgi->OgretmenOnay == "2" || $StajBilgi->OgrenciOnay == "0" || $StajBilgi->AdminOnay == "2")
                                            <span class="label label-danger">Bu Tercih İptal Edildi</span>

                                            @elseif($StajBilgi->IsletmeOnay == "0" || $StajBilgi->OgretmenOnay == "0")
                                            <span class="label label-primary">Onay Bekleniyor</span>


                                            @elseif($StajBilgi->IsletmeOnay == "2" || $StajBilgi->OgretmenOnay == "2" || $StajBilgi->OgrenciOnay == "0" || $StajBilgi->AdminOnay == "2")
                                            <a href="{{URL('panel/ogrenci/tercih')}}/{{$StajBilgi->id}}" class=""><span class="label label-danger">Diğer Tercihler İptal Edildi</span></a>


                                            @elseif($StajBilgi->IsletmeOnay == "1" && $StajBilgi->OgretmenOnay == "1" && $StajBilgi->OgrenciOnay == "0")
                                            <a href="{{URL('panel/ogrenci/tercih')}}/{{$StajBilgi->id}}" class=""><span class="label label-danger">Tercih Yap</span></a>

                                            @elseif($StajBilgi->OgrenciOnay == "3")
                                            <span class="label label-primary">Başka Tercih Yapamazsınız</span>


                                            @elseif($StajBilgi->IsletmeOnay == "1" && $StajBilgi->OgretmenOnay == "1" && $StajBilgi->OgrenciOnay == "0" && $StajBilgi->AdminOnay == "2")
                                            <a href="{{URL('panel/ogrenci/tercih')}}/{{$StajBilgi->id}}" class=""><span class="label label-danger">Diğer Tercihler İptal Edildi</span></a>


                                            @elseif($StajBilgi->IsletmeOnay == "1" && $StajBilgi->OgretmenOnay == "1" && $StajBilgi->OgrenciOnay == "1" && $StajBilgi->AdminOnay == "0")
                                            <a href="{{URL('panel/ogrenci/tercih')}}/{{$StajBilgi->id}}" class=""><span class="label label-success">Tercih Edildi</span></a>
                                            <i data-toggle="tooltip" data-placement="top" title="Tercihiniz Onay Bekliyor" class="fa fa-info-circle"></i>

                                            
                                            @elseif($StajBilgi->IsletmeOnay == "1" && $StajBilgi->OgretmenOnay == "1" && $StajBilgi->OgrenciOnay == "1" && $StajBilgi->AdminOnay == "1")
                                            <a href="{{URL('panel/ogrenci/tercih')}}/{{$StajBilgi->id}}" class=""><span class="label label-primary">Tercih Onaylandı</span></a>
                                            <i data-toggle="tooltip" data-placement="top" title="En Kısa Sürede Staj Yerinizle İletişime Geçiniz" class="fa fa-info-circle"></i>
                                            
                                            @endif
                                            
                                
                                     
                                </ul>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Hiç bir İlana Başvurulmamış.</div>
                    @endif
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                             {{$StajBilgisi->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop