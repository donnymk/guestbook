<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <meta charset="UTF-8">
    <title>Buku Tamu BPSDMD Prov. Jateng</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="row header">
                <div class="col-md-1">
                    <img id="logojateng" src="assets/img/logo_jawa_tengah_icon.ico" width="85" height="85" alt="">
                </div>
                <div class="col-md-11" align="left">
                    <h3 style="color: #ac2925"><b>BUKU TAMU</b></h3>
                    <h4 style="color: #204d74">BPSDMD Provinsi Jawa Tengah</h4>
                </div>
            </div>
            <hr>
       
            <form id="data">
                <div class="row alert alert-info">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>No. identitas</label>
                            <input type="text" name="id" id="id" class="form-control" placeholder="KTP, KTM, Pasport, SIM" required="required">                   
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required="required">                    
                        </div>
                        <div class="form-group">
                            <label>Instansi</label>
                            <br>
                            <label>
                                <input name="instansi" value="akademik" id="RadioGroup1_1" required="" type="radio">
                                Akademik&nbsp;
                            </label>
                            <label>
                                <input name="instansi" value="pemerintah" id="RadioGroup1_1" required="" type="radio">
                                Pemerintah&nbsp;
                            </label>
                            <label>
                                <input name="instansi" value="swasta" id="RadioGroup1_1" required="" type="radio">
                                Swasta&nbsp;
                            </label>
                            <label>
                                <input name="instansi" value="individu" id="RadioGroup1_1" required="" type="radio">
                                Individu&nbsp;
                            </label>
                            <label>
                                <input name="instansi" value="lsm / komunitas" id="RadioGroup1_1" required="" type="radio">
                                LSM / Komunitas &nbsp;
                            </label>                    
                        </div>
                        <div class="form-group">
                            <label>Nama instansi / alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Nama instansi atau alamat" required="required">             
                        </div>                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nomor yang bisa dihubungi</label>
                            <input type="text" name="telp" id="telp" class="form-control" placeholder="Nomor telepon atau HP" required="required">                    
                        </div>
                        <div class="form-group">
                            <label>Jenis keperluan</label>
                            <select name="jeniskeperluan" id="jeniskeperluan" class="form-control" required="required">
                                <option value="">--Jenis keperluan--</option>
                                <option value="Anggaran">Anggaran</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Kegiatan">Kegiatan</option>
                                <option value="Aset">Aset</option>
                                <option value="Diklat">Diklat</option>
                                <option value="Sert. kompetensi dan penj. mutu">Sertifikasi kompetensi dan penjaminan mutu</option>
                                <option value="Kerjasama peny. diklat">Kerjasama penyelenggaraan diklat</option>
                                <option value="SDM">SDM</option>
                                <option value="Sewa">Sewa</option>
                                <option value="Kunker">Kunjungan kerja</option>
                                <option value="Magang">Magang</option>
                            </select>
                            <!--<input type="text" name="keperluan">--> 
                        </div>
                        <div class="form-group">
                            <label>Bidang yang dituju</label><br>
                            <label>
                                <input name="bidang" value="sekretariat" id="RadioGroup1_1" required="" type="radio">
                                Sekretariat&nbsp;
                            </label>
                            <label>
                                <input name="bidang" value="pkt" id="RadioGroup1_1" required="" type="radio">
                                PKT &nbsp;
                            </label>
                            <label>
                                <input name="bidang" value="pkjf" id="RadioGroup1_1" required="" type="radio">
                                PKJF &nbsp;
                            </label>
                            <label>
                                <input name="bidang" value="pkm" id="RadioGroup1_1" required="" type="radio">
                                PKM &nbsp;
                            </label>
                            <label>
                                <input name="bidang" value="skpm" id="RadioGroup1_1" required="" type="radio">
                                SKPM &nbsp;
                            </label>                    
                        </div>                        
                    </div>
                    <div class="col-md-4">                        
                         <div class="form-group">
                            <label>Jumlah pengunjung</label>
                            <input type="number" class="form-control" name="jmlpengunjung" id="jmlpengunjung" min="1" max="20" required="required">
                        </div>
                        <div class="form-group" style="text-align:right">
                            <br>
                            <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
                <!--Data buku tamu-->
                <div class="row">
                    <div class="col-md-12 alert-info">
                        <p class="judul"><strong>TAMU</strong></p>
                        <form id="filtertabel" method="post">
                            <div class="form-group form-inline">
                                <select class="form-control input-lg" name="bulan" id="selectbulan">
                                </select>
                                <select class="form-control input-lg" name="tahun" id="selecttahun" required>
                                </select>
                                <button class="btn btn-primary" id="btn-filtertabel">Filter</button>
                                <!--<button class="btn btn-primary" id="btn-print"><span class='glyphicon glyphicon-print' aria-hidden='true'></span> Cetak</button>-->
                            </div>
                        </form>                        
                    </div>                    
                </div>            
        </div>
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>
    <script src="assets/js/highcharts.js" type="text/javascript"></script>
    <script> 

    $(document).ready(function() {
        //deklarasi variabel bulan dan tahun untuk filter
        var angkadepan='0';
        var selected='';
        var divbulan = '';
        var divtahun = '';
        var month = new Array();
        month[0] = "Januari";
        month[1] = "Februari";
        month[2] = "Maret";
        month[3] = "April";
        month[4] = "Mei";
        month[5] = "Juni";
        month[6] = "Juli";
        month[7] = "Agustus";
        month[8] = "September";
        month[9] = "Oktober";
        month[10] = "November";
        month[11] = "Desember";
        var d = new Date();
        var m = d.getMonth();
        var y = d.getFullYear();

        for(jumlah=0;jumlah<month.length;jumlah++){
            if(jumlah>=9){angkadepan='';}
            if(jumlah==m){selected='selected="selected"';}
            else{selected='';}
            divbulan += '<option value="'+angkadepan+(jumlah+1)+'" '+selected+'>'+month[jumlah]+'</option>';
        }
        for(jumlah=2016;jumlah<=(y+1);jumlah++){
            if(jumlah==y){selected='selected="selected"';}
            else{selected='';}
            divtahun += '<option value="'+jumlah+'" '+selected+'>'+jumlah+'</option>'
        }
        //tampilkan bulan dan tahun pada select (combo) field
        document.getElementById('selectbulan').innerHTML = '<option value="">Semua bulan</option>'+divbulan;
        document.getElementById('selecttahun').innerHTML = divtahun;
        
        //aksi jika tombol simpan diklik
        $("#data").submit(function(e){
            e.preventDefault();
             //grab all form data
            var formData = new FormData(this);
            $.ajax({
                url: 'process.php',
                type: 'POST', // Send post data
                data: formData,
                //async: false,
                contentType: false,
                processData: false,                
                success: function(s){
                    if(s=='ok'){
                        swal("Terima Kasih", "", "success");
                        $('#id').val('');
                        $('#nama').val('');
                        $('#alamat').val('');
                        $('#telp').val('');
                        $('#jeniskeperluan').val('');
                        $('#jmlpengunjung').val('');
                        $('input[name="instansi"]').prop('checked', false);
                        $('input[name="bidang"]').prop('checked', false);
                        //muattabel();
                    }
                    else{
                        alert("Gagal disimpan");
                    }

                    //location.reload();
                }
            });
        });
    })
    </script>    
    </body>
</html>
