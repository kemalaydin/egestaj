@extends('layout2')

@section('title')
 {{$Kullanicilar->Adi.' '.$Kullanicilar->Soyadi}} Bilgileri | Ege Staj
@stop
@section('script')
<script>
 function Yonlendir(id,adi){
    $("#OgrName").html(adi);
    $("[name=Alan]").val(id);
    $("#myModal").model();
   
    
 }

 function TerciEt(id,adi){
    $("#OgrName2").html(adi);
    $("[name=OgrenciID2]").val(id);
    $("#myModal2").model();
   
    
 }

    @if(Session::get('message') != "")
        $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif

        @if(Session::get('tercihtamam') != "")
        $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('tercihtamam')}}','success');}); 
        @endif
        

</script>
@stop
@section('content')

<div class="col-md-12">

                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper($Kullanicilar->Adi.' '.$Kullanicilar->Soyadi)}}</li></span>
                    </div>
                      
                    <div class="col-md-3">
                        <center>
                            <div class="logo-cerceve">
                                <img src="{{asset($Kullanicilar->Resim)}}"  height="130px">
                            </div>
                            <div class="top-10"></div>
                            <p class="logo-alt"></p> 
                        </center>
                        <div class="top-10"></div>
                        <div class="row">
                            <div class="col-md-12 sekme-buton">
                            
                                <a href="#" data-toggle="modal" data-target="#myModal" onclick="Yonlendir('{{$Kullanicilar->id}}','{{$Kullanicilar->Adi.' '.$Kullanicilar->Soyadi}}')" class="sekme-link">
                                    <i class="fa fa-envelope fa-2x sekme-icon"></i>

                                    <span class="sekme-text">MESAJ GÖNDER</span>
                                </a>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                    
                        <div class="baslik" style="height:50px;">
                            <p class="box-title" style="margin-top:5px;" ><i class="fa fa-user"></i>&nbsp;&nbsp; {{mb_strtoupper($Kullanicilar->Adi.' '.$Kullanicilar->Soyadi)}} PROFİL BİLGİLERİ
                            @if(Auth::user()->Yetki =="2" and $Kullanicilar->IsletmeID == 0)
                             <a style="float:right;  margin-top: 2px; margin-right: 20px;" href="#" data-toggle="modal" data-target="#myModal2" onclick="TerciEt('{{$Kullanicilar->id}}','{{$Kullanicilar->Adi.' '.$Kullanicilar->Soyadi}}')" class="btn btn-primary">ÖĞRENCİYİ TERCİH ET</a>
                            @endif
                            </p>
                        </div>
                      
                    
                        <div class="icerik">
                            <div class="row"><br>
                                <div class="col-md-12">
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Adı : </div>
                                    <div class="col-md-5"><input type="text" class="form-control" value="{{$Kullanicilar->Adi}}" disabled/></div>
                                    <br><br>
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Soyadı : </div>
                                    <div class="col-md-5"><input type="text" class="form-control" value="{{$Kullanicilar->Soyadi}}" disabled/></div>
                                    <br><br>
                                   <div class="col-md-3" style="margin-top:5px; text-align: right;">Öğrenci Numarası : </div>
                                    <div class="col-md-5"><input type="text" class="form-control" value="{{$Kullanicilar->OgrenciNo}}" disabled/></div>
                                    <br><br>

                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Bölümü : </div>
                                    <div class="col-md-5"><input type="text" class="form-control" value="@foreach($Kullanicilar->BolumBilgisi as $Bolumu){{$Bolumu->Bolum}}@endforeach" disabled/></div>
                                    <br><br>
                                    
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Sınıfı : </div>
                                    <div class="col-md-5"><input type="text" class="form-control" value="{{$Kullanicilar->Sinif}}" disabled/></div>
                    
                                    <br><br>
                                </div> 
                            </div>
                        </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id='OgrName'>.....</span> isimli öğrenciye mesaj gönder</h4>
      </div>
      <div class="modal-body">
      <form action="{{URL('panel/mesajgonder')}}" method="post">
        <input type="text" name="Baslik" placeholder="Başlık" class="form-control input-sm" id="inputGroupSuccess4"><br>
        <textarea name="Icerik" class="form-control" placeholder="Açıklama"></textarea>
        
        <input type="hidden" name="Alan">
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
        <button type="submit" class="btn btn-primary">Gönder</button>
      </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id='OgrName2'>.....</span> isimli öğrenciyi tercih et</h4>
      </div>
      <div class="modal-body">
      
      <form action="{{URL('panel/isletme/tercihet')}}" method="post">
        <select class="form-control " id="inputGroupSuccess4" name="IlanID"> 
        @if($Ilanlar->Count() >0)
                <option value="" selected disabled>İlan Seçiniz...</option>

                @foreach ($Ilanlar as $Ilan) 
                    @foreach($Ilan->IlanIsBilgisi as $IslIlan)
                    <option value="{{$Ilan->id}}">{{$Ilan->Baslik}} ( {{$IslIlan->IsletmeAdi}} )</option>
                    @endforeach
                @endforeach

        @else
            <option>Lütfen İlan Ekleyiniz..</option>
            </select>
            <br>
            <a href="{{URL('panel/ilan/create')}}" class="btn btn-info">İlan Oluşturmak İçin Tıklayınız</a>
        @endif
        </select>
        
        <input type="hidden" name="OgrenciID2">
        
        
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