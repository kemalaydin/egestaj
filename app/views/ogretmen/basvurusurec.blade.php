@extends('layout2')

@section('title')
 Başvuru Durumları Sayfası | Ege Staj
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
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@stop
@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">ÖĞRENCİLERİN STAJ ONAY DURUMLARI</p>
                        </div>
                    </div>
                <div class="clearfix"></div>
                @if($OgrBul->Count() > 0)
                
                   
                   @foreach($OgrBul as $StajBilgisi)
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
                                    <div style="margin-top:16px;margin-left:-10px;">
                                     
                                     @if($StajBilgisi->IsletmeOnay == 0 && $StajBilgisi->OgretmenOnay == 0 && $StajBilgisi->OgrenciOnay == 0 && $StajBilgisi->AdminOnay == 0  )       

                                                            <span class="label label-primary">İşletme Onay</span>

                                            @elseif($StajBilgisi->IsletmeOnay == 1 && $StajBilgisi->OgretmenOnay == 0 && $StajBilgisi->OgrenciOnay == 0 && $StajBilgisi->AdminOnay == 0)

                                                            <a href="{{URL('panel/ogretmen/ogrenci-tercih-onayla')}}/{{$StajBilgisi->id}}"><span class="label label-info">Öğrenciyi Onayla</span></a>
                                                            <a href="{{URL('panel/ogretmen/ogrenci-tercih-iptal')}}/{{$StajBilgisi->id}}" class=""><span class="label label-danger" >İptal</span></a>                            
                                            
                                            @elseif($StajBilgisi->IsletmeOnay == 1 && $StajBilgisi->OgretmenOnay == 1 && $StajBilgisi->OgrenciOnay == 0 && $StajBilgisi->AdminOnay == 0 )
                                                            
                                                            <span class="label label-info">Öğrenci Tercih</span>
                                                            <i data-toggle="tooltip" data-placement="top" title="Öğrencinize İlan Tercihi Yapması Hakkında Bilgi Veriniz" class="fa fa-info-circle"></i>

                                            @elseif($StajBilgisi->OgrenciOnay ==3 || $StajBilgisi->IsletmeOnay == 2 || $StajBilgisi->AdminOnay == 2 || $StajBilgisi->OgretmenOnay == 2)

                                                            <span class="label label-danger">Başvuru İptal</span>    

                                            @elseif($StajBilgisi->IsletmeOnay == 1 && $StajBilgisi->OgretmenOnay == 1 && $StajBilgisi->OgrenciOnay == 1 && $StajBilgisi->AdminOnay == 0)
                                                            
                                                            <span class="label label-primary">Departmandan Onay</span>

                                            @elseif($StajBilgisi->IsletmeOnay == 1 && $StajBilgisi->OgretmenOnay == 1 && $StajBilgisi->OgrenciOnay == 1 && $StajBilgisi->AdminOnay == 1)
                                                            
                                                            <span class="label label-success">Stajyeri Onaylandı</span>
                                                            

                                            @endif
                                    </div>
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
                             {{$OgrBul->Links()}}
                    </div>
                </div>
                </div>
            </div>
            
        @stop