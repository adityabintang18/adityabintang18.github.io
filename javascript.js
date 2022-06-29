$(function () {
    $('#tgl_lapor').datepicker();
    $('#tgl_jt').datepicker();
    $('#tgl_bayar').datepicker();
    var pilih_wp = document.querySelector('#pilih_wp');
    dselect(pilih_wp, {search: true});
    var cleave = new Cleave('#pajak', {
        numeral: true,
        numeralDecimalMark: 'thousand',
        delimiter: ','
    });

    //console.log(cleave);

    $('#pilih_wp').change(function () {
        let wp = $('#pilih_wp option:selected').val();
        //console.log(wp);
        $.ajax({
            type: 'GET',
            url: `http://123.231.238.67:10000/getdata.php?function=get_wp_name&wp=${wp}`,
            header: {
                "Access-Control-Request-Headers": "*"
            },
            success: function (response) {
                console.log(response);
                $('#alamat_wp').val(response['data'][0]['ALAMAT_PEMILIK']);
                $('#npwpd_wp').val(response['data'][0]['NPWPD']);
                $('#nama_op').val(response['data'][0]['NM_USAHA']);
                $('#alamat_op').val(response['data'][0]['ALAMAT_USAHA']);
				$('#jenis_op').val(response['data'][0]['NM_PAJAK_USAHA']);
            }
        });

    })
    $('#tarif').keyup(function (event) {
        var pendapatan = $('#pendapatan').val();
        var get_tarif = $('#tarif').val();
        var tarif = get_tarif / 100;
        var pajak = pendapatan * tarif;
        $('#pajak').val(pajak);
    });
    $('#pendapatan').keyup(function (event) {
        var pendapatan = $('#pendapatan').val();
        var get_tarif = $('#tarif').val();
        var tarif = get_tarif / 100;
        var pajak = pendapatan * tarif;
        $('#pajak').val(pajak);
    });

    

});
function input (){
		const scriptURL = 'https://cors-anywhere.herokuapp.com/https://script.google.com/macros/s/AKfycbyc91LbmyCe_iqL29j_0cF1kxcZ8406qwqBiNX24HYSmEoJAotscaAs-t_BdXURnrD9jA/exec';
		const form = document.forms['submit-to-google-sheet'];
		var no = document.getElementById("no").value;
		var pilih_wp = document.getElementById("pilih_wp").value;
		var alamat_wp = document.getElementById("alamat_wp").value;
		var npwpd_wp = document.getElementById("npwpd_wp").value;
		var nama_op = document.getElementById("nama_op").value;
		var alamat_op = document.getElementById("alamat_op").value;
		var jenis_op = document.getElementById("jenis_op").value;
		var bulan = document.getElementById("pilih_bulan").value;
		var periode = document.getElementById("periode").value;
		var tgl_lapor = document.getElementById("tgl_lapor").value;
		var tgl_jt = document.getElementById("tgl_jt").value;
		var pendapatan = document.getElementById("pendapatan").value;
		var tarif = document.getElementById("tarif").value;
		var pajak = document.getElementById("pajak").value;
		var tgl_bayar = document.getElementById("tgl_bayar").value;
		var denda = document.getElementById("denda").value;
		var btnSimpan = document.querySelector(".btn-simpan");
		var btnLoading = document.querySelector(".btn-loading");
		if (no != "" && pilih_wp!="" && alamat_wp !="" && npwpd_wp!="" && nama_op!="" && alamat_op!="" && jenis_op!="" && bulan!="" && periode!="" && tgl_lapor!="" && tgl_jt!="" && pendapatan!="" && tarif!="" && pajak!="" && tgl_bayar!="" && denda!="" ) {
			btnSimpan.classList.toggle('d-none');
			btnLoading.classList.toggle('d-none');
			form.addEventListener('click', e => {
				console.log(e);
				e.preventDefault() 
				fetch(scriptURL, { method: 'POST', header:{'Origin':'x-requested-with'},body: new FormData(form)}) 
				.then(response => {
					btnSimpan.classList.toggle('d-none');
					btnLoading.classList.toggle('d-none');
					alert('Data berhasil disimpan');
					console.log('Success!', response);
					})
				.catch(error => console.error('Error!', error.message))
				});
        // console.log($('[name="alamat_wp"]').val());
		//alert('masuk pak eko');
		}else{
			alert('Anda harus mengisi data dengan lengkap !');
		}
};
