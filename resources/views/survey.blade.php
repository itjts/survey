@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">Survey ini dilakukan sebagai kesadaran diri akan pentingnya pola hidup sehat dan agar terhindar
                dari COVID'19 yang mudah menular. Mari putuskan rantai penyebaran COVID'19 bersama-sama<br><br>Kejujuran dalam mengisi survey, menyelamatkan diri sendiri, keluarga, teman, rekan kerja, dan Perusahaan serta Negara dari COVID'19</div>

            @foreach($user as $s)
            <form role="form" action="survey" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel-body">

                    <div class="row col-md-3 text-center">
                        <input type="hidden" value="{{$s->nama}}" id="nama" name="nama">
                        <input type="hidden" value="{{$s->noreg}}" id="noreg" name="noreg">
                        <input type="hidden" value="1" id="kode" name="kode">
                        <input type="hidden" value="0" id="tidakmasuk" name="tidakmasuk">
                        <input type="hidden" value="0" id="juklak1" name="juklak1">
                        <input type="hidden" value="0" id="juklak2" name="juklak2">
                        <input type="hidden" value="0" id="juklak3" name="juklak3">
                        <input type="hidden" value="0" id="juklak4" name="juklak4">
                        <input type="hidden" value="0" id="juklak5" name="juklak5">
                        <input type="hidden" value="0" id="juklak6" name="juklak6">
                        <input type="submit" value="Mulai Survey" class="btn btn-success"></input>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection