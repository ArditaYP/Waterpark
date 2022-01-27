<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../dashboard/style.css">
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
                    <a href="">
                        <span class="ti-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-face-smile"></span>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-agenda"></span>
                        <span>mutasi</span>
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

// read data
function readData($result)
{
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
$queryTransaksi = "SELECT * FROM tb_transaksi JOIN tb_pelanggan ON tb_transaksi.idpelanggan = tb_pelanggan.idpelanggan";
$resultTransaksi = mysqli_query($conn, $queryTransaksi);
$readTransaksi = readData($resultTransaksi);

$queryPelanggan = "SELECT * FROM tb_pelanggan";
$resultPelanggan = mysqli_query($conn, $queryPelanggan);
$readPelanggan = readData($resultPelanggan);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transaksi</title>
</head>
<style>
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

<h2>Transaksi</h2>
<button><a href="Thalamancreate.php" class="btn btn-tambah">TambahTransaksi</a></button>
<table width="100%" border=1>
    <tr>
        <td>#</td>
        <td>Tanggal</td>
        <td>Pelanggan</td>
        <td>Kategori</td>
        <td>Total</td>
        <td>Bayar</td>
        <td>Kembali</td>
        <td>aksi</td>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($readTransaksi as $row) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['tgltransaksi'] ?></td>
            <td><?= $row['namalengkap'] ?></td>
            <td><?= $row['kategoripelanggan'] ?></td>
            <td><?= $row['totalbayar'] ?></td>
            <td><?= $row['bayar'] ?></td>
            <td><?= $row['kembali'] ?></td>
            <td>
                <a href="Td.php?id=<?= $row['idtransaksi']; ?>">Detail| </a>
                <a href="Hapus.php?idd=<?= $row['idtransaksi']; ?>">|hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
            
        </main>
        
    </div>
    
</body>
</html>