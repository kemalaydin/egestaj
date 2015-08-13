
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
                            <p class="box-title-2" style="float:left;"><i class="fa fa-file-text-o"></i><b> {{$GonderilenIcerik->Baslik}}</b></p>
                                  <form method="POST" action="" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">

                                    <button type="submit" style="float:right; margin-top: 13px; margin-right: 5px;" href="#" class="btn btn-danger">Sil</button>
                                     </form>
                            
                        	</div>
                                
                            
                            <div style="padding: 10px !important">
                            	{{$GonderilenIcerik->Icerik}}
                            </div><br>
                           
                            
                            <div class="alt-bilgi"><b>Gönderilme Tarihi : </b> 
                                
                                    {{substr($GonderilenIcerik->created_at,0,10)}}
                                
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                                

                                <b>Gönderilen : </b>
                                    @foreach($GonderilenIcerik->MesajAlanBilgisi as $Alan)
                                    
                                    	@if($Alan->Yetki == "1")
											{{$Alan->Adi}} {{$Alan->Soyadi}}<a style="color:#3b7893; font-style:none;" href="{{URL('panel/ogrencidetay')}}/{{$GonderilenIcerik->Alan}}">(Profili)</a> 
                                    	@elseif($Alan->Yetki == "2")
											{{$Alan->IsletmeAdi}}<a style="color:#3b7893; font-style:none;" href="{{URL('panel/isletmedetay')}}/{{$GonderilenIcerik->Alan}}">(Profili)</a> 
                                    	@elseif($Alan->Yetki == "3")
                                     		{{$Alan->Adi}} {{$Alan->Soyadi}}<a style="color:#3b7893; font-style:none;" href="{{URL('panel/danismandetay')}}/{{$GonderilenIcerik->Alan}}">(Profili)</a>  
                                   		@endif
                                    @endforeach
                                    
                            </div>

                        </div>
                        
    </div>
@stop