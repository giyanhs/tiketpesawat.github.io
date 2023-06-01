<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Pemesanan Tiket Pesawat</title>
</head>

<body>

    <?php include 'Penerbangan.php'; ?>

    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-primary text-light">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <strong class="text-light">TRAVEL LINES</strong>
            </a>
    </nav>

    <!-- FORM DAFTAR-->
    <header id="header" class="jumbotron">
        <div class="container py-5">
            <h1 class="text-center" style="color: black;">Pemesanan Tiket Pesawat</h1>
            <section id="tiket" class="tiket">
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST">
                                    <div class="mb-3">
                                        <h5 class="fw-dark text-center">Berikut Pengisian Data Untuk Pembelian Tiket :</h1><br>
                                            <label for="input-nama-maskapai" class="form-label">Nama Maskapai</label>

                                            <select id="input-nama-maskapai" name="nama_maskapai" class="form-select" required>
                                                <option value="" selected>Pilih Maskapai</option>
                                                <option value="Garuda Indonesia">Garuda Indonesia</option>
                                                <option value="Lion Air">Lion Air</option>
                                                <option value="Batik Air">Batik Air</option>
                                            </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="input-bandara-asal" class="form-label">Bandara Asal</label>
                                        <select id="input-bandara-asal" name="bandara_asal" class="form-select" required>
                                            <option value="" selected>Pilih Bandara</option>
                                            <?php foreach ($list_pajak_bandara_asal as $bandara => $harga) : ?>
                                                <option value="<?= $bandara; ?>"><?= $bandara; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="input-bandara-tujuan" class="form-label">Bandara Tujuan</label>
                                        <select id="input-bandara-tujuan" name="bandara_tujuan" class="form-select" required>
                                            <option value="" selected>Pilih Bandara</option>
                                            <?php foreach ($list_pajak_bandara_tujuan as $bandara => $harga) : ?>
                                                <option value="<?= $bandara; ?>"><?= $bandara; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="input-harga-tiket" class="form-label">Harga Tiket</label>
                                        <input name="harga_tiket" type="number" class="form-control" id="input-harga-tiket" placeholder="Harga Tiket" required>
                                    </div>
                                    <button class="btn btn-primary w-100">Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <table class="table table-borderless table-hover my-5">
                                    <tbody>
                                        <h5 class="fw-dark text-center">Hasil Pembelian Tiket :</h1>
                                            <tr>
                                                <th scope="row">Tanggal</th>
                                                <td>:</td>
                                                <td><?= isset($waktu_submit) ? date('d M Y - H:i', $waktu_submit) : 'Kosong'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nama Maskapai</th>
                                                <td>:</td>
                                                <td><?= isset($nama_maskapai) ? $nama_maskapai : 'Kosong'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Asal Penerbangan</th>
                                                <td>:</td>
                                                <td><?= isset($bandara_asal) ? $bandara_asal : 'Kosong'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tujuan Penerbangan</th>
                                                <td>:</td>
                                                <td><?= isset($bandara_tujuan) ? $bandara_tujuan : 'Kosong'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Harga Tiket</th>
                                                <td>:</td>
                                                <td><?= isset($harga_tiket) ? 'Rp ' . number_format($harga_tiket) . ',-' : 'Kosong'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pajak</th>
                                                <td>:</td>
                                                <td><?= isset($pajak_total) ? 'Rp ' . number_format($pajak_total) . ',-' : 'Kosong'; ?></td>
                                            </tr>
                                            <tr class="border-top">
                                                <th scope="row">Total Harga Tiket</th>
                                                <td>:</td>
                                                <td><?= isset($total_harga_tiket) ? 'Rp ' . number_format($total_harga_tiket) . ',-' : 'Kosong'; ?></td>
                                            </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </header>

    <section id="rute" class="rute">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3 pb-4">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover text-center">
                            <h3 class="text-center text-white bg-primary py-2">Daftar Rute Penerbangan</h3><br>
                            <thead>
                                <tr>
                                    <!-- Header tabel data Penerbangan. -->
                                    <th scope="col">No</th>
                                    <th scope="col">Maskapai</th>
                                    <th scope="col">Asal Penerbangan</th>
                                    <th scope="col">Tujuan Penerbangan</th>
                                    <th scope="col">Harga Tiket</th>
                                    <th scope="col">Pajak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Garuda Indonesia</td>
                                    <td>Soekarno-Hatta</td>
                                    <td>Ngurah Rai</td>
                                    <td>Rp. 1.275.000,-</td>
                                    <td>Rp. 150.000,-</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Garuda Indonesia</td>
                                    <td>Husein Sastranegara</td>
                                    <td>Hasanuddin</td>
                                    <td>Rp. 1.178.000,-</td>
                                    <td>Rp. 120.000,-</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Garuda Indonesia</td>
                                    <td>Abdul Rachman Saleh</td>
                                    <td>Inanwatan</td>
                                    <td>Rp. 1.085.000,-</td>
                                    <td>Rp. 130.000,-</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Lion Air</td>
                                    <td>Soekarno-Hatta</td>
                                    <td>Hasanuddin</td>
                                    <td>Rp. 1.175.000,-</td>
                                    <td>Rp. 135.000,-</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Lion Air</td>
                                    <td>Abdul Rachman Saleh</td>
                                    <td>Sultan Iskandar Muda</td>
                                    <td>Rp. 1.182.000,-</td>
                                    <td>Rp. 100.000,-</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Lion Air</td>
                                    <td>Juanda</td>
                                    <td>Inanwatan</td>
                                    <td>Rp. 1.142.000,-</td>
                                    <td>Rp. 120.000,-</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Batik Air</td>
                                    <td>Soekarno-Hatta</td>
                                    <td>Ngurah Rai</td>
                                    <td>Rp. 1.123.000,-</td>
                                    <td>Rp. 150.000,-</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Batik Air</td>
                                    <td>Husein Sastranegara</td>
                                    <td>Hasanuddin</td>
                                    <td>Rp. 1.105.000,-</td>
                                    <td>Rp. 120.000,-</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Batik Air</td>
                                    <td>Juanda</td>
                                    <td>Ngurah Rai</td>
                                    <td>Rp. 1.021.000,-</td>
                                    <td>Rp. 115.000,-</td>
                                </tr>
</body>
</table>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>