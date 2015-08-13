@extends('layout2')

@section('title')
 İlan Ekle Sayfası | Ege Staj
@stop

@section('content')

<div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <div class="logo-cerceve">
                                <img src="{{asset(Auth::user()->Resim)}}"  height="130px">
                            </div>
                            <div class="top-10"></div>
                            <p class="logo-alt">{{Auth::user()->IsletmeAdi}}  - 
                            @foreach($Hesap->HizmetBilgisi as  $Hes)
                                {{$Hes->Bolum}}
                            @endforeach
                            </p> 
                        </center>
                        <div class="top-10"></div>
                        <div class="row">
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/mesajlar/gelen-mesajlar')}}" class="sekme-link">
                                    <i class="fa fa-envelope fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">MESAJLAR ( {{$Mesajlar}} )</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/isletme/stajyerlerim')}}" class="sekme-link">
                                    <i class="fa fa-user fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">STAJYERLERİM</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('panel/isletme/danismanlar')}}" class="sekme-link">
                                    <i class="fa fa-file-text-o fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">YETKİLİ İLETİŞİM</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/ilan/create')}}" class="sekme-link">
                                    <i class="fa fa-file-text-o fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">İLAN OLUŞTUR</span>
                                </a>
                            </div>
                             <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/isletme/ilanhavuz')}}" class="sekme-link">
                                    <i class="fa fa-file-text-o fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">İLANLARIM</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/isletme/profil')}}" class="sekme-link">
                                    <i class="fa fa-cog fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">AYARLAR</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9" style="padding-right: 0px !important; padding-left: 0px !important;">
                       <div class="baslik">
                            <p class="box-title"><i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp;İLAN OLUŞTUR</p>
                        </div>
                        <div class="icerik">
                            <div class="row"><br>
                                   <form method="post" action="{{URL('ogrenci-register')}}">
                            <div class="col-md-6" style="margin-top:15px;padding-left:0 !important;">
                            
                                <div class="form-group" style="margin-left:30px;">

                                    <div class="input-group" >
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Başlık" name="Adi"  aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                     <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                        <select class="form-control input-sm" id="inputGroupSuccess4" name="Bolum">
                                            
                                            @foreach($Bolumler as $bolum)
                                            
                                            
                                            <option value='{{$bolum->id}}'>{{$bolum->Bolum}}</option>
                                            @endforeach
                                         </select>                                             
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci Adı" name="Adi"  aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                    <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci Adı" name="Adi"  aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                     <div class="input-group" style="margin-top:15px;">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <textarea class="form-control" placeholder="s" rows="3"></textarea>
                                    </div>



                                    </div>
                                    
                                    </div>
                                    <div class="col-md-12">
                                     <div class="col-md-4"></div>
                                     <div class="col-md-4">
                                     <div class="col-md-2" style="margin-left:80px !important;margin-top:15px;">
                                         <button type="submit" class="btn btn-yesil btn-sm">İlan Ver</button>

                                    </div>
                                    <div class="col-md-2" style="margin-left:20px !important;margin-top:15px;">
                                         <button type="reset" class="btn btn-yesil btn-sm">Temizle</button>
                                        
                                    </div>
                                    </div>
                                    </div>
                                      </form>
                                   
                                </div>
                                <br><br>
                            </div>
                            
                             
                             
                           
                      
                                 
                                
                            </div>
                           
                        </div>
                       
                       
        @stop