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

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-clinic-medical"></span> <span>MyApotek</span></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <?php if ($_SESSION['leveluser'] == '1') : ?>
                    <li>
                        <a href="../Dashboard/index.php" class="active"><span class="las la-home"></span>
                            <span>Home</span></a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="../Obat/Otampilan.php"><span class="las la-stethoscope"></span>
                        <span>Obat</span></a>
                </li>
                <li>
                    <a href="../karyawan/Ktampilan.php"><span class="las la-user"></span>
                        <span>Karyawan</span></a>
                </li>
                <li>
                    <a href="../Pelanggan/Ptampilan.php"><span class="las la-user-injured"></span>
                        <span>Pelanggan</span></a>
                </li>
                <li>
                    <a href="../Transaksi/Ttampilan.php"><span class="las la-history"></span>
                        <span>Transaksi</span></a>
                </li>
                <li>
                    <a href="../Supplier/Stampilan.php"><span class="las la-book-medical"></span>
                        <span>Supplier</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-search"></span>
                        <span>Search</span></a>
                </li>
                <li>
                    <a href="../login/logout.php"><span class="las la-bars"></span>
                        <span>Logout</span></a>
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