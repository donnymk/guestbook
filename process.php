 <?php
include 'plugins/config.php';
date_default_timezone_set('Asia/Jakarta');
//$tanggalskr=date('Y-m-d H:i:s');
//$bulanskr=date('m');
//$tahunskr=date('Y');

// fungsi untuk menampung variabel input dan melakukan sanitasi inputan
function post_var_cegah_mySQLInjection($con, $variabel_post, $tipe_konstanta) {
    switch($tipe_konstanta){
        case 'string':
            $string__ = filter_input(INPUT_POST, $variabel_post, FILTER_SANITIZE_STRING);
            break;
        case 'number_int':
            $string__ = filter_input(INPUT_POST, $variabel_post, FILTER_SANITIZE_NUMBER_INT);
            break;
        case 'number_float':
            $string__ = filter_input(INPUT_POST, $variabel_post, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            break;        
        default:
            $string__ = filter_input(INPUT_POST, $variabel_post, FILTER_SANITIZE_STRING);
            break;
    }
    // Mencegah MySQL injection
    $string_ = stripslashes($string__);
    $string = mysqli_real_escape_string($con, $string_);

    return $string;
}

$id = post_var_cegah_mySQLInjection($con, "id", "number_int");
$nama = post_var_cegah_mySQLInjection($con, "nama", "string");
$instansi = post_var_cegah_mySQLInjection($con, "instansi", "string");
$alamat = post_var_cegah_mySQLInjection($con, "alamat", "string");
$telp = post_var_cegah_mySQLInjection($con, "telp", "string");
$jeniskeperluan = post_var_cegah_mySQLInjection($con, "jeniskeperluan", "string");
$keperluan = post_var_cegah_mySQLInjection($con, "keperluan", "string");
$bidang = post_var_cegah_mySQLInjection($con, "bidang", "string");
$jmlpengunjung = post_var_cegah_mySQLInjection($con, "jmlpengunjung", "number_int");

// jika keperluannya Sewa
if($jeniskeperluan == "Sewa"){
    $insert = "INSERT INTO tamu(timestamp, nama, alamat, noid, profil, telp, bidang, keperluan, keperluan_detail, jmlpengunjung) VALUES(now(), '".$nama."', '".$alamat."', '".$id."', '".$instansi."', '".$telp."', '".$bidang."', '".$jeniskeperluan."', '".$keperluan."', '".$jmlpengunjung."')";
       
    $insert2 = "INSERT INTO permohonan(tanggal, media, nama, alamat, lembaga, noktp, telp, email, pekerjaan, informasi, tujuan, status, balasan) VALUES(now(), '1', '".$nama."', '".$alamat."', '".$instansi."', '', '".$telp."', '', '', '".$jeniskeperluan."', 'Informasi sewa gedung / asrama', '1', '')";        
}

//jika keperluannya Magang atau Penelitian
elseif($jeniskeperluan == "Magang/Penelitian"){
    $insert = "INSERT INTO tamu(timestamp, nama, alamat, noid, profil, telp, bidang, keperluan, keperluan_detail, jmlpengunjung) VALUES(now(), '".$nama."', '".$alamat."', '".$id."', '".$instansi."', '".$telp."', '".$bidang."', '".$jeniskeperluan."', '".$keperluan."', '".$jmlpengunjung."')";
    
    $insert2 = "INSERT INTO permohonan(tanggal, media, nama, alamat, lembaga, noktp, telp, email, pekerjaan, informasi, tujuan, status, balasan) VALUES(now(), '1', '".$nama."', '".$alamat."', '".$instansi."', '', '".$telp."', '', '', '".$jeniskeperluan."', '".$keperluan."', '1', '')";
}

else{
    $insert = "INSERT INTO tamu(timestamp, nama, alamat, noid, profil, telp, bidang, keperluan, keperluan_detail, jmlpengunjung) VALUES(now(), '".$nama."', '".$alamat."', '".$id."', '".$instansi."', '".$telp."', '".$bidang."', '".$jeniskeperluan."', '".$keperluan."', '".$jmlpengunjung."')";
    
    //sebagai flag aja (tanpa insert permohonan)
    $insert2 = "SELECT now()";
}


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