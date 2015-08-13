<?php

class AdminIsletmeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Isletmeler=User::AdminIsletmeler()->paginate(9);
		return View::make('yonetici.isletmeayarhavuz',array('Isletmeler' => $Isletmeler));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$Bolumler=Bolumler::all();
		return View::make('yonetici.isletmeekle',array('Bolumler' => $Bolumler));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$Isletme=new User;
		foreach(Input::get() as $key=>$value){
			$Isletme->$key=$value;
			if($key = "password"){
				$Isletme->password=Hash::make($value);
			}
		}
		$Isletme->Onay = "1";
		$Isletme->Yetki = "2";
		$Isletme->IlanSiniri ="3";
		$Isletme->save();
		return Redirect::back();
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
		$Alanlar=Bolumler::all();
		$DuzenlencekIsletme=User::findOrFail($id);
		return View::make('yonetici.adminisletmeduzenle',array('DuzenlencekIsletme' => $DuzenlencekIsletme,'Alanlar' => $Alanlar));
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

		$IstGuncelle = User::find(Input::get('id'));
		foreach (Input::except("password2","_method") as $key => $value) {
			if($key == "password"){
				if(Input::get('password') != ""){	
					if(Input::get('password') != Input::get('password2')){
						return Redirect::back()->with('Uyari','Şifreleriniz Uyuşmuyor');
					}else{
						$IstGuncelle->password = Hash::make(Input::get('password'));
					}
				}
			}else if($key == "Resim"){
				if(Input::file('Resim') != ""){
					$ImageName = 'asset/img/users/isletmeler/'.Input::get('id').'-'.Input::get('slug').'-'.Input::get('UniqID').'.jpg';
					Image::make(Input::file('Resim'))->save($ImageName);
					$IstGuncelle->Resim = $ImageName;
				}
			}else{
				$IstGuncelle->$key = $value;
			}
		}
		$IstGuncelle->slug = Str::slug(Input::get('IsletmeAdi'));
		$IstGuncelle->save();
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
		$Bul=User::findorfail($id);
		$Bul->delete();

		return Redirect::back()->with("silindi","Seçilen İşletme Silindi.");
	}


}
