<?php
    //buat koneksi
    $conn=mysqli_connect("localhost","root","","phpdatabase");

    //cek apakah button submit sudah ditekan atau belum
    if(isset($_POST['submit']))
    {
        //cek isi dari post menggunakan vardump
        var_dump($_POST);
        var_dump($_FILES);
        die();

        //ambil data dri tiap elemen dalam form yang disimpan di variable baru
        $nama=$_POST["Nama"];
        $nim=$_POST["Nim"];
        $email=$_POST["Email"];
        $jurusan=$_POST["Jurusan"];
        $gambar=$_POST["Gambar"];

        //query inserrt data
        $query="INSERT INTO mahasiswa 
                VALUES
                ('','$nama','$nim','$email','$jurusan','$gambar')";
        mysqli_query($conn,$query);

        //cek sukses data ditambah menggunakan mysqli_affected_rows
        //jika kita var_dump maka akan muncul int(1) jika gagal maka akan muncul int(-1)
        //var_dump(mysqli_affected_rows($conn));

        if(mysqli_affected_rows($conn)>0)
        {
            echo "data berhasil disimpan";
        }
        else
        {
            echo "gagal!";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <!-- for pada label terhubung dengan id jadi jika tabel nama diklik maka text field nama akan aktif juga -->
            <label for="Nama">Nama</label>
            <!-- untuk pengisian nama besar kecilnya harus sesuai dengan fieldnya -->
            <input type="text" name="Nama" id="Nama">
        </li>
        <li>
            <label for="Nim">Nim</label>
            <input type="text" name="Nim" id="Nim">
        </li>
        <li>
            <label for="Email">Email</label>
            <input type="text" name="Email" id="Email">
        </li>
        <li>
            <label for="Jurusan">Jurusan</label>
            <input type="text" name="Jurusan" id="Jurusan">
        </li>
        <li>
            <label for="Gambar">Gambar</label>
            <input type="file" name="Gambar" id="Gambar">
        </li>
        <li>
            <button type="submit" name="submit">Tambah</button>
        </li>
    </ul>
    </form>
</body>
</html>