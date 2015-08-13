@extends('layout2')

@section('title')
    Staj Dönemi Sonlandırma | EgeStaj
@stop
@section('script')
<script>
        @if(Session::get('eklendi') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('eklendi')}}','success');}); 
        @endif
</script>
@stop
@section('content')

@include('yonetici.solpanel')
<div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
  <div class="baslik">
        <p class="box-title">Staj Dönemi Sonlandırma</p>
        
    </div>
    <div class="row">
    
    <div class="icerik">
        <div class="row">
            <form action="{{URL('panel/donem-sonlandirma')}}" method="post">
             
            <div class="col-md-12"><br>
                <div class="alert alert-info"><b>{{$Donem->AktifDonem}}</b> Dönemine Ait Staj İşlemlerini Sonlandırmak istediğinize emin misiniz ? Bu işlemi yaptığınız taktirde; öğrenciler, işletmeler bir sonraki yıl için işlem yapabilecek, {{$Donem->AktifDonem}} dönemine ait veriler arşive kaldırılacak.</div>
            </div>
            <div class="col-md-12 m-t-10 m-b-10">
                <center><input type="submit" class="btn btn-success" value="{{$Donem->AktifDonem}} Dönemini Sonlandır" /></center>
            </div>
            </form>
                    </div>
                </div>
                
    
    </div>

                        
 @stop