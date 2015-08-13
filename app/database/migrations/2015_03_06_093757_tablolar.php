<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tablolar extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Kullanicilar',function(Blueprint $table){
			$table->increments('id');
			$table->string('Adi',255);
			$table->string('Soyadi',255);
			$table->integer('OgrenciNo');
			$table->integer('Telefon');
			$table->string('Email',255);
			$table->integer('Bolum');
			$table->integer('Sinif');
			$table->string('Resim',50);
			$table->integer('SGK');
			$table->string('Sifre',255);
			$table->tinyInteger('Onay');
			$table->string('Donem',5);
			$table->integer('GirisYili');
			$table->string('IsletmeAdi',255);
			$table->string('HizmetAlani',255);
			$table->string('Adres',255);
			$table->integer('Fax');
			$table->integer('VergiNo');
			$table->string('WebSitesi',255);
			$table->string('Gorevi',255);
			$table->integer('Yetki');
			$table->timestamps();
			$table->softDeletes();
			$table->rememberToken();
		});

	
		Schema::create('Bolumler',function(Blueprint $table){
			$table->increments('id');
			$table->integer('FakulteID');
			$table->string('Bolum',255);
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('Fakulteler',function(Blueprint $table){
			$table->increments('id');
			$table->string('Fakulte',255);
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('StajGiris',function(Blueprint $table){
			$table->increments('id');
			$table->integer('OgrenciID');
			$table->integer('IsletmeID');
			$table->integer('OgretmenID');
			$table->integer('Onay');
			$table->integer('StajTarihi');
			$table->integer('StajBitis');
			$table->integer('Puan');
			$table->integer('Ip');
			$table->timestamps();
		 	$table->softDeletes();
		});
		Schema::create('StajBasvuru',function(Blueprint $table){
			$table->increments('id');
			$table->integer('OgrenciID');
			$table->integer('IsletmeID');
			$table->integer('OgretmenID');
			$table->integer('IlanID');
			$table->integer('OgrenciOnay');
			$table->integer('OgretmenOnay');
			$table->integer('IsletmeOnay');
			$table->integer('AdminOnay');
			$table->integer('Tarih');
			$table->integer('Ip');
			$table->timestamps();
		 	$table->softDeletes();
		});
			Schema::create('Mesajlasma',function(Blueprint $table){
			$table->increments('id');
			$table->integer('Alan');
			$table->integer('Gonderen');
			$table->string('Icerik',255);
			$table->string('Baslik',255);
			$table->integer('AlanDelete');
			$table->integer('GonderenDelete');
			$table->integer('Tarih');
			$table->integer('Ip');
			$table->timestamps();
		 	$table->softDeletes();
		});
			Schema::create('Ilan',function(Blueprint $table){
			$table->increments('id');
			$table->integer('BolumID');
			$table->integer('IsletmeID');
			$table->string('Baslik',255);
			$table->string('Aciklama',255);
			$table->string('Donem',255);
			$table->integer('Onay');
			$table->integer('Durum');
			$table->integer('Tarih');
			$table->integer('Ip');
			$table->timestamps();
		 	$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Kullanicilar');
		Schema::drop('Fakulteler');
		Schema::drop('Bolumler');
		Schema::drop('StajGiris');
		Schema::drop('StajBasvuru');
		Schema::drop('Mesajlasma');
		Schema::drop('Ilan');
	}

}
