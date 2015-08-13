<?php
 
class AjaxController extends BaseController{
 
        public function OgrenciRegister(){
                $Donem = SabitAyarlar::find(1);
                $OgrenciEkle = new User;
                foreach (Input::get() as $key => $value) {
                        $OgrenciEkle->$key = $value;
                        if($key == "password"){
                                $OgrenciEkle->password = Hash::make(Input::get('password'));
                        }
                }
                $Danisman = User::whereRaw('Bolum ="'.Input::get('Bolum').'" && Yetki = "3"');
                if($Danisman->count() < 1){
                        $DanismanID = "1";
                }else{
                        $DanismanBilgi = $Danisman->first();
                        $DanismanID = $DanismanBilgi->id;
                }
                $OgrenciEkle->DanismanID = $DanismanID;
                $OgrenciEkle->Donem = $Donem->Donem;
                $OgrenciEkle->Yetki = "1";
                $OgrenciEkle->slug = Str::slug(Input::get('Adi').' '.Input::get('Soyadi'));
                $OgrenciEkle->save();
                return "1";
        }
 
        public function CompanyRegister(){
                $Donem = SabitAyarlar::find(1);
                $IsletmeEkle = new User;
                foreach (Input::get() as $key => $value) {
                        $IsletmeEkle->$key = $value;
                        if($key == "password"){
                                $IsletmeEkle->password = Hash::make(Input::get('password'));
                        }
                }
                $Danisman = User::whereRaw('Bolum ="'.Input::get('HizmetAlani').'" && Yetki = "3"');
                if($Danisman->count() < 1){
                        $DanismanID = "1";
                }else{
                        $DanismanBilgi = $Danisman->first();
                        $DanismanID = $DanismanBilgi->id;
                }
                $IsletmeEkle->DanismanID = $DanismanID;
                $IsletmeEkle->Yetki = "2";
                $IsletmeEkle->Donem = $Donem->Donem;
                $IsletmeEkle->IlanSiniri = "3";
                $IsletmeEkle->slug = Str::slug(Input::get('IsletmeAdi'));
                $IsletmeEkle->save();
                return "1";
        }

        public function ilanFakulte(){
                $BolumBul = Bolumler::where('FakulteID','=',Input::get('id'))->get();
                return $BolumBul;
        }

        public function ilanDonem(){
                $DonemBul = StajDonemleri::where('FakulteID','=',Input::get('id'))->groupBy('Baslangic')->get();
                return $DonemBul;

        }

        public function sirketBul(){
                $SirketSorgula = User::where('IsletmeAdi','=',Input::get('sirket'))->where('Yetki','=','2');
                if($SirketSorgula->count() > 0){
                       return $SirketSorgula->first();
                }else{
                        return 0;
                }
        }
 
}