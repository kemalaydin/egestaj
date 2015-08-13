@extends('layout2')

@section('title')
 Kayıt Ol | Ege Staj
@stop

@section('style')
<style>
    #tikla-ogrenci{display:none;}
    #tikla-isletme{display:none;}
    #tikla-buton{display:none;}
</style>
@stop

@section('script')
<script src="{{asset('asset/js/is.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<script>
$(document).ready(function(){ 
 
    $("[name=istkayit]").submit(function(){
        var checked = $("[name=Iskur]:checked").length;
        
        var fields = {
            'Adi' : $("[name=ist_Adi]").val(),
            'Soyadi' : $("[name=ist_Soyadi]").val(),
            'Gorevi' : $("[name=ist_Gorevi]").val(),
            'Telefon' : $("[name=ist_Telefon]").val(),
            'email' : $("[name=ist_email]").val(),
            'IsletmeAdi' : $("[name=ist_IsletmeAdi]").val(),
            'password' : $("[name=ist_password]").val(),
            'Adres' : $("[name=ist_Adres]").val(),
            'Fax' : $("[name=ist_Fax]").val(),
            'VergiNo' : $("[name=ist_VergiNo]").val(),
            'Adres' : $("[name=ist_Adres]").val(),
            'WebSitesi' : $("[name=ist_WebSitesi]").val(),
            'HizmetAlani' : $("[name=ist_HizmetAlani]").val(),
            'uniqID' : $("[name=UniqID]").val(),
            'Iskur'  : checked
        }
        if(!is.email(fields.email)){
            swal('Hatalı Mail Adresi','Girmiş Olduğunuz Mail Adresi Hatalı, Lütfen Kontrol Ediniz','warning');
        }else if(fields.Adi == "" || fields.Soyadi == "" || fields.Gorevi == "" || fields.Telefon == "" || fields.email == "" || fields.IsletmeAdi == "" || fields.Adres == "" || fields.password == "" || fields.HizmetAlani == ""){
            swal('Boş Alan Bıraktınız','Lütfen Boş Alan Bırakmadan Tekrar Deneyiniz');
        }else{
            $.ajax({
                url: "{{URL('ajaxQuery/CompanyRegister')}}",
                type: 'POST',
                data: fields ,
                success: function (response) {
                    swal('Kayıt İşleminiz Başarılı','İlanlarınız Yetkili Onayından Sonra Sistemde Gözükecektir. Giriş Yapılıyor Lütfen Bekleyin...','success');
                    setTimeout(function() {
                         window.location.href= "{{URL('/login/company')}}/"+fields.uniqID;
                    }, 3000);
                },
                error: function () {
                    swal("Bir Hata Meydana Geldi","Sistem Kaynaklı Bir Hata İle Karşılaştınız, Tekrar Deneyiniz","warning");
                }
            }); 
        }
        return false;
    });
 
 
    $("[name=ogrkayit]").submit(function(){
        var fields = {
            'TCNo' : $("[name=ogr_TCNo]").val(),
            'Adi' : $("[name=ogr_Adi]").val(),
            'Soyadi' : $("[name=ogr_Soyadi]").val(),
            'OgrenciNo' : $("[name=ogr_OgrenciNo]").val(),
            'Telefon' : $("[name=ogr_Telefon]").val(),
            'email' : $("[name=ogr_email]").val(),
            'Bolum' : $("[name=ogr_Bolum]").val(),
            'Sinif' : $("[name=ogr_Sinif]").val(),
            'password' : $("[name=ogr_password]").val(),
            'GirisYili' : $("[name=ogr_GirisYili]").val(),
            'uniqID' : $("[name=ogr_UniqID]").val()
        }
        if(!is.email(fields.email)){
            swal('Hatalı Mail Adresi','Girmiş Olduğunuz Mail Adresi Hatalı, Lütfen Kontrol Ediniz','warning');
        }else if(fields.TCNo == "" || fields.Adi == "" || fields.Soyadi == "" || fields.OgrenciNo == "" || fields.Telefon == "" || fields.email == "" || fields.Bolum == "" || fields.Sinif == "" || fields.password == "" || fields.GirisYili == ""){
            swal('Boş Alan Bıraktınız','Lütfen Boş Alan Bırakmadan Tekrar Deneyiniz');
        }else{
            $.ajax({
                url: "{{URL('ajaxQuery/StudentRegister')}}",
                type: 'POST',
                data: fields ,
                success: function (response) {
 
                    swal('Kayıt İşleminiz Başarılı','Kayıt İşleminiz Danışman Onayından Sonra Tamamlanacaktır','success');
                    setTimeout(function() {
                         window.location.href= "{{URL('/')}}";
                    }, 4000);
                },
                error: function () {
                    console.log(response);
                    swal("Bir Hata Meydana Geldi","Sistem Kaynaklı Bir Hata İle Karşılaştınız, Tekrar Deneyiniz","warning");
                }
            }); 
        }
        
        return false;
 
    });
 
    $("#ogr").click(function(){
        $("#tikla-ogrenci").stop().fadeIn();
        $("#tikla-isletme").stop().fadeOut();
        $("#ogrdon").stop().fadeIn();
        $("#isletmedon").stop().fadeOut();
        $("#isl").stop().fadeOut();
        $("#ogr").removeClass("label-default");
        $("#ogr").addClass('label-primary');
    });
 
    $("#isl").click(function(){
        $("#tikla-ogrenci").stop().fadeOut();
        $("#tikla-isletme").stop().fadeIn();
        $("#ogrdon").stop().fadeOut();
        $("#ogr").stop().fadeOut();
        $("#isletmedon").stop().fadeIn();
        $("#isl").stop().fadeIn();
        $("#isl").removeClass("label-default");
        $("#isl").addClass('label-primary');
    });
 
    $("#isletmedon").click(function(){
        $("#tikla-ogrenci").stop().fadeOut();
        $("#tikla-isletme").stop().fadeOut();
        $("#ogrdon").stop().fadeOut();
        $("#ogr").stop().fadeIn();
        $("#isletmedon").stop().fadeOut();
        $("#isl").stop().fadeIn();
        $("#isl").removeClass("label-primary");
        $("#isl").addClass('label-default');
    });
 
    $("#ogrdon").click(function(){
        $("#tikla-ogrenci").stop().fadeOut();
        $("#tikla-isletme").stop().fadeOut();
        $("#ogrdon").stop().fadeOut();
        $("#ogr").stop().fadeIn();
        $("#isletmedon").stop().fadeOut();
        $("#isl").stop().fadeIn();
        $("#ogr").removeClass("label-primary");
        $("#ogr").addClass('label-default');
    });
});
 
