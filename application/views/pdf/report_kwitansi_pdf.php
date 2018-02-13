<?PHP  
ob_start(); 
$base_url2 =  ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ?  "https" : "http");
$base_url2 .=  "://".$_SERVER['HTTP_HOST'];
$base_url2 .=  str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
?>
<head>

  
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"><title>Cetak Kwitansi</title>
  

  
  
  <style>
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 10mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 257mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
  </style>
 <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>
  </head>
<body>
  <?PHP 
$bulan_kas = date("m",strtotime($dt->TGL_TRX));
$bulan_kas = tgl_to_romawi($bulan_kas);
$tahun_kas = date("Y",strtotime($dt->TGL_TRX));

$no_bukti_real = $dt->NO_BUKTI."/KW/MCN.PAS/".$bulan_kas."/".$tahun_kas;
$no_bukti_real2 = $dt->NO_BUKTI."/INV/MCN.PAS/".$bulan_kas."/".$tahun_kas;

function tgl_to_romawi($var){
  if($var == "01"){
    $var = "I";
   } else if($var == "02"){
    $var = "II";
   } else if($var == "03"){
    $var = "III";
   } else if($var == "04"){
    $var = "IV";
   } else if($var == "05"){
    $var = "V";
   } else if($var == "06"){
    $var = "VI";
   } else if($var == "07"){
    $var = "VII";
   } else if($var == "08"){
    $var = "VIII";
   } else if($var == "09"){
    $var = "IX";
   } else if($var == "10"){
    $var = "X";
   } else if($var == "11"){
    $var = "XI";
   } else if($var == "12"){
    $var = "XII";
   }

   return $var;
}
?>

<?PHP 
$harga_satuan  =  $dt_det->HARGA_INVOICE/1.1;
$harga_satuan2 =  $dt_det->HARGA_INVOICE - $harga_satuan;
?>

<font face="helvetica">
<div class="page">
<table style="text-align: left; width: 100%; margin-left: auto; margin-right: auto;" border="0" cellpadding="0">
  <tbody>
    <tr>
      <td style="vertical-align: middle; width: 133px; text-align: center;"><img style="width: 45px; height: 450px;" alt="" src="<?=$base_url2;?>assets/img/mcn-2.png"><br>
      </td>
      <td style="vertical-align: top;">
      <h1 style="text-align: center;">KWITANSI</h1>
      <table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td style="width: 150px;">NO<br>
            </td>
            <td style="width: 0px;">:<br>
            </td>
            <td style="vertical-align: top;"><?=$no_bukti_real;?>    </td>
          </tr>
          <tr>
            <td style="width: 150px;">Telah diterima dari<br>
            </td>
            <td style="width: 0px;">:<br>
            </td>
            <td style="vertical-align: top; width: 397px;"><?=$dt->PELANGGAN;?>          </td>
          </tr>
          <tr>
            <td style="width: 150px;">Uang Sejumlah<br>
            </td>
            <td style="width: 0px;">:<br>
            </td>
            <td style="vertical-align: top; width: 397px;"> <?PHP echo terbilang($dt_det->HARGA_INVOICE * $dt_det->QTY, $style=3); ?> Rupiah     <br>
            </td>
          </tr>
          <tr>
            <td style="width: 150px;">Untuk Pembayaran<br>
            </td>
            <td style="width: 0px;">:<br>
            </td>
            <td style="vertical-align: top; width: 397px;"><?=$dt_det->NAMA_PRODUK;?> 
            </td>
          </tr>
          <tr>
            <td style="width: 150px;">Dengan Rincian sbb<br>
            </td>
            <td style="width: 0px;"><br>
            </td>
            <td style="vertical-align: top; width: 397px;"><br>
            </td>
          </tr>
          <tr>
            <td style="width: 150px;">Invoice No.<br>
            </td>
            <td style="vertical-align: top; width: 0px;">:<br>
            </td>
            <td style="vertical-align: top;"> <?=$no_bukti_real2;?>    </td>
          </tr>
          <tr>
            <td style="width: 150px;">Volume<br>
            </td>
            <td style="vertical-align: top; width: 0px;">:<br>
            </td>
            <td style="vertical-align: top;"><?=number_format($dt_det->QTY);?> Liter </td>
          </tr>
          <tr>
            <td style="width: 150px;">Harga satuan<br>
            </td>
            <td style="vertical-align: top; width: 0px;">:<br>
            </td>
            <td style="vertical-align: top;">Rp.  <span style="width: 9%; position: absolute; text-align: right;"> <?=number_format($harga_satuan, 2, ',', '.');?></span>
          </td></tr>
          <tr>
            <td style="width: 150px;">Discount<br>
            </td>
            <td style="vertical-align: top; width: 0px;">:<br>
            </td>
            <td style="vertical-align: top;">Rp.<br>
            </td>
          </tr>
          <tr>
            <td style="width: 150px;">Sub Total<br>
            </td>
            <td style="vertical-align: top; width: 0px;">:<br>
            </td>
            <td style="vertical-align: top;">Rp.  <span style="width: 9%; position: absolute; text-align: right;"><?=number_format($harga_satuan * $dt_det->QTY, 2, ',', '.');?></span>
          </td></tr>
          <tr>
            <td style="width: 150px;">PPn<br>
            </td>
            <td style="vertical-align: top; width: 0px;">:<br>
            </td>
            <td style="vertical-align: top;">Rp. <span style="width: 9%; position: absolute; text-align: right;"> <?=number_format($harga_satuan2 * $dt_det->QTY, 2, ',', '.');?></span>
          </td></tr>
          <tr>
            <td style="width: 150px;">Biaya Kirim<br>
            </td>
            <td style="vertical-align: top; width: 0px;">:<br>
            </td>
            <td style="vertical-align: top;">Rp.<br>
            </td>
          </tr>
          <tr>
            <td style="width: 150px;">Total<br>
            </td>
            <td style="vertical-align: top; width: 0px;">:<br>
            </td>
            <td style="vertical-align: top;">Rp. <span style="width: 9%; position: absolute; text-align: right;"><?=number_format($dt_det->HARGA_INVOICE*$dt_det->QTY, 2, ',', '.');?></span>
          </td></tr>
        </tbody>
      </table>
      <table style="text-align: left; width: 100%; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td style="vertical-align: middle; width: 307px; text-align: center;"><h3></h3>
            </td>
            <td style="vertical-align: top; width: 244px; text-align: center;">Pasuruan, <?PHP echo date("d F Y",strtotime($dt->TGL_KWI)); ?>  <br>
            <br>
			<br>
			<br>
            <img src="<?=$base_url2;?>assets/img/stempelMCN2.jpg" style="width: 50%;  ">
            <br>
            <span style="text-decoration: underline;">ABD. Wachid</span><br>
            <small>Pimpinan</small><br>
            </td>
          </tr>
        </tbody>
      </table>
      <br>

      </td>
    </tr>
  </tbody>
</table>
</div>

<br>

<br>
</font>
</body>


<?PHP 
function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }     
        return $temp;
}


function terbilang($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;
}
?>