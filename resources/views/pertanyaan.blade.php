@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="panel panel-default">

            @if($kode != '0013')
            @foreach($pertanyaan as $p)
            <div class="panel-heading">{{$p->Pertanyaan}}</div>

            <form role="form" action="survey" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel-body">

                    <div class="row col-md-3 text-center">

                        <input type="hidden" value="{{$juklak1}}" id="juklak1" name="juklak1">
                        <input type="hidden" value="{{$juklak2}}" id="juklak2" name="juklak2">
                        <input type="hidden" value="{{$juklak3}}" id="juklak3" name="juklak3">
                        <input type="hidden" value="{{$juklak4}}" id="juklak4" name="juklak4">
                        <input type="hidden" value="{{$juklak5}}" id="juklak5" name="juklak5">
                        <input type="hidden" value="{{$juklak6}}" id="juklak6" name="juklak6">
                        <input type="hidden" value="{{$p->juklak_izin_terbatas}}" id="resjuklak1" name="resjuklak1">
                        <input type="hidden" value="{{$p->juklak_keluarga_sakit}}" id="resjuklak2" name="resjuklak2">
                        <input type="hidden" value="{{$p->juklak_karyawan_sakit}}" id="resjuklak3" name="resjuklak3">
                        <input type="hidden" value="{{$p->juklak_gejala_covid}}" id="resjuklak4" name="resjuklak4">
                        <input type="hidden" value="{{$p->juklak_luar_kota}}" id="resjuklak5" name="resjuklak5">
                        <input type="hidden" value="{{$p->juklak_keluarga_resikotinggi}}" id="resjuklak6" name="resjuklak6">

                        <input type="hidden" value="{{$tidakmasuk}}" id="tidakmasuk" name="tidakmasuk">

                        <input type="hidden" value="{{$kode+1}}" id="kode" name="kode">
                        <input type="hidden" value="{{$bobot}}" id="bobot" name="bobot">
                        <input type="hidden" value="{{$noreg}}" id="noreg" name="noreg">
                        <input type="hidden" value="{{$p->resume_karyawan}}" id="resume" name="resume">
                        <button type="submit" id="jawab" name="jawab" value="Iya--{{$p->bobot_iya}}" class="btn btn-success">Iya</button>
                        <button type="submit" id="jawab" name="jawab" value="Tidak--{{$p->bobot_tidak}}" class="btn btn-success">Tidak</button>
                    </div>
                </div>
            </form>
            @endforeach
            @else

            @foreach($pertanyaan as $p)
            <div class="panel-heading">{{$p->Pertanyaan}}</div>

            <form role="form" action="selesai" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel-body">

                    <div class="row col-md-3 text-center">

                        <input type="hidden" value="{{$juklak1}}" id="juklak1" name="juklak1">
                        <input type="hidden" value="{{$juklak2}}" id="juklak2" name="juklak2">
                        <input type="hidden" value="{{$juklak3}}" id="juklak3" name="juklak3">
                        <input type="hidden" value="{{$juklak4}}" id="juklak4" name="juklak4">
                        <input type="hidden" value="{{$juklak5}}" id="juklak5" name="juklak5">
                        <input type="hidden" value="{{$juklak6}}" id="juklak6" name="juklak6">
                        <input type="hidden" value="{{$p->juklak_izin_terbatas}}" id="resjuklak1" name="resjuklak1">
                        <input type="hidden" value="{{$p->juklak_keluarga_sakit}}" id="resjuklak2" name="resjuklak2">
                        <input type="hidden" value="{{$p->juklak_karyawan_sakit}}" id="resjuklak3" name="resjuklak3">
                        <input type="hidden" value="{{$p->juklak_gejala_covid}}" id="resjuklak4" name="resjuklak4">
                        <input type="hidden" value="{{$p->juklak_luar_kota}}" id="resjuklak5" name="resjuklak5">
                        <input type="hidden" value="{{$p->juklak_keluarga_resikotinggi}}" id="resjuklak6" name="resjuklak6">

                        <input type="hidden" value="{{$tidakmasuk}}" id="tidakmasuk" name="tidakmasuk">

                        <input type="hidden" value="{{$kode+1}}" id="kode" name="kode">
                        <input type="hidden" value="{{$bobot}}" id="bobot" name="bobot">
                        <input type="hidden" value="{{$noreg}}" id="noreg" name="noreg">
                        <input type="hidden" value="{{$p->resume_karyawan}}" id="resume" name="resume">
                        <button type="submit" id="jawab" name="jawab" value="Iya--{{$p->bobot_iya}}" class="btn btn-success">Iya</button>
                        <button type="submit" id="jawab" name="jawab" value="Tidak--{{$p->bobot_tidak}}" class="btn btn-success">Tidak</button>
                    </div>
                </div>
            </form>
            @endforeach
            @endif


        </div>
    </div>
</div>
@endsection