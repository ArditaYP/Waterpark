<?php
require_once '../koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../Dashboard/style.css">
</head>

<body>

    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span class="ti-unlink"></span>
                <span>easywire</span>
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="../../src/Index.html">
                        <span class="ti-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="Thalamancreate.php">
                        <span class="ti-face-smile"></span>
                        <span>Transaksi</span>
                    </a>
                </li>
                <?php if ($_SESSION['leveluser'] != '1') : ?>
                    <li>
                        <a href="Ttampilan.php">
                            <span class="ti-agenda"></span>
                            <span>mutasi</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="../../src/logout.php">
                        <span class="ti-sign-out"></span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">

        <header>
            <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Search">
            </div>

            <div class="social-icons">

                <div></div>
            </div>
        </header>

        <main>

            <?php
            // session_start();


            // read data
            function readData($result)
            {
                $rows = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $rows[] = $row;
                }
                return $rows;
            }
            // read data obat
            $queryObat = "SELECT * FROM tb_obat";
            $resultObat = mysqli_query($conn, $queryObat);
            $readObat = readData($resultObat);

            // read data pelanggan
            $querypelanggan = "SELECT * FROM tb_pelanggan";
            $resultpelanggan = mysqli_query($conn, $querypelanggan);
            $readpelanggan = readData($resultpelanggan);

            if (isset($_POST['nextTransaksiButton'])) {
                $_SESSION['tanggalTransaksi'] = $_POST['tanggalTransaksi'];
                $_SESSION['pelanggan'] = $_POST['pelanggan'];
                $_SESSION['kategoriPelangganTransaksi'] = $_POST['kategoriPelangganTransaksi'];

                return header("Location: advance.php");
            }

            ?>

            <!DOCTYPE html>
            <html>

            <head>
                <title>Transaksi</title>

            </head>
            <style>
                form {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                }

                .form-group {
                    display: flex;
                    flex-direction: column;

                }

                form input,
                form select {
                    margin-bottom: 1em;
                    padding: 1em;
                    width: 350px;
                }


                /* button */
                .btn {
                    font-size: 1.2em;
                    padding: .1em .8em;
                    cursor: pointer;
                }

                .btn.btn-tambah {
                    background-color: hsl(0, 0%, 20%);
                    border: none;
                    color: white;
                    border-radius: 4px;
                    outline: none;
                }
            </style>

            <body>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggalTransaksi" id="tanggal" required>
                    </div>
                    <div class="form-group">
                        <select name="pelanggan" id="pelanggan" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            <?php foreach ($readpelanggan as $rp) : ?>
                                <option value="<?= $rp['idpelanggan']; ?>"><?= $rp['namalengkap']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategoriPelanggan">Kategori Pelanggan</label>
                        <input type="text" name="kategoriPelangganTransaksi" id="kategoriPelanggan" required>
                    </div>

                    <button type="submit" name="nextTransaksiButton" class="btn btn-tambah">Selanjutnya &rightarrow;</button>
                </form>


        </main>

    </div>

</body>

</html>