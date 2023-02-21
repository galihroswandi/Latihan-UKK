<?php

function koneksi(){

    date_default_timezone_set('Asia/Jakarta');

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'db_spp';

    $koneksi = mysqli_connect($host, $user, $pass, $db_name);

    if(!$koneksi){
        return false;
    }

    return $koneksi;
}

function getData($sql){
    
    $koneksi = koneksi();

    $query = mysqli_query($koneksi, $sql);

    $data = [];
    while($result = mysqli_fetch_array($query)){
        $data[] = $result;
    }

    return $data;
}