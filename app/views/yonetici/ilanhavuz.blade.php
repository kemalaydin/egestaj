@extends('layout2')

@section('title')
İlan Onay Sayfası | EgeStaj
@stop
@section('script')
<script>
 @if(Session::get('Onay') != "")
        $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('Onay')}}','success');}); 
        @endif

 @if(Session::get('Iptal') != "")
        $(document).ready(function(){swal('İşlem İptal Edildi','{{Session::get('Iptal')}}','info');}); 
        @endif

</script>
@stop
@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">İLAN ONAYLA/İPTAL İŞLEMLERİ</p>
                        </div>
                    </div>
                    @if($Ilanlar->Count() >0)
                    @foreach($Ilanlar as $Ilan)
                    <div class="col-md-4 ilan">
                        <div class="row">
                        
                            <div class="col-md-3">
                                @foreach($Ilan->IlanIsBilgisi as $IlanIs)
                                <img class="ilan-img" src="{{asset($IlanIs->Resim)}}">
                                @endforeach
                            </div>
                            <div class="col-md-9"><br>
                            
                                <span><a href="{{URL('panel/ilan')}}/{{$Ilan->id}}" class="ilan-bas">{{$Ilan->Baslik}}</a></span><br>
                          
                                <a href=""><span class="ilan-tarih">{{$Ilan->created_at}}</span></a><br>
                            
                                <ul class="ilan-detay">
                                    <a href="{{URL('panel/yonetici/ilanonay')}}/{{$Ilan->id}}"><span class="label label-primary">Onayla</span></a>
                                    <a href="{{URL('panel/yonetici/ilaniptal')}}/{{$Ilan->id}}"><span class="label label-danger" >İptal</span></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                     @endforeach
                    @else
                        <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Onay Bekleyen İlan Bulunamadı.</div>
                    @endif
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                       {{$Ilanlar->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop