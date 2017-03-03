@if(null !== ($namaDepan = function(){
                                       $kk = $umat->keluarga->id_keluarga;
                                       $keluarga = \stjo\Model\Keluarga::find($kk);
                                        $nmKK = $keluarga->kepalaKeluarga->nama_depan;
                                        return $nmKK;
                                   }))
    true
    {!! $namaDepan !!}
    {{--{!! function(){--}}
    {{--$kk = $umat->keluarga->id_keluarga;--}}
    {{--$keluarga = \stjo\Model\Keluarga::find($kk);--}}
    {{--$nmKK = $keluarga->kepalaKeluarga->nama_depan;--}}
    {{--return $nmKK;--}}
    {{--} !!}--}}
    {{--{!! ' ' !!}--}}
    {{--{!! function(){--}}
    {{--$ky = $umat->keluarga->id_keluarga;--}}
    {{--$keluargas = \stjo\Model\Keluarga::find($ky);--}}
    {{--$nmKK = $keluarga->kepalaKeluarga->nama_belakang;--}}
    {{--return $nmKK; } !!}--}}
@endif