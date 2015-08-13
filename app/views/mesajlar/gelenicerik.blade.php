@extends('layout2')

@section('title')
{{Auth::user()->Adi.' '.Auth::user()->Soyadi}}  Mesajlar İçerik Sayfası | Ege Staj
@stop

@section('script')
<script>
    @if(Session::get('ogryok') != "")
        $(document).ready(function(){swal('Öğrenci Bulunamadı','{{Session::get('ogryok')}}','info');}); 
        @endif
</script>
@stop

@section('content')
<div class="icerik">  
                            <div class="baslik-2">
                            <p class="box-title-2" style="float:left;"><i class="fa fa-file-text-o"></i><b> {{$GelenIcerik->Baslik}}</b></p>
                                  <form method="POST" action="{{URL('/panel/mesajlar/gelensil')}}/{{$GelenIcerik->id}}" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">

                                   <button type="submit" style="float:right; margin-top: 13px; margin-right: 5px;" href="#" class="btn btn-danger">Sil</button>
                                     </form>
                            
                        </div>

                                
                            
                            <div style="padding: 10px !important">{{$GelenIcerik->Icerik}}</div><br>
                           
                            
                            <div class="alt-bilgi"><b>Gönderilme Tarihi : </b> 
                                
                                    {{substr($GelenIcerik->created_at,0,10)}}
                                
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                                

                                <b>Gönderen  : </b>
                                    
                                    @foreach($GelenIcerik->MesajGonderenBilgisi as $GonderenKim) 
                                    
                                    @if($GonderenKim->Yetki == "1")
                                    {{$GonderenKim->Adi}} {{$GonderenKim->Soyadi}}
                                        <a style="color:#3b7893; font-style:none;" href="{{URL('panel/ogrencidetay')}}/{{$GelenIcerik->Gonderen}}">(Profili)</a>  
                                    @elseif($GonderenKim->Yetki == "2")
                                    {{$GonderenKim->IsletmeAdi}}
                                        <a style="color:#3b7893; font-style:none;" href="{{URL('panel/isletmedetay')}}/{{$GelenIcerik->Gonderen}}">(Profili)</a>  
                                    @elseif($GonderenKim->Yetki == "3")
                                    {{$GonderenKim->Adi}} {{$GonderenKim->Soyadi}}
                                        <a style="color:#3b7893; font-style:none;" href="{{URL('panel/danismandetay')}}/{{$GelenIcerik->Gonderen}}">(Profili)</a>  
                                    @endif
                                    @endforeach
                                    
                            </div>

                        </div>
                        
    </div>
@stop