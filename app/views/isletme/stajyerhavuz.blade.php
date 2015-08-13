@extends('layout2')

@section('title')
 Öğrenci Havuz Sayfası | Ege Staj
@stop

@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">TERCİH EDEBİLECEĞİNİZ ÖĞRENCİLER</p>
                        </div>
                    </div>
                    @if($Kullanicilar->Count() >0)
                    @foreach($Kullanicilar as $Kullanici)
                    <div class="col-md-4 ilan">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="ilan-img" src="{{asset($Kullanici->Resim)}}">
                            </div>
                            <div class="col-md-9"><br>
                                <span><a href="#" class="ilan-bas">{{$Kullanici->Adi.' '.$Kullanici->Soyadi}}</a></span><br>
                                <span class="ilan-tarih">{{$Kullanici->email}}</span><br>
                                <ul class="ilan-detay">
                                    <a href="{{URL('panel/ogrencidetay')}}/{{$Kullanici->id}}" class=""><span class="label label-primary" >Öğrenci Bilgileri</span></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Tercih Edebileceğiniz Öğrenci Bulunamadı.</div>
                    @endif
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                             {{$Kullanicilar->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop