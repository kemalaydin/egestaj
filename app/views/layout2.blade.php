
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>

      
    <!-- Custom styles for this template -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    
    @yield('style')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="{{asset('asset/js/jquery-1.11.2.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('asset/js/custom.js')}}"></script>    
     <script src="{{asset('asset/js/sweet-alert.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/sweet-alert.css')}}">
    <!-- Placed at the end of the document so the pages load faster --><!-- jQuery REVOLUTION Slider  -->
    <script type="text/javascript" src="{{asset('asset/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/js/jquery.themepunch.revolution.min.js')}}"></script>
    @yield('script')
   
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/settings.css')}}" media="screen" />
    </head>
    <body>
        <div class="header2 gizle">
            <div class="container">
                <div class="row ust-kisim">
                    <div class="col-md-4 col-md-offset-1">
                        <ul class="top-menu">
                            <li class="top-li"><a class="menu-link-beyaz" href="{{URL('/')}}">Anasayfa</a></li>
                            <li class="top-li"><a class="menu-link-beyaz" href="{{URL('/hakkimizda')}}">Hakkımızda</a></li>
                            <li class="top-li"><a class="menu-link-beyaz" href="#">Yardım</a></li>
                            <li class="top-li"><a class="menu-link-beyaz" href="#">Bize Ulaşın</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-2"  style="float:right; padding-left:0 !important;">
                        <div class="row">
                            @if(!Auth::check())
                            <form method="post" action="{{URL('login')}}">
                            <div class="col-md-5" style="padding-left:0 !important;">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="kullanıcı adınız" name="email"  aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5" style="padding-left:0 !important;">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control input-sm" id="inputGroupSuccess4" placeholder="şifreniz" name="password" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style="padding-left:0 !important;">
                                <button type="submit" class="btn btn-yesil btn-sm">Giriş</button>
                            </div>
                        </form>
                        @else
                            @if(Auth::user()->Yetki == 3)
                        <form method="post" action="{{URL('panel/ara')}}">
                            <div class="col-md-6" style="margin-left:20px !important;">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="Öğrenci No Gir" name="OgrenciNo"  aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-left:10px !important;">
                             <button type="submit" class="btn btn-yesil btn-sm">Ara</button>
                             </div>
                             </form>
                             @endif
                        @endif
                        </div>
                        <div class="row">
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="row menu-logo">
                <div class="beyaz-cizgi"></div>
                <div class="container"> 
                    <div class="col-md-4">
                    <a href="{{URL('/')}}">
                        <img src="{{asset('asset/img/logo2.png')}}" class="logo">
                    </a>
                    </div>
                    <div class="col-md-6">
                        <ul class="top-menu">
                            <li class="navigator"><a class="navigator-link" href="#">İŞLETMELER</a></li>
                            <li class="navigator"><a class="navigator-link" href="{{URL('/hakkimizda')}}">HAKKIMIZDA</a></li>
                            <li class="navigator"><a class="navigator-link" href="#">SIKÇA SORULAN SORULAR</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        @if(Auth::check())

                                        <div class="btn-group" style="margin-top:17px;">
                                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                           <img src="{{asset(Auth::user()->Resim)}}" width="25" height="25" style="border-radius: 999px;" /> {{Auth::user()->Adi.' '.Auth::user()->Soyadi}} <span class="caret"></span>
                                          </button>
                                          @if(Auth::user()->Yetki == "1")
                                          <ul class="dropdown-menu" role="menu">
                                            <li><center><b>Öğrenci Hesabı</b></center></li>
                                            <li class="divider"></li>
                                            <li><a href="{{URL('panel/ogrenci')}}">Profil</a></li>
                                           
                                            <li><a href="{{URL('/panel/danismandetay')}}/{{Auth::user()->DanismanID}}">Danışman Öğretmen</a></li>
                                            <li><a href="{{URL('/panel/mesajlar/gelen-mesajlar')}}">Mesajlar</a></li>
                                            <li><a href="{{URL('/panel/ogrenci/ogrenci-profil')}}">Ayarlar</a></li>
                                            <li class="divider"></li>
                                            <li><a href="{{URL('logout')}}">Çıkış</a></li>
                                          </ul>
                                          @elseif(Auth::user()->Yetki == "2")
                                            <ul class="dropdown-menu" role="menu">
                                            <li><center><b>İşletme Hesabı</b></center></li>
                                            <li class="divider"></li>
                                            <li><a href="{{URL('panel/isletme')}}">Profil</a></li>
                                            <li><a href="#">Stajyerlerim</a></li>
                                            <li><a href="{{URL('panel/danismandetay')}}/{{Auth::user()->DanismanID}}">Yetkili İletişim</a></li>
                                            <li><a href="{{URL('/panel/ilan/create')}}">İlan Oluştur</a></li>
                                            <li><a href="{{URL('/panel/mesajlar/gelen-mesajlar')}}">Mesajlar</a></li>
                                            <li><a href="{{URL('/panel/isletme/profil')}}">Ayarlar</a></li>
                                            <li class="divider"></li>
                                            <li><a href="{{URL('logout')}}">Çıkış</a></li>
                                          </ul>
                                          @elseif(Auth::user()->Yetki == "3")
                                            <ul class="dropdown-menu" role="menu">
                                            <li><center><b>Öğretmen Hesabı</b></center></li>
                                            <li class="divider"></li>
                                            <li><a href="{{URL('panel/ogretmen')}}">Profil</a></li>
                                            <li><a href="{{URL('panel/ogretmen/ogrencionay')}}">Onay Bekleyen Öğrenciler</a></li>
                                            <li><a href="{{URL('panel/ogretmen/stajyerekle')}}">Öğrenci Ekle</a></li>
                                            <li><a href="{{URL('panel/ogretmen/isletmeekle')}}">İşletme Ekle</a></li>
                                            <li><a href="{{URL('panel/ogretmen/tercihler')}}">Tercihleri Onayla</a></li>
                                            <li><a href="{{URL('panel/mesajlar/gelen-mesajlar')}}">Mesaj Kutusu</a></li>
                                            <li class="divider"></li>
                                            <li><a href="{{URL('logout')}}">Çıkış</a></li>
                                          </ul>

                                          @elseif(Auth::user()->Yetki == "4")
                                            <ul class="dropdown-menu" role="menu">
                                            <li><center><b>Yönetici Hesabı</b></center></li>
                                            <li class="divider"></li>
                                            <li><a href="{{URL('panel/yonetici')}}">Profil</a></li>
                                            <li><a href="{{URL('panel/yonetici/ogrhavuz')}}">Onay Bekleyen Öğrenciler</a></li>
                                            <li><a href="{{URL('panel/yonetici/isletmehavuz')}}">Onay Bekleyen İşletmeler</a></li>
                                            <li><a href="{{URL('panel/yonetici/ilanhavuz')}}">Onay Bekleyen İlanlar</a></li>
                                            <li><a href="{{URL('panel/yonetici/danisman/create')}}">Öğretim Görevlisi Ekle</a></li>
                                            <li><a href="{{URL('panel/yonetici/ogrenci/create')}}">Öğrenci Ekle</a></li>
                                            <li><a href="{{URL('panel/yonetici/isletme/create')}}">İşletme Ekle</a></li>
                                            <li><a href="{{URL('panel/yonetici/ogrenci')}}">Öğrenci Ayarları</a></li>
                                            <li><a href="{{URL('panel/yonetici/isletme')}}">İşletme Ayarları</a></li>
                                            <li><a href="{{URL('panel/yonetici/stajhavuz')}}">Staj İşlemleri</a></li>
                                            <li><a href="{{URL('panel/mesajlar/gelen-mesajlar')}}">Mesaj Kutusu</a></li>
                                            <li class="divider"></li>
                                            <li><a href="{{URL('logout')}}">Çıkış</a></li>
                                          </ul>

                                          @else

                                          @endif
                                        </div>
                                    @else
                                    <a class="uye-ol" href="#">
                                        <center>
                                            ÜYE OL
                                        </center>
                                    </a>
                                    @endif
                    </div>   
                </div>
            </div>
        </div>
        <div class="top-10"></div>
        <content>
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </content>
        <div class="clearfix"></div>
        <footer class="gizle">
            <div class="row">
                <div class="container"> 
                    <div class="shadow"></div>
                    <div class="col-md-4">
                        <a href="#"><img src="{{asset('asset/img/logo2.png')}}" width="200"></a>
                    </div>
                    <div class="col-md-4">
                        <p class="foot-menu">MENÜ</p>
                        <ul class="foot-ul">
                            <li><a href="{{URL('/')}}">ANASAYFA</a></li>
                            <li><a href="#">İŞLETMELER</a></li>
                            <li><a href="{{URL('/uye-ol')}}">ÜYE OL</a></li>
                            <li><a href="{{URL('/hakkimizda')}}">HAKKIMIZDA</a></li>
                            <li><a href="#">S.S.S.</a></li>
                            <li><a href="#">BİZE ULAŞIN</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <a href="#"><img src="{{asset('asset/img/ege.png')}}" width="100" style="float:right;"></a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>