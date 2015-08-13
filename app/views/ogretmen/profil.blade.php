@extends('layout2')

@section('title')
 {{Auth::user()->Adi.' '.Auth::user()->Soyadi}} Profil Sayfası | Ege Staj
@stop
@section('script')
@if(Session::get('ogryok') != "")
        $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('ogryok')}}','info');}); 
        @endif
@stop
@section('content')

<div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
                    </div>
                    @include('ogretmen.sidebar')
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                       <div class="baslik">
                            <p class="box-title"><i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp;PROFİL BİLGİLERİNİZ</p>
                        </div>
                        <div class="icerik">
                            <div class="row"><br>
                            @if(Session::get('Basarili') != "")
                                    <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                                @endif
                                @if(Session::get('Uyari') != "")
                                    <div class="alert alert-warning">{{Session::get('Uyari')}}</div>
                                @endif
                                <form action="{{URL('panel/ogretmen/profil-update')}}"  enctype="multipart/form-data" id="form" method="post" name="form">  
                                    <div class="col-md-12 m-t-10" data-toggle="tooltip" data-placement="top" title="Profil Resminizi Değiştirmek İçin Yeni Resim Seçiniz...">  
                                        <center>
                                            <img src="{{asset(Auth::user()->Resim)}}" width="100" height="100" style="border: 1px solid #ccc; border-radius: 999px"/><br><br>
                                           <input id="file" name="Resim" type="file"><br>
                                        </center>
                                    </div>
                               
                                
                                    <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Adınız : </div>
                                    <div class="col-md-6"><input type="text"  class="form-control" name="Adi" value="{{Auth::user()->Adi}}" /></div>
                                    </div> 
                                    
                                      <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Soyadınız : </div>
                                    <div class="col-md-6"><input type="text"  class="form-control" name="Soyadi" value="{{Auth::user()->Soyadi}}" /></div>
                                    </div> 

                                      <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Telefonunuz : </div>
                                    <div class="col-md-6"><input type="text" maxlength="11" class="form-control" name="Telefon" value="{{Auth::user()->Telefon}}" /></div>
                                    </div> 

                                      <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Email Adresiniz : </div>
                                    <div class="col-md-6"><input type="text"  class="form-control" name="email" value="{{Auth::user()->email}}" /></div>
                                    </div> 

                                      <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Bölümünüz : </div>
                                    @foreach($Hesap->BolumBilgisi as  $Hes)
                                    <div class="col-md-6"><input type="text"  class="form-control" name="TCNo" value="{{$Hes->Bolum}}" disabled/></div>
                                     @endforeach
                                    </div> 

                                    <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifreniz : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password" placeholder="Boş Bıraktığınız Taktirde Değişmeyecek" /></div>
                                </div>

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="Boş Bıraktığınız Taktirde Şifreniz Değiştirilmeyecektir">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Şifreniz [ Tekrar ] : </div>
                                    <div class="col-md-6"><input type="password" class="form-control" name="password2" placeholder="Yeni Şifrenizi Tekrarlayın" /></div>
                                </div>
                                
                                  <div class="col-md-12 m-t-10 m-b-10">
                                    <center><input type="submit" class="btn btn-success" value="Kaydet" /></center>
                                </div>
                               
                            </div>
                            <br>
                        </div>
                       
                       
        @stop