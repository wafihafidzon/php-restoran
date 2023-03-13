<?php
include '../public/function.php';
if(!isset($_SESSION['on'])){
    header("Location: index.php");
}
if(isset($_POST['submit'])){
    unset($_SESSION['on']);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Data Mahasiswa</title>
    <style>
        .mx-auto {
            width: 800px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <div class="card">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Admin Restoran Padang</a>
                <form action="" method="post">
                    <input type="submit" name="submit" value="Logout">
                </form>
            </div>
        </nav>
            <div class="card-body">

                <?php
                if (@$gagal) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= @$gagal ?>
                    </div>
                <?php
                }
                if (@$sukses) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= @$sukses ?>
                    </div>
                <?php } ?>

                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Menu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="menu" id="menu" value="<?= @$menu ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="kategori">
                                <option selected>- Kategori -</option>
                                <option value="Makanan" <?php if(@$kategori == 'Makanan') echo "Selected" ?>>Makanan</option>
                                <option value="Minuman" <?php if(@$kategori == 'Minuman') echo "Selected" ?>>Minuman</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga" id="harga" value="<?= @$harga ?>">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="Kirim" name="kirim">
                    <input type="submit" class="btn btn-danger" value="Edit" onclick="return confirm('Yakin Akan Mengedit Data')" name="edit">
                </form>
            </div>
        </div>
        <!-- untuk menampilkan data -->



        <div class="card">
            <div class="card-header">Menu Makanan</div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-primary text-center">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Fungsi</th>
                        </tr>
                    </thead>
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
                            <td scope="col"><?= @$data['harga'] ?></td>
                            <td scope="col">
                                <a href="admin.php?op=edit&id=<?php echo $data['id'] ?>"><button type="submit" class="btn btn-warning" value="Edit" name="edit">edit</button></a>
                                <a href="admin.php?op=delete&id=<?php echo $data['id'] ?>"><button type="submit" onclick="return confirm('Yakin Akan Menghapus Data')" class="btn btn-danger" value="Delete" name="delete">delete</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>