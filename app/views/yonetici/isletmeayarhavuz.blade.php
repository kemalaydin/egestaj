@extends('layout2')

@section('title')
İşletme Ayarları Sayfası | EgeStaj
@stop
@section('script')
<script>
        @if(Session::get('silindi') != "")
            $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('silindi')}}','info');}); 
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

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">İŞLETME EKLE/DÜZENLE <a href="{{URL('panel/yonetici/isletme')}}/create" style="margin-top:15px; margin-right: 5px" class="pull-right btn btn-success btn-sm">Yeni İşletme Ekle</a></p>
                        </div>
                    </div>
                    <table class="table table-bordered">
                    <tr><td><b>Yetkili Adı Soyadı</b></td><td><b>Telefon</b></td><td><b>Email</b></td><td><b>Görevi</b></td><td><b>İşletme Adı</b></td><td><b>Hizmet Alanı</b></td><td><b>Vergi No</b></td><td><b>İşlemler</b></td></tr>
                    
                @if($Isletmeler->Count() >0)
                   @foreach($Isletmeler as $Isletme)
                        
                            <tr>
                            <td>{{$Isletme->Adi}} {{$Isletme->Soyadi}}</td>
                            <td>{{$Isletme->Telefon}}</td>
                            <td>{{$Isletme->email}}</td>
                            <td>{{$Isletme->Gorevi}}</td>
                            <td>{{$Isletme->IsletmeAdi}}</td>

                        @foreach($Isletme->HizmetBilgisi as $IsletmeHizmet)
                            <td>{{$IsletmeHizmet->Bolum}}</td>
                        @endforeach
                            
                            
                            <td>{{$Isletme->VergiNo}}</td>
                             <td><center><form action="{{URL('panel/yonetici/isletme')}}/{{$Isletme->id}}" method="post" id="isletme{{$Isletme->id}}" name="isletme{{$Isletme->id}}"><a href="{{URL('panel/yonetici/isletme')}}/{{$Isletme->id}}/edit" class="btn btn-primary btn-xs">Düzenle</a> <input type="hidden" value="DELETE" name="_method"><button type="button" class="btn btn-danger btn-xs" onclick="silUyar('isletme{{$Isletme->id}}')">Sil</button></form></center></td>
                        </tr>


                    @endforeach
                  </table>
                  @else
                    <div class="alert alert-info" style="border-radius: 0 0 10px 10px">İşletme Bulunamadı</div>
                  @endif
                <div class="top-10"></div>
                </div>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                             {{$Isletmeler->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop