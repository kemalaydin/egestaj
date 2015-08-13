<?php

class StajDonemiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$StajDonemleri = StajDonemleri::orderBy('Donem','DESC')->orderBy('StajTuru','ASC')->paginate(10);
		return View::make('yonetici.stajdonemduzenle',array('StajDonemleri' => $StajDonemleri));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('yonetici.staj-donem-ekle');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$YeniDonem = new StajDonemleri;
		foreach (Input::all() as $key => $value) {
			$YeniDonem->$key = $value;
		}
		$YeniDonem->FakulteID = Auth::user()->FakulteID;
		$YeniDonem->save();
		return Redirect::back()->with('Basarili','Dönem Başarıyla Eklendi');
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
		$DonemBilgisi = StajDonemleri::findOrFail($id);
		return View::make('yonetici.staj-donem-duzenle',array('Donem' => $DonemBilgisi));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$YeniDonem = StajDonemleri::findOrFail($id);

		if($YeniDonem->StajTuru == "2" && Input::get('StajTuru') == "1"){
			$YeniDonem->CiftBaslangic = "";
			$YeniDonem->CiftBitis = "";
		}
		
		foreach (Input::except('_method') as $key => $value) {
			$YeniDonem->$key = $value;
		}
		$YeniDonem->save();
		return Redirect::back()->with('Basarili','Dönem Başarıyla Güncellendi');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$DonemSil = StajDonemleri::findOrFail($id);
		$DonemSil->delete();
		return Redirect::back()->with('Basarili','Silme İşlemi Başarılı');
	}


}
