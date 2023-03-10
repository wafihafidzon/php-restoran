<?php
include 'function.php';
// $jumlah = $_POST['jumlah'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .mx-auto {
            width: 800px;
        }
    </style>
</head>

<body>
    <?php
    if (!empty($_SESSION['cart'])) {
    ?>
        <div class="mx-auto">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Checkout</a>
                <form action="index.php" class="d-flex">
                    <input class="btn btn-outline-success" value="Menu" type="submit">
                </form>
            </div>
                <table class="table">
                        <thead class="table-primary text-center">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php
                        $nomor = 1;
                        foreach ($_SESSION['cart'] as $cart => $val) {
                            $subtotal = $val['harga'] * $val['jumlah'];
                        ?>
                            <tr class="text-center">
                                <td scope="row"><?= @$nomor++ ?></td>
                                <td ><?= @$val['menu'] ?></td>
                                <td ><?= @$val['kategori'] ?></td>
                                <td ><?= @$val['harga'] ?></td>
                                <td ><?= $val['jumlah'] ?> buah</td>
                                <td >Rp.<?= @$subtotal ?></td>
                                <td>
                                <a href="function.php?op=cartbatal&id=<?php echo @$val['id'] ?>"><button type="submit" class="btn btn-danger" value="Edit" name="edit">Batal</button></a>
                                </td>
                            </tr>
                        <?php 
                    @$total += $subtotal;
                    }
                    ?>
                    <tr>
                    <td colspan="5" class="text-center fw-bold" >Totalnya adalah </td>
                    <td class="text-center fw-bold" >Rp.<?= $total ?></td>
                    
                    <td><a href="pdf/pdf.php?op=makanan"><button type="submit" class="btn btn-warning" value="Delete" name="cetak">Cetak Makanan</button></a></td>
                    <td><a href="pdf/pdf.php?op=minuman"><button type="submit" class="btn btn-warning" value="Delete" name="cetak">Cetak Minuman</button></a></td>
                </tr>
                    </table>
        </div>
    <?php
    } else {
        echo "Belum ada produk yang dipilih"; ?>
    <a href="index.php" ><button class="btn btn-primary">Menu</button></a>
    <?php
    }
    ?>
</body>

</html>