@extends('layout2')

@section('title')
 Admin Duyuru Oluştur Sayfası | EgeStaj
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
</script>
@stop

@section('content')
    <div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
                    </div>
                    @include('yonetici.solpanel')
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                      <div class="baslik">
                            <p class="box-title">DUYURU OLUŞTUR</p>
                            
                        </div>
                        <div class="row">
                        
                                    <div class="icerik">
                                        <div class="row">
                                            <form action="{{URL('panel/yonetici/duyuru')}}" method="post">
                                            <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Duyuru Başlığı : </div>
                                    <div class="col-md-8"><input type="text" class="form-control" name="Baslik" /></div>
                                </div>
                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Duyuru Detayı : </div>
                                    <div class="col-md-8"><textarea name="Aciklama" id="ckeditor" class="ckeditor"></textarea></div>
                                </div>
                                


                                <div class="col-md-12 m-t-10 m-b-10">
                                    <center><input type="submit" class="btn btn-success" value="İlan Oluştur" /></center>
                                </div>
                                </form>
                                        </div>
                                        <br><br>
                                    </div>
                                    
                        
                        </div>

                        
                    </div>

@stop


