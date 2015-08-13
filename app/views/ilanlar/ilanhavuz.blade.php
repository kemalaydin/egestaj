@extends('layout2')

@section('title')
 Hoş Geldin {{Auth::user()->Adi.' '.Auth::user()->Soyadi}}
@stop

@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">İLANLAR</p>
                        </div>
                    </div>
                    @if(Auth::user()->Onay > 0)
                    @foreach($BenzerIlanlar2 as $BIlan )
                    
                    <div class="col-md-4 ilan">
                        
                        <div class="row">
                        
                            <div class="col-md-3">
                                @foreach($BIlan->IlanIsBilgisi as $IlResim)
                                <img class="ilan-img" src="{{asset($IlResim->Resim)}}">
                                @endforeach
                            </div>
                            <div class="col-md-9"><br>
                                <span><a href="{{URL('panel/ilan')}}/{{$BIlan->id}}" class="ilan-bas">{{$BIlan->Baslik}}</a></span><br>
                                <span class="ilan-tarih">{{$BIlan->Tarih}}</span><br>
                                <ul class="ilan-detay">
                                    <li>Staj Dönemi:{{$BIlan->Donem}}</li>
                                    
                                </ul>
                                <a href="{{URL('panel/ilan')}}/{{$BIlan->id}}" class="" style="margin-left:5px"><span class="label label-primary" >İlan Detayı</span></a>
                            </div>
                              
                        </div>
                       
                    </div>
                    
                 @endforeach   
                 @else
                    <div class="alert alert-info" style="border-radius: 0 0 10px 10px">Üyeliğiniz İçin Danışman Onayı Bekleniyor..</div>
                 @endif
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                            @if(Auth::user()->Onay == 1)
                             {{$BenzerIlanlar2->Links()}}
                            @endif
                    </div>
                </div>
                </div>
            </div>
        @stop