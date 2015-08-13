@extends('layout2')

@section('title')
{{Auth::user()->Adi.' '.Auth::user()->Soyadi}} Mesajlar Sayfası | Ege Staj
@stop
@section('script')
<script>
@if(Session::get('ogryok') != "")
        $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('ogryok')}}','info');}); 
        @endif
</script>
@stop

@section('content')

<div class="container">
                <div class="row">
                    <div class="col-md-3">
                       
                       
                        <a href="{{URL('/panel/mesajlar/gelen-mesajlar')}}" class="mesaj-link">
                            <div class="mesaj-buton">
                                <center>
                                    <span class="gri">
                                        <i class="fa fa-envelope"></i>
                                        <span class="mesaj-text">GELEN KUTUSU</span>
                                    </span>
                                </center>
                            </div>
                        </a>
                        <a href="{{URL('panel/mesajlar/gonderilen-mesajlar')}}" class="mesaj-link">
                            <div class="mesaj-buton">
                                <center>
                                    <span class="gri">
                                        <i class="fa fa-envelope-o "></i>
                                        <span class="mesaj-text">GİDEN KUTUSU</span>
                                    </span>
                                </center>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-9">
                    
                        <form>
                           
                        <div class="col-md-3">
                            <select class="form-control input-sm" id="inputGroupSuccess4" style="width:128%" >
                                <option selected disabled="">Mesaj Gönderilecek Öğrenci Seçiniz</option>
                                @foreach($Ogrenciler as $Ogrenci)
                                <option value="{{$Ogrenci->id}}">{{$Ogrenci->Adi}} {{$Ogrenci->Soyadi}}</option>
                                @endforeach
                            </select>
                        </div>
                         <div class="col-md-3" style="margin-left:25px;">
                            <select class="form-control input-sm" id="inputGroupSuccess4" style="width:131%" >
                                <option selected disabled="">Mesaj Gönderilecek İşletmeyi Seçiniz</option>
                                @foreach($Isletmeler as $Isletme)
                                <option value="{{$Isletme->id}}">{{$Isletme->IsletmeAdi}}</option>
                                @endforeach
                            </select>
                        </div>
                         <div class="col-md-3" style="margin-left:31px;">
                            <select class="form-control input-sm" id="inputGroupSuccess4" style="width:125%" >
                                <option selected disabled="">Mesaj Gönderilecek Danışmanı Seçiniz</option>
                                @foreach($Danismanlar as $Danisman)
                                <option value="{{$Ogrenci->id}}">{{$Danisman->Adi}} {{$Danisman->Soyadi}}</option>
                                @endforeach
                            </select>
                        </div>

                            <input type="text" class="arama-input" placeholder="Başlık">
                            <textarea style="height:150px !important;" class="arama-input" placeholder="Mesaj"></textarea>
                            <button type="button" class="btn-krmz-mesaj">GÖNDER</button>
                        </form>
                    
                </div>
                </div>
                <div class="top-10"></div>
            </div>
@stop