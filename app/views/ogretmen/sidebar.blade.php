<div class="col-md-3">
                        <center>
                            <div class="logo-cerceve">
                                <img src="{{asset(Auth::user()->Resim)}}"  height="130px">
                            </div>
                            <div class="top-10"></div>
                            <p class="logo-alt">{{Auth::user()->email}}</p> 
                        </center>
                        <div class="top-10"></div>
                        <div class="row">
                            @if(Auth::user()->Komisyon == "1")
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('panel/komisyon')}}" class="sekme-link">
                                    <i class="fa fa-users fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">KOMİSYON HESABI</span>
                                </a>
                            </div>
                            @endif
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('panel/ogretmen/ogrencionay')}}" class="sekme-link">
                                    <i class="fa fa-check fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">ONAY BEKLEYEN ÖĞR</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/ogretmen/stajyerekle')}}" class="sekme-link">
                                    <i class="fa fa-user fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">ÖĞRENCİ EKLE</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/ogretmen/isletmeekle')}}" class="sekme-link">
                                    <i class="fa fa-building-o fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">İŞLETME EKLE</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/ogretmen/tercihler')}}" class="sekme-link">
                                    <i class="fa fa-building-o fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">BAŞVURU ONAYLA ({{$TercihOnaySay}})</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/ogretmen/basvurudurum')}}" class="sekme-link">
                                    <i class="fa fa-building-o fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">BAŞVURU ONAY SÜRECİ</span>
                                </a>
                            </div>
                             <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/mesajlar/gelen-mesajlar')}}" class="sekme-link">
                                    <i class="fa fa-envelope fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">MESAJLAR ( {{$Mesajlar}} )</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/ogretmen/ogretmen-profil')}}" class="sekme-link">
                                    <i class="fa fa-cog fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">AYARLAR</span>
                                </a>
                            </div>
                        </div>
                    </div>