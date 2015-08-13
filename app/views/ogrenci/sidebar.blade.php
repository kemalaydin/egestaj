
                    <div class="col-md-3">
                        <center>
                            <div class="logo-cerceve">
                                <img src="{{asset(Auth::user()->Resim)}}"  height="130px">
                            </div>
                            <div class="top-10"></div>
                            <p class="logo-alt">{{Auth::user()->Donem}} Dönemi</p> 
                        </center>
                        <div class="top-10"></div>
                        <div class="row">
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('panel/mesajlar/gelen-mesajlar')}}" class="sekme-link">
                                    <i class="fa fa-envelope fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">MESAJLAR ( {{$Mesajlar}} )</span>
                                </a>
                            </div>

                            @if(Auth::user()->IsletmeID == "")
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('panel/ogrenci/isletme-ekle')}}"  data-toggle="tooltip" data-placement="top" title="Sistemde bulunmayan bir işletmede staj yapacaksanız bu alandan işletmenizi kayıt edebilirsiniz. Başvurunuzdan sonra gerekli onaylar alındığında sistemi kullanabileceksiniz." class="sekme-link">
                                    <i class="fa fa-building fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">STAJ YERİ EKLE</span>
                                </a>
                            </div>
                            @endif
                            @if(Auth::user()->IsletmeID != "")
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('panel/isletmedetay/')}}/{{Auth::user()->IsletmeID}}" class="sekme-link">
                                    <i class="fa fa-building fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">STAJYERİM</span>
                                </a>
                            </div>

                            <div class="col-md-12 sekme-buton">
                                <a href="#" onclick="swal('Bilgi','Staj Defteri Uygulaması Henüz Geliştirme Aşamasındadır. ','info');" class="sekme-link">
                                    <i class="fa fa-book fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">STAJ DEFTERİ</span>
                                </a>
                            </div>

                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/ogrenci/evraklar')}}" class="sekme-link">
                                    <i class="fa fa-file-text fa-2x sekme-icon"></i>
                                    <span class="sekme-text" onclick="swal('Lütfen Bekleyin...','Staj Belgeniz Hazırlanıyor. Lütfen Bekleyiniz...','info')">STAJ BELGESİ</span>
                                </a>
                            </div>
                            @endif
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/danismandetay')}}/{{Auth::user()->DanismanID}}" class="sekme-link">
                                    <i class="fa fa-user fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">DANIŞMAN</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/ogrenci/ogrenci-profil')}}" class="sekme-link">
                                    <i class="fa fa-cog fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">AYARLAR</span>
                                </a>
                            </div>
                        </div>
                    </div>