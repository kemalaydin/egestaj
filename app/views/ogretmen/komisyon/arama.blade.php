@extends('layout2')

@section('title')
 Hoş Geldin {{Auth::user()->Adi.' '.Auth::user()->Soyadi}}
@stop
@section('script')
<script>
    var islem = false;
    @if(Session::get('Basarili') != "")
        $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('Basarili')}}','success');}); 
    @endif

    @if(Session::get('Hata') != "")
        $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('Hata')}}','info');}); 
    @endif

    function IslemYapildi(){
        islem = true;
    }

    $(document).ready(function(){
        $("#AramaForm").submit(function(){
            if(islem == true){
                swal({   
                    title: "Kaydedilmemiş İşlemler Var",   
                    text: "Kaydedilmemiş düzenlemeler mevcut, sayfadan ayrıldığınız taktirde bu veriler kaybolacaktır. Verileri kaydetmek için 'İptal Et' butonuna bastıktan sonra 'Kaydet' butonunu kullanınız",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Devam Et",   
                    cancelButtonText: "İptal Et",   
                    closeOnConfirm: false,   
                    closeOnCancel: false 
                }, 
                function(isConfirm){   
                    if (isConfirm) {     
                        islem = false;
                        $("#AramaForm").submit();
                    } else {     
                        swal("Arama Komutu İptal Edildi", "Verileri Kaydettikten Sonra Arama İşlemine Devam Edebilirsiniz.", "error");   
                        return false;
                    } 
                });
                return false;
            }else{
                return true;
            }

        });
    });
</script>
@stop
@section('content')
    <div class="col-md-12">
        @include('ogretmen.sidebar')
        <div class="col-md-9">
            <div class="baslik">
                <p class="box-title">KOMİSYON HESABI <small> ( {{Auth::user()->Adi.' '.Auth::user()->Soyadi}} ) </small></p>
            </div>
            <div class="row icerik">
               

                <div style="padding: 10px">
                    <a href="{{URL('panel/komisyon/eskidonem')}}" class="btn btn-primary">Eski Dönemler</a>
                    <a href="{{URL('panel/komisyon/notugirilmis')}}" class="btn btn-primary">Notu Girilmiş Öğrenciler</a>
                </div>
                    <div class="alert alert-info">Yapacağınız Staj Değerlendirmesi <b>{{Auth::user()->Donem}}</b> Dönemi İçin Geçerli Olacaktır. <br><span class="bg-warning text-warning">&nbsp Sarı Olan Kısımlar Öğrencinin 1. Stajını </span>&nbsp&nbsp,&nbsp &nbsp<span class="bg-primary text-info">&nbsp Mavi Olan Kısımlar Öğrencinin 2. Stajını </span> &nbsp ve <span class="bg-success text-success">&nbsp Yeşil Olan Kısımlar Dönem İçi Stajı </span> Göstermektedir.</div>
                    <table class="table table-bordered table-hover">
                            <thead>
                                <tr><td style="width: 11%"><b><center>No</center></b></td><td><b>Adı Soyadı</b></td><td><b>Danışman</b></td><td><b><center>Program</center></b></td><td><b><center>Sınıf</center></b></td><td><b><center>Staj Türü</center></b></td><td class="gizle" style="width: 110px"><center><b>İşlem</b></center></td></tr> 
                            </thead>
                        <form action="{{URL('panel/komisyon/')}}" id="AramaForm" method="post">
                        <tr class="gizle">
                            <td><input type="text" name="OgrenciNo" placeholder="No ile ara" class="form-control"></td>
                            <td></td>
                         
                            <td>
                                <select name="Danisman" class="form-control">
                                    <option value="">Danışmanlar</option>
                                    @foreach($Danismanlar as $Danisman)
                                        <option value="{{$Danisman->id}}">{{$Danisman->Adi.' '.$Danisman->Soyadi}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><select name="Bolum" class="form-control">
                                <option value="">Programa Göre Ara</option>
                                @foreach($Bolumler as $Bolum)
                                    <option value="{{$Bolum->id}}">{{$Bolum->Bolum}}</option>
                                @endforeach
                                </select>
                            </td>
                            <td></td>
                            <td><select name="StajTuru" class="form-control">
                                <option value="">Staj Türü</option>
                                <option value="1">TEK</option>
                                <option value="2">ÇİFT</option>
                                <option value="3">DÖNEM İÇİ</option>
                            </select></td>
                            <td><center><button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Ara</button></center></td>
                        </form>
                        </tr>
                        <form action="{{URL('panel/komisyon/notgiris')}}" method="post" id="notGiris" name="notGiris">
                        @foreach($Ogrenciler as $Ogrenci)
                        
                            <tr class="@if($Ogrenci->StajDonemi == '1') warning @elseif($Ogrenci->StajDonemi == '2') info @else success @endif">
                                <td>{{$Ogrenci->OgrenciNo}}</td>
                                <td>{{$Ogrenci->OgrenciBilgisi[0]["Adi"].' '.$Ogrenci->OgrenciBilgisi[0]["Soyadi"]}}</td>
                                <td>{{$Ogrenci->DanismanBilgisi[0]["Adi"].' '.$Ogrenci->DanismanBilgisi[0]["Soyadi"]}}</td>
                                <td>{{$Ogrenci->BolumBilgisi[0]["Bolum"]}}</td>
                                <td><center>{{$Ogrenci->OgrenciBilgisi[0]["Sinif"]}}</center></td>
                                @if($Ogrenci->StajDonemi == "3")
                                    <td>Dönem İçi</td>
                                @else
                                    <td>{{$Ogrenci->StajDonemi}}.Staj<center>
                                @endif
                                </td>
                                <td>
                                <input type="radio" value="1" id="Basarili_{{$Ogrenci->id}}" name="Ogrenci_{{$Ogrenci->id}}"> <label class="text-success" onclick="IslemYapildi()" for="Basarili_{{$Ogrenci->id}}"> BAŞARILI</label><br>

                                <input type="radio" value="2" id="Basarisiz_{{$Ogrenci->id}}" name="Ogrenci_{{$Ogrenci->id}}"> <label class="text-danger" onclick="IslemYapildi()" for="Basarisiz_{{$Ogrenci->id}}"> BAŞARISIZ</label>


                                </td>
                            </tr>
                            
                        @endforeach
                        
                    </table>
                    <div style="padding: 10px;">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Notları Kaydet</button>
                    </div>
                    </form>
                <div class="clearfix"></div><br>
        </div>
    </div>
@stop
