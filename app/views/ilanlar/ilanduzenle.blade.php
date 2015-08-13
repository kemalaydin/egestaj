@extends('layout2')

@section('title')
İlan Oluştur | Ege Staj
@stop

@section('script')
<script src="//cdn.ckeditor.com/4.4.7/basic/ckeditor.js"></script>
<script>
$(function () {
    CKEDITOR.replace( 'ckeditor' );
  $('[data-toggle="tooltip"]').tooltip();

  $("#form").submit(function(){
    var isChecked = $('#sozlesme').is(':checked');
    if($("[name=Baslik]").val() == ""){
        swal('Başlık Girilmedi','İlanınız İçin Bir Başlık Girmelisiniz',"warning");
    }else if($("[name=Aciklama]").val() == ""){
        swal('İlan Detayı Girilmedi','İlanınız İçin Bir İlan Detayı Girmelisiniz',"warning");
    }else if($("[name=Donem]").val() == ""){
        swal('Dönem Seçilmedi','İlanınız İçin Bir Dönem Seçmelisiniz',"warning");
    }else if($("[name=BolumID]").val() == ""){
        swal('Bölüm Bilgisi Girilmedi','İlanınızın Doğru Öğrencilere Gösterilmesi İçin Bölüm Seçmelisiniz',"warning");
    }else{
        return true;
    }
     return false;
  });
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
                            @foreach($Hesap->HizmetBilgisi as $BolumCek)
                            {{$BolumCek->Bolum}}
                            @endforeach
                            </p> 
                        </center>
                        <div class="top-10"></div>
                        <div class="row">
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('panel/mesajlar')}}" class="sekme-link">
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
                                <a href="{{URL('/panel/isletme/danisman')}}" class="sekme-link">
                                    <i class="fa fa-file-text-o fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">YETKİLİ İLETİŞİM</span>
                                </a>
                            </div>
                            <div class="col-md-12 sekme-buton">
                                <a href="{{URL('/panel/isletme/ilanver')}}" class="sekme-link">
                                    <i class="fa fa-file-text-o fa-2x sekme-icon"></i>
                                    
                                    <span class="sekme-text">İLAN OLUŞTUR</span>
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
                            <p class="box-title"><i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp;İLAN OLUŞTUR</p>
                        </div>
                        <div class="icerik">
                            <div class="row"><br>

                                  @if(Session::get('Basarili') != "")
                                    <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                                @endif
                                @if(Session::get('Uyari') != "")
                                    <div class="alert alert-warning">{{Session::get('Uyari')}}</div>
                                @endif
                            <form method="POST" action="{{URL('panel/ilan/')}}/{{$Ilan->id}}" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT">

                                <input type="hidden" name="UniqID" value="{{$Ilan->UniqID}}" />
                                <div class="col-md-12 m-t-10"> 
                                        @if($Ilan->Onay == 1) 
                                            <div class="alert alert-info">İlan Onaylanmış ve Gösterime Girmiştir. Yapacağınız Değişiklikler Daha Önce Başvurmuş Öğrenciler Tarafından Görülmeye Bilir. Bu Nedenle İlanı Güncelledikten Sonra Başvuran Öğrencilere Mesaj Atmanızı Öneririz</div>
                                        @else 
                                           <div class="alert alert-warning">İlanınız Henüz Onaylanmadı, Yapacağınız Değişiklikler İncelendikten Sonra Yayına Alınacaktır.</div>
                                        @endif
                                </div>

                                

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlan Başlığı : </div>
                                    <div class="col-md-8"><input type="text" class="form-control" value="{{$Ilan->Baslik}}" name="Baslik" /></div>
                                </div>
                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlan Detayı : </div>
                                    <div class="col-md-8"><textarea name="Aciklama" id="ckeditor" class="ckeditor">{{$Ilan->Aciklama}}</textarea></div>
                                </div>

                                 <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Stajyer Dönemi : </div>
                                    <div class="col-md-8">
                                        <select name="Donem" class="form-control" data-toggle="tooltip" data-placement="top" title="Başvuran yada Yönlendirilen Öğrenci İçin Seçtiğiniz Dönem Uyuşmayabilir. Başvuruda Fikir Sahibi Olunabilmesi İçin Dönem Seçmelisiniz">
                                            <option value="" disabled selected>Seçiniz...</option>
                                            @foreach($Donemler as $Donem)
                                                <option value="{{$Donem->id}}" @if($Ilan->Donem == $Donem->id) selected @endif>{{$Donem->Baslangic}} - {{$Donem->Bitis}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlanın Sahibi : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" disabled value="{{Auth::user()->IsletmeAdi}}" /></div>
                                </div>

                                <div class="col-md-12 m-t-10"  data-toggle="tooltip" data-placement="top" title="İlgili Bölüm Sadece İlan Oluşturulurken Seçilebilir.">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlgili Alan : </div>
                                    <div class="col-md-6">
                                        <select class="form-control" disabled>
                                          @foreach($Bolumler as $Alan)
                                                @if($Ilan->BolumID == $Alan->id)
                                                    <option value="{{$Alan->id}}" selected>{{$Alan->Bolum}}</option>
                                                @else
                                                    <option value="{{$Alan->id}}">{{$Alan->Bolum}}</option>
                                                @endif
                                                
                                           @endforeach
                                         </select>  
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10 m-b-10">
                                    <center><input type="submit" class="btn btn-success" value="İlanı Düzenle" /></center>
                                </div>
                            </form>
                                   
                            </div>
                            <br><br>
                         </div> 
                            </div>
                           
                        </div>
                       
                       
        @stop