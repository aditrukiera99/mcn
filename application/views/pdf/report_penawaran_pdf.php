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

<div style="width: 100%;padding-top: 10px;padding-bottom: 10px;padding-left:5px;">
	<table style="width: 100%;">
		<tr>
			<td style="width: 20%;text-align:left;font-size: 15px;">Nomor</td>
			<td style="width: 80%;text-align:left;font-size: 15px;">: <?=$dt->NO_BUKTI;?></td>
		</tr>
		<tr>
			<td style="width: 20%;text-align:left;font-size: 15px;">Perihal</td>
			<td style="width: 80%;text-align:left;font-size: 15px;">: <b><?=$dt->MEMO;?></b></td>
		</tr>
		
	</table>
</div>

<div style="width: 100%;padding-top: 10px;padding-bottom: 10px;padding-left:5px;">
	<table style="width: 100%;">
		<tr>
			<td style="width: 20%;text-align:left;font-size: 15px;">Kepada Yth</td>
			<td style="width: 80%;text-align:left;font-size: 15px;"></td>
		</tr>
		<tr>
			<td style="width: 20%;text-align:left;font-size: 15px;" colspan="2"><?=$dt->PELANGGAN;?></td>
		</tr>
		<tr>
			<td style="width: 20%;text-align:left;font-size: 15px;" colspan="2">Up. <?=$dt->UP;?></td>
		</tr>
		<tr>
			<td colspan="2">Dengan Hormat,</td>
		</tr>
		<tr>
			<td colspan="2">Bersama Ini Kami PT.MITRA CENTRAL NIAGA mengajukan penawaran BBM Solar Industri / HSD, perusahaan yang bapak/ibu pimpin, Barang yang ditawarkan sebagai berikut</td>
		</tr>
	</table>
</div>
<br>
<div>
<table style="border-collapse: collapse;border:1px solid black;">
	
		<tr>
			<th style="width: 5%;padding: 5px 5px 5px 5px; " align="center">NO</th>
			<th style="width: 30%;padding: 5px 5px 5px 5px; " align="center">URAIAN</th>
			<th style="width: 30%;padding: 5px 5px 5px 5px; " align="center">MINIMAL ORDER</th>
			<th style="width: 30%;padding: 5px 5px 5px 5px; " align="center">HARGA SATUAN(Rp)/Liter</th>
			
		</tr>
		<?PHP foreach ($dt_det as $key => $row) { ?>
		<tr>
			<td style="border:1px solid black;padding: 5px 5px 5px 5px;"><?=$key+1;?></td>
			<td style="border:1px solid black;padding: 5px 5px 5px 5px;"><?=$row->NAMA_PRODUK;?></td>
			<td style="border:1px solid black;padding: 5px 5px 5px 5px;"><?=$row->QTY;?> Liter</td>
			<td style="border:1px solid black;padding: 5px 5px 5px 5px;">Rp. <?=number_format($row->HARGA_SATUAN);?></td>		
		</tr>
		<?PHP } ?>
</table>
</div>
<br>
<table>
	<tr>
		<td>Keterangan</td>
	</tr>
	<tr>
		<td>- Harga Include PPN</td>
	</tr>
	<tr>
		<td>- Delivery time maksimal 3 Hari setelah PO kami terima</td>
	</tr>
	<tr>
		<td>- PO mohon mencantumkan No. Telepon penerima barang dan alamat pengiriman</td>
	</tr>
	<tr>
		<td>- Pembayaran termin 14 hari via transfer ke Mandiri No.Rek. 1440077799937 An.PT.Mitra Centra Niaga atau Via Bank BCA No.Rek.0893799777 An. PT Mitra Central Niaga.</td>
	</tr>
	<tr>
		<td>- Contact Person : Dede (081234203219).</td>
	</tr>
	<tr>
		<td>- Validasi penawaran sampai dengan 14 Januari 2018.</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Demikian surat penawaran ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih</td>
	</tr>
	

</table>
<br>
<div style="height: 200px;">
<table style="width: 100%;border-collapse: collapse;">
	<tr>
		<td style="width: 50%;">&nbsp;</td>
		<td style="width: 50%">
			<table>
			<tr>
				<td>Pasuruan, 06 Februari 2018</td>
			</tr>
			<tr>
				<td>Hormat Kami</td>
			</tr>
			<tr>
				<td>PT. MITRA CENTRAL NIAGA</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>ABD.WACHID</td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</div>



<?PHP
    $width_custom = 14;
    $height_custom = 8.50;
    
    $content = ob_get_clean();
    $width_in_inches = $width_custom;
    $height_in_inches = $height_custom;
    $width_in_mm = $width_in_inches * 21.4;
    $height_in_mm = $height_in_inches * 19.8;
    $html2pdf = new HTML2PDF('P','A4','en');
    $html2pdf->pdf->SetTitle('Cetak Purchase Order');
    $html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('cetak_purchase_order.pdf');
?>