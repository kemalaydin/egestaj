@extends('layout2')

@section('title')
 {{Auth::user()->IsletmeAdi}} Stajyerleri | Ege Staj
@stop

@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">{{Auth::user()->IsletmeAdi}} STAJYERLERİ</p>
                        </div>
                    </div>
                    @if($StajIsletme->Count() >0)
                    @foreach($StajIsletme as $StajyerBilgi)
                    <div class="col-md-4 ilan">
                        <div class="row">
                            <div class="col-md-3">
                           
                                <img class="ilan-img" src="{{asset($StajyerBilgi->Resim)}}">
                            </div>
                            <div class="col-md-9"><br>
                                <span><a href="#" class="ilan-bas">{{$StajyerBilgi->Adi.' '.$StajyerBilgi->Soyadi}}</a></span><br>
                                <span class="ilan-tarih">{{$StajyerBilgi->email}}</span><br>
                                <ul class="ilan-detay">
                                    <a href="{{URL('panel/ogrencidetay')}}/{{$StajyerBilgi->id}}" class=""><span class="label label-primary" >Öğrenci Bilgileri</span></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="clearfix"></div>
                    <div class="alert alert-info" style="border-radius: 0 0 10px 10px">İşletmenize Ait Stajyer Bulunamadı.</div>
                    @endif
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                             {{$StajIsletme->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop