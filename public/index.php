<?php
include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Menu Makanan</title>
    <style>
        .mx-auto {
            width: 800px;

        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Menu Restoran Padang</a>
                <a href="cart.php"><button class="btn btn-secondary">Keranjang</button></a>
            </div>
        </nav>
        <form class="d-flex bg-light" method="post">
            <input class="form-control me-2 w-25 m-2" type="search" placeholder="Search" aria-label="Search" id="keywoard">
            <button type="submit" name="cari" id="tombol-cari">Cari</button>
        </form>
        <div id="container">
            <table class="table">
                <thead class="table-primary text-center">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col" style="width: 20%">Menu</th>
                        <th scope="col">Kategori</th>
                        <th scope="col" style="width: 10%">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <!-- <form action="keranjang.php" method="post"> -->
                <?php
                $qread = "SELECT * FROM menu";
                $q1 = mysqli_query($koneksi, $qread);
                $nomor = 1;
                while ($data = mysqli_fetch_array($q1)) {
                ?>
                    <tr class="text-center">
                        <td scope="col"><?= @$nomor++ ?></td>
                        <td scope="col"><?= @$data['menu'] ?></td>
                        <td scope="col"><?= @$data['kategori'] ?></td>
                        <td scope="col">
                            <input type="number" class="form-control col-xs-2" value="1" id="jumlah-<?= @$nomor ?>">
                        </td>
                        <td scope="col">Rp.<?= @$data['harga'] ?></td>
                        <td><button class="btn btn-warning" id="submit" onclick="javascript:window.location='function.php?op=cart&id=<?= $data['id'] ?>&jml=' + document.getElementById('jumlah-<?= @$nomor ?>').value">Tambah</button></td>
                    </tr>
                <?php } ?>
                <!-- </form> -->
            </table>
        </div>
    </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="jquery.js"></script>
</body>

</html>