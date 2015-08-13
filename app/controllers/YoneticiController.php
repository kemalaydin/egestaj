<?php

Class YoneticiController extends BaseController{

	public function index(){

		$OnayBekleyenOgr=User::AdminOnayOgrenci()->Paginate(4);
		$OnayBekleyenIsl=User::AdminOnayIsletme()->Paginate(4);
		return View::make('yonetici.index',array('OnayBekleyenOgr' => $OnayBekleyenOgr,'OnayBekleyenIsl' => $OnayBekleyenIsl));
	}

	public function ogrhavuz(){
		
		$OnayBekleyenOgr = User::AdminOnayOgrenci()->Paginate(9);
		return View::make('yonetici.onaybekleyenogrhavuz',array('OnayBekleyenOgr' => $OnayBekleyenOgr));

	}

	public function isletmehavuz(){
		$OnayBekleyenIsl = User::AdminOnayIsletme()->Paginate(9);
		return View::make('yonetici.onaybekleyenislhavuz',array('OnayBekleyenIsl' => $OnayBekleyenIsl));
	}

	public function ogronay($id){
		$OgrenciBul = User::find($id);
		$OgrenciBul->Onay = '1';
		$OgrenciBul->save();
		return Redirect::back()->with('message','Onayla İşlemi Başarıyla Yapıldı');
	}

	public function islonay($id){

		$IsletmeBul=User::find($id);
		$IsletmeBul->Onay = '1';
		$IsletmeBul->save();

		return Redirect::back()->with('message','Onayla İşlemi Başarıyla Yapıldı');
	}

	public function stajhavuz(){
		$AdminStajyerler = StajBasvuru::AdminTercihStajyerler()->paginate(9);
		return View::make('yonetici.stajhavuz',array('AdminStajyerler' => $AdminStajyerler));

	}

	public function stajyeronay($id){
		$StajyerOnay = StajBasvuru::findOrFail($id);
		$OgrID = $StajyerOnay->OgrenciID;
		$Isletme = $StajyerOnay->IsletmeID;
		$StajRed = StajBasvuru::where('OgrenciID','=',$OgrID)->get();
		
		foreach($StajRed as $StajRedBil){
			$id = $StajRedBil->id;
			$OgrRed = StajBasvuru::find($id);

			$OgrRed->AdminOnay = '2';
			
			
			$OgrRed->save();
		}
		$StajGiris = User::find($OgrID);
		$StajGiris->IsletmeID = $Isletme;
		$StajGiris->save();
		$StajyerOnay->AdminOnay = 1;
		$StajyerOnay->save();
		return Redirect::back()->with('message','Staj İşlemi Onaylandı');

	}

	public function stajyeriptal($id){
		$StajyerIptal = StajBasvuru::findOrFail($id);
		$StajyerIptal->AdminOnay = 2;
		$StajyerIptal->save();
		
		return Redirect::back()->with('iptalmessage','Staj İşlemi İptal Edildi');
	}

	public function ilanhavuz(){
		$Ilanlar = Ilan::where('Onay','=','0')->paginate(9);
		return View::make('yonetici.ilanhavuz',array('Ilanlar' => $Ilanlar));
	}
	public function ilanonay($id){
		$IlaniBul = Ilan::findOrFail($id);
		$IlaniBul->Onay = "1";
		$IlaniBul->save();

		return Redirect::back()->with('Onay','Ilan Onaylandı');

	}
	public function ilaniptal($id){
		$IlaniBul=Ilan::findOrFail($id);
		$IlaniBul->Onay = "2";
		$IlaniBul->save();
		return Redirect::back()->with('Iptal','Ilan İptal Edildi');
	}

	public function stajyapan(){
		$TumStajyerler = User::AdminTumStajyerler()->paginate(30);
		$Bolumler = Bolumler::where('FakulteID','=',Auth::user()->FakulteID)->orderBy('Bolum','ASC')->get();
		$Danismanlar = User::where('Yetki','=','3')->get();
		$Isletmeler = User::where('Yetki','=','2')->get();
		$StajDonemi=StajDonemleri::all();
		return View::make('yonetici.stajyapanhavuz',array(
			'StajDonemi'    => $StajDonemi,
			'TumStajyerler' => $TumStajyerler,
			'Bolumler'	    => $Bolumler,
			'Danismanlar'   => $Danismanlar,
			'Isletmeler'    => $Isletmeler));
	}
	
	public function stajdonemduzenle(){
		return View::make('yonetici.stajdonemduzenle');
	}

	public function stajdonemekle(){
		$StajDonem=new StajDonemleri;
		foreach(Input::all() as $key=>$value){
			$StajDonem->$key = $value;
		}
		$StajDonem->save();
		return Redirect::back()->with('eklendi','Staj Dönemi Eklendi');

	}

	public function DonemSonlandirma(){
		$Sabitler = Fakulteler::find(Auth::user()->FakulteID);
		return View::make('yonetici.DonemSonlandirma',array('Donem' => $Sabitler));
	}

	public function DonemSonlandirmaOnay(){
		$Sabitler = Fakulteler::find(Auth::user()->FakulteID);
		$GelecekDonem = (1+substr($Sabitler->AktifDonem,0,4)).'/'.(substr($Sabitler->AktifDonem,5)+1);

		$OgrenciDonemleri = User::whereRaw('Yetki = "1" && FakulteID = "'.Auth::user()->FakulteID.'"')->get();
		foreach ($OgrenciDonemleri as $Ogrenci) {
			$OgrenciDuzenle = User::find($Ogrenci->id);
			$OgrenciDuzenle->Donem = $GelecekDonem;
			$OgrenciDuzenle->save();
		}

		// $IsletmeDonemleri = User::where('Yetki','=','2')->get();
		// foreach ($IsletmeDonemleri as $Isletme) {
		// 	$IsletmeDuzenle = User::find($Isletme->id);
		// 	$IsletmeDuzenle->Donem = $GelecekDonem;
		// 	$IsletmeDuzenle->save();
		// }

		$Sabitler->AktifDonem = $GelecekDonem;
		$Sabitler->save();

		return Redirect::back()->with('eklendi','Dönem Başarıyla Sonlandırıldı, Yeni Dönem Ataması Yapıldı. Eski Dönem Kayıtlarına Ulaşmak İçin Genel Ayarlar Menüsündeki Arşiv Alanını Kullanınız');
	}

}