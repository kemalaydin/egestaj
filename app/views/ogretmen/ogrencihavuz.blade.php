@extends('layout2')

@section('title')
Öğrenci Havuz Sayfası | Ege Staj
@stop
@section('script')
<script>
 function Yonlendir(id,adi){
    $("#OgrName").html(adi);
    $("[name=OgrenciID]").val(id);
    $("#myModal").model();
   
    
 }
        @if(Session::get('ogryok') != "")
        $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('ogryok')}}','info');}); 
        @endif
    
        @if(Session::get('message') != "")
        $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif
    

</script>
@stop
@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">YÖNLENDİREBİLECEĞİNİZ ÖĞRENCİLER</p>
                        </div>
                    </div>
                    @if($Kullanicilar->Count()>0)
                    @foreach($Kullanicilar as $Kullanici)
                    <div class="col-md-4 ilan">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="ilan-img" src="{{asset($Kullanici->Resim)}}">
                            </div>
                            <div class="col-md-9"><br>
                                <span><a href="{{URL('panel/ogrencidetay')}}/{{$Kullanici->id}}" class="ilan-bas">{{$Kullanici->Adi.' '.$Kullanici->Soyadi}}</a></span><br>
                                <span class="ilan-tarih">{{$Kullanici->OgrenciNo}}</span><br>
                                <ul class="ilan-detay" style="margin-top:5px;">
                                    
                                    <span class="label label-primary" data-toggle="modal" data-target="#myModal"  style="cursor:pointer;" onclick="Yonlendir('{{$Kullanici->id}}','{{$Kullanici->Adi.' '.$Kullanici->Soyadi}}')">Yönlendir</span>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Yönlendirebileceğiniz Öğrenci Bulunamadı.</div>
                    @endif
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                             {{$Kullanicilar ->Links()}}
                    </div>
                </div>
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