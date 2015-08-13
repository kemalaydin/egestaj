@extends('layout2')

@section('title')
    Staj Dönemi Ayarları Sayfası | EgeStaj
@stop
@section('script')
<script>
        @if(Session::get('eklendi') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('eklendi')}}','success');}); 
        @endif
        function silUyar(donem){
            swal({   
                title: "Silmek istediğinize emin misiniz ?",   
                text: "Bu işlemi yaptığınız taktirde dönemi silecek ve bu döneme ait öğrencilerin staj dönemlerini iptal edeceksiniz.",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Evet, Sil",   
                closeOnConfirm: false 
            }, 
            function(){   
                    $("#"+donem).submit(); 
            });
            
        }
</script>
@stop
@section('content')
    <div class="col-md-12">
                        <span class="page-big-title"><li class="name-li" style="font-size: 40px !important;">{{mb_strtoupper(Auth::user()->Adi.' '.Auth::user()->Soyadi)}}</li></span>
                    </div>
                    @include('yonetici.solpanel')
                        <div class="col-md-9">
                            <div class="baslik">
                                <p class="box-title"><i class="fa fa-calendar"></i> &nbsp;&nbsp;&nbsp;STAJ DÖNEMİ EKLE/DÜZENLE <a href="{{URL('panel/yonetici/staj-donemleri')}}/create" style="margin-top:5px; margin-right: 5px" class="pull-right btn btn-success btn-sm">Yeni Staj Dönemi Ekle</a></p>
                            </div>
                            @if(Session::get('Basarili') != "")
                                <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                            @endif
                                    <table class="table table-bordered">
                                        <tbody>
                                            <td><center><b>Dönem</b></center></td>
                                            <td style="width: 20%"><center><b>Başlangıç Tarihi</b></center></td>
                                            <td  style="width: 20%"><center><b>Bitiş Tarihi</b></center></td>
                                            <td  style="width: 20%"><center><b>İzin Verilen Staj Türü</b></center></td>
                                            <td style="width: 20%"><center><b>İşlem</b></center></td>
                                        </tbody>
                                        @foreach($StajDonemleri as $Donem)
                                        <tr>
                                            <td><center>{{$Donem->Donem}}</center></td>
                                            <td><center>{{$Donem->Baslangic}} @if($Donem->StajTuru == "2")  - {{$Donem->CiftBaslangic}} @endif</center></td>
                                            <td><center>{{$Donem->Bitis}} @if($Donem->StajTuru == "2") - {{$Donem->CiftBitis}} @endif</center></td>
                                            <td><center>
                                                @if($Donem->StajTuru == "1")
                                                    TEK STAJ
                                                @elseif($Donem->StajTuru == "2")
                                                    ÇİFT STAJ
                                                @elseif($Donem->StajTuru == "3")
                                                    DÖNEM İÇİ
                                                @endif
                                            </center></td>
                                            <td><center><form action="{{URL('panel/yonetici/staj-donemleri')}}/{{$Donem->id}}" method="post" id="donem{{$Donem->id}}" name="donem{{$Donem->id}}"><a href="{{URL('panel/yonetici/staj-donemleri')}}/{{$Donem->id}}/edit" class="btn btn-primary btn-xs">Düzenle</a> <input type="hidden" value="DELETE" name="_method"><button type="button" class="btn btn-danger btn-xs" onclick="silUyar('donem{{$Donem->id}}')">Sil</button></form></center></td>
                                        </tr>
                                        @endforeach
                                    </table>  

                                    <center>{{$StajDonemleri->links()}}</center>
                                
                        </div>
             @stop