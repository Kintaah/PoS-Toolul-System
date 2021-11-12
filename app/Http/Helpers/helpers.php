<?php

use Illuminate\Support\Arr;

function money_format($number){
    return number_format($number, 0, ',', '.');
}

function terbilang($number){
    $number = abs($number);
    $baca = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas');
    $terbilang = '';

    if($number < 12){ //1 until 11
        $terbilang = ' ' . $baca[$number];
    } elseif($number < 20){ //12 until 19
        $terbilang = terbilang($number - 10) . ' belas';
    } elseif($number < 100){ //20 until 99
        $terbilang = terbilang($number / 10) . ' puluh' . terbilang($number % 10);
    } elseif($number < 200){ //100 until 199
        $terbilang = ' seratus' . terbilang($number - 100) ;
    } elseif($number < 1000){ //200 until 999 
        $terbilang = terbilang($number / 100) . ' ratus' . terbilang($number % 100);
    } elseif ($number < 2000) { // 1.000 - 1.999
        $terbilang = ' seribu' . terbilang($number -1000);
    } elseif ($number < 1000000) { // 2.000 - 999.999
        $terbilang = terbilang($number / 1000) . ' ribu' . terbilang($number % 1000);
    } elseif ($number < 1000000000) { // 1000000 - 999.999.990
        $terbilang = terbilang($number / 1000000) . ' juta' . terbilang($number % 1000000);
    }

    return $terbilang;
}

function tanggal_indonesia($tgl, $tampil_hari = true)
{
    $nama_hari  = array(
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'
    );
    $nama_bulan = array(1 =>
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    $tahun   = substr($tgl, 0, 4);
    $bulan   = $nama_bulan[(int) substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $text    = '';

    if ($tampil_hari) {
        $urutan_hari = date('w', mktime(0,0,0, substr($tgl, 5, 2), $tanggal, $tahun));
        $hari        = $nama_hari[$urutan_hari];
        $text       .= "$hari, $tanggal $bulan $tahun";
    } else {
        $text       .= "$tanggal $bulan $tahun";
    }
    
    return $text; 
}