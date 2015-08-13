@extends('layout2')

@section('title')
EgeStaj Danışmanlar | EgeStaj
@stop
@section('script')
<script>
 @if(Session::get('message') != "")
        $(document).ready(function(){swal('İşlem Başarılı','{{Session::get('message')}}','success');}); 
        @endif

 @if(Session::get('iptalmessage') != "")
        $(document).ready(function(){swal('İşlem İptal Edildi','{{Session::get('iptalmessage')}}','info');}); 
        @endif

</script>
@stop
@section('content')

                    <div class="col-md-12" style="padding-right: 0px !important; padding-left: 0px !important;">
                        <div class="baslik-2">
                            <p class="box-title-2">TÜM DANIŞMANLAR <a href="{{URL('panel/yonetici/danisman')}}/create" style="margin-top:15px; margin-right: 5px" class="pull-right btn btn-success btn-sm">Yeni Danışman Ekle</a></p>
                            <div style="float:right;margin-top:-55px;margin-right:120px;">
                           
                            </div>
                        </div>
                    </div>
                   
                        <div class="row">
                            <table class="table table-bordered" >
                                <tr><td width="20%"><b><center>Adı Soyadı</center></b></td><td width="20%"><b><center>Bölümü</center></b></td><td width="20%"><b><center>Telefonu</center></b></td><td width="20%"><b><center>Email</center></b></td><td width="20%"><b><center>İşlem</center></b></td></tr>
                            
                            @foreach($TumDanismanlar as $Danismanlar)
                                
                                <tr>

                                <td><center>{{$Danismanlar->Adi}} {{$Danismanlar->Soyadi}}</center></td>
                                
                                @foreach($Danismanlar->BolumBilgisi as $Bolumu)
                                <td><center>{{$Bolumu->Bolum}}</center></td>
                                @endforeach
                                
                                <td><center>{{$Danismanlar->Telefon}}</center></td>

                                <td><center>{{$Danismanlar->email}}</center></td>

                                <td>
                                    <center>
                                    <a href="{{URL('panel/yonetici/danisman')}}/{{$Danismanlar->id}}/edit"><button type="button" class="btn btn-primary">Düzenle</button></a>
                                    <a><button type="button" class="btn btn-danger">Sil</button></a>
                                    </center>
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
                       {{$TumDanismanlar->Links()}}
                    </div>
                </div>
                </div>
            </div>
        @stop