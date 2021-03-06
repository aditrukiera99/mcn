<?PHP 
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_neraca.xls");
?>


<style>
.gridth {
    vertical-align: middle;
    color : #FFF;
    text-align: center;
    height: 30px;
    font-size: 17px;
}
.gridtd {
    vertical-align: middle;
    font-size: 17px;
    height: 30px;
    padding-left: 5px;
    padding-right: 5px;
    border: 1px solid;
}
.grid {
    border-collapse: collapse;
}

table th {
  border: 1px solid black;
}

.grid td {
    border: 1px solid;
}

.kolom_header{
    height: 35px;
    padding: 10px;
    vertical-align: middle;
    font-size: 17px;
}

</style>

<table cellspacing="0"> 
    <tr>
        <td align="center" colspan="2">
            <h4>
                LAPORAN NERACA <br>
                <?PHP if($filter == "Bulanan"){ ?>
                PER <?=strtoupper($bulan_txt);?> <?=$tahun;?>
                <?PHP } else { ?>
                PER <?=$tahun;?>
                <?PHP } ?>
            </h4>
        </td>
    </tr>

    <tr>
        <td style="vertical-align:top;">
            <table align="center" class="grid">
                <tr>
                    <th style='text-align:center;' class='kolom_header' colspan="3" rowspan="2"> NOMOR AKUN </th>
                    <th style='text-align:center;' class='kolom_header' rowspan="2"> URAIAN </th>
                    <?PHP if($filter == "Bulanan"){ ?>
                    <th style='text-align:center;' class='kolom_header'> <?=strtoupper($bulan_lalu_txt);?> <?=$tahun_lalu;?> </th>
                    <th style='text-align:center;' class='kolom_header'> <?=strtoupper($bulan_txt);?> <?=$tahun;?></th>
                    <?PHP } else { ?>
                    <th style='text-align:center;' class='kolom_header'> TAHUN <?=$tahun_lalu;?> </th>
                    <th style='text-align:center;' class='kolom_header'> TAHUN <?=$tahun;?></th>
                    <?PHP } ?>
                </tr>

                <tr>
                    <th style='text-align:center;' class='kolom_header'>(Rp)</th>
                    <th style='text-align:center;' class='kolom_header'>(Rp)</th>
                </tr>

                <!-- ASET LANCAR -->
                <tr>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='left'><b>ASET LANCAR</b></td>
                    <td class='gridtd' align='right'></td>
                    <td class='gridtd' align='right'></td>
                </tr>

                <?PHP 
                $total_aset = 0;
                $total_aset_lalu = 0;

                $total_wajib = 0;
                $total_wajib_lalu = 0;
                $grup = $this->model->get_grup_kode_akun('ASET LANCAR', $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                foreach ($grup as $key => $row) {
                    $total_aset += $row->DEBET - $row->KREDIT;
                    $total_aset_lalu += $row->DEBET_LALU - $row->KREDIT_LALU;
                    echo "<tr>";
                        echo "<td class='gridtd' align='center'><b>".$row->KODE_GRUP."</b></td>";
                        echo "<td class='gridtd' align='center'></td>";
                        echo "<td class='gridtd' align='center'></td>";
                        echo "<td class='gridtd' align='left'><b>".$row->NAMA_GRUP."</b></td>";
                        echo "<td class='gridtd' align='right'><b>".format_akuntansi($row->DEBET_LALU - $row->KREDIT_LALU)."</b></td>";
                        echo "<td class='gridtd' align='right'><b>".format_akuntansi($row->DEBET - $row->KREDIT)."</b></td>";
                    echo "</tr>";

                    $sub = $this->model->get_sub_kode_akun($row->KODE_GRUP, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                    $no = 0;
                    foreach ($sub as $key => $row2) {
                        $no++;
                        echo "<tr>";
                            echo "<td class='gridtd' align='center'></td>";
                            echo "<td class='gridtd' align='center'>".$row->KODE_GRUP.".".$row2->KODE_SUB."</td>";
                            echo "<td class='gridtd' align='center'></td>";
                            echo "<td class='gridtd' align='left'>".$row2->NAMA_SUB."</td>";
                            echo "<td class='gridtd' align='right'>".format_akuntansi($row2->DEBET_LALU - $row2->KREDIT_LALU)."</td>";
                            echo "<td class='gridtd' align='right'>".format_akuntansi($row2->DEBET - $row2->KREDIT)."</td>";
                        echo "</tr>";

                        $kode_akun = $this->model->get_kode_akun($row->KODE_GRUP, $row2->KODE_SUB, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                        $no2 = 0;
                    }
                }
                ?>

                <!-- ASET TIDAK LANCAR -->
                <tr>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='left'><b>ASET TIDAK LANCAR</b></td>
                    <td class='gridtd' align='right'></td>
                    <td class='gridtd' align='right'></td>
                </tr>

                <?PHP 
                $grup = $this->model->get_grup_kode_akun('ASET TIDAK LANCAR', $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                foreach ($grup as $key => $row) {
                    $total_aset += $row->DEBET - $row->KREDIT;
                    $total_aset_lalu += $row->DEBET_LALU - $row->KREDIT_LALU;

                    echo "<tr>";
                        echo "<td class='gridtd' align='center'><b>".$row->KODE_GRUP."</b></td>";
                        echo "<td class='gridtd' align='center'></td>";
                        echo "<td class='gridtd' align='center'></td>";
                        echo "<td class='gridtd' align='left'><b>".$row->NAMA_GRUP."</b></td>";
                        echo "<td class='gridtd' align='right'><b>".format_akuntansi($row->DEBET_LALU - $row->KREDIT_LALU)."</b></td>";
                        echo "<td class='gridtd' align='right'><b>".format_akuntansi($row->DEBET - $row->KREDIT)."</b></td>";
                    echo "</tr>";

                    $sub = $this->model->get_sub_kode_akun($row->KODE_GRUP, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                    $no = 0;
                    foreach ($sub as $key => $row2) {
                        $no++;
                        echo "<tr>";
                            echo "<td class='gridtd' align='center'></td>";
                            echo "<td class='gridtd' align='center'>".$row->KODE_GRUP.".".$row2->KODE_SUB."</td>";
                            echo "<td class='gridtd' align='center'></td>";
                            echo "<td class='gridtd' align='left'>".$row2->NAMA_SUB."</td>";
                            echo "<td class='gridtd' align='right'>".format_akuntansi($row2->DEBET_LALU - $row2->KREDIT_LALU)."</td>";
                            echo "<td class='gridtd' align='right'>".format_akuntansi($row2->DEBET - $row2->KREDIT)."</td>";
                        echo "</tr>";

                        $kode_akun = $this->model->get_kode_akun($row->KODE_GRUP, $row2->KODE_SUB, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                        $no2 = 0;

                        if($row->KODE_GRUP == "170"){
                            $kode_akun = $this->model->get_kode_akun($row->KODE_GRUP, $row2->KODE_SUB, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                            $no2 = 0;
                            foreach ($kode_akun as $key => $row3) {
                                $no2++;
                                echo "<tr>";
                                    echo "<td class='gridtd' align='center'></td>";
                                    echo "<td class='gridtd' align='center'></td>";
                                    echo "<td class='gridtd' align='center'>".$row3->KODE_AKUN."</td>";
                                    echo "<td class='gridtd' align='left'>".$row3->NAMA_AKUN."</td>";
                                    echo "<td class='gridtd' align='right'>".format_akuntansi($row3->DEBET_LALU - $row3->KREDIT_LALU)."</td>";
                                    echo "<td class='gridtd' align='right'>".format_akuntansi($row3->DEBET - $row3->KREDIT)."</td>";
                                echo "</tr>";
                            }
                        }
                    }
                }
                ?>

                <tr>
                    <th style='text-align:center;' class='kolom_header'></th>
                    <th style='text-align:center;' class='kolom_header'></th>
                    <th style='text-align:center;' class='kolom_header'></th>
                    <th style='text-align:center;' class='kolom_header'><b>TOTAL ASET</b></th>
                    <th style='text-align:right;' class='kolom_header'><b><?=format_akuntansi($total_aset_lalu);?></b></th>
                    <th style='text-align:right;' class='kolom_header'><b><?=format_akuntansi($total_aset);?></b></th>
                </tr>

                <!-- KEWAJIBAN DAN EKUITAS -->
                <tr>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='left'><b>KEWAJIBAN DAN EKUITAS</b></td>
                    <td class='gridtd' align='right'></td>
                    <td class='gridtd' align='right'></td>
                </tr>

                <tr>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='left'><b>KEWAJIBAN LANCAR</b></td>
                    <td class='gridtd' align='right'></td>
                    <td class='gridtd' align='right'></td>
                </tr>

                <?PHP 
                $grup = $this->model->get_grup_kode_akun('KEWAJIBAN LANCAR', $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                foreach ($grup as $key => $row) {
                    $total_wajib += ($row->DEBET - $row->KREDIT) * (-1);
                    $total_wajib_lalu += ($row->DEBET_LALU - $row->KREDIT_LALU) * (-1);

                    echo "<tr>";
                        echo "<td class='gridtd' align='center'><b>".$row->KODE_GRUP."</b></td>";
                        echo "<td class='gridtd' align='center'></td>";
                        echo "<td class='gridtd' align='center'></td>";
                        echo "<td class='gridtd' align='left'><b>".$row->NAMA_GRUP."</b></td>";
                        echo "<td class='gridtd' align='right'><b>".format_akuntansi(($row->DEBET_LALU - $row->KREDIT_LALU) * (-1))."</b></td>";
                        echo "<td class='gridtd' align='right'><b>".format_akuntansi(($row->DEBET - $row->KREDIT) * (-1))."</b></td>";
                    echo "</tr>";

                    $sub = $this->model->get_sub_kode_akun($row->KODE_GRUP, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                    $no = 0;
                    foreach ($sub as $key => $row2) {
                        $no++;
                        echo "<tr>";
                            echo "<td class='gridtd' align='center'></td>";
                            echo "<td class='gridtd' align='center'>".$row->KODE_GRUP.".".$row2->KODE_SUB."</td>";
                            echo "<td class='gridtd' align='center'></td>";
                            echo "<td class='gridtd' align='left'>".$row2->NAMA_SUB."</td>";
                            echo "<td class='gridtd' align='right'>".format_akuntansi(($row2->DEBET_LALU - $row2->KREDIT_LALU) * (-1))."</td>";
                            echo "<td class='gridtd' align='right'>".format_akuntansi(($row2->DEBET - $row2->KREDIT) * (-1))."</td>";
                        echo "</tr>";

                        $kode_akun = $this->model->get_kode_akun($row->KODE_GRUP, $row2->KODE_SUB, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                        $no2 = 0;
                    }
                }
                ?>

                <!-- KEWAJIBAN LAIN LAIN -->
                <tr>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='left'><b>KEWAJIBAN LAIN LAIN</b></td>
                    <td class='gridtd' align='right'></td>
                    <td class='gridtd' align='right'></td>
                </tr>

                <?PHP 
                $grup = $this->model->get_grup_kode_akun('KEWAJIBAN LAIN LAIN', $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                foreach ($grup as $key => $row) {
                    $total_wajib += ($row->DEBET - $row->KREDIT) * (-1);
                    $total_wajib_lalu += ($row->DEBET_LALU - $row->KREDIT_LALU) * (-1);

                    echo "<tr>";
                        echo "<td class='gridtd' align='center'><b>".$row->KODE_GRUP."</b></td>";
                        echo "<td class='gridtd' align='center'></td>";
                        echo "<td class='gridtd' align='center'></td>";
                        echo "<td class='gridtd' align='left'><b>".$row->NAMA_GRUP."</b></td>";
                        echo "<td class='gridtd' align='right'><b>".format_akuntansi(($row->DEBET_LALU - $row->KREDIT_LALU) * (-1))."</b></td>";
                        echo "<td class='gridtd' align='right'><b>".format_akuntansi(($row->DEBET - $row->KREDIT) * (-1))."</b></td>";
                    echo "</tr>";

                    $sub = $this->model->get_sub_kode_akun($row->KODE_GRUP, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                    $no = 0;
                    foreach ($sub as $key => $row2) {
                        $no++;
                        echo "<tr>";
                            echo "<td class='gridtd' align='center'></td>";
                            echo "<td class='gridtd' align='center'>".$row->KODE_GRUP.".".$row2->KODE_SUB."</td>";
                            echo "<td class='gridtd' align='center'></td>";
                            echo "<td class='gridtd' align='left'>".$row2->NAMA_SUB."</td>";
                            echo "<td class='gridtd' align='right'>".format_akuntansi(($row2->DEBET_LALU - $row2->KREDIT_LALU) * (-1))."</td>";
                            echo "<td class='gridtd' align='right'>".format_akuntansi(($row2->DEBET - $row2->KREDIT) * (-1))."</td>";
                        echo "</tr>";

                        $kode_akun = $this->model->get_kode_akun($row->KODE_GRUP, $row2->KODE_SUB, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                        $no2 = 0;
                    }
                }
                ?>
                <!-- EKUITAS -->
                <tr>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='left'><b>EKUITAS</b></td>
                    <td class='gridtd' align='right'></td>
                    <td class='gridtd' align='right'></td>
                </tr>

                <?PHP 
                $grup = $this->model->get_grup_kode_akun('EKUITAS', $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                foreach ($grup as $key => $row) {
                    if($row->KODE_GRUP != 330){
                        $total_wajib += ($row->DEBET - $row->KREDIT) * (-1);
                        $total_wajib_lalu += ($row->DEBET_LALU - $row->KREDIT_LALU) * (-1);

                        echo "<tr>";
                            echo "<td class='gridtd' align='center'><b>".$row->KODE_GRUP."</b></td>";
                            echo "<td class='gridtd' align='center'></td>";
                            echo "<td class='gridtd' align='center'></td>";
                            echo "<td class='gridtd' align='left'><b>".$row->NAMA_GRUP."</b></td>";
                            echo "<td class='gridtd' align='right'><b>".format_akuntansi(($row->DEBET_LALU - $row->KREDIT_LALU) * (-1))."</b></td>";
                            echo "<td class='gridtd' align='right'><b>".format_akuntansi(($row->DEBET - $row->KREDIT) * (-1))."</b></td>";
                        echo "</tr>";

                        $sub = $this->model->get_sub_kode_akun($row->KODE_GRUP, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                        $no = 0;
                        foreach ($sub as $key => $row2) {
                            $no++;
                            echo "<tr>";
                                echo "<td class='gridtd' align='center'></td>";
                                echo "<td class='gridtd' align='center'>".$row->KODE_GRUP.".".$row2->KODE_SUB."</td>";
                                echo "<td class='gridtd' align='center'></td>";
                                echo "<td class='gridtd' align='left'>".$row2->NAMA_SUB."</td>";
                                echo "<td class='gridtd' align='right'>".format_akuntansi(($row2->DEBET_LALU - $row2->KREDIT_LALU) * (-1))."</td>";
                                echo "<td class='gridtd' align='right'>".format_akuntansi(($row2->DEBET - $row2->KREDIT) * (-1))."</td>";
                            echo "</tr>";

                            $kode_akun = $this->model->get_kode_akun($row->KODE_GRUP, $row2->KODE_SUB, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                            $no2 = 0;
                        }
                    }
                }
                ?>

                <?PHP
                $kode_akun = $this->model->get_kode_akun(330, 0, $dt_unit->ID, $bulan, $tahun, $bulan_lalu, $tahun_lalu, $filter);
                foreach ($kode_akun as $key => $row3) {
                    $total_wajib += $row3->DEBET - $row3->KREDIT;
                    $total_wajib_lalu += $row3->DEBET_LALU - $row3->KREDIT_LALU;
                ?>
                <tr>
                    <td class='gridtd' align='center'><b>330</b></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='center'></td>
                    <td class='gridtd' align='left'><b>Laba (rugi) Tahun Berjalan</b></td>
                    <td class='gridtd' align='right'><?=format_akuntansi($row3->DEBET_LALU - $row3->KREDIT_LALU);?></td>
                    <td class='gridtd' align='right'><?=format_akuntansi($row3->DEBET - $row3->KREDIT);?></td>
                </tr>
                <?PHP } ?>


                <tr>
                    <th style='text-align:center;' class='kolom_header'></th>
                    <th style='text-align:center;' class='kolom_header'></th>
                    <th style='text-align:center;' class='kolom_header'></th>
                    <th style='text-align:center;' class='kolom_header'><b>TOTAL KEWAJIBAN DAN EKUITAS</b></th>
                    <th style='text-align:right;' class='kolom_header'><b><?=format_akuntansi($total_wajib_lalu);?></b></th>
                    <th style='text-align:right;' class='kolom_header'><b><?=format_akuntansi($total_wajib);?></b></th>
                </tr>
            </table>
        </td>
    </tr>
</table>



<?PHP 
    function format_akuntansi($value)
    {
        if($value > 0){
            $value = number_format($value, 2);
        } else if($value == 0){
            $value = 0;
        } else {
            $value = number_format(abs($value), 2);
        }

        return $value;
    }
?>


<?PHP
    exit();
?>