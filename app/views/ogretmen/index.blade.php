@extends('layout2')

@section('title')
 Hoş Geldin {{Auth::user()->Adi.' '.Auth::user()->Soyadi}}
@stop
@section('script')
<script>
 function Yonlendir(id,adi){
    $("#OgrName").html(adi);
    $("[name=OgrenciID]").val(id);
    $("#myModal").model();
   
    
 }

    
        @if(Session::get('message') != "")
        $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif

        @if(Session::get('ogryok') != "")
        $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('ogryok')}}','info');}); 
        @endif
    

</script>
@stop
@section('content')
    <div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
                    </div>
                    @include('ogretmen.sidebar')
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                    @if($EklenenIsletmeler->count() > 0)
                            <div class="baslik">
                            <p class="box-title">ÖĞRENCİLER TARAFINDAN EKLENEN İŞLETMELER</p>
                            {{-- <a href="{{URL('panel/ogretmen/eklenenisletmeler')}}" class="sag-link">Tümünü gör...</a> --}}
                    </div>
                    <div class="col-md-12 icerik"><br>
                        <table class="table table-bordered table-hover">
                          <thead>
                                <td>İşletme Adı</td>
                                <td>Öğrenci</td>
                                <td>İşletme Yetkilisi</td>
                                <td>Adres</td>
                                <td>Email</td>
                                <td>Telefon</td>
                                <td>Kayıt</td>
                                <td>İşlemler</td>
                          </thead>

                          @foreach($EklenenIsletmeler as $Isletmeler)
                            <tr>
                            @if($Isletmeler->Kayit == "1") 
                                 <td><a href="{{URL('panel/isletmedetay/')}}/{{$Isletmeler->IsletmeBilgisi[0]["id"]}}" target="_blank">{{$Isletmeler->IsletmeAdi}}</a>
                            @else
                                <td>{{$Isletmeler->IsletmeAdi}}</td>
                            @endif
                               
                                <td><a href="{{URL('panel/ogrencidetay/')}}/{{$Isletmeler->OgrenciBilgisi[0]["id"]}}" target="_blank">{{$Isletmeler->OgrenciBilgisi[0]["Adi"].' '.$Isletmeler->OgrenciBilgisi[0]["Soyadi"]}}</a></td>
                                <td>{{$Isletmeler->YetkiliAdi.' '.$Isletmeler->YetkiliSoyadi}}</td>
                                <td>{{$Isletmeler->Adres}}</td>
                                <td>{{$Isletmeler->email}}</td>
                                <td>{{$Isletmeler->YetkiliTelefon}}</td>
                                <td>@if($Isletmeler->Kayit == "1") <i class="text-success fa fa-check"></i> @else  <i class="text-danger fa fa-times"></i>  @endif</td>
                                <td><a href="{{URL('panel/ogretmen/basvuru-onay/')}}/{{$Isletmeler->id}}" class="btn btn-xs btn-success">Onayla</a>
                                <a href="{{URL('panel/ogretmen/basvuru-iptal/')}}/{{$Isletmeler->id}}" class="btn btn-xs btn-danger">Reddet</a></td>

                            </tr>
                          @endforeach
                        </table>

                        <center>{{$EklenenIsletmeler->links()}}</center>
                    
                    </div>
                    <div class="clearfix"></div>
                        <div class="top-10"></div>
                    @endif
                        <div class="baslik">
                            <p class="box-title">YÖNLENDİREBİLECEĞİNİZ ÖĞRENCİLER</p>
                            <a href="{{URL('panel/ogretmen/ogrencihavuz')}}" class="sag-link">Tümünü gör...</a>
                        </div>
                        <div class="row">
                        @if($Kontrol->Count() >0)
                         @foreach($Kontrol as $Kont)
                            <div class="col-md-6 ilan" style="margin-top:-11px;">
                                <div class="row">
                               
                                    <div class="col-md-3">
                                        <img class="ilan-img" src="{{asset($Kont->Resim)}}">
                                    </div>
                                    <div class="col-md-9"><br>
                                        <span><a href="{{URL('panel/ogrencidetay')}}/{{$Kont->id}}" class="ilan-bas">{{$Kont->Adi.' '.$Kont->Soyadi}}</a></span><br>
                                        <span class="ilan-tarih">05.04.2015</span><br>
                                        <ul class="ilan-detay">
                                            <li>{{$Kont->OgrenciNo}}</li>
                                            <div style="margin-top:7px;"></div>
                                            <span class="label label-primary" data-toggle="modal" data-target="#myModal"  style="cursor:pointer;" onclick="Yonlendir('{{$Kont->id}}','{{$Kont->Adi.' '.$Kont->Soyadi}}')">Yönlendir</span>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                           @endforeach 
                        @else
                        <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Yönlendirebileceğiniz Öğrenci Bulunamadı.</div>
                        @endif
                        </div>
                        <div class="top-10"></div>
                        <div class="baslik">
                            <p class="box-title">ONAY BEKLEYEN ÖĞRENCİLER</p>
                            <a href="{{URL('panel/ogretmen/ogrencionay')}}" class="sag-link">Tümünü gör...</a>
                        </div>
                        <div class="">
                            <center>
                                <ul class="basv-ogr">
                                     
                                  @if($Kullanicilar->Count() >0)
                                     @foreach($Kullanicilar as $Kullanici)
                                       
                                        
                                    <li>
                                    
                                        <a href="{{URL('panel/ogrencidetay')}}/{{$Kullanici->id}}">
                                            <img class="ogr-img" src="{{asset($Kullanici->Resim)}}">
                                            <p class="ogr-isim">{{$Kullanici->Adi.' '.$Kullanici->Soyadi}}</p>
                                                
                                                
                                                    <a href="{{URL('panel/ogretmen/onay')}}/{{$Kullanici->id}}" class="" ><span class="label label-primary">Onayla</span></a>
                                               
                                                

                                        </a>
                                    </li>
                                            
                                    @endforeach
                                @else
                                    <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Onay Bekleyen Öğrenci Bulunamadı.</div>
                                @endif
                                    <br><br>
                                    <br><br>
                                </ul>   
                            </center>
                        </div>
                        
                    </div>


                    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id='OgrName'>.....</span> isimli öğrenciyi yönlendir</h4>
      </div>
      <div class="modal-body">
      <form action="{{URL('panel/ogretmen/yonlendir')}}" method="post">
        <select class="form-control " id="inputGroupSuccess4" name="IlanID"> 

            <option value="" selected disabled>İlan Seçiniz...</option>

        @foreach ($Ilanlar as $Ilan) 
            @foreach($Ilan->IlanIsBilgisi as $IslIlan)
            <option value="">{{$Ilan->Baslik}} ( {{$IslIlan->IsletmeAdi}} )</option>
            @endforeach
        @endforeach
        </select>
        
        <input type="hidden" name="OgrenciID">
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
        <button type="submit" class="btn btn-primary">Yönlendir</button>
      </form>
      </div>
    </div>
  </div>
</div>
@stop
