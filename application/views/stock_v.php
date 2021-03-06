<style type="text/css">
.recent_add td{
	background: #CDE69C;
}

#tes td {
	vertical-align: middle;
}
</style>

<div class="row-fluid ">
	<div class="span12">
		<div class="primary-head">
			<h3 class="page-header"> <i class="icon-minus"></i> Stock </h3>			
			<button data-toggle='modal' data-target='#laporan_modal' type="button" class="btn btn-warning view_data" style="float: right; margin-right: 10px;"> 
				<i class="icon-print" style="color: #FFF; font-size: 16px; left: 0; position: relative; top: 2px;"></i> CETAK LAPORAN
			</button>
		</div>

		<ul class="breadcrumb">
			<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
			<li><a href="#">Persediaan</a><span class="divi der"><i class="icon-angle-right"></i></span></li>
			<li class="active"> Stock </li>
		</ul>
	</div>
</div>

<div class="row-fluid view_data">
	<div class="span12">
		<div class="content-widgets light-gray">
			<div class="widget-container">
				<table class="stat-table table table-hover" id="data-table">
					<thead>
						<tr>
							<th align="center"> Aksi </th>
							<th align="center"> Nama Item </th>
							<th align="center"> Satuan </th>
							<th align="center"> Saldo Awal </th>
							<th align="center"> Penerimaan </th>
							<th align="center"> Pengeluaran </th>
							<th align="center"> Koreksi </th>
							<th align="center"> Saldo Akhir </th>
						</tr>						
					</thead>
					<tbody id="tes">
						<?PHP 
						$no = 0;
						foreach ($dt as $key => $row) {
							$no++;

							$get_penerimaan  = $this->model->get_penerimaan_item($row->ID, $row->NAMA_PRODUK);
							$get_pengeluaran = $this->model->get_pengeluaran_item($row->ID, $row->NAMA_PRODUK);
							$get_koreksi = $this->model->get_koreksi_item($row->ID, $row->NAMA_PRODUK);
							$saldo_akhir = ($get_penerimaan->TOTAL - $get_pengeluaran->TOTAL) + $get_koreksi->TOTAL;

						?>
						<tr>
							<td align="center" <?PHP if($kode_produk == $row->KODE_PRODUK){ echo "style='background: #CDE69C; text-align:center;'"; } ?> style="text-align: center;" >								
								<button style="padding: 2px 10px;"  onclick="" type="button" class="btn btn-small btn-info"> Detail </button>
							</td>
							<td align="left" style="text-align: left;"> <?=$row->NAMA_PRODUK;?> </td>							
							<td align="center" style="text-align: center;"> <?=$row->SATUAN;?> </td>							
							<td align="right" style="text-align: right;"> 0 </td>							
							<td align="right" style="text-align: right;"> <?=$get_penerimaan->TOTAL;?></td>							
							<td align="right" style="text-align: right;"> <?=$get_pengeluaran->TOTAL;?></td>							
							<td align="right" style="text-align: right;"> <?=$get_koreksi->TOTAL;?></td>							
							<td align="right" style="text-align: right;"> <?=$saldo_akhir;?></td>							
						</tr>
						<?PHP } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="laporan_modal" class="modal fade" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Tampilkan Laporan</h4>
	        </div>
	        <div class="modal-body">
		        <div class="row-fluid">
		            <div class="span12">
		                <div class="content-widgets light-gray">
		                    <form id="form_laporan" method="post" action="<?=base_url();?>stock_c" target="_blank">
		                        <div class="form-actions">
		                            <center>
		                                <input class="btn btn-danger" type="submit" name="pdf" value="CETAK PDF" id="cetak_pdf_beranda"/>                      
		                                <input class="btn btn-success" type="submit" name="excel" value="CETAK EXCEL" id="cetak_xls_beranda"/>                      
		                            </center>
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </div>
	        </div>
	        <div class="modal-footer">
	      		<button type="button" id="tutup_modal_appr" class="btn btn-default" data-dismiss="modal">Tutup</button>
	        </div>
	    </div>
  	</div>
</div>

<script type="text/javascript">
function ubah_data_produk(id){
	$('#popup_load').show();
	$.ajax({
		url : '<?php echo base_url(); ?>produk_c/cari_produk_by_id',
		data : {id:id},
		type : "GET",
		dataType : "json",
		success : function(result){
			$('#popup_load').hide();
			$('#id_produk').val(result.ID);
			$('#kode_produk_ed').val(result.KODE_PRODUK);
			$('#nama_produk_ed').val(result.NAMA_PRODUK);
			$('#satuan_ed').val(result.SATUAN);
			$('#deskripsi_ed').val(result.DESKRIPSI);

			$('input[name="ppn_ed"]').val(result.PPN);
			$('input[name="pph_ed"]').val(result.PPH);
			$('input[name="service_ed"]').val(result.SERVICE);

			$('#harga_jual_ed').val(NumberToMoney(result.HARGA_JUAL).split('.00').join(''));
			$('#harga_beli_ed').val(NumberToMoney(result.HARGA).split('.00').join(''));



	        //$("#kategori_ed").chosen("destroy");

	        $('.view_data').hide();
	        $('#edit_data').fadeIn('slow');
		}
	});
}
</script>