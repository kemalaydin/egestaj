@extends('layout2')

@section('title')
 Admin Duyurular Sayfası | EgeStaj
@stop
@section('script')
<script src="//cdn.ckeditor.com/4.4.7/basic/ckeditor.js"></script>
<script>
$(function () {
    CKEDITOR.replace( 'ckeditor' );
  $('[data-toggle="tooltip"]').tooltip();
  
  
  
})

        @if(Session::get('message') != "")
         $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif

        @if(Session::get('silindi') != "")
         $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('silindi')}}','info');}); 
        @endif
        
        function silUyar(donem){
            swal({   
                title: "Silmek istediğinize emin misiniz ?",   
                text: "Bu işlemi yaptığınız taktirde dönemi silecek ve bu döneme ait öğrencilerin staj dönemlerini iptal edeceksiniz.",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Evet, Sil",   
                closeOnConfirm: false 
            }, 
            function(){   
                    $("#"+donem).submit(); 
            });
            
        }
</script>
@stop

@section('content')
    <div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
                    </div>
                    @include('yonetici.solpanel')
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                      <div class="baslik">
                            <p class="box-title">DUYURU EKLE/DÜZENLE <a href="{{URL('panel/yonetici/duyuru')}}/create" style="margin-top:5px; margin-right: 5px" class="pull-right btn btn-success btn-sm">Yeni Duyuru Ekle</a></p>
                            
                        </div>
                        <div class="row">
                        
                                    
                                        <div class="row">
                                            <table class="table table-bordered">
                                                <tr><td><b>Başlık</b></td><td><b>Açıklama<b></td><td><b>Tarih</b></td><td><b><center>İşlemler</center></b></td></tr>
                                                @foreach($Duyuru as $Duyuru)
                                                <tr>
                                                <td>{{$Duyuru->Baslik}}</td>
                                                <td>{{{strip_tags(str_limit($Duyuru->Aciklama,50))}}}</td>
                                                <td>{{substr($Duyuru->created_at,0,10)}}</td>
                                                <td><center><form action="{{URL('panel/yonetici/duyuru')}}/{{$Duyuru->id}}" method="post" id="duyuru{{$Duyuru->id}}" name="duyuru{{$Duyuru->id}}"><a href="{{URL('panel/yonetici/duyuru')}}/{{$Duyuru->id}}/edit" class="btn btn-primary btn-xs">Düzenle</a> <input type="hidden" value="DELETE" name="_method"><button type="button" class="btn btn-danger btn-xs" onclick="silUyar('duyuru{{$Duyuru->id}}')">Sil</button></form></center></td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                       
                                    
                                    
                        
                        </div>

                        
                    </div>

@stop


