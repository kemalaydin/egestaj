<?php
Class MesajController extends BaseController{

public function index(){
	$Ogrenciler=user::AdminOgrenciler()->get();
	$Isletmeler=user::AdminIsletmeler()->get();
	$Danismanlar=user::Danismanlar()->get();
	return View::make('mesajlar.mesajlar',array('Ogrenciler' => $Ogrenciler,'Isletmeler' => $Isletmeler,'Danismanlar' => $Danismanlar));

}
public function gonder(){

	$mesaj = new Mesajlar;
	foreach(Input::get() as $key=>$value){
		$mesaj->$key = $value;
	}
	$mesaj->Gonderen = Auth::user()->id;
	$mesaj->save();
	return Redirect::back()->with('message','Mesajınız Gönderildi');
	
}

public function gelen(){
	$gelenmesajlar=Mesajlar::gelenler()->orderBy('Okunma','asc')->get();
	return View::make('mesajlar.gelenmesajlar',array('GelenMesajlar' => $gelenmesajlar));
}
public function gonderilen(){
	$gonderilenmesajlar=Mesajlar::gonderilen()->get();
	return View::make('mesajlar.gonderilenmesajlar',array('GonderilenMesajlar' => $gonderilenmesajlar));
}
public function gelenicerik($id){
	$gelenicerik=Mesajlar::findorfail($id);
	$gelenicerik->Okunma = "1";
	$gelenicerik->save();
	return View::make('mesajlar.gelenicerik',array('GelenIcerik' => $gelenicerik));
}

public function gonderilenicerik($id){
	$gonderilenicerik=Mesajlar::findorfail($id);
	return View::make('mesajlar.gonderilenicerik',array('GonderilenIcerik' => $gonderilenicerik));
}

public function gelensil($id){
	$bul=Mesajlar::findorfail($id);
	$bul->delete();
	return Redirect::to('/panel/mesajlar/gelen-mesajlar');
}

}