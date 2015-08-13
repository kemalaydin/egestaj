@extends('layout2')

@section('title')
    Staj Dönemi Ayarları Sayfası | EgeStaj
@stop
@section('script')
<script>
        @if(Session::get('eklendi') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('eklendi')}}','success');}); 
        @endif


        $(document).ready(function(){
            $('[name=Baslangic]').datepicker({
                weekStart:1,
                autoclose: true,
                daysOfWeekDisabled: "0,6",
                format: "dd.mm.yyyy",
            });
            $('[name=Bitis]').datepicker({
                weekStart:1,
                autoclose: true,
                daysOfWeekDisabled: "0,6",
                format: "dd.mm.yyyy",
            });
            $('[name=CiftBaslangic]').datepicker({
                weekStart:1,
                autoclose: true,
                daysOfWeekDisabled: "0,6",
                format: "dd.mm.yyyy",
            });
            $('[name=CiftBitis]').datepicker({
                weekStart:1,
                autoclose: true,
                daysOfWeekDisabled: "0,6",
                format: "dd.mm.yyyy",
            });
            $("[name=StajTuru]").on('change', function() {
              if(this.value == "2"){
                $("#ciftdonem").fadeIn();
                $("[name=CiftBaslangic]").removeAttr('disabled');
                $("[name=CiftBitis]").removeAttr('disabled');
              }else{
                $("#ciftdonem").fadeOut();
                $("[name=CiftBaslangic]").attr('disabled','disabled');
                $("[name=CiftBitis]").attr('disabled','disabled');
              }
            })


        });
</script>
@stop
@section('content')
<div class="col-md-12">
    <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
</div>
@include('yonetici.solpanel')
<div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
  <div class="baslik">
        <p class="box-title">YENİ STAJ DÖNEMİ OLUŞTUR</p>
        
    </div>
    <div class="row">
    
    <div class="icerik">
        <div class="row">
            <form action="{{URL('panel/yonetici/staj-donemleri/')}}/{{$Donem->id}}" method="post">
                <input type="hidden" name="_method" value="PUT" />
            <div class="col-md-12 m-t-10">
                @if(Session::has('Basarili'))
                    <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                @endif
                <div class="col-md-3" style="margin-top: 5px; text-align: right;">Dönemi : </div>
                <div class="col-md-8">
                    <select name="Donem" class="form-control">
                        @for($i = Carbon::now()->format('Y')-3; $i < Carbon::now()->format('Y')+3; $i++)
                            @if($i == substr($Donem->Donem,0,4))
                                <option value="{{$i}}/{{$i+1}}" selected>{{$i}}/{{$i+1}}</option>
                            @else
                                <option value="{{$i}}/{{$i+1}}">{{$i}}/{{$i+1}}</option>
                            @endif
                        @endfor
                    </select>
                </div>
            </div>

            <div class="col-md-12 m-t-10">  
                <div class="col-md-3" style="margin-top:5px; text-align: right;">İzin Verilen Staj Türü : </div>
                <div class="col-md-8">
                    <select name="StajTuru" class="form-control">
                        <option value="1" @if($Donem->StajTuru == "1") selected @endif>TEK STAJ</option>
                        <option value="2" @if($Donem->StajTuru == "2") selected @endif>ÇİFT STAJ</option>
                        <option value="3" @if($Donem->StajTuru == "3") selected @endif>DÖNEM İÇİ</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 m-t-10">  
                <div class="col-md-3" style="margin-top:5px; text-align: right;">Staja Başlama Tarihi : </div>
                <div class="col-md-8"><input type="text" class="form-control" value="{{$Donem->Baslangic}}" name="Baslangic" /></div>
            </div>

            <div class="col-md-12 m-t-10">  
                <div class="col-md-3" style="margin-top:5px; text-align: right;">Staj Bitiş Tarihi : </div>
                <div class="col-md-8"><input type="text" class="form-control" value="{{$Donem->Bitis}}" name="Bitis" /></div>
            </div>


            <div id="ciftdonem" @if($Donem->StajTuru == 1) style="display:none" @endif>
                <div class="col-md-12 m-t-10">  
                <div class="col-md-3" style="margin-top:5px; text-align: right;">2. Staja Başlama Tarihi : </div>
                <div class="col-md-8"><input type="text" class="form-control" name="CiftBaslangic"  @if($Donem->StajTuru == 1)  disabled="disabled"  @endif value="{{$Donem->CiftBaslangic}}"/></div>
            </div>

            <div class="col-md-12 m-t-10">  
                <div class="col-md-3" style="margin-top:5px; text-align: right;">2. Staj Bitiş Tarihi : </div>
                <div class="col-md-8"><input type="text" class="form-control" name="CiftBitis"  @if($Donem->StajTuru == 1)  disabled="disabled" @endif value="{{$Donem->CiftBitis}}"/></div>
            </div>
            </div>

            

            <div class="col-md-12 m-t-10 m-b-10">
                <center><input type="submit" class="btn btn-success" value="Staj Dönemi Güncelle" /></center>
            </div>
            </form>
                    </div>
                </div>
                
    
    </div>

                        
 @stop