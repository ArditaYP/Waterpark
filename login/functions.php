<?php
require '../connection.php';

// daftar tabel yang tersedia di databass
$tb_user = "tb_user";

// function dd, berguna untuk debuging 
function dd($data)
{
    var_dump($data);
    die;
}

/**
 * insert data kedalam database
 * cek apakah button telah ditekan
 */
if (isset($_POST['tambahBtn'])) {

    /** 
     * Refrensi:
     * www.php.net/manual/en
     */
    // memasukan data post ke variable lokal
    $email = htmlspecialchars($_POST['email']);
    $nama = htmlspecialchars($_POST['nama']);
    $password = $_POST['password'];

    /**
     * Urutan field:
     * id, email, nama, password
     */
    $dataUser = "INSERT INTO $tb_user VALUES('', '$email', '$nama', '$password')";

    // dd(mysqli_query($conn, $dataUser));

    // jika data berhasil ditambahkan
    if (mysqli_query($conn, $dataUser)) {
        // feedback ke user (banyak cara untuk memberi feedback pada user, ini salah satunya)
        // tidak mendapatkan feedback? perbaiki sendiri awokaowkawokawok
        echo '<script>
            alert("Data berhasil ditambahkan");
            </script>';
        header("Location: ../frontend/src/index.html");
    } else {
        // feedback ke user (banyak cara untuk memberi feedback pada user, ini salah satunya)
        echo '<script>
            alert("Data gagal ditambahkan");
            </script>';
        header("Location: ../frontend/src/index.html");
    }
}

/**
 * login 
 * cek apakah button telah ditekan
 */
if (isset($_POST['masukBtn'])) {

    /** 
     * Refrensi:
     * www.php.net/manual/en
     */
    // memasukan data post ke variable lokal
    $nama = ($_POST['nama']);
    $password = ($_POST['password']);
    // menimpa tabel sebelumnya
    $tb_user = mysqli_query($conn, "SELECT * FROM tb_user WHERE nama = '$nama'");
    $result = mysqli_num_rows($tb_user);
    $check = $tb_user->fetch_assoc();
    // kenapa ada bagian oop "->fetch_assoc"? ane gatau gimana jelasinnya, Refrensi: Web Programming Unpas bag. OOP Php
    // bagi ane, daripada buat variable yang menampung "mysqli_query($conn, $tb_user)" mending ane langsung aja kasih "->fetch_assoc" hehe
    // ada beragam cara, hasilnya sama kok

    // cek nama
    if ($result > 0) {
        $realpasswordChecker = mysqli_fetch_assoc($tb_user);

        // dd(password_hash($password, PASSWORD_DEFAULT));
        //cek password
        if ($password ==  $realpasswordChecker['password']) {
            $_SESSION['leveluser'] = $check['leveluser'];
            // masuk halaman
            header("Location: ../frontend/src/index.html");
        } else {
            echo '<script>
        alert("Masukkan Password dengan benar!");
        </script>';
        }
    } else {
        echo '<script>
        alert("Masukkan Nama dengan benar!");
        </script>';
    }
}
