<?php

class IlanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$BenzerIlanlar2 = Ilan::BolumeGoreCek()->paginate(9);
		return View::make('ilanlar.ilanhavuz',array('BenzerIlanlar2' => $BenzerIlanlar2));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->Yetki == 2){
			$Sabitler = SabitAyarlar::find(1);
			$Yil = $Sabitler->Donem;
			
			$IlanSayisi = Ilan::whereRaw('IsletmeID = "'.Auth::id().'" && Tarih = "'.$Yil.'"')->count();	
			$Mesajlar = Mesajlar::Okunmamislar()->count();
			$Hesap = User::find(Auth::user()->id);
			$Fakulteler = Fakulteler::orderBy('Fakulte','ASC')->get();
			return View::make('ilanlar.ilanekle',array('Yil' => $Yil,'IlanSayisi' => $IlanSayisi,'Mesajlar' => $Mesajlar,'Hesap' => $Hesap,'Fakulteler' => $Fakulteler));
		}else{
			return View::make('hata.yetki');
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$Sabitler = SabitAyarlar::find(1);
		$IlanEklet = new Ilan;
		foreach(Input::get() as $key=>$value){
			if($key == "Sozlesme"){}else{
			$IlanEklet->$key=$value;
			}
		}

		$IlanEklet->IsletmeID = Auth::user()->id;
		$IlanEklet->Tarih = $Sabitler->Donem;
		if(Auth::user()->Onay == 1){$IlanEklet->Onay = "1";}else{$IlanEklet->Onay = "0";}
		$IlanEklet->save();

		$IlanID = Ilan::where('UniqID','=',Input::get('UniqID'))->first();
		return Redirect::to('panel/ilan/'.$IlanID->id)->with('Basarili','İlanınız Başarıyla Oluşturuldu');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		$Ilanlar = Ilan::findOrFail($id);
		if(Auth::user()->Yetki == "1" && $Ilanlar->Onay == "0"){
			return View::make('hata.404');
		}else{
			if(Auth::user()->Yetki == "1"){
			$BasvuruBak = StajBasvuru::whereRaw('OgrenciID = "'.Auth::id().'" && IlanID = "'.$id.'"');
			$BasvuruSay = $BasvuruBak->count();
			if($BasvuruSay > 0){
				$BasvuruBak = $BasvuruBak->first();
			}
		}else{$BasvuruSay = 0;$BasvuruBak = null;}
		return View::make('ilandetay',array('BasvuruBak' => $BasvuruBak,'Mesajlar' => $Mesajlar,'Ilanlar' => $Ilanlar,'BasvuruSay' => $BasvuruSay));
		}
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		$Ilan = Ilan::findOrFail($id);
		if($Ilan->IsletmeID != Auth::user()->id){
			return View::make('hata.yetki');
		}else{
			if(Carbon::now()->format('m') < 9){
				$Yil = Carbon::now()->format('Y');
			}else{
				$Yil = Carbon::now()->format('Y')+1;
			}
			$Mesajlar = Mesajlar::Okunmamislar()->count();
			$Hesap = User::find(Auth::user()->id);
			$Donemler = StajDonemleri::orderBy('Baslangic','ASC')->groupBy('StajTuru')->get();
			$Bolumler=Bolumler::orderBy('Bolum','ASC')->get();
			return View::make('ilanlar.ilanduzenle',array('Ilan' => $Ilan,'Yil'=>$Yil,'Hesap' => $Hesap,'Donemler' => $Donemler,'Bolumler' => $Bolumler,'Mesajlar' => $Mesajlar));
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$IlanEklet = Ilan::findOrFail($id);
		foreach(Input::get() as $key=>$value){
			if($key == "_method"){}else{
			$IlanEklet->$key=$value;
			}
		}
		$IlanEklet->slug = Str::slug(Input::get('Baslik'));
		if(Auth::user()->Onay == 1){$IlanEklet->Onay = "1";}else{$IlanEklet->Onay = "0";}
		$IlanEklet->save();

		$IlanID = Ilan::where('UniqID','=',Input::get('UniqID'))->first();
		return Redirect::to('panel/ilan/'.$IlanID->id)->with('Basarili','İlanınız Başarıyla Güncellendi');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$Ilan = Ilan::findOrFail($id);
		if(($Ilan->IsletmeID != Auth::id() && Auth::user()->Yetki != "4") ||($Ilan->IsletmeID != Auth::id() && Auth::user()->Yetki != "3")){
			return View::make('hata.yetki');
		}else{
			$Ilan->delete();
			return Redirect::to('panel');
		}
	}


}
