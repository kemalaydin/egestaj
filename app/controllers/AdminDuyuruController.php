<?php

class AdminDuyuruController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Duyuru = Duyuru::all();
		return View::make('yonetici.duyurular',array('Duyuru' => $Duyuru));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('yonetici.duyuruolustur');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$duyuru = new Duyuru;
		
		foreach(Input::get() as $key=>$value){
			$duyuru->$key = $value;

		}
		$duyuru->OlusturanID = Auth::user()->id;
		$duyuru->save();
		return Redirect::back()->with('message','İlan Oluşturuldu');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//$duyurudetay=duyuru::findOrFail($id);
		//return View::make('duyurudetay',array('duyurudetay' => $duyurudetay));
		return "sa";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$DuyuruBul=Duyuru::findOrFail($id);
		return View::make('yonetici.duyuruduzenle',array('DuzenlenecekDuyuru' => $DuyuruBul));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$DuyuruBul=Duyuru::findorfail($id);
		foreach(Input::all() as $key=>$value){

			$DuyuruBul->$key = $value;
		}

		$DuyuruBul->save();
		return Redirect::back()->with("duzenlendi","Seçilen Duyuru Düzenlendi");
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$Bul=Duyuru::findOrFail($id);
		$Bul->delete();
		return Redirect::back()->with('silindi','Seçilen Duyuru Silindi');

	}


}
