<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://123.231.238.67:10000/getdata.php?function=get_wp',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response, TRUE);
$result = $data['data'];


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SSPD Manual</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            crossorigin="anonymous">
        <link
            rel="stylesheet"
            href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
        <script src="javascript.js"></script>
        <script>
		.disclamer {display :none; }
		</script>
    </head>
    <body >
        <nav class="navbar bg-light">
            <div class="container">
                <a class="navbar-brand">Input Data SSPD</a>
            </div>
        </nav>

        <section class="container py-5">
		<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
  Data berhasil <strong>disimpan!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <form name="submit-to-google-sheet">
                <div class="row form-group">
				<div class="mb-3">
                    <label class="form-label" for="name">Nomor Daftar</label>
                    <input
                        class="form-control"
                        id="no"
                        name="no"
                        type="text"
                        value = "<?php echo($id[0]+1);?>"/>
                </div>
                    <div class="mb-3">
                        <label class="form-label" for="name">Nama Wajib Pajak</label>
                        <select name="nama_wp" class="form-select" id="pilih_wp">
                            <option value="">Pilih WP</option>
                            <?php 
						foreach($result as $row) 
						{ echo $item['NM_USAHA']; echo '<option value="'.$row['NM_USAHA'].'">'.$row['NM_USAHA'].'</option>'; } 
						?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">Alamat Wajib Pajak</label>
                    <input
                        class="form-control"
                        id="alamat_wp"
                        name="alamat_wp"
                        type="text"
                        placeholder="Alamat WP"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">NPWPD Wajib Pajak</label>
                    <input
                        class="form-control"
                        id="npwpd_wp"
                        name="npwpd"
                        type="text"
                        placeholder="NPWPD WP"/>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="name">Nama Objek Pajak</label>
                    <input
                        class="form-control"
                        id="nama_op"
                        name="nama_op"
                        type="text"
                        placeholder="Nama OP"/>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="name">Alamat Objek Pajak</label>
                    <input
                        class="form-control"
                        id="alamat_op"
                        name="alamat_op"
                        type="text"
                        placeholder="Alamat OP"/>
                </div>
				<div class="mb-3">
                    <label class="form-label" for="name">Jenis Objek Pajak</label>
                    <input
                        class="form-control"
                        id="jenis_op"
                        name="jenis_op"
                        type="text"
                        placeholder="Jenis OP"/>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label" for="name">Periode Pajak</label>
                        <select name="periode" class="form-select" id="pilih_bulan">
                            <option value="">Pilih Bulan</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="name">Tahun Periode</label>
                        <input
                            class="form-control"
                            id="periode"
                            name="tahun"
                            type="number"
                            placeholder="Input Tahun"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label" for="name">Tanggal Pelaporan</label>
                        <div class="input-group date" id="tgl_lapor">
                            <input type="text" class="form-control" name="tgl_lapor">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <label class="form-label" for="name">Tanggal Jatuh Tempo</label>
                        <div class="input-group date" id="tgl_jt">
                            <input type="text" class="form-control" name="tgl_jatuh_tempo">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">Total Pendapatan</label>
                    <div class="input-group">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                Rp.
                            </span>
                        </span>
                        <input
                            class="form-control"
                            id="pendapatan"
                            name="pengenaan"
                            type="number"
                            placeholder="Total Pendapatan"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col col-lg-2">
                        <label class="form-label" for="name">Tarif</label>
                        <div class="input-group">
                            <input
                                class="form-control"
                                id="tarif"
                                name="tarif"
                                type="number"
                                placeholder="Tarif"/>
                            <span class="input-group-append">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-percent"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <label class="form-label" for="name">Ketetapan Pajak</label>
                        <div class="input-group">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white">
                                    Rp.
                                </span>
                            </span>
                            <input
                                class="form-control"
                                id="pajak"
                                name="ketetapan"
                                type="number"
                                placeholder="Ketetapan Pajak"/>
                        </div>

                    </div>
                </div>
                <div class="row mb-3">
                    <label class="form-label" for="name">Tanggal Pembayaran</label>
                    <div class="input-group date" id="tgl_bayar">
                        <input type="text" class="form-control" name="tgl_bayar">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">Denda</label>
                    <div class="input-group">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                Rp.
                            </span>
                        </span>
                        <input
                            class="form-control"
                            id="denda"
                            type="number"
                            name="denda"
                            placeholder="Denda"/>
                    </div>
                    
                </div>
                <div class="d-grid gap-2">
				<button type="button" onclick="input()" name="submit-btn" class="btn btn-primary grid gap-2  btn-simpan">Simpan</button>
				<button class="btn btn-primary btn-loading d-none " type="button" disabled>
				<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
				</span>
				Loading...
				</button>
                </div>
				
            </form>
        </section>

        <script type="text/javascript">
            $(function () {
                $('#tgl_lapor').datepicker();
                $('#tgl_jt').datepicker();
                $('#tgl_bayar').datepicker();
            });
        </script>
        <script>
            var pilih_wp = document.querySelector('#pilih_wp');
            dselect(pilih_wp, {search: true});
        </script>
    </body>

</html>