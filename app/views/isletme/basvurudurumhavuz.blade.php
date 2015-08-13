
@extends('layout2')

@section('title')
 Başvuru Yapan Öğrenci Bilgisi | Ege Staj
@stop
@section('script')
<script>
 @if(Session::get('message') != "")
        $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif

 @if(Session::get('iptalmessage') != "")
        $(document).ready(function(){swal('İşlem İptal Edildi','{{Session::get('iptalmessage')}}','info');}); 
        @endif
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@stop
@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">BAŞVURU YAPAN ÖĞRENCİLER</p>
                        </div>
                    </div>
                    @if($IsletmeyiSecenler->count() > 0)
                    @foreach($IsletmeyiSecenler as $DurumCek)
                        	@foreach($DurumCek->StajBasvuruOgrBilgisi as $DurumBilgisi)
                    <div class="col-md-4 ilan">
                        
                        <div class="row">    
                            	
                            <div class="col-md-3">
                                <img class="ilan-img" src="{{asset($DurumBilgisi->Resim)}}">
                            </div>
                            <div class="col-md-9"><br>
                                <span><a href="{{URL('/panel/ogrencidetay')}}/{{$DurumCek->OgrenciID}}" class="ilan-bas">{{$DurumBilgisi->Adi}} {{$DurumBilgisi->Soyadi}}</a></span><br>
                                <span class="ilan-tarih">{{$DurumBilgisi->email}}</span><br>
                                @foreach($DurumCek->StajBasvuruIlanBilgisi as $IlanBilgisi)
                                <span class="ilan-tarih">Başvurulan İlan:<a href="{{URL('panel/ilan-detay')}}/{{$DurumCek->IlanID}}">{{$IlanBilgisi->Baslik}}</a></span><br><br>
                                @endforeach
								
                                            <div style="margin-top:-16px; margin-left:5px;">
                                            
                                            @if($DurumCek->IsletmeOnay == 1 && $DurumCek->OgretmenOnay == 0 && $DurumCek->OgrenciOnay == 0 && $DurumCek->AdminOnay == 0  )       

                                                            <span class="label label-primary">Yetkili Onay</span>

                                            @elseif($DurumCek->IsletmeOnay == 1 && $DurumCek->OgretmenOnay == 1 && $DurumCek->OgrenciOnay == 0 && $DurumCek->AdminOnay == 0)

                                                            <span class="label label-info">Tercih Bekleniyor</span>                             
                                            
                                            @elseif($DurumCek->OgrenciOnay == 3 || $DurumCek->IsletmeOnay == 2 || $DurumCek->OgretmenOnay == 2 || $DurumCek->AdminOnay == 2)

                                                            <span class="label label-danger">Başvuru İptal</span>    

                                            @elseif($DurumCek->IsletmeOnay == 1 && $DurumCek->OgretmenOnay == 1 && $DurumCek->OgrenciOnay == 1 && $DurumCek->AdminOnay == 0)
                                                            
                                                            <span class="label label-primary">Departmandan Onay</span>

                                            @elseif($DurumCek->IsletmeOnay == 1 && $DurumCek->OgretmenOnay == 1 && $DurumCek->OgrenciOnay == 1 && $DurumCek->AdminOnay == 1)
                                                            
                                                            <span class="label label-success">Stajyer Alındı</span>
                                                            <i data-toggle="tooltip" data-placement="top" title="En Kısa Sürede Stajyerinizle İletişime Geçiniz.(Stajyerlerim Menüsünden Öğrenci Detaylarına Ulaşabilirsiniz)" class="fa fa-info-circle"></i>

                                            @endif
                                            </div>
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
                             {{$IsletmeyiSecenler->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop