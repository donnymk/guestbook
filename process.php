 <?php
 
date_default_timezone_set('Asia/Jakarta');
$tanggalskr=date('Y-m-d H:i:s');
$bulanskr=date('m');
$tahunskr=date('Y');

$id=$_POST['id'];
$nama=$_POST['nama'];
$instansi=$_POST['instansi'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];
$jeniskeperluan=$_POST['jeniskeperluan'];
$keperluan=$_POST['keperluan'];
$bidang=$_POST['bidang'];
$jmlpengunjung=$_POST['jmlpengunjung'];

if($jeniskeperluan == "Sewa"){
    $insert = "INSERT INTO tamu(timestamp, nama, alamat, noid, profil, telp, bidang, keperluan, keperluan_detail, jmlpengunjung) VALUES(now(), '".$nama."', '".$alamat."', '".$id."', '".$instansi."', '".$telp."', '".$bidang."', '".$jeniskeperluan."', '".$keperluan."', '".$jmlpengunjung."')";
       
    $insert2 = "INSERT INTO permohonan(tanggal, media, nama, alamat, lembaga, noktp, telp, email, pekerjaan, informasi, tujuan, status, balasan) VALUES(now(), '1', '".$nama."', '".$alamat."', '".$instansi."', '', '".$telp."', '', '', '".$jeniskeperluan."', 'Informasi sewa gedung / asrama', '1', '')";        
}

elseif($jeniskeperluan == "Magang/Penelitian"){
    $insert = "INSERT INTO tamu(timestamp, nama, alamat, noid, profil, telp, bidang, keperluan, keperluan_detail, jmlpengunjung) VALUES(now(), '".$nama."', '".$alamat."', '".$id."', '".$instansi."', '".$telp."', '".$bidang."', '".$jeniskeperluan."', '".$keperluan."', '".$jmlpengunjung."')";
    
    $insert2 = "INSERT INTO permohonan(tanggal, media, nama, alamat, lembaga, noktp, telp, email, pekerjaan, informasi, tujuan, status, balasan) VALUES(now(), '1', '".$nama."', '".$alamat."', '".$instansi."', '', '".$telp."', '', '', '".$jeniskeperluan."', '".$keperluan."', '1', '')";
}

else{
    $insert = "INSERT INTO tamu(timestamp, nama, alamat, noid, profil, telp, bidang, keperluan, keperluan_detail, jmlpengunjung) VALUES(now(), '".$nama."', '".$alamat."', '".$id."', '".$instansi."', '".$telp."', '".$bidang."', '".$jeniskeperluan."', '".$keperluan."', '".$jmlpengunjung."')";
    
    //sebagai flag aja (tanpa insert permohonan)
    $insert2 = "SELECT now()";
}

include 'plugins/config.php';
$insert_tamu = mysqli_query($con, $insert);
include 'plugins/config2.php';
$insert_permohonan = mysqli_query($con2, $insert2);

$flag0 = 0;
$flag1 = 0;
//jika berhasil melakukan query
if($insert_tamu){
    $flag0 = 1;
}
if($insert_permohonan){
    $flag1 = 1;
}
if(($flag0 + $flag1) == 2){
    echo 'success';
}
else{
    echo 'Terjadi kesalahan. '. mysqli_error($con);
    echo 'Terjadi kesalahan. '. mysqli_error($con2);
}