<?php

class AdminOgrenciController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Ogrenciler = User::AdminOgrenciler()->paginate(14);
		$Bolumler = Bolumler::where('FakulteID','=',Auth::user()->FakulteID)->orderBy('Bolum','ASC')->get();
		$Danismanlar = User::where('Yetki','=','3')->get();
		$Isletmeler = User::where('Yetki','=','2')->get();
		$OgrenciSayisi = User::AdminOgrenciler()->count();
		return View::make('yonetici.ogrenciayarhavuz',array(
			'Ogrenciler'  	=> $Ogrenciler,
			'Bolumler'	  	=> $Bolumler,
			'Danismanlar' 	=> $Danismanlar,
			'Isletmeler'  	=> $Isletmeler,
			'OgrenciSayisi' => $OgrenciSayisi
 		));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$Bolumler = Bolumler::all();
		$SGK = SGKDurumlari::all();
		return View::make('yonetici.ogrenciekle',array('Bolumler' => $Bolumler,'SGK' => $SGK));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store()
	{
		$Ogrenci = new User;
		foreach(Input::get() as $key=>$value){
			$Ogrenci->$key=$value;
			if($key = "password"){
				$Ogrenci->password=Hash::make($value);
			}
		}
		$Danisman = User::whereRaw('Bolum ="'.Input::get('Bolum').'" && Yetki = "3"');
		if($Danisman->count() < 1){
			$DanismanID = "1";
		}else{
			$DanismanBilgi = $Danisman->first();
			$DanismanID = $DanismanBilgi->id;
		}
		$Ogrenci->DanismanID = $DanismanID;
		$Ogrenci->Onay = "1";
		$Ogrenci->Yetki = "1";
		$Ogrenci->save();
		return Redirect::back()->with('eklendi','Öğrenci Kayıt Edildi');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$DuzenlencekOgrenci = User::findOrFail($id);
		$Bolum = Bolumler::all();
		$SGK = SGKDurumlari::all();
		$HocaBul = User::whereRaw('Yetki = 3 and Bolum ='.$DuzenlencekOgrenci->Bolum.' and id != '.$DuzenlencekOgrenci->DanismanID)->get();
		return View::make('yonetici.adminogrenciduzenle',array('HocaBul' => $HocaBul,'DuzenlencekOgrenci' => $DuzenlencekOgrenci,'SGK' => $SGK,'Bolums' => $Bolum));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(
		    array(
		        'email' => Input::get('email')
		    ),
		    array(
		        'email' => 'unique:kullanicilar,email,'.Input::get('id').''
		    )
		);
		 if ($validator->fails())
	    {
	        return Redirect::back()->with('Uyari','Kullanılan Bir Mail Adresi Girdiniz !');
	    }

		$OgrGuncelle = User::find(Input::get('id'));
		foreach(Input::except("password2","_method") as $key=>$value){
			if($key == "password"){
				$OgrGuncelle->password = Hash::make(Input::get("password"));

			}elseif($key == "Resim"){
				if(Input::file('Resim') != ""){
					$ImageName = 'asset/img/users/ogrenciler/'.Input::get('id').'-'.Input::get('slug').'-'.Input::get('uniqID').'.jpg';
					Image::make(Input::file('Resim'))->save($ImageName);
					$OgrGuncelle->Resim = $ImageName;
				}
			}else{
				$OgrGuncelle->$key = $value;
			}
		}
		$OgrGuncelle->slug = Str::slug(Input::get('Adi').' '.Input::get('Soyadi'));
		$OgrGuncelle->save();
		return Redirect::back()->with('Basarili','Güncelleme Başarılı');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$OgrenciyiSil = User::findOrFail($id);
		if($OgrenciyiSil->FakulteID != Auth::user()->FakulteID){
			return Redirect::back()->with('Hata','Sadece Kendi Fakültenize Ait Kullanıcılara Müdahale Edebilirsiniz');
		}else{
			$OgrenciyiSil->delete();
			return Redirect::back()->with('Basarili','Öğrenci Başarıyla Silindi');
		}
		
	}

	public function ogrenciAra(){
		$KullaniciBul = User::where('Yetki','=','1');
		$KullaniciBul->where('Donem','=',Auth::user()->Donem);

		if(Input::get('OgrenciNo') != ""){
			$KullaniciBul->where('OgrenciNo','=',Input::get('OgrenciNo'));
		}
		if(Input::get('Adi') != ""){
			$KullaniciBul->where('Adi','LIKE','%'.Input::get('Adi').'%');
		}
		if(Input::get('Isletme') != ""){
			$KullaniciBul->where('IsletmeID','=',Input::get('Isletme'));
		}
		if(Input::get('Danisman') != ""){
			$KullaniciBul->where('DanismanID','=',Input::get('Danisman'));
		}
		if(Input::get('Bolum') != ""){
			$KullaniciBul->where('Bolum','=',Input::get('Bolum'));
		}
		if(Input::get('Sinif') != ""){
			$KullaniciBul->where('Sinif','=',Input::get('Sinif'));
		}
		if(Input::get('StajTuru') != ""){
			$KullaniciBul->where('StajTuru','=',Input::get('StajTuru'));
		}
		if(Input::get('Donem') != ""){
			$KullaniciBul->where('Donem','=',Input::get('Donem'));
		}
		$Bolumler = Bolumler::where('FakulteID','=',Auth::user()->FakulteID)->orderBy('Bolum','ASC')->get();
		$Danismanlar = User::where('Yetki','=','3')->get();
		$Isletmeler = User::where('Yetki','=','2')->get();
		$Ogrenciler = $KullaniciBul->get();
		return View::make('yonetici.ogrenciAra',array(
			'Ogrenciler'  => $Ogrenciler,
			'Bolumler'	  => $Bolumler,
			'Danismanlar' => $Danismanlar,
			'Isletmeler'  => $Isletmeler
		));
	}


	public function stajyerAra(){
		$KullaniciBul = User::where('Yetki','=','1');
		$KullaniciBul->where('Donem','=',Auth::user()->FakulteBilgisi["0"]["AktifDonem"]);
		$KullaniciBul->whereNotNull('IsletmeID');

		if(Input::get('OgrenciNo') != ""){
			$KullaniciBul->where('OgrenciNo','=',Input::get('OgrenciNo'));
		}
		if(Input::get('Adi') != ""){
			$KullaniciBul->where('Adi','LIKE','%'.Input::get('Adi').'%');
		}
		if(Input::get('Isletme') != ""){
			$KullaniciBul->where('IsletmeID','=',Input::get('Isletme'));
		}
		if(Input::get('Danisman') != ""){
			$KullaniciBul->where('DanismanID','=',Input::get('Danisman'));
		}
		if(Input::get('Bolum') != ""){
			$KullaniciBul->where('Bolum','=',Input::get('Bolum'));
		}
		if(Input::get('Sinif') != ""){
			$KullaniciBul->where('Sinif','=',Input::get('Sinif'));
		}
		if(Input::get('StajTuru') != ""){
			$KullaniciBul->where('StajTuru','=',Input::get('StajTuru'));
		}
		if(Input::get('Donem') != ""){
			$KullaniciBul->where('Donem','=',Input::get('Donem'));
		}
		$Bolumler = Bolumler::where('FakulteID','=',Auth::user()->FakulteID)->orderBy('Bolum','ASC')->get();
		$Danismanlar = User::where('Yetki','=','3')->get();
		$Isletmeler = User::where('Yetki','=','2')->get();
		$Ogrenciler = $KullaniciBul->get();
		return View::make('yonetici.stajyerAra',array(
			'TumStajyerler'  => $Ogrenciler,
			'Bolumler'	     => $Bolumler,
			'Danismanlar'    => $Danismanlar,
			'Isletmeler'     => $Isletmeler
		));
	}

	public function dilekce($id){
		$OgrenciBilgisi = User::findOrFail($id);
		$Aranacak  = array("ğ","ı","Ğ","İ","ş","Ş");
		$Degisecek = array("g","i","G","I","s","S");
		$Kullanici = User::find($id);
		$BolumBilgisi = "";
		$SGKBilgisi = "";
		$HizmetBilgisi = "";
		foreach ($Kullanici->BolumBilgisi as $Bolum) {
			$BolumBilgisi = $Bolum->Bolum;
		}
		foreach ($Kullanici->SgkBilgisi as $SGKBilgi) {
			$SGKBilgisi =  $SGKBilgi->DurumAdi;
		}

		$StajyeriBilgisi = User::find($OgrenciBilgisi->IsletmeID);
		foreach ($StajyeriBilgisi->HizmetBilgisi as $Hizmet) {
			$HizmetBilgisi = $Hizmet->Bolum;
		}

		if($OgrenciBilgisi->StajTuru == "1" || $OgrenciBilgisi->StajTuru == ""){
			$StajTuru = "TEK STAJ";
		}else if($OgrenciBilgisi->StajTuru == "2"){
			$StajTuru = "CIFT STAJ";
		}else{
			$StajTuru = "DONEM ICI";
		}

		$data = array('OgrenciAdiSoyadi' => str_replace($Aranacak, $Degisecek,$OgrenciBilgisi->Adi).' '.str_replace($Aranacak, $Degisecek,$OgrenciBilgisi->Soyadi),
		 'OgrenciTelefon' => $OgrenciBilgisi->Telefon,
		 'OgrenciNo' => $OgrenciBilgisi->OgrenciNo ,
		 'TCNo' => $OgrenciBilgisi->TCNo ,
		 'StajyeriAdi' => str_replace($Aranacak, $Degisecek,$StajyeriBilgisi->IsletmeAdi),
		 'StajyeriAdresi' =>  str_replace($Aranacak, $Degisecek,$StajyeriBilgisi->Adres),
		 'StajyeriTelefon' => $StajyeriBilgisi->Telefon,
		 'StajyeriFax' => $StajyeriBilgisi->Fax,
		 'StajyeriWeb' => $StajyeriBilgisi->WebSitesi,
		 'StajyeriVergi' => $StajyeriBilgisi->VergiNo,
		 'StajTarihAraligi' => '__/__/_____ - __/__/_____',
		 'StajyeriAlan' => $HizmetBilgisi,
		 'StajyeriGorevli' => str_replace($Aranacak, $Degisecek,$StajyeriBilgisi->Adi.' '.$StajyeriBilgisi->Soyadi),
		 'StajyeriUnvan' => str_replace($Aranacak, $Degisecek,$StajyeriBilgisi->Gorevi),
		 'StajyeriEposta' => $StajyeriBilgisi->eposta,
		 'Sgk' => $SGKBilgisi,
		 'OgrenciAlan' => $BolumBilgisi,
		 'StajTuru' => $StajTuru,
		 'Resim' => $OgrenciBilgisi->Resim);
		$pdf = PDF::loadView('pdf.ogrenciBelge',$data);
		return $pdf->setPaper('a4')->stream();
	}

}