</script>

@stop

@section('content')
<center>

    <h1 class="">Kayıt Olacağınız Üyelik Türünü Seçiniz</h1>
    <br><br>
                <span id="ogr" class="label label-default" style="font-size:20px;margin-left:-10px; cursor:pointer">ÖĞRENCİ KAYIT FORMU</span> <span id="ogrdon" style="font-size: 12px; margin-left: 10px;display:none; cursor:pointer" class="label label-default">Geri Dön</span>


                <span id="isl" class="label label-default" style="font-size:20px;margin-left:10px; cursor:pointer">İŞLETME KAYIT FORMU</span><span id="isletmedon" style="font-size: 12px; margin-left: 10px;display:none; cursor:pointer" class="label label-default">Geri Dön</span>
              </center>
                    
                    <div id="tikla-ogrenci">
                    <form method="post" id="ogrencikayit" name="ogrkayit" action="{{URL('ogrenci-register')}}">
                            <center>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                            
                                <div class="form-group" style="margin-left:30px;margin-top:30px;">
                                    
                                    <div class="input-group" >
                                       <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" maxlength="11" class="form-control input-sm" id="inputGroupSuccess4" placeholder="T.C. Kimlik No" name="ogr_TCNo"  aria-describedby="inputGroupSuccess4Status">
                                    </div>

                                    <div class="input-group" style="margin-top:15px;" >
                                       <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci Adı" name="ogr_Adi"  aria-describedby="inputGroupSuccess4Status">
                                    </div>

                                    <div class="input-group" style="margin-top:15px;" >
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci Soyadı" name="ogr_Soyadi" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" maxlength="11" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci No" name="ogr_OgrenciNo" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                        <select class="form-control input-sm" id="inputGroupSuccess4" name="ogr_Bolum">
                                                <option value="" disabled selected>Program Seçiniz...</option>
                                           @foreach($Bolumler as $Bolum)
                                                <option value="{{$Bolum->id}}">{{$Bolum->Bolum}}</option>
                                           @endforeach
                                            
                                         </select>                                             
                                    </div>
                                         <input type="hidden" value="{{str_random(10)}}" name="ogr_UniqID" />

                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                        <select class="form-control input-sm" id="inputGroupSuccess4" name="ogr_Sinif">
                                            <option value="" selected disabled>Sınıf Seçiniz...</option>
                                            <option value="1">1. Sınıf</option>
                                            <option value="2">2. Sınıf</option>
                                            
                                         </select>                                             
                                    </div></div>
                                    </div><div class="col-md-4">
                                    <div class="input-group" style="margin-top:30px;">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Giriş Yılı" name="ogr_GirisYili" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="E-mail Adresi" name="ogr_email" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci Şifresi" name="ogr_password" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-mobile"></i></i></span>
                                        <input type="text" maxlength="11" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci Telefonu" name="ogr_Telefon" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    
                                        <select class="form-control input-sm" id="inputGroupSuccess4" name="ogr_SGK">
                                                <option value="" disabled selected>Durum Seçiniz...</option>
                                           @foreach($SGK as $Sosyal)
                                                <option value="{{$Sosyal->id}}">{{$Sosyal->DurumAdi}}</option>
                                           @endforeach
                                            
                                         </select>   


                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                         <button type="submit" style="margin-right: 50px;"class="btn btn-yesil btn-sm">Kayıt</button>
                                         <button type="reset" class="btn btn-yesil btn-sm">Temizle</button>
                                    </div> 
                    

                                    </div>
                                    </div>

                                    </div></form>
                                <div class="col-md-2"></div>
                                <div id="tikla-isletme">
                                    <form method="post" id="isletmekayit" name="istkayit" action="">
                                   
                                   <div class="col-md-4">
                                <div class="form-group" style="margin-left:30px;margin-top:30px;">
                                    <div class="input-group" >
                                        <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili Adı" name="ist_Adi"  aria-describedby="inputGroupSuccess4Status">
                                    </div>

                                    <div class="input-group" style="margin-top:15px;" >
                                        <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili Soyadı" name="ist_Soyadi" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-mobile"></i></i></span>
                                        <input type="text" maxlength="11" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili Telefonu" name="ist_Telefon" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    
                                     <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="email" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili E-mail Adresi" name="ist_email" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili Şifresi" name="ist_password" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-male"></i></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Yetkili Görevi" name="ist_Gorevi" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    
                                   
                                    </div></div>
                                    <div class="col-md-4">
                                         <input type="hidden" value="{{str_random(10)}}" name="UniqID" />
                                        
                                    <div class="input-group" style="margin-top:30px;">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="İşletme Adi" name="ist_IsletmeAdi" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <select class="form-control input-sm" id="inputGroupSuccess4" name="ist_HizmetAlani">
                                              <option value="" disabled selected>Hizmet Alanı Seçiniz...</option>
                                           @foreach($Bolumler as $Bolum)
                                                <option value="{{$Bolum->id}}">{{$Bolum->Bolum}}</option>
                                           @endforeach
                                         </select>                                             
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Adres" name="ist_Adres" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                                        <input type="text" maxlength="11" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Fax" name="ist_Fax" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <input type="text" maxlength="10" class="form-control input-sm" id="inputGroupSuccess4" placeholder="VergiNo" name="ist_VergiNo" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                     <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Web Sitesi" name="ist_WebSitesi" textescribedby="inputGroupSuccess4Status">
                                    </div>
                                    </div>

                                    <div class="col-md-12">
                                      <center>  
                                            <input type="checkbox" value="1" name="Iskur" /> İşletmemiz İşkur'a Kayıtlıdır ( Zorunlu Değil ).
                                                <a class="label label-default" href="http://esube.iskur.gov.tr/Ortak/IsverenKayit.aspx" target="_blank">İşkur'a Ücresiz Kayıt Olmak İçin Tıklayınız &nbsp&nbsp&nbsp&nbsp<i data-toggle="tooltip" data-placement="right" title="ÜCRETSİZ OLARAK İşkura Kayıt Olduğunuz Taktirde Staj Yapacak Öğrencilere İşkur Tarafından Ödenecek Ücrete Ön Ayak Olmuş Olacaksınız. İşkura Üye Olan İşletmelere Başvuru Sayıları Daha Fazla Olduğu Görülmüştür." class="fa fa-info-circle"></i></a>

                                      <div class="input-group" style="margin-top:15px;">
                                             <button type="submit" style="margin-right: 50px;"class="btn btn-yesil btn-sm">Kayıt</button>
                                             <button type="reset" class="btn btn-yesil btn-sm">Temizle</button>
                                        </div>  </center>
                                    </div>
                                    </div>

                                    </form>
                                    </div>
                                    
                                    </div>
                                    
                                    </div>
                                    </center>
                                    </div>
                                    
                                    </form>
                                </div>
                                <br><br>
                            </div>
                    
                    </div>

                    
                    
@stop
