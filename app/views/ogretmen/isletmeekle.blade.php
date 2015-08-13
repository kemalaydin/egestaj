@extends('layout2')

@section('title')
 İşletme ekle Sayfası | Ege Staj
@stop
@section('script')
<script>
        @if(Session::get('ogryok') != "")
            $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('ogryok')}}','info');}); 
        @endif

        @if(Session::get('eklendi') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('eklendi')}}','success');}); 
        @endif
</script>
@stop
@section('content')

<div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
                    </div>
                    @include('ogretmen.sidebar')
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                       <div class="baslik">
                            <p class="box-title"><i class="fa fa-building"></i> &nbsp;&nbsp;&nbsp;İŞLETME EKLE</p>
                        </div>
                        <div class="icerik">
                            <div class="row"><br>
                                   <form method="post" action="{{URL('/panel/ogretmen/isletme-register')}}">
                            <div class="col-md-6" style="padding-left:0 !important;">
                               <ul class="sirket-name"><li class="name-li">KİŞİSEL BİLGİLER</li></ul>
                                <div class="form-group" style="margin-left:30px;">
                                    <div class="input-group" >
                                        <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili Adı" name="Adi"  aria-describedby="inputGroupSuccess4Status">
                                    </div>

                                    <div class="input-group" style="margin-top:15px;" >
                                        <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili Soyadı" name="Soyadi" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-mobile"></i></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili Telefonu" name="Telefon" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    
                                     <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="email" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili E-mail Adresi" name="email" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili Şifresi" name="password" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-male"></i></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili Görevi" name="Gorevi" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    </div></div>
                                   <div class="col-md-6">
                                    <ul class="sirket-name"><li class="name-li">İŞLETME BİLGİLERİ</li></ul>

                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="İşletme Adi" name="IsletmeAdi" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <select class="form-control input-sm" id="inputGroupSuccess4" name="HizmetAlani">
                                            <option selected>Hizmet Alanı</option>
                                            @foreach($Bolumler as $bolum)
                                            
                                            
                                            <option value='{{$bolum->id}}'>{{$bolum->Bolum}}</option>
                                            @endforeach
                                         </select>                                             
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Adres" name="Adres" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Fax" name="Fax" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="VergiNo" name="VergiNo" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                     <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Web Sitesi" name="WebSitesi" textescribedby="inputGroupSuccess4Status">
                                    </div>
                                    
                                    </div>
                                    <div class"col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                    
                                     <div class="col-md-2" style="margin-left:-90px;margin-top:15px;">
                                     
                                         <button type="submit" class="btn btn-yesil btn-sm">Kayıt</button>
                                    
                                    </div>
                                    <div class="col-md-2" style="margin-left:-35px;margin-top:15px;">
                                         <button type="reset" class="btn btn-yesil btn-sm">Temizle</button>
                                   </div>

                                </div>
                                </div>
                                </form>
                            </div>
                            
                             
                             
                           
                      
                                 
                              <br><br> 
                            </div>
                            
                        </div>
                       
                       
        @stop