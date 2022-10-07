<?php

//format tanggal format aslinya return $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." WIB";
date_default_timezone_set("Asia/Jakarta");


function tgl_indonesia($date)
{
    $Bulan = array(
        "Jan", "Feb", "Mar", "Apr",
        "Mei", "Jun", "Jul", "Agu", "Sep",
        "Okt", "Nov", "Des"
    );
    $Hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $waktu = substr($date, 11, 5);
    $hari = date("w", strtotime($date));
    // return $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . "<br>" . $waktu;
    return $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " | " . $waktu . " WIB";
}

function time_ago($tgl)
{
    $time = strtotime($tgl);
    $time_difference = time() - $time;

    if ($time_difference < 1) {
        return 'less than 1 second ago';
    }
    $condition = array(
        12 * 30 * 24 * 60 * 60 =>  'year',
        30 * 24 * 60 * 60       =>  'month',
        24 * 60 * 60            =>  'day',
        60 * 60                 =>  'hour',
        60                      =>  'minute',
        1                       =>  'second'
    );

    foreach ($condition as $secs => $str) {
        $d = $time_difference / $secs;

        if ($d >= 1) {
            $t = round($d);
            return $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
            // return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
        }
    }
}
