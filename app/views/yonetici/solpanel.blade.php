<div class="col-md-3">
    <center>
        <div class="logo-cerceve">
            <img src="{{asset(Auth::user()->Resim)}}"  height="130px">
        </div>
        <p class="logo-alt">
            {{Auth::user()->FakulteBilgisi['0']['Fakulte']}}
        </p> 
    </center>

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a style="text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-cog">
                    </span> Genel Ayarlar</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body ">
                    <table class="table">
                        <tr>
                            <td>
                                <a style="text-decoration:none;" href="{{URL('/panel/mesajlar/gelen-mesajlar')}}">Mesajlar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <a style="text-decoration:none;" href="{{URL('/panel/yonetici/duyuru/')}}">Duyurular</a>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a style="text-decoration:none;" href="{{URL('/panel/yonetici/staj-donemleri')}}">Staj Dönemleri</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a style="text-decoration:none;" href="{{URL('/panel/donem-sonlandirma')}}">Dönem Sonlandırma</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a style="text-decoration:none;" href="{{URL('/panel/donem-sonlandirma')}}">SGK E-Bildirge Oluştur</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a style="text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user">
                    </span> Öğrenci İşlemleri</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <a style="text-decoration:none" href="{{URL('/panel/yonetici/ogrenci/create')}}">Öğrenci Ekle</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a style="text-decoration:none" href="{{URL('/panel/yonetici/ogrhavuz')}}">Onay Bekleyen Öğrenciler</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a style="text-decoration:none" href="{{URL('/panel/yonetici/ogrenci')}}">Öğrenciler</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a style="text-decoration:none" href="{{URL('/panel/yonetici/stajyapanhavuz')}}">Tüm Stajyerler</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a style="text-decoration:none" href="{{URL('/panel/yonetici/stajhavuz')}}">Başvuru Onayla</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a style="text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#collapsed"><span class="glyphicon glyphicon-user">
                    </span> Danışman İşlemleri</a>
                </h4>
            </div>
            <div id="collapsed" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <a style="text-decoration:none" href="{{URL('/panel/yonetici/danisman/create')}}">Danışman Ekle</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a style="text-decoration:none" href="{{URL('/panel/yonetici/danisman')}}">Danışmanlar</a>
                            </td>
                        </tr>
                       
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a style="text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-briefcase">
                    </span> İşletme İşlemleri</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <a style="text-decoration:none" href="{{URL('/panel/yonetici/isletme/create')}}">İşletme Ekle</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a style="text-decoration:none" href="{{URL('/panel/yonetici/isletmehavuz')}}">Onay Bekleyen İşletmeler</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a style="text-decoration:none" href="{{URL('/panel/yonetici/ilanhavuz')}}">Onay Bekleyen İlanlar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a style="text-decoration:none" href="{{URL('/panel/yonetici/isletme')}}">İşletmeler</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
  
