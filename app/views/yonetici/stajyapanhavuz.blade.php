@extends('layout2')

@section('title')
Staj Yapan Öğrenciler | EgeStaj
@stop
@section('script')
<script>
 @if(Session::get('message') != "")
        $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif

 @if(Session::get('iptalmessage') != "")
        $(document).ready(function(){swal('İşlem İptal Edildi','{{Session::get('iptalmessage')}}','info');}); 
        @endif


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

                    <div class="gizle col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">STAJ GİRİŞİ YAPMIŞ ÖĞRENCİLER<small><small> ( {{Auth::User()->FakulteBilgisi[0]["AktifDonem"]}} Dönemi ) </small></small><a href="#" style="margin-top:13px; margin-right: 10px" onclick="window.print();" class="btn btn-info pull-right"><i class="fa fa-print"></i> Sayfayı Yazdır</a></p>
                            <div style="float:right;margin-top:-55px;margin-right:120px;">
                           
                            </div>
                        </div>
                    </div>
                   
                        <div class="row">
                        @if(Session::has('Hata'))
                            <div class="gizle alert alert-danger">{{Session::get('Hata')}}</div>
                        @endif
                        @if(Session::has('Basarili'))
                            <div class="gizle alert alert-success">{{Session::get('Basarili')}}</div>
                        @endif
                            <table class="table table-bordered">
                                <tbody>
                                <tr><td><b><center>No</center></b></td><td><b>Adı Soyadı</b></td><td><b>Stajyeri</b></td><td><b>Danışman</b></td><td><b><center>Dönem</center></b></td><td><b><center>Bölüm</center></b></td><td><b><center>Sınıf</center></b></td><td><b><center>Staj Türü</center></b></td><td class="gizle" width="150"><b>İşlem</b></td></tr></tbody>
                                <tr class="gizle">
                        <form action="{{URL('panel/yonetici/stajyer/ara')}}" method="post">
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

                           @foreach($TumStajyerler as $Stajyer)
                                    <tr class="ilan" style="height: auto !important"><td>{{$Stajyer->OgrenciNo}}</td><td>{{$Stajyer->Adi}} {{$Stajyer->Soyadi}}</td>

                                @foreach($Stajyer->StajyeriBilgisi as $StajYeri)    
                                     <td>{{$StajYeri->IsletmeAdi}}</td>   
                                @endforeach                    
                                
                                @foreach($Stajyer->DanismanBilgisi as $StajDanisman)
                                    <td>{{$StajDanisman->Adi}} {{$StajDanisman->Soyadi}}</td>    
                                @endforeach
                                    
                                    <td>{{$Stajyer->Donem}}</td>
                                
                                @foreach($Stajyer->BolumBilgisi as $StajBolum)
                                    <td>{{$StajBolum->Bolum}}</td>
                                @endforeach

                                    <td>{{$Stajyer->Sinif}}</td>
                                    <td>
                                        @if($Stajyer->StajTuru == "1")
                                            TEK STAJ
                                        @elseif($Stajyer->StajTuru == "2")
                                            ÇİFT STAJ
                                        @elseif($Stajyer->StajTuru == "3")
                                            DÖNEM İÇİ
                                        @else
                                            -   
                                        @endif
                                    </td>
                                    <td class="gizle"> <form action="{{URL('panel/yonetici/ogrenci')}}/{{$Stajyer->id}}" method="post" id="ogrenci{{$Stajyer->id}}" name="ogrenci{{$Stajyer->id}}">
                                        <a href="{{URL('panel/yonetici/ogrenci')}}/{{$Stajyer->id}}/edit" class="btn btn-xs btn-primary">Düzenle</a>
                                        <a href="{{URL('panel/yonetici/ogrenci')}}/{{$Stajyer->id}}" class="btn btn-xs btn-default">Profil</a>
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button type="button" onclick="silUyari('{{$Stajyer->id}}','{{$Stajyer->OgrenciNo}}','{{$Stajyer->Adi.' '.$Stajyer->Soyadi}}');" class="btn btn-xs btn-danger">Sil</button>
                                        <a href="{{URL('panel/yonetici/ogrenci/dilekce')}}/{{$Stajyer->id}}" target="_blank" class="btn btn-xs btn-primary"> Dilekçesi</a>
                                        <a href="{{URL('panel/yonetici/ogrenci/dosya')}}/{{$Stajyer->id}}"  target="_blank" class="btn btn-xs btn-primary"> Dosyası</a></form>
                                    </td>

                            </tr>
                            @endforeach
                             </table>
                        </div>
                
                     
                
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                       {{$TumStajyerler->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop