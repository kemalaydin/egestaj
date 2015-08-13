@extends('layout2')

@section('title')
Öğrenci Ayarları Sayfası | EgeStaj
@stop

@section('script')
<script>
function silUyari(id,no,adi){

    swal({   
        title: "Emin misiniz ?",   
        text: no + " Numaralı, "+ adi +" isimli öğrenciyi silmek istediğinize emin misiniz ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Evet, Sil",   
        cancelButtonText: "Hayır, İptal Et",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, 
    function(isConfirm){   
        if (isConfirm) {     
            swal("Silme İşlemi Yapılıyor!", "Öğrenci Sistemden Siliniyor...", "success");  
            $("#ogrenci"+id).submit();
        } else {     
            swal("İptal Edildi", "Öğrenciyi Silme İşlemi İptal Edildi", "error");   
            return false;
        } 
    });


    return false;
}
</script>
@stop

@section('style')
<style type="text/css" media="print">
.gizle
{ display: none; }
</style>
@stop

@section('content')
                
                    <div class="col-md-12 gizle" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">ÖĞRENCİ EKLE/DÜZENLE <small><small> ( {{Auth::User()->FakulteBilgisi[0]["AktifDonem"]}} Dönemi ) </small></small><a href="{{URL('panel/yonetici/ogrenci')}}/create" style="margin-top:13px; margin-right: 10px" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Yeni Öğrenci Ekle</a>
                             <a href="#" style="margin-top:13px; margin-right: 10px" onclick="window.print();" class="btn btn-info pull-right"><i class="fa fa-print"></i> Sayfayı Yazdır</a>

                              <a href="{{URL('panel/yonetici/ogrenci')}}" style="margin-top:13px; margin-right: 10px" class="btn btn-info pull-right"><i class="fa fa-users"></i> Bütün Öğrenciler</a>

                            </p>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                    @if(Session::has('Hata'))
                            <div class="alert alert-danger">{{Session::get('Hata')}}</div>
                        @endif
                        @if(Session::has('Basarili'))
                            <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                        @endif
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr><td style="width: 11%"><b><center>No</center></b></td><td><b>Adı Soyadı</b></td><td><b>Stajyeri</b></td><td><b>Danışman</b></td><td><b><center>Dönem</center></b></td><td><b><center>Program</center></b></td><td><b><center>Sınıf</center></b></td><td><b><center>Staj Türü</center></b></td><td class="gizle"><center><b>İşlem</b></center></td></tr> 
                            </thead>

                        <tr class="gizle">
                        <form action="{{URL('panel/yonetici/ogrenci/ara')}}" method="post">
                            <td><input type="text" name="OgrenciNo" placeholder="No ile ara" class="form-control"></td>
                            <td><input type="text" name="Adi" placeholder="İsim yada Soyaisim ile ara" class="form-control"></td>
                            <td><select name="Isletme" class="form-control">
                                    <option value="">İşletmeler</option>
                                    @foreach($Isletmeler as $Isletme)
                                        <option value="{{$Isletme->id}}">{{$Isletme->IsletmeAdi}}</option>
                                    @endforeach
                                </select></td>
                            <td>
                                <select name="Danisman" class="form-control">
                                    <option value="">Danışmanlar</option>
                                    @foreach($Danismanlar as $Danisman)
                                        <option value="{{$Danisman->id}}">{{$Danisman->Adi.' '.$Danisman->Soyadi}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><select name="Donem" class="form-control"><option value="">Dönem</option>
                                <option value="2014/2015">2014/2015</option>
                                <option value="2015/2016">2015/2016</option>
                                <option value="2016/2017">2016/2017</option>
                                <option value="2017/2018">2017/2018</option>
                            </select></td>
                            <td><select name="Bolum" class="form-control">
                                <option value="">Programa Göre Ara</option>
                                @foreach($Bolumler as $Bolum)
                                    <option value="{{$Bolum->id}}">{{$Bolum->Bolum}}</option>
                                @endforeach
                                </select>
                            </td>
                            <td><select name="Sinif" class="form-control">
                                <option value="">Sınıf</option>
                                <option value="1">1.</option>
                                <option value="2">2.</option>
                            </select></td>
                            <td><select name="StajTuru" class="form-control">
                                <option value="">Staj Türü</option>
                                <option value="1">TEK</option>
                                <option value="2">ÇİFT</option>
                                <option value="3">DÖNEM İÇİ</option>
                            </select></td>
                            <td><center><button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Ara</button></center></td>
                        </form>
                        </tr>
                        @foreach($Ogrenciler as $Ogrenci)
                        <tr>
                            <td>{{$Ogrenci->OgrenciNo}}</td><td>{{$Ogrenci->Adi}} {{$Ogrenci->Soyadi}}</td>
                            <td>
                            @if($Ogrenci->IsletmeID != "")
                                    @foreach($Ogrenci->StajyeriBilgisi as $OgrIsl)
                                        {{$OgrIsl->IsletmeAdi}}
                                    @endforeach 
                            @else
                                    -
                            @endif
                            </td>
                            <td>
                                @foreach($Ogrenci->DanismanBilgisi as $OgrDan)
                                    {{$OgrDan->Adi}} {{$OgrDan->Soyadi}}
                                @endforeach
                            </td>
                            
                            <td>{{$Ogrenci->Donem}}</td>
                            <td>
                                @foreach($Ogrenci->BolumBilgisi as $OgrBol)
                                    {{$OgrBol->Bolum}}
                                @endforeach
                            </td>
                            <td><center>{{$Ogrenci->Sinif}}</center></td>
                                @if($Ogrenci->StajTuru != "")
                                    <td>@if($Ogrenci->StajTuru == "1") TEK STAJ @elseif($Ogrenci->StajTuru == "2") ÇİFT STAJ @elseif($Ogrenci->StajTuru == "3") DÖNEM İÇİ @lse - @endif</td>
                                @else
                                    <td><center>-</center></td>
                                @endif
                                <td class="gizle">
                                    <center>
                                        <form action="{{URL('panel/yonetici/ogrenci')}}/{{$Ogrenci->id}}" method="post" id="ogrenci{{$Ogrenci->id}}" name="ogrenci{{$Ogrenci->id}}">
                                            @if($Ogrenci->IsletmeID != "")
                                                <a onclick="swal('Bekleyiniz...','Dosyalar Oluşturuluyor Lütfen Bekleyiniz. Dosyaların Oluşturulması Biraz Zaman Alabilir ','info');" href="{{URL('panel/yonetici/ogrenci/dilekce')}}/{{$Ogrenci->id}}" target="_blank" class="btn btn-primary btn-xs">Staj Dilekçesi Al</a> 
                                            @endif

                                            <a href="{{URL('panel/yonetici/ogrenci')}}/{{$Ogrenci->id}}/edit" class="btn btn-primary btn-xs">Düzenle</a> 

                                            <input type="hidden" value="DELETE" name="_method"><button type="button" class="btn btn-danger btn-xs" onclick="silUyari('{{$Ogrenci->id}}','{{$Ogrenci->OgrenciNo}}','{{$Ogrenci->Adi.' '.$Ogrenci->Soyadi}}');">Sil</button>
                                        </form>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                        


                        </table>
                    </div>
                   
                <div class="top-10"></div>
                </div>
               
            </div>
        @stop



       {{-- <a href="{{('ogrenci')}}/{{$Ogrenci->id}}/{{('edit')}}"><span class="label label-primary">Düzenle</span></a>
                                    <a href="{{('ogrenci')}}/{{$Ogrenci->id}}" class=""><span class="label label-primary" >Sil</span></a>--}}