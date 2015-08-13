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
    }else if(!isChecked){
        swal('Sözleşme Onaylanmadı','Ege Üniversitesi Staj Platformu İlan Yayınlama Sözleşmesini Onaylamanız Gerekmektedir',"warning");
    }else{
        return true;
    }
     return false;
  });
});

$(document).ready(function(){
    $("[name=FakulteID]").on('change', function() {
        var FakulteID = this.value;
        $.ajax({
        type:'POST',
        url:'{{URL('panel/ajaxQuery/ilanFakulte')}}',
        data:'id='+FakulteID,
        success:function(ajaxcevap){
            $("[name=BolumID] option").remove();
             $("[name=BolumID]").append('<option value="">Seçiniz...</option>');
            $.each(ajaxcevap, function(idx, obj) {
                $("[name=BolumID]").append('<option value="'+obj.id+'">'+obj.Bolum+'</option>');
            });
            $.ajax({
                type:'POST',
                url:'{{URL('panel/ajaxQuery/ilanDonem')}}',
                data:'id='+FakulteID,
                success:function(ajaxcevap2){
                    $("[name=Donem] option").remove();
                     $("[name=Donem]").append('<option value="">Seçiniz...</option>');
                    $.each(ajaxcevap2, function(idx, obj) {
                        $("[name=Donem]").append('<option value="'+obj.id+'">'+obj.Baslangic+' - '+obj.Bitis+'</option>');
                    });
                }
            });
        }
        });
    });
});

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
                            <p class="box-title"><i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp;İLAN OLUŞTUR</p>
                        </div>
                        <div class="icerik">
                            <div class="row"><br>
                                 @if($IlanSayisi >= Auth::user()->IlanSiniri)
                                        <div class="alert alert-info">Sistem Üzerinde Aktif Dönem İçin İlan Ekleme Sınırınız Dolmuştur. ( İzin Verilen İlan Sayısı : {{Auth::user()->IlanSiniri}}, Eklenen İlan : {{$IlanSayisi}} ) Ekstra İlan Talebi İçin Staj Departmanıyla İletişime Geçiniz. <a href="panel/mesajlar/create">[ Staj Departmanından Ekstra İlan Talep Etmek İçin TIKLAYINIZ ]</a></div>
                                 @else

                                  @if(Session::get('Basarili') != "")
                                    <div class="alert alert-success">{{Session::get('Basarili')}}</div>
                                @endif
                                @if(Session::get('Uyari') != "")
                                    <div class="alert alert-warning">{{Session::get('Uyari')}}</div>
                                @endif
                            <form action="{{URL('panel/ilan')}}"  id="form" method="post" name="form"> 
                                <input type="hidden" name="UniqID" value="{{Str_random(11)}}" />
                                <div class="col-md-12 m-t-10"> 
                                        @if(Auth::user()->Onay == 1) 
                                            <div class="alert alert-info">Hesabınız <b>Onaylı</b>. İlan Oluşturulduğunda Onay Gerektirmeden Öğrenci ve Danışmanlara Gösterilecektir</div>
                                        @else 
                                           <div class="alert alert-warning">Hesabınız henüz <b>Onaylanmadı</b>. İlan Oluşturulduktan Sonra Staj Departmanı Tarafından Onay Bekleyecek, İçeriği Uygun Bulunduğu Taktirde Yayına Alınacaktır.</div>
                                        @endif
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlgili Fakülte : </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="FakulteID" data-toggle="tooltip" data-placement="top">
                                                <option value="">Seçiniz...</option>

                                          @foreach($Fakulteler as $Fakulte)
                                                <option value="{{$Fakulte->id}}">{{$Fakulte->Fakulte}}</option>
                                          @endforeach
                                         </select>  
                                    </div>
                                </div>
                                
                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlgili Alan : </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="BolumID" data-toggle="tooltip" data-placement="top" title="Almak İstediğiniz Stajyer İçin Bir Alan Seçmelisiniz. İlan Sadece Seçeceğiniz Alan Öğrencileri ve Danışmanlarına Gösterilecektir.">
                                          <option>Fakülte Seçiniz</option>
                                         </select>  
                                    </div>
                                </div>
                                

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlan Başlığı : </div>
                                    <div class="col-md-8"><input type="text" class="form-control" name="Baslik" /></div>
                                </div>
                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlan Detayı : </div>
                                    <div class="col-md-8"><textarea name="Aciklama" id="ckeditor" class="ckeditor"></textarea></div>
                                </div>

                                 <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">Stajyer Dönemi : </div>
                                    <div class="col-md-8">
                                        <select name="Donem" class="form-control" data-toggle="tooltip" data-placement="top" title="Başvuran yada Yönlendirilen Öğrenci İçin Seçtiğiniz Dönem Uyuşmayabilir. Başvuruda Fikir Sahibi Olunabilmesi İçin Dönem Seçmelisiniz">
                                            <option value="" disabled selected>Fakülte Seçiniz...</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-10">  
                                    <div class="col-md-3" style="margin-top:5px; text-align: right;">İlanın Sahibi : </div>
                                    <div class="col-md-6"><input type="text" class="form-control" disabled value="{{Auth::user()->IsletmeAdi}}" /></div>
                                </div>

                                

                                <div class="col-md-12 m-t-10"><div class="alert alert-info"><center>Bu İlanı Oluşturduğunuzda <b>{{Auth::user()->IlanSiniri-$IlanSayisi-1}}</b> Adet İlan Hakkınız Kalacak</center></div></div>

                                <div class="col-md-12"><center><input type="checkbox" name="Sozlesme" id="sozlesme" value="1" /> <label for="sozlesme">Ege Üniversitesi Staj Platformu <a href="{{URL('/ilan-kosullari')}}" target="_blank">İlan Koşulları</a>nı Kabul Ediyorum.</label></center></div>
                                <div class="col-md-12 m-t-10 m-b-10">
                                    <center><input type="submit" class="btn btn-success" value="İlan Oluştur" /></center>
                                </div>
                            </form>

                        @endif
                                   
                            </div>
                            <br><br>
                         </div> 
                            </div>
                           
                        </div>
                       
                       
        @stop