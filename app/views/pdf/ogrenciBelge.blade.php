
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body style="padding: 10px; font-size: 10px;">
	<table style="width: 100%">
		<tr>
			<td><img src="{{asset('asset/img/ege.png')}}" width="100"></td>
			<td><font style="font-size: 15px; margin-left: -120px; font-weight:bold;"><center>T.C.<br>EGE ÜNIVERSITESI<br>EGE MESLEK YÜKSEK OKULU<br>ZORUNLU STAJ BAŞVURU FORMU</center></font></td>
			<td><img src="{{asset($Resim)}}" width="100" style="float:right; padding: 5px; border: 1px solid #ccc"></td>
		</tr>
	</table>
	
	<div style="clear:both;"></div><br>
	<center>ILGILI MAKAMA</center><br>
	<center>    Asagida kimlik bilgileri yazili ögrencimizin staj yapma zorunlulugu vardir. Ögrencimizin kurumunuzda/isletmenizde yapacagi 20 is günü staj talebinin degerlendirilerek uygun bulunup bulunmadiginin bildirilmesini rica eder,göstereceginiz ilgiye simdiden tesekkür ederiz.</center>
	<br>
	<div style="clear:both;"></div><br>
	<table border="1"  style="width: 100%">
		<tr>
			<td style="width: 22%"><b>ADI SOYADI : </b></td> <td>{{$OgrenciAdiSoyadi}}</td>
			<td style="width: 22%"><b>STAJ TÜRÜ : </b></td><td>{{$StajTuru}}</td>
		</tr>
		<tr>
			<td style="width: 22%"><b>T.C. KIMLIK NO : </b></td> <td>{{$TCNo}}</td>
			<td style="width: 22%"><b>TELEFON NO : </b></td><td>{{$OgrenciTelefon}}</td>
		</tr>
		<tr>
			<td style="width: 22%"><b>ÖGRENCI NO : </b></td> <td>{{$OgrenciNo}}</td>
			<td style="width: 22%"><b>PROGRAMI : </b></td><td>{{$OgrenciAlan}}</td>
		</tr>
	</table>
	<div style="clear:both;"></div><br>
	
	<table border="1" style="width: 100%">
		<tr>
			<td><b>Sosyal Güvenlik Durumum Asagida isaretledigim Gibidir.</b></td>
		</tr>
		<tr>
			<td>{{$Sgk}}</td>
		</tr>
		<tr>
			<td>NOT: Saglik Güvencemle ilgili degisiklik oldugu taktirde 3 gün içinde bildirmeyi taahhüt ederim.</td>
		</tr>
	</table>
	<div style="clear:both"></div><br>
	<b>STAJ YAPILAN YERIN</b><br>
	<table border="1" style="width: 100%">
		<tr>
			<td style="width: 30%"><b>ADI / ÜNVANI : </b></td><td colspan="3">{{$StajyeriAdi}}</td>
		</tr>
		<tr>
			<td style="width: 30%"><b>ADRESI : </b></td><td colspan="3">{{$StajyeriAdresi}}</td>
		</tr>
		<tr>
			<td style="width: 30%"><b>HIZMET ALANI : </b></td><td colspan="3">{{$StajyeriAlan}}</td>
		</tr>
		<tr>
			<td style="width: 30%"><b>TELEFON NO : </b></td><td>{{$StajyeriTelefon}}</td>
			<td style="width: 20%"><b>FAX NO : </b></td><td>{{$StajyeriFax}}</td>
		</tr>
		<tr>
			<td style="width: 30%"><b>WEB ADRESI : </b></td><td>{{$StajyeriWeb}}</td>
			<td style="width: 20%"><b>VERGI NO : </b></td><td>{{$StajyeriVergi}}</td>
		</tr>
		<tr>
			<td style="width: 30%"><b>STAJ TARIH ARALIGI : </b></td><td colspan="3">{{$StajTarihAraligi}}</td>
		</tr>
	</table>
	<div style="clear:both"></div><br>
	<b>IŞVEREN YETKILININ</b><br>
	<table border="1" style="width: 100%">
		<tr>
			<td style="width: 30%"><b>ADI - SOYADI : </b></td><td>{{$StajyeriGorevli}}</td>
			<td rowspan="4" style="width: 20%"><center>Kurumumuzda/Isletmemizde Staj Yapmasi Uygundur. <br>Imza/ Kase </center></td>
			<td rowspan="4" style="width: 20%"><center>Onay</center></td>
		</tr>
		<tr>
			<td style="width: 30%"><b>GÖREV VE ÜNVANI : </b></td><td>{{$StajyeriUnvan}}</td>
		</tr>
		<tr>
			<td style="width: 30%"><b>EPOSTA ADRESI : </b></td><td>{{$StajyeriEposta}}</td>
		</tr>
		<tr>
			<td style="width: 30%"><b>TARIH : </b></td><td></td>
		</tr>

	</table>
	<div style="clear:both"></div><br>
	<table border="1" style="width: 100%">
		<tr>
			<td style="padding: 10px;"></td>
			<td style="padding: 10px;"><center>ADI SOYADI</center></td>
			<td style="padding: 10px;"><center>TARIH</center></td>
			<td style="padding: 10px;"><center>IMZA</center></td>
		</tr>
		<tr>
			<td style="padding: 10px;"><center>ÖGRENCI</center></td>
			<td style="padding: 10px;"></td>
			<td style="padding: 10px;"></td>
			<td style="padding: 10px;"></td>
		</tr>
		<tr>
			<td style="padding: 10px;"><center>PROGRAM KOORDINATÖRÜ</center></td>
			<td style="padding: 10px;"></td>
			<td style="padding: 10px;"></td>
			<td style="padding: 10px;"></td>
		</tr>
		<tr>
			<td style="padding: 10px;"><center>STAJ BÜROSU</center></td>
			<td style="padding: 10px;"></td>
			<td style="padding: 10px;"></td>
			<td style="padding: 10px;"></td>
		</tr>

	</table>
	<div style="clear:both"></div><br>
	<b>ÖNEMLI UYARILAR</b><br />

	<b>1)</b>Zorunlu staj formunun birer örnegi Program Koordinatörü, Staj bürosu, Stajin yapilacagi isyeri ve Ögrencinin kendisinde kalacak sekilde  4 asil nüsha olarak hazirlanmasi zorunludur.	<br>							
	
	<b>2)</b>Ögrencinin Staja baslama tarihinden en az 20 gün önce tüm onaylari yaptirdiktan sonra Zorunlu staj formunun bir örnegini nüfus cüzdan veya Ehliyet fotokopisi ile beraber staj bürosuna teslim etmesi zorunludur.	<br>							
	<b>3)</b>Zorunlu staj formunun ilgili kisimlari onaylandigi halde staj bürosuna teslim edilmeden stajin yapilmasi durumunda ilgili ögrencinin staj çalismasi esnasinda ugrayacagi zararlardan Üniversitemiz/Yüksekokulumuz sorumlu degildir.Bu sebeple ögrencilerimizin stajlarina dair SGK Ise giris bildirgelerini staja baslama tarihinden en geç Üç gün önce büromuzdan almalari hem Okulumuz hem kendileri adina önemlidir. <br>

	<b>4)</b>Zorunlu staj formundaki tüm alanlari bilgisayar ortaminda doldurulmak zorundadir.	<br>

	<b>5)</b>Onaylama sirasi: <br>
	<b>a)</b>Ögrenci Imza<br>
	<b>b)</b>Staj Yapilacak Isyeri Imza ve Kase/Mühür<br>
	<b>c)</b>Program Koordinatörü Imza varsa Kase<br>								
	<b>d)</b>Staj Bürosu Imza/Onayi-5)Evrak Kayit Bürosu onayi(Evrak sayisi için)	<br>						
	<b>6)</b>Staj Rapor dosyasi stajin sonunda doldurulup isyerine onaylatilarak Yüksekokulumuz evrak kayit bürosuna staj bitis tarihinden itibaren en geç 4 hafta içinde teslim edilmelidir.Yaz stajlarinda ise izleyen güz dönemi kayitlanmalarina kadar teslim süresi taninmaktadir.	<br>							
	*** 5510 sayili yasa geregince staj basvurusunda bulunan ögrencinin is kazasi ve meslek hastaliklari sigorta primlerinin ödeme yükümlüsü Ege Üniversitesi Rektörlügüdür.								

</body>
</html>