<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Staj Yönetim</title>

      
    <!-- Custom styles for this template -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="{{asset('asset/js/jquery-1.11.2.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/js/custom.js')}}"></script>    
    <!-- Placed at the end of the document so the pages load faster --><!-- jQuery REVOLUTION Slider  -->
    <script type="text/javascript" src="{{asset('asset/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/js/jquery.themepunch.revolution.min.js')}}"></script>

    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/settings.css')}}" media="screen" />
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row ust-kisim">
                    <div class="col-md-4 col-md-offset-1">
                        <ul class="top-menu">
                            <li class="top-li"><a class="menu-link-beyaz" href="#">Anasayfa</a></li>
                            <li class="top-li"><a class="menu-link-beyaz" href="hakkimizda.html">Hakkımızda</a></li>
                            <li class="top-li"><a class="menu-link-beyaz" href="#">Yardım</a></li>
                            <li class="top-li"><a class="menu-link-beyaz" href="#">Bize Ulaşın</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-2"  style="float:right; padding-left:0 !important;">
                        <div class="row">
                            <div class="col-md-5" style="padding-left:0 !important;">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="kullanıcı adınız"  aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5" style="padding-left:0 !important;">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="text" class="form-control input-sm" id="inputGroupSuccess4" placeholder="şifreniz" aria-describedby="inputGroupSuccess4Status">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style="padding-left:0 !important;">
                                <button type="button" class="btn btn-yesil btn-sm">Giriş</button>
                            </div>
                        </div>
                        <div class="row">
                        
                        </div>
                    </div>
                </div>
            </div>
                <div class="row menu-logo" style="margin-right:0px !important;">
                    <div class="beyaz-cizgi"></div>
                        <div class="container"> 
                                <div class="col-md-4">
                                    <img src="{{asset('asset/img/logo2.png')}}" class="logo">
                                </div>
                                <div class="col-md-6">
                                    <ul class="top-menu">
                                        <li class="navigator"><a class="navigator-link" href="#">İŞLETMELER</a></li>
                                        <li class="navigator"><a class="navigator-link" href="hakkimizda.html">HAKKIMIZDA</a></li>
                                        <li class="navigator"><a class="navigator-link" href="#">SIKÇA SORULAN SORULAR</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-2">
                                    <a class="uye-ol" href="#">
                                        <center>
                                            ÜYE OL
                                        </center>
                                    </a>
                                </div>  
                            
                        </div>
                </div>
            <div class="row slider">
                <div class="bannercontainer">
                    <div class="banner">
                        <ul>
                            <!-- THE BOXSLIDE EFFECT EXAMPLES  WITH LINK ON THE MAIN SLIDE EXAMPLE -->

                            <li data-transition="boxslide" data-slotamount="1">
                                <div class="caption ilk-satir"  data-x="0" data-y="30" data-speed="700" data-start="1700" data-easing="easeOutBack">Size en iyi</div>
                                <div class="caption iki-satir"  data-x="0" data-y="95" data-speed="500" data-start="1900" data-easing="easeOutBack">Staj imkanını sunar</div>
                                <div class="caption uc-satir"  data-x="0" data-y="300" data-speed="300" data-start="2000">Sitemize üye olmanız yeterli.</div>
                                

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption lft customout rs-parallaxlevel-0"
                                    data-x="600"
                                    data-y="25"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="700"
                                    data-start="1100"
                                    data-easing="Power3.easeInOut"
                                    data-elementdelay="0.1"
                                    data-endelementdelay="0.1"
                                    style="z-index: 4;"><img src="{{asset('asset/img/dummy.png')}}" alt="" data-lazyload="{{asset('asset/img/stud.png')}}">
                                </div>
                            </li>
                            <!-- THE BOXSLIDE EFFECT EXAMPLES  WITH LINK ON THE MAIN SLIDE EXAMPLE -->

                            <li data-transition="boxslide" data-slotamount="2">
                                <div class="caption ilk-satir"  data-x="500" data-y="30" data-speed="700" data-start="1700" data-easing="easeOutBack">Size en iyi</div>
                                <div class="caption iki-satir"  data-x="500" data-y="95" data-speed="500" data-start="1900" data-easing="easeOutBack">Staj imkanını sunar</div>
                                <div class="caption uc-satir"  data-x="500" data-y="300" data-speed="300" data-start="2000">Sitemize üye olmanız yeterli.</div>
                                

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption lft customout rs-parallaxlevel-0"
                                    data-x="0"
                                    data-y="25"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="700"
                                    data-start="1100"
                                    data-easing="Power3.easeInOut"
                                    data-elementdelay="0.1"
                                    data-endelementdelay="0.1"
                                    style="z-index: 4;"><img src="{{asset('asset/img/dummy.png')}}" alt="" data-lazyload="{{asset('asset/img/stud.png')}}">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="top-10"></div>
        <content>
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="baslik">
                            <p class="box-title">YENİ İŞLETMELER</p>
                        </div>
                        <div class="icerik">
                        <center>
                            <ul class="yeni-isletme">
                                <li class="isletme-tek"><a href="#"><img class="sirket-img" src="{{asset('asset/img/sirket.png')}}"></a></li>
                                <li class="isletme-tek"><a href="#"><img class="sirket-img" src="{{asset('asset/img/sirket.png')}}"></a></li>
                                <li class="isletme-tek"><a href="#"><img class="sirket-img" src="{{asset('asset/img/sirket.png')}}"></a></li>
                            </ul>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="baslik">
                            <p class="box-title"><i class="fa fa-search"></i> &nbsp;&nbsp;&nbsp;İLAN ARA</p>
                        </div>
                        <div class="icerik">
                            <div class="row">
                                <form>
                                    <div class="col-md-12">
                                        <center>
                                            <input type="text" class="arama-input" placeholder="Aramak istediğiniz ilanın adını giriniz">
                                        </center>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="arama-select arama-input" style="margin-left:15px;">
                                          <option><p>İL-İLÇE SEÇİNİZ</p></option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="arama-select arama-input" value="İL-İLÇE SEÇİNİZ">
                                          <option>SEKTÖR SEÇİNİZ</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn-yesil-ara">İLAN ARA</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="top-10"></div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="baslik-sektor">
                            <center><p class="sektor-title">SEKTÖRLERE GÖRE STAJYER İLANLARI</p></center>
                        </div>
                        <div class="icerik-3">
                            <ul class="sektorler">
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                                <li class="sektor-li"><a class="sektor-link" href="#">EĞİTİM <span class="ilan-sayi">(1194)</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="baslik-2">
                            <p class="box-title">İLANLAR</p>
                            <p class="box-sub-title">Öne Çıkan İlanlar</p>
                            
                            <form>
                                <select class="listele" value="İL-İLÇE SEÇİNİZ">
                                    <option>Listele</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-md-6 ilan">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="ilan-img" src="{{asset('asset/img/sirket.png')}}">
                                </div>
                                <div class="col-md-9"><br>
                                    <span><a href="#" class="ilan-bas">Hıvac Isıtma Soğutma Tek. İth. İhr. San. Tic. Ltd. Şti.</a></span><br>
                                    <span class="ilan-tarih">20.03.2015</span><br>
                                    <ul class="ilan-detay">
                                        <li>ŞİŞLİ / İSTANBUL</li>
                                        <li>BİLİŞİM TEKNOLOJİLERİ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ilan">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="ilan-img" src="{{asset('asset/img/sirket.png')}}">
                                </div>
                                <div class="col-md-9"><br>
                                    <span><a href="#" class="ilan-bas">Hıvac Isıtma Soğutma Tek. İth. İhr. San. Tic. Ltd. Şti.</a></span><br>
                                    <span class="ilan-tarih">20.03.2015</span><br>
                                    <ul class="ilan-detay">
                                        <li>ŞİŞLİ / İSTANBUL</li>
                                        <li>BİLİŞİM TEKNOLOJİLERİ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ilan">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="ilan-img" src="{{asset('asset/img/sirket.png')}}">
                                </div>
                                <div class="col-md-9"><br>
                                    <span><a href="#" class="ilan-bas">Hıvac Isıtma Soğutma Tek. İth. İhr. San. Tic. Ltd. Şti.</a></span><br>
                                    <span class="ilan-tarih">20.03.2015</span><br>
                                    <ul class="ilan-detay">
                                        <li>ŞİŞLİ / İSTANBUL</li>
                                        <li>BİLİŞİM TEKNOLOJİLERİ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ilan">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="ilan-img" src="{{asset('asset/img/sirket.png')}}">
                                </div>
                                <div class="col-md-9"><br>
                                    <span><a href="#" class="ilan-bas">Hıvac Isıtma Soğutma Tek. İth. İhr. San. Tic. Ltd. Şti.</a></span><br>
                                    <span class="ilan-tarih">20.03.2015</span><br>
                                    <ul class="ilan-detay">
                                        <li>ŞİŞLİ / İSTANBUL</li>
                                        <li>BİLİŞİM TEKNOLOJİLERİ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ilan">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="ilan-img" src="{{asset('asset/img/sirket.png')}}">
                                </div>
                                <div class="col-md-9"><br>
                                    <span><a href="#" class="ilan-bas">Hıvac Isıtma Soğutma Tek. İth. İhr. San. Tic. Ltd. Şti.</a></span><br>
                                    <span class="ilan-tarih">20.03.2015</span><br>
                                    <ul class="ilan-detay">
                                        <li>ŞİŞLİ / İSTANBUL</li>
                                        <li>BİLİŞİM TEKNOLOJİLERİ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ilan">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="ilan-img" src="{{asset('asset/img/sirket.png')}}">
                                </div>
                                <div class="col-md-9"><br>
                                    <span><a href="#" class="ilan-bas">Hıvac Isıtma Soğutma Tek. İth. İhr. San. Tic. Ltd. Şti.</a></span><br>
                                    <span class="ilan-tarih">20.03.2015</span><br>
                                    <ul class="ilan-detay">
                                        <li>ŞİŞLİ / İSTANBUL</li>
                                        <li>BİLİŞİM TEKNOLOJİLERİ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ilan">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="ilan-img" src="{{asset('asset/img/sirket.png')}}">
                                </div>
                                <div class="col-md-9"><br>
                                    <span><a href="#" class="ilan-bas">Hıvac Isıtma Soğutma Tek. İth. İhr. San. Tic. Ltd. Şti.</a></span><br>
                                    <span class="ilan-tarih">20.03.2015</span><br>
                                    <ul class="ilan-detay">
                                        <li>ŞİŞLİ / İSTANBUL</li>
                                        <li>BİLİŞİM TEKNOLOJİLERİ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ilan">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="ilan-img" src="{{asset('asset/img/sirket.png')}}">
                                </div>
                                <div class="col-md-9"><br>
                                    <span><a href="#" class="ilan-bas">Hıvac Isıtma Soğutma Tek. İth. İhr. San. Tic. Ltd. Şti.</a></span><br>
                                    <span class="ilan-tarih">20.03.2015</span><br>
                                    <ul class="ilan-detay">
                                        <li>ŞİŞLİ / İSTANBUL</li>
                                        <li>BİLİŞİM TEKNOLOJİLERİ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ilan">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="ilan-img" src="{{asset('asset/img/sirket.png')}}">
                                </div>
                                <div class="col-md-9"><br>
                                    <span><a href="#" class="ilan-bas">Hıvac Isıtma Soğutma Tek. İth. İhr. San. Tic. Ltd. Şti.</a></span><br>
                                    <span class="ilan-tarih">20.03.2015</span><br>
                                    <ul class="ilan-detay">
                                        <li>ŞİŞLİ / İSTANBUL</li>
                                        <li>BİLİŞİM TEKNOLOJİLERİ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ilan">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="ilan-img" src="{{asset('asset/img/sirket.png')}}">
                                </div>
                                <div class="col-md-9"><br>
                                    <span><a href="#" class="ilan-bas">Hıvac Isıtma Soğutma Tek. İth. İhr. San. Tic. Ltd. Şti.</a></span><br>
                                    <span class="ilan-tarih">20.03.2015</span><br>
                                    <ul class="ilan-detay">
                                        <li>ŞİŞLİ / İSTANBUL</li>
                                        <li>BİLİŞİM TEKNOLOJİLERİ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </content>
        <footer>
            <div class="row">
                <div class="container"> 
                    <div class="shadow"></div>
                    <div class="col-md-4">
                        <a href="index.html"><img src="{{asset('asset/img/logo2.png')}}" width="200"></a>
                    </div>
                    <div class="col-md-4">
                        <p class="foot-menu">MENÜ</p>
                        <ul class="foot-ul">
                            <li><a href="index.html">ANASAYFA</a></li>
                            <li><a href="#">İŞLETMELER</a></li>
                            <li><a href="#">ÜYE OL</a></li>
                            <li><a href="hakkimizda.html">HAKKIMIZDA</a></li>
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
        
        <script type="text/javascript">
 
   jQuery(document).ready(function() {
      jQuery('.banner').revolution({
         delay:4000,
         startwidth:960,
         startheight:400,
         startWithSlide:0,
 
         fullScreenAlignForce:"off",
         autoHeight:"off",
         minHeight:"off",
 
         shuffle:"off",
 
         onHoverStop:"off",
 
         thumbWidth:100,
         thumbHeight:50,
         thumbAmount:3,
 
         hideThumbsOnMobile:"off",
         hideNavDelayOnMobile:1500,
         hideBulletsOnMobile:"off",
         hideArrowsOnMobile:"off",
         hideThumbsUnderResoluition:0,
 
         hideThumbs:0,
         hideTimerBar:"off",
 
         keyboardNavigation:"o  n",
 
         navigationType:"bullet",
         navigationArrows:"solo",
         navigationStyle:"round",
 
         navigationHAlign:"center",
         navigationVAlign:"bottom",
         navigationHOffset:30,
         navigationVOffset:30,
 
         soloArrowLeftHalign:"left",
         soloArrowLeftValign:"center",
         soloArrowLeftHOffset:20,
         soloArrowLeftVOffset:0,
 
         soloArrowRightHalign:"right",
         soloArrowRightValign:"center",
         soloArrowRightHOffset:20,
         soloArrowRightVOffset:0,
 
 
         touchenabled:"on",
         swipe_velocity:"0.7",
         swipe_max_touches:"1",
         swipe_min_touches:"1",
         drag_block_vertical:"false",
 
         parallax:"mouse",
         parallaxBgFreeze:"on",
         parallaxLevels:[10,7,4,3,2,5,4,3,2,1],
         parallaxDisableOnMobile:"off",
 
         stopAtSlide:-1,
         stopAfterLoops:-1,
         hideCaptionAtLimit:0,
         hideAllCaptionAtLilmit:0,
         hideSliderAtLimit:0,
 
         dottedOverlay:"none",
 
         spinned:"spinner4",
 
         fullWidth:"off",
         forceFullWidth:"off",
         fullScreen:"off",
         fullScreenOffsetContainer:"#topheader-to-offset",
         fullScreenOffset:"0px",
 
         panZoomDisableOnMobile:"off",
 
         simplifyAll:"off",
 
         shadow:0
 
      });
 
   });
 
</script>
    </body>
</html>