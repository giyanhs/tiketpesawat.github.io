<?php
// date time untuk jakarta indonesia
date_default_timezone_set('Asia/Jakarta');
// list pajak untuk bandara asal
$list_pajak_bandara_asal = [
  'Soekarno Hatta' => 65000,
  'Husein Sastranegara' => 50000,
  'Abdul Rachman Saleh' => 40000,
  'Juanda' => 30000
];
// list pajak untuk bandara tujuan
$list_pajak_bandara_tujuan = [
  'Ngurah Rai' => 85000,
  'Hasanuddin' => 70000,
  'Inanwatan' => 90000,
  'Sultan Iskandar Muda' => 60000
];
// apabila ada post yang dikirim
if ($_POST) {
  // deklarasi variabel untuk setiap input
  $waktu_submit     = time();
  $nama_maskapai    = $_POST['nama_maskapai'];
  $bandara_asal     = $_POST['bandara_asal'];
  $bandara_tujuan   = $_POST['bandara_tujuan'];
  // cek pajak untuk setiap bandara asal dan tujuan
  $pajak_bandara_asal     = $list_pajak_bandara_asal[$bandara_asal];
  $pajak_bandara_tujuan   = $list_pajak_bandara_tujuan[$bandara_tujuan];
  // total pajak, harga tiket dan total harga tiket
  $pajak_total  = $pajak_bandara_asal + $pajak_bandara_tujuan;
  $harga_tiket  = isset($_POST['harga_tiket']) ? ($_POST['harga_tiket'] != '' ? $_POST['harga_tiket'] : 0) : 0;
  $total_harga_tiket  = $harga_tiket + $pajak_total;
}
