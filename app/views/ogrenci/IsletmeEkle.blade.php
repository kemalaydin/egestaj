@extends('layout2')

@section('title')
	Stajyeri Ekle
@stop
@section('style')
<link href="{{asset('asset/css/jquery-ui.min.css')}}" rel="stylesheet" />

@stop
@section('script')
<script src="{{asset('asset/js/jquery-ui.min.js')}}"></script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
  
  $(".deneme").blur(function(){
  		$.ajax({ // ajax işlemi başlar
	  		type:'POST', // veri gönderme tipimiz. get olabilirdi json olabilirdi. ama biz post kullanıyoruz
	  		url:'{{URL("panel/ajaxQuery/sirketBul")}}', // post edilecek adres
	  		data:'sirket='+$(".deneme").val(), //post edilecek veriler
	  		success:function(cevap){// işlem başarılıysa
	  			if(cevap != 0){
	  				swal("İşletme Bilgileri Çekildi","İşletme Sisteme Kayıtlı Olarak Gözükmektedir. İşletme Bilgileri Otomatik Olarak Dolduruldu, Ekleme Formunu Gönderebilirsiniz","info");
	  				$("[name=YetkiliAdi]").val(cevap.Adi);
	  				$("[name=YetkiliSoyadi]").val(cevap.Soyadi);
	  				$("[name=YetkiliTelefon]").val(cevap.Telefon);
	  				$("[name=email]").val(cevap.email);
	  				$("[name=Adres]").val(cevap.Adres);
	  				$("[name=Fax]").val(cevap.Fax);
	  				$("[name=VergiNo]").val(cevap.VergiNo);
	  				$("[name=WebSitesi]").val(cevap.WebSitesi);
	  				$("[name=Kayit]").val("1");
	  				$(".isletmekayit").html("Staj Talebi Gönder");
	  			}else{
	  				$("[name=YetkiliAdi]").val("");
	  				$("[name=YetkiliSoyadi]").val("");
	  				$("[name=YetkiliTelefon]").val("");
	  				$("[name=email]").val("");
	  				$("[name=Adres]").val("");
	  				$("[name=Fax]").val("");
	  				$("[name=VergiNo]").val("");
	  				$("[name=WebSitesi]").val("");
	  				$("[name=Kayit]").val("0");
	  				$(".isletmekayit").html("İşletmeyi Kaydet");
	  			}
	  		}
  		});
  });
})

        @if(Session::get('ogryok') != "")
            $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('ogryok')}}','info');}); 
        @endif
        
        @if(Session::get('onay') != "")
            $(document).ready(function(){swal('Staj Bilgisi','{{Session::get('onay')}}','info');}); 
        @endif

        @if(Session::get('tercihmessage') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('tercihmessage')}}','success');}); 
        @endif

       $(function() {
    var availableTags = [

    @foreach($Isletmeler as $Isletme)
    	"{{$Isletme->IsletmeAdi}}",
    @endforeach
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
</script>
@stop
@section('content')
                    @include('ogrenci.sidebar')
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                      
                        <div class="baslik">
                            <p class="box-title">STAJYERİ EKLE</p>
                        </div>
                        <div class="row icerik">
                        @if(Auth::user()->Onay >0)
	                        @if(Auth::user()->IsletmeID != "")
								
	                        @else
								@if($Basvuru->count() > 0)
								@foreach($Basvuru as $Bas)
										@if($Bas->Onay == "0")
											<div class="alert alert-info">{{$Bas->IsletmeAdi}} İsimli İşletmeye Yaptığınız Başvuru Onay Beklemektedir. </div>
										@elseif($Bas->Onay == "1")
											<div class="alert alert-success">{{$Bas->IsletmeAdi}} İsimli İşletmeye Yaptığınız Başvuru Onaylanmıştır. Staj Girişiniz Yapılmıştır. </div>
										@elseif($Bas->Onay == "2")
											<div class="alert alert-danger">{{$Bas->IsletmeAdi}} İsimli İşletmeye Yaptığınız Başvuru reddedilmiştir. Yeni İşletme Başvurusu Yapabilirsiniz.</div>

											<form action="{{URL('panel/ogrenci/isletme/kayit')}}" method="post" id="kayit" name="kayit">
			                        	<div class="alert alert-info"><b> ÖNEMLİ ! </b> Bu alan site üzerindeki ilanların dışında staj yeri bulmuş öğrencilerin kullanımı içindir. Staj yapacağınız firmanızı kendiniz bulduysanız formu doldurarak işletmenizi ekleyiniz. İşletmenizi eklemediğiniz taktirde sistemin staj evraklarından ve değerlendirme işlemlerinden yararlanamayacaksınız. <br> <b>İşletmeniz daha önceden sisteme eklenmiş olabilir, işletme adını yazarken sistemde kayıtlı işletmeler listelenmektedir, staj yapacağınız işletme bunlardan biri ise seçtiğiniz taktirde bilgileri otomatik gelecektir. </b></div>
										<div class="col-md-1"></div><div class="col-md-5">
			                        		<center><input class="form-control deneme" id="tags" name="IsletmeAdi" type="text" placeholder="Şirketin Ünvanı / Adı" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="YetkiliAdi" placeholder="Yetkili Adı" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="YetkiliSoyadi" placeholder="Yetkili Soyadı" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="YetkiliTelefon" placeholder="Yetkili Telefonu" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="email" placeholder="Yetkili E-Mail Adresi" style="margin-bottom: 10px;" /></center>
			                        	</div>

			                        	<div class="col-md-5">
			                        		<input class="form-control" type="text" name="Adres" placeholder="Adres" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="Fax" placeholder="Fax" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="VergiNo" placeholder="Vergi No" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="WebSitesi" placeholder="Web Sitesi" style="margin-bottom: 10px;" />
			                        		<input type="hidden" name="Kayit" />
											<center><button type="submit" class="isletmekayit btn btn-primary">İşletmeyi Kaydet</button>
			                        	</div></form>
										@elseif($Bas->Onay == "3")
											<div class="alert alert-warning">Başvurunuz İşletme Tarafından Beklemeye Alındı</div>
										@else
											<div class="alert alert-info">Sistem Başvuruya Ulaşamadı, Staj Departmanıyla İletişime Geçiniz. ( Hata Kodu : 403 )</div>
										@endif
								@endforeach
								@else
									
			                        <form action="{{URL('panel/ogrenci/isletme/kayit')}}" method="post" id="kayit" name="kayit">
			                        	<div class="alert alert-info"><b> ÖNEMLİ ! </b> Bu alan site üzerindeki ilanların dışında staj yeri bulmuş öğrencilerin kullanımı içindir. Staj yapacağınız firmanızı kendiniz bulduysanız formu doldurarak işletmenizi ekleyiniz. İşletmenizi eklemediğiniz taktirde sistemin staj evraklarından ve değerlendirme işlemlerinden yararlanamayacaksınız. <br> <b>İşletmeniz daha önceden sisteme eklenmiş olabilir, işletme adını yazarken sistemde kayıtlı işletmeler listelenmektedir, staj yapacağınız işletme bunlardan biri ise seçtiğiniz taktirde bilgileri otomatik gelecektir. </b></div>
										<div class="col-md-1"></div><div class="col-md-5">
			                        		<center><input class="form-control deneme" id="tags" name="IsletmeAdi" type="text" placeholder="Şirketin Ünvanı / Adı" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="YetkiliAdi" placeholder="Yetkili Adı" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="YetkiliSoyadi" placeholder="Yetkili Soyadı" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="YetkiliTelefon" placeholder="Yetkili Telefonu" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="email" placeholder="Yetkili E-Mail Adresi" style="margin-bottom: 10px;" /></center>
			                        	</div>

			                        	<div class="col-md-5">
			                        		<input class="form-control" type="text" name="Adres" placeholder="Adres" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="Fax" placeholder="Fax" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="VergiNo" placeholder="Vergi No" style="margin-bottom: 10px;" />
			                        		<input class="form-control" type="text" name="WebSitesi" placeholder="Web Sitesi" style="margin-bottom: 10px;" />
			                        		<input type="hidden" name="Kayit" />
											<center><button type="submit" class="isletmekayit btn btn-primary">İşletmeyi Kaydet</button>
			                        	</div></form>
								@endif
	                        @endif
                        @else
                         <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Üyeliğiniz İçin Danışman Onayı Bekleniyor..</div>
                         @endif
                            </div>
                        <div class="top-10"></div>
                       
                        
                    </div>
@stop

