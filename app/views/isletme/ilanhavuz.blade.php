@extends('layout2')

@section('title')
 {{Auth::user()->IsletmeAdi}} İsimli İşletme İlanları | Ege Staj
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
                            @endforeach</p> 
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
                     
                            <div class="row">
                            @if($Ilanlarim->Count() >0)
                               <table class="table table-bordered">

                                  <tr>
                                  <td style="text-align:center"><b>Başlık</b></td><td style="text-align:center;font-weight:bold">İçerik</td><td style="text-align:center"><b>Dönem</b></td><td style="text-align:center"><b>Onay Durumu</b></td><td style="text-align:center"><b>Oluşturulma Tarihi</b></td><td style="text-align:center"><b>Son Güncelleme Tarihi</b></td><td style="width:50px;text-align:center;"><b>İşlem</b></b></td>
                                  </tr>
                                  @foreach($Ilanlarim as $Ilan)
                                  <tr>

                                  <td>{{$Ilan->Baslik}}</td>
                                  <td>{{str_limit($Ilan->Aciklama,30)}}</td>
                                  <td>{{$Ilan->Donem}}</td>
                                  @if($Ilan->Onay == 1)
                                  <td><center><span class="label label-success">Onaylı</span></center></td>
                                  @elseif($Ilan->Onay == 0)
                                  <td><center><span class="label label-primary">Onay Bekliyor</span></center></td>
                                  @else
                                  <td><center><span class="label label-danger">İptal Edildi</span></center></td>
                                  @endif
                                  <td>{{substr($Ilan->created_at,0,10)}}</td><td>{{substr($Ilan->updated_at,0,10)}}</td><td><a href="{{URL('panel/ilan')}}/{{$Ilan->id}}" class="btn btn-primary btn-sm">İNCELE</a> 
                                  </tr>
                                  @endforeach
                                </table>
                              @else
                                <div class="alert alert-info">Herhangi Bir İlan Oluşturulmamış</div>
                              @endif

                            </div>
                        </div>
                       
                       
        @stop