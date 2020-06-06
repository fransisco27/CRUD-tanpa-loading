<?php
    session_start();
    include 'koneksi.php';

    $id = stripslashes(strip_tags(htmlspecialchars($_POST["id"] ,ENT_QUOTES)));
    $nama_siswa = stripslashes(strip_tags(htmlspecialchars($_POST["nama_siswa"] ,ENT_QUOTES)));
    $jk = stripslashes(strip_tags(htmlspecialchars($_POST["jenis_kelamin"] ,ENT_QUOTES)));
    $alamat = stripslashes(strip_tags(htmlspecialchars($_POST["alamat"] ,ENT_QUOTES)));
    $jurusan = stripslashes(strip_tags(htmlspecialchars($_POST["jurusan"] ,ENT_QUOTES)));
    $tgl_masuk = stripslashes(strip_tags(htmlspecialchars($_POST["tanggal_masuk"] ,ENT_QUOTES)));

    if($id == ""){
        $query = "INSERT INTO tbl_siswa (nama_siswa, alamat, jurusan, jenis_kelamin, tanggal_masuk) VALUES (?, ?, ?, ?, ?)";
        $prepare1 = $db1->prepare($query);
        $prepare1->bind_param("sssss", $nama_siswa, $alamat, $jurusan, $jk, $tgl_masuk);
        $prepare1->execute();
    }else{
        $query = "UPDATE tbl_siswa SET nama_siswa=?, alamat=?, jurusan=?, jenis_kelamin=?, tanggal_masuk=? WHERE id=?";
        $prepare1 = $db1->prepare($query);
        $prepare1->bind_param("sssssi", $nama_siswa, $alamat, $jurusan, $jk, $tgl_masuk, $id);
        $prepare1->execute();
    }

    echo json_encode(['success' => "Sukses"]);

    $db1->close();

?>