<?php
include 'connection.php';
$search = $_GET['keywoard'];
$query = "SELECT * FROM menu WHERE menu LIKE '%$search%' OR kategori LIKE '%$search%' OR harga LIKE '%$search%'" ;
$menu = mysqli_query($koneksi, $query);
?>
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
    <?php
    $nomor = 1;
    while ($data = mysqli_fetch_array($menu)) {
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
</table>