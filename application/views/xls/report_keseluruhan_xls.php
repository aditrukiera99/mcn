<?PHP 
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Ringkasan_keseluruhan.xls");
?>


<style>
.gridth {
    background: #388ed1;
    vertical-align: middle;
    color : #FFF;
    text-align: center;
    height: 30px;
    font-size: 14px;
}
.gridtd {
    background: #FFFFF0;
    vertical-align: middle;
    font-size: 18px;
    height: 30px;
    padding-left: 5px;
    padding-right: 5px;
    border: 1px solid #999;
    width: 200px;
}
.grid {
    border-collapse: collapse;
}

table th {
  border: 1px solid black;
}

.grid td {
    border: 1px solid #999;
}

.kolom_header{
    height: 35px;
    padding: 10px;
    vertical-align: middle;
    background: #388ed1;
    font-size: 18px;
}

</style>

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
    function format_akuntansi($value)
    {
        if($value > 0){
            $value = number_format($value, 2);
        } else if($value == 0){
            $value = 0;
        } else {
            $value = number_format(abs($value), 2);
            $value = "(".$value.")";
        }

        return $value;
    }
?>


<?PHP
    exit();
?>