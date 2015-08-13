<?php
class IsletmeController extends BaseController {

/*
	|--------------------------------------------------------------------------
	| Isletme Controller | Isletme Uyeligi Yönlendirmeler ve diğerleri
	|--------------------------------------------------------------------------
	*/



	public function index()
	{
		$Kullanicilar=User::IsletmeTerOgrenciler()->take(4)->get();
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		$Hesap = User::find(Auth::user()->id);	
		$YonlendirilenOgrenciler=StajBasvuru::IsletmeSecenler()->get();
		$IsletmeyiSecenler=StajBasvuru::whereRaw('IsletmeOnay = 1 and IsletmeID = '.Auth::user()->id)->paginate(5);
		
		return View::make('isletme.index',array('IsletmeyiSecenler' => $IsletmeyiSecenler,'Mesajlar' => $Mesajlar,'Kullanicilar' => $Kullanicilar,'Hesap' => $Hesap,'YonlendirilenOgrenciler' => $YonlendirilenOgrenciler));
	}

	public function durumhavuz(){

		$IsletmeyiSecenler=StajBasvuru::whereRaw('IsletmeOnay = 1 and IsletmeID = '.Auth::user()->id)->paginate(12);

		return View::make('isletme.basvurudurumhavuz',array('IsletmeyiSecenler' => $IsletmeyiSecenler ));

	}

	public function profil()
	{
		$Alanlar = Bolumler::orderBy('Bolum','ASC')->get();
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		$Hesap = User::find(Auth::user()->id);
		return View::make('isletme.profil',array('Hesap' => $Hesap,'Mesajlar' =>$Mesajlar,'Alanlar' => $Alanlar));
	}

	public function profilDuzenle(){

		$validator = Validator::make(
		    array(
		        'email' => Input::get('email')
		    ),
		    array(
		        'email' => 'unique:kullanicilar,email,'.Auth::id().''
		    )
		);
		 if ($validator->fails())
	    {
	        return Redirect::back()->with('Uyari','Kullanılan Bir Mail Adresi Girdiniz !');
	    }

		$IstGuncelle = User::find(Auth::user()->id);
		foreach (Input::all() as $key => $value) {
			if($key == "password"){
				if(Input::get('password') != ""){	
					if(Input::get('password') != Input::get('password2')){
						return Redirect::back()->with('Uyari','Şifreleriniz Uyuşmuyor');
					}else{
						$IstGuncelle->password = Hash::make(Input::get('password'));
					}
				}
			}else if($key == "password2"){

			}else if($key == "Resim"){
				if(Input::file('Resim') != ""){
					$ImageName = 'asset/img/users/isletmeler/'.Auth::id().'-'.Auth::user()->slug.'-'.Auth::user()->uniqID.'.jpg';
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


	public function stajyerhavuz()
	{
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		$Kullanicilar=User::IsletmeTerOgrenciler()->Paginate(9);
		$Hesap = User::find(Auth::user()->id);
		return View::make('isletme.stajyerhavuz',array('Kullanicilar' =>$Kullanicilar,'Mesajlar' =>$Mesajlar));	
	}
	public function ilanekle(){
		$Bolumler=Bolumler::all();
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		$Hesap = User::find(Auth::user()->id);
		return View::make('isletme.ilanekle',array('Bolumler' => $Bolumler,'Hesap' => $Hesap,'Mesajlar' => $Mesajlar));

	}
	public function isletmeprofil(){
		return View::make('isletme.isletmeprofil');
	}
	public function basvuruhavuz(){
		$YonlendirilenOgrenciler=stajbasvuru::IsletmeSecenler()->paginate(9);
		return View::make('isletme.basvuruhavuz',array('YonlendirilenOgrenciler' => $YonlendirilenOgrenciler));
	}

	public function isletmedetay($id){
		$Kullanicilar=User::findOrFail($id);
		return View::make('isletmedetay',array('Kullanicilar' => $Kullanicilar));
	}

	public function ilanhavuz(){
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		$Hesap = User::find(Auth::user()->id);
		$Ilanlarim=Ilan::Ilanim()->get();
		return View::make('isletme.ilanhavuz',array('Ilanlarim' => $Ilanlarim,'Hesap' => $Hesap,'Mesajlar' => $Mesajlar));
	}
	public function stajonay($id){
		$StajyerBul=StajBasvuru::findOrFail($id);
		$StajyerBul->IsletmeOnay = 1;
		$StajyerBul->save();

		return Redirect::back()->with('message','Stajyere Onay Verildi.');

	}

	public function stajiptal($id){
		$StajyerBul=StajBasvuru::findOrFail($id);
		$StajyerBul->IsletmeOnay = 2;
		$StajyerBul->save();

		return Redirect::back()->with('iptalmessage','Stajyerin Başvurusu İptal Edildi');
	}

	public function stajyerlerim(){
		$StajIsletme = User::where('IsletmeID','=',Auth::id())->where('Yetki','=','1')->paginate(9);
		return View::make('isletme.stajyerlerim',array('StajIsletme' => $StajIsletme));
	}
	
	public function danisman(){
		return Redirect::to('panel/danismandetay/'.Auth::user()->DanismanID);
	}

	public function tercihet(){
		$tercihet=new StajBasvuru;
		$tercihet->OgrenciID = Input::get('OgrenciID2');
		$tercihet->IlanID = Input::get('IlanID');
		$tercihet->IsletmeID = Auth::user()->id;
		$tercihet->OgretmenID = Auth::user()->DanismanID;
		$tercihet->IsletmeOnay = "1";
		$tercihet->save();

		return Redirect::back()->with("tercihtamam","Öğrenci Tercih Edildi");
	}

	public function danismanlar(){

		$Hesap=User::find(Auth::user()->id);
		$Danismanlar=User::where('Yetki','=','3')->Paginate(10);
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		return View::make('isletme.danismanlar',array('Hesap' => $Hesap,'Mesajlar' => $Mesajlar,'Danismanlar' => $Danismanlar));
	}
	

}

?>