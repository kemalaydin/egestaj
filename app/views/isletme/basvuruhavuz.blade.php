
@extends('layout2')

@section('title')
 Yönlendirilen Öğrenciler Sayfası | Ege Staj
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
                            <p class="box-title-2">BAŞVURU YAPAN ÖĞRENCİLER</p>
                        </div>
                    </div>
                    @if($YonlendirilenOgrenciler->count() > 0)
                    @foreach($YonlendirilenOgrenciler as $Yonlendirilenler)
                        	@foreach($Yonlendirilenler->StajBasvuruOgrBilgisi as $OgrenciBilgisi)
                    <div class="col-md-4 ilan">
                        
                        <div class="row">    
                            	
                            <div class="col-md-3">
                                <img class="ilan-img" src="{{asset($OgrenciBilgisi->Resim)}}">
                            </div>
                            <div class="col-md-9"><br>
                                <span><a href="#" class="ilan-bas">{{$OgrenciBilgisi->Adi}} {{$OgrenciBilgisi->Soyadi}}</a></span><br>
                                <span class="ilan-tarih">{{$OgrenciBilgisi->email}}</span><br>
                                @foreach($Yonlendirilenler->StajBasvuruIlanBilgisi as $IlanBaslik)
                                <span class="ilan-tarih">Başvurulan İlan:<a href="{{URL('panel/ilan-detay')}}/{{$Yonlendirilenler->IlanID}}">{{$IlanBaslik->Baslik}}</a></span><br><br>
                                @endforeach
								<a href="{{URL('/panel/isletme/staj-onay')}}/{{$Yonlendirilenler->id}}" class="" ><span class="label label-primary">Onayla</span></a>
                                <a href="{{URL('/panel/isletme/staj-iptal')}}/{{$Yonlendirilenler->id}}" class="" ><span class="label label-danger">İptal</span></a>

                            </div>

                        </div>

                    </div>
							@endforeach
                    	@endforeach
                    @else
                    <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Başvuru Yapan Öğrenci Bulunamadı.</div>
                    @endif
                    
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                             {{$YonlendirilenOgrenciler->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop