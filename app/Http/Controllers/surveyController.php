<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use DB;

class surveyController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function home(Request $request)
    {
        $noreg = $request->input('noreg');
        $nowa = $request->input('nowa');

        $values = [$noreg];

        $user = DB::select('select * from survey_loginIOS where noreg = ?', $values);
        $pertanyaan = DB::select('select * from survey_dataPertanyaan1 order by kode');

        $cek = DB::select('select count(*) as jumlah from survey_dataLogin where noreg = ?', $values);

        foreach ($user as $u) {
            if ($u->nama != '') {
                $imei = 'imei' . $noreg;
                $values2 = [$imei, $noreg, $u->nama, $nowa];
                foreach ($cek as $c) {
                    if ($c->jumlah == 0) {
                        DB::insert('insert into survey_dataLogin(IMEI, NOREG, NAMA, NoHP) values(?, ?, ?, ?)', $values2);
                    }
                }
            }
        }


        return view('survey', ['user' => $user, 'pertanyaan' => $pertanyaan]);
    }

    public function survey(Request $request)
    {
        $juklak1 = $request->input('juklak1');
        $juklak2 = $request->input('juklak2');
        $juklak3 = $request->input('juklak3');
        $juklak4 = $request->input('juklak4');
        $juklak5 = $request->input('juklak5');
        $juklak6 = $request->input('juklak6');
        $resjuklak1 = $request->input('resjuklak1');
        $resjuklak2 = $request->input('resjuklak2');
        $resjuklak3 = $request->input('resjuklak3');
        $resjuklak4 = $request->input('resjuklak4');
        $resjuklak5 = $request->input('resjuklak5');
        $resjuklak6 = $request->input('resjuklak6');

        $tidakmasuk = $request->input('tidakmasuk');
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $tgl = date('Ymd');
        $noreg = $request->input('noreg');
        $jawab = '0';
        $iyatidak = '';
        $jawaban = $request->input('jawab');
        if ($jawaban != null) {
            $split = explode('--', $jawaban, 2);
            $iyatidak = $split[0];
            $jawab = $split[1];
        }
        $resume = '';
        $tempbobot = $request->input('bobot');
        $bobot = $jawab + $tempbobot;
        $fkode = $request->input('kode');
        $kode = sprintf("%04d", $fkode);
        $kodesurvey = $noreg . '-' . $tgl;
        $imei = 'imei' . $noreg;
        $akode = $fkode - 1;
        $bkode = sprintf("%04d", $akode);
        if ($jawab == 36) {
            $tidakmasuk = '1';
        }
        if ($jawab > 0) {
            $resume = $request->input('resume');

            if ($resjuklak1 == '1') {
                $juklak1 = '1';
            }
            if ($resjuklak2 == '1') {
                $juklak2 = '1';
            }
            if ($resjuklak3 == '1') {
                $juklak3 = '1';
            }
            if ($resjuklak4 == '1') {
                $juklak4 = '1';
            }
            if ($resjuklak5 == '1') {
                $juklak5 = '1';
            }
            if ($resjuklak6 == '1') {
                $juklak6 = '1';
            }
        } else {
            $resume = '0';
        }
        $rendah = 'Resiko Rendah';
        $sedang = 'Resiko Sedang';
        $tinggi = 'Resiko Tinggi';
        $arrendah = [$rendah];
        $arsedang = [$sedang];
        $artinggi = [$tinggi];


        $values = [$kode];

        if ($jawaban != null) {
            $insert = [$imei, $bkode, $iyatidak, $date, $resume, $kodesurvey];

            DB::insert('insert into survey_hasilDetail values(?, ?, ?, ?, ?, ?)', $insert);
        }

        $batasrendah = DB::select('select batas_atas from survey_batas where kategori = ?', $arrendah);
        $batassedang = DB::select('select batas_atas from survey_batas where kategori = ?', $arsedang);
        $batastinggi = DB::select('select batas_atas from survey_batas where kategori = ?', $artinggi);
        $pertanyaan = DB::select('select * from survey_dataPertanyaan1 where Kode = ?', $values);
        return view('pertanyaan', ['pertanyaan' => $pertanyaan, 'kode' => $kode, 'bobot' => $bobot, 'noreg' => $noreg], [
            'batasrendah' => $batasrendah, 'batassedang' => $batassedang, 'batastinggi' => $batastinggi,
            'juklak1' => $juklak1, 'juklak2' => $juklak2, 'juklak3' => $juklak3, 'juklak4' => $juklak4, 'juklak5' => $juklak5, 'juklak6' => $juklak6, 'tidakmasuk' => $tidakmasuk
        ]);
    }

    public function selesai(Request $request)
    {
        $juklak1 = $request->input('juklak1');
        $juklak2 = $request->input('juklak2');
        $juklak3 = $request->input('juklak3');
        $juklak4 = $request->input('juklak4');
        $juklak5 = $request->input('juklak5');
        $juklak6 = $request->input('juklak6');
        $resjuklak1 = $request->input('resjuklak1');
        $resjuklak2 = $request->input('resjuklak2');
        $resjuklak3 = $request->input('resjuklak3');
        $resjuklak4 = $request->input('resjuklak4');
        $resjuklak5 = $request->input('resjuklak5');
        $resjuklak6 = $request->input('resjuklak6');

        $tidakmasuk = $request->input('tidakmasuk');
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $tgl = date('Ymd');
        $noreg = $request->input('noreg');
        $jawab = '0';
        $iyatidak = '';
        $jawaban = $request->input('jawab');
        if ($jawaban != null) {
            $split = explode('--', $jawaban, 2);
            $iyatidak = $split[0];
            $jawab = $split[1];
        }
        $resume = '';
        $tempbobot = $request->input('bobot');
        $bobot = $jawab + $tempbobot;
        $fkode = $request->input('kode');
        $kode = sprintf("%04d", $fkode);
        $kodesurvey = $noreg . '-' . $tgl . '-1';
        $imei = 'imei' . $noreg;
        $akode = $fkode - 1;
        $bkode = sprintf("%04d", $akode);
        if ($jawab == 36) {
            $tidakmasuk = '1';
        }
        if ($jawab > 0) {
            $resume = $request->input('resume');

            if ($resjuklak1 == '1') {
                $juklak1 = '1';
            }
            if ($resjuklak2 == '1') {
                $juklak2 = '1';
            }
            if ($resjuklak3 == '1') {
                $juklak3 = '1';
            }
            if ($resjuklak4 == '1') {
                $juklak4 = '1';
            }
            if ($resjuklak5 == '1') {
                $juklak5 = '1';
            }
            if ($resjuklak6 == '1') {
                $juklak6 = '1';
            }
        } else {
            $resume = '0';
        }
        $rendah = 'Resiko Rendah';
        $sedang = 'Resiko Sedang';
        $tinggi = 'Resiko Tinggi';
        $arrendah = [$rendah];
        $arsedang = [$sedang];
        $artinggi = [$tinggi];

        $kategori = '';
        if ($bobot < 2) {
            $kategori = 'Rendah';
        } elseif ($bobot < 4) {
            $kategori = 'Sedang';
        } else {
            $kategori = 'Tinggi';
        }

        $tinlanjut = '0';
        if ($tidakmasuk == '1') {
            $tinlanjut = 'Tidak Boleh Masuk';
        }


        $values = [$kode];

        if ($jawaban != null) {
            $insert = [$imei, $bkode, $iyatidak, $date, $resume, $kodesurvey];
            $finalinsert = [$imei, $bobot, $date, $kategori, '0', $juklak1, $juklak2, $juklak3, $juklak4, $juklak5, $juklak6, $kodesurvey, $tinlanjut];

            DB::insert('insert into survey_hasilDetail values(?, ?, ?, ?, ?, ?)', $insert);
            DB::insert('insert into survey_dataSurvey values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $finalinsert);
        }

        $batasrendah = DB::select('select batas_atas from survey_batas where kategori = ?', $arrendah);
        $batassedang = DB::select('select batas_atas from survey_batas where kategori = ?', $arsedang);
        $batastinggi = DB::select('select batas_atas from survey_batas where kategori = ?', $artinggi);

        return view('selesai', ['bobot' => $bobot, 'noreg' => $noreg], [
            'batasrendah' => $batasrendah, 'batassedang' => $batassedang, 'batastinggi' => $batastinggi,
            'juklak1' => $juklak1, 'juklak2' => $juklak2, 'juklak3' => $juklak3, 'juklak4' => $juklak4, 'juklak5' => $juklak5, 'juklak6' => $juklak6, 'tidakmasuk' => $tidakmasuk
        ]);
    }
}
