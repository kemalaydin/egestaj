@extends('layout2')

@section('title')
 Tercihleri Onayla Sayfası | Ege Staj
@stop
@section('script')
<script> 
@if(Session::get('message') != "")$(document).ready(function(){swal('Staj İşlemi','{{Session::get('message')}}','success');}); 
@endif

@if(Session::get('iptalmessage') != "")$(document).ready(function(){swal('Staj  İşlemi','{{Session::get('iptalmessage')}}','info');}); 
@endif

@if(Session::get('ogryok') != "")
        $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('ogryok')}}','info');}); 
        @endif

</script>

@stop
@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">TERCİHLERİ ONAYLAYABİLECEĞİNİZ ÖĞRENCİLER</p>
                        </div>
                    </div>
                <div class="clearfix"></div>
                @if($OgrStajBilgisi->Count() > 0)
                
                   
                   @foreach($OgrStajBilgisi as $StajBilgisi)
                     <div class="col-md-4 ilan">
                        <div class="row">
                        @foreach($StajBilgisi->StajBasvuruOgrBilgisi as $OgrBilgisi)
                            <div class="col-md-3">
                            
                                <img class="ilan-img" src="{{asset($OgrBilgisi->Resim)}}">
                           
                            </div>
                            <div class="col-md-9"><br>
                                <span><a href="{{URL('panel/ogrencidetay')}}/{{$StajBilgisi->OgrenciID}}" class="ilan-bas">{{$OgrBilgisi->Adi.' '.$OgrBilgisi->Soyadi}}</a></span><br>
                                @foreach($StajBilgisi->StajBasvuruIlanBilgisi as $IlanBilgisi)
                                <span class="ilan-tarih">Tercih Edilen İlan:<a href="{{URL('panel/ilan')}}/{{$StajBilgisi->IlanID}}"><b>{{$IlanBilgisi->Baslik}}</b></a></span><br>
                                @endforeach
                                <ul class="ilan-detay">
                                    <a href="{{URL('panel/ogretmen/ogrenci-tercih-onayla')}}/{{$StajBilgisi->id}}" class=""><span class="label label-primary" >Onayla</span></a>
                                    <a href="{{URL('panel/ogretmen/ogrenci-tercih-iptal')}}/{{$StajBilgisi->id}}" class=""><span class="label label-danger" >İptal</span></a>
                                </ul>
                              @endforeach  
                            </div>
                        </div>
                    </div> 
                    
                 @endforeach 

                @else
                    <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Henüz İlanlara Başvuran Öğrenciniz Bulunmamaktadır.</div>
                    
                     
                   
                @endif
                    
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                             {{$OgrStajBilgisi->Links()}}
                    </div>
                </div>
                </div>
            </div>
            
        @stop