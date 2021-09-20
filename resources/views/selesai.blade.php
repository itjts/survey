@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="panel panel-default">

           
            @foreach($batasrendah as $r)
            @foreach($batassedang as $s)

            @if($bobot < $r->batas_atas)
                <div class="panel-heading">Resiko Anda terpapar COVID-19 cukup <b>ODR Rendah</b> Tetap jaga kesehatan dan pertahankan pola hidup sehat agar terhindar dari penyakit</div>
                @elseif($bobot < $s->batas_atas) <div class="panel-heading">Resiko Anda terpapar COVID-19 dalam kategori <b>ODR Sedang</b> Jaga kesehatan dan pola hidup agar terhindar dari COVID-19
                    </div>
                    @elseif($tidakmasuk == '1')
                    <div class="panel-heading">Resiko Anda terpapar COVID'19 dalam kategori <b>ODR Tinggi</b>. Pastikan membaca prosedur & jalankan protokol kesehatan.<br><b>ANDA TIDAK DIIZINKAN MASUK</b><br>lakukan konfirmasi hasil oleh atasan (isolasi mandiri selama 7 hari)." +
                        "<b>diperbolehkan masuk kembali atas pertimbangan tim gugus</b></div>
                    @else

                    <div class="panel-heading">Resiko Anda terpapar COVID-19 dalam kategori <b>ODR Tinggi</b>. Pastikan membaca prosedur & jalankan protokol kesehatan. ubah pola hidup anda agar tetap terhindah dari COVID-19</div>
                    
                    @endif

                    @endforeach
                    @endforeach

                    <form role="form" action="login" method="get" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="panel-body">

                            <div class="row col-md-3 text-center">

                                <input type="submit" id="simpan" name="simpan" value="Selesai" class="btn btn-success"></input>

                            </div>
                        </div>
                    </form>


        </div>
    </div>
</div>
@endsection