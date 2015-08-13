<?php

class AdminDanismanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$TumDanismanlar=User::where('Yetki','=','3')->Paginate(20);
		return View::make('yonetici.danismanlar',array('TumDanismanlar' => $TumDanismanlar));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$Bolumler=Bolumler::all();
		return View::make('yonetici.danismanekle',array('Bolumler' => $Bolumler));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$Danisman = new user;
		foreach(Input::get() as $key=>$value){
			$Danisman->$key=$value;
			if($key = "password"){
				$Danisman->password=Hash::make($value);
			}
		}

		$Danisman->Onay = "1";
		$Danisman->Yetki ="3";
		$Danisman->Save();
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
		$Danisman=User::findorfail($id);
		return View::make('yonetici.danismanduzenle',array('Danisman' => $Danisman));
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

		$DanismanGuncelle = User::find(Input::get('id'));
		foreach(Input::except("password2","_method") as $key=>$value){
			if($key == "password"){
				if(Input::get('password') != ""){
					$DanismanGuncelle->password = Hash::make(Input::get("password"));
				}
			}elseif($key == "Resim"){
				if(Input::file('Resim') != ""){
					$ImageName = 'asset/img/users/ogrenciler/'.Input::get('id').'-'.Input::get('slug').'-'.Input::get('uniqID').'.jpg';
					Image::make(Input::file('Resim'))->save($ImageName);
					$DanismanGuncelle->Resim = $ImageName;
				}
			}else{

				$DanismanGuncelle->$key = $value;
			}
		}
		if(Input::get('Komisyon') == ""){
			$DanismanGuncelle->Komisyon = "0";
		}
		$DanismanGuncelle->slug = Str::slug(Input::get('Adi').' '.Input::get('Soyadi'));
		$DanismanGuncelle->save();
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
		//
	}


}
