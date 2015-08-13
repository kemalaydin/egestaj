@extends('layout2')

@section('title')
 {{Auth::user()->IsletmeAdi}} İsimli İşletme  Danışman İletişim Sayfası | Ege Staj
@stop

@section('script')
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
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
                            <p class="box-title"><i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp;DANIŞMANLAR</p>
                        </div>
                        <div class="">
                            <div class="row">
                                <table class="table table-bordered">
                                  
                                  <tr><td><center><b>Adı Soyadı</b></center></td><td><center><b>Bölümü</b></center></td><td><center><b>Email</b></center></td><td><center><b>Telefonu</b></center></td><td><center><b>İşlem</b></center></td></tr>
                                
                                @foreach($Danismanlar as $Danisman)
                                    <tr>
                                        <td><center>{{$Danisman->Adi}} {{$Danisman->Soyadi}}</center></td>

                                    @foreach($Danisman->BolumBilgisi as $Bolumu)

                                        <td><center>{{$Bolumu->Bolum}}</center></td>  

                                    @endforeach

                                        <td><center>{{$Danisman->email}}</center></td>

                                        <td><center>{{$Danisman->Telefon}}</center></td>

                                        <td><center><a href="{{URL('panel/danismandetay')}}/{{$Danisman->id}}"><button type="button" class="btn btn-primary">Danışma Detayı</button></a></center></td>

                                    </tr>
                                    

                                @endforeach    

                                </table>
                                                
                                <br><br>
                                <center>{{$Danismanlar->Links()}}</center>

                            </div>
                        </div>
                       
                       
        @stop