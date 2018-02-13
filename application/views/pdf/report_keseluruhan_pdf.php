<?PHP  
ob_start(); 
$base_url2 =  ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ?  "https" : "http");
$base_url2 .=  "://".$_SERVER['HTTP_HOST'];
$base_url2 .=  str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
?>
<style>
.gridth {
    background: #1793d1;
    vertical-align: middle;
    color : #FFF;
    text-align: center;
    height: 30px;
    font-size: 20px;
}
.gridtd {
    background: #FFFFF0;
    vertical-align: middle;
    font-size: 14px;
    height: 30px;
    padding-left: 5px;
    padding-right: 5px;
}
.grid {
    background: #FAEBD7;
    border-collapse: collapse;
}

.grid td, table th {
  border: 1px solid black;
}

.kolom_header{
    height: 20px;
}

</style>

<table style="width: 100%">
	<tr>
		<td><img style="width: 100%;height: 100px;" src="<?=$base_url2;?>assets/img/header.png"></td>
	</tr>
	
</table>


<br>
<table align="center">
    <tr>
        <td align="center">
            <h4 style="text-decoration: underline;">
                <u>LAPORAN KESELURUHAN</u>
            </h4>
            
        </td>
    </tr>
</table>
<br>
<br>

<br>
<div>
<table style="border-collapse: collapse;border:1px solid black;">
	
		<tr>
			<th style="padding: 5px 5px 5px 5px; " align="center">Tanggal</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">No.Do</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Nopol</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Broker</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Pelanggan dan Tujuan</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Volume</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Harga Beli</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Harga Jual</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Harga Invoice</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Ppn/Non Ppn</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Cash Back</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Profit</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Tempo</th>
			<th style="padding: 5px 5px 5px 5px; " align="center">Ket</th>
			
		</tr>
		<tr>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">08-01-2018</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">No.Do</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">N 2819 CA</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">Aditya</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">CV. ADITAMA CENTRA</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">5000</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">Rp.5.000</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">Rp.4.700</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">Rp.5.000</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">Non</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">300</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">100</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">Ket</td>
			<td style="padding: 5px 5px 5px 5px;border:1px solid black; " align="center">Tempo</td>
			
		</tr>
		
		
</table>
</div>
<br>





<?PHP
    $width_custom = 14;
    $height_custom = 8.50;
    
    $content = ob_get_clean();
    $width_in_inches = $width_custom;
    $height_in_inches = $height_custom;
    $width_in_mm = $width_in_inches * 21.4;
    $height_in_mm = $height_in_inches * 19.8;
    $html2pdf = new HTML2PDF('L','A4','en');
    $html2pdf->pdf->SetTitle('Cetak Ringkasan Keseluruhan');
    $html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('cetak_ringkasan_keseluruhan.pdf');
?>