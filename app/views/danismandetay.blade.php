@extends('layout2')

@section('title')
 {{$OgretmenDetay->Adi}} {{$OgretmenDetay->Soyadi}} Bilgileri | Ege Staj
@stop
@section('script')
<script>
 function Yonlendir(id,adi){
    $("#OgrName").html(adi);
    $("[name=Alan]").val(id);
    $("#myModal").model();
 }

@if(Session::get('message') != "")
    $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
@endif
        

</script>
@stop
@section('content')

<div class="col-md-12">

        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper($OgretmenDetay->Adi. " ".$OgretmenDetay->Soyadi)}}</li></span>
    </div>
      
    <div class="col-md-3">
        <center>
            <div class="logo-cerceve">
                <img src="{{asset($OgretmenDetay->Resim)}}"  height="130px">
            </div>
            <div class="top-10"></div>
            <p class="logo-alt"></p> 
        </center>
        <div class="top-10"></div>
        <div class="row">
            <div class="col-md-12 sekme-buton">
                <a href="#" class="sekme-link">
                    <i class="fa fa-envelope fa-2x sekme-icon"></i>
                    
                    <span data-toggle="modal" data-target="#myModal" onclick="Yonlendir('{{$OgretmenDetay->id}}','{{$OgretmenDetay->Adi.' '.$OgretmenDetay->Soyadi}}')" class="sekme-text">MESAJ GÖNDER</span>
                </a>
            </div>
            
            
            
        </div>
    </div>
    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
       <div class="baslik">
            <p class="box-title"><i class="fa fa-building"></i>&nbsp;&nbsp; {{mb_strtoupper($OgretmenDetay->Adi." ".$OgretmenDetay->Soyadi)}} PROFİL BİLGİLERİ</p>
        </div>
        <div class="icerik">
            <div class="row" style="font-size: 15px;"><br>
                <div class="col-md-12">
                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Adı : </div>
                    <div class="col-md-5"><input type="text" class="form-control" value="{{$OgretmenDetay->Adi}}" disabled/></div>
                    <br><br>
                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Soyadı : </div>
                    <div class="col-md-5"><input type="text" class="form-control" value="{{$OgretmenDetay->Soyadi}}" disabled/></div>
                    <br><br>
                   <div class="col-md-3" style="margin-top:5px; text-align: right;">E-Posta : </div>
                    <div class="col-md-5"><input type="text" class="form-control" value="{{$OgretmenDetay->email}}" disabled/></div>
                    <br><br>

                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Telefon : </div>
                    <div class="col-md-5"><input type="text" class="form-control" value="{{$OgretmenDetay->Telefon}}" disabled/></div>
                    <br><br>

                </div>
                
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id='OgrName'>.....</span> isimli danışmana mesaj gönder</h4>
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
                    
        @stop