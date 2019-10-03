<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

date_default_timezone_set('Asia/Jakarta');
$tanggalskr=date('Y-m-d H:i:s');
$bulanskr=date('m');
$tahunskr=date('Y');

$id=$_POST['id'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$instansi=$_POST['instansi'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];
$jeniskeperluan=$_POST['jeniskeperluan'];
$bidang=$_POST['bidang'];
$jmlpengunjung=$_POST['jmlpengunjung'];

if($jeniskeperluan=="Magang" or $jeniskeperluan=="Sewa"){
    include 'plugins/config.php';
    include 'plugins/config2.php';
    $insert = "INSERT INTO tamu(timestamp,nama,jk,alamat,noid,profil,telp,bidang,keperluan,jmlpengunjung) VALUES(now(),'".$nama."','".$jk."','".$alamat."','".$id."','".$instansi."','".$telp."','".$bidang."','".$jeniskeperluan."','".$jmlpengunjung."')";
    $insert2 = "INSERT INTO permohonan(tanggal,media,nama,alamat,lembaga,telp,informasi,status) VALUES(now(),'1','".$nama."','".$alamat."','".$instansi."','".$telp."','".$jeniskeperluan."','1')";
    mysqli_query($con, $insert);
    mysqli_query($con2, $insert2);
        echo 'ok';
}
else{
    include 'plugins/config.php';
    $insert = "INSERT INTO tamu(timestamp,nama,jk,alamat,noid,profil,telp,bidang,keperluan,jmlpengunjung) VALUES(now(),'".$nama."','".$jk."','".$alamat."','".$id."','".$instansi."','".$telp."','".$bidang."','".$jeniskeperluan."','".$jmlpengunjung."')";
    mysqli_query($con, $insert);
    echo 'ok';
}
    //echo $tanggalskr;