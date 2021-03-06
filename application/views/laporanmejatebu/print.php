<style type="text/css">
    table.tableizer-table {
        font-size: 12px;
        border: 1px solid #CCC;
        font-family: Arial, Helvetica, sans-serif;
        width:100%;
    }
    .tableizer-table td {
        padding: 4px;
        margin: 3px;
        border: 1px solid #CCC;
    }
    .tableizer-table th {
        background-color: #104E8B;
        color: #FFF;
        font-weight: bold;
        height:25px;padding:10px;
    }
</style>
<table  style="height: 5px;font-family:Monospace;" border="0" width="100%">
    <tbody>
    <tr>

        <td align="left"  style="font-size:11px">
            <b><?=CNF_NAMAPERUSAHAAN;?></b><br />
            <?=CNF_PG;?>
            <?=CNF_ALAMAT;?>
        </td>
        <td align="center" style="font-size:13px" >
            LAPORAN MEJA TEBU HARIAN<br />
            <?=$title;?>
        </td>
    </tr>
</table>
<hr />
<table class="tableizer-table">
    <thead>
    <tr class="tableizer-firstrow">
        <th>NOMER PETAK</th>
        <th>KEBUN</th>
        <th>NAMA PETANI</th>
        <th>KATEGORI</th>
        <th>A</th>
        <th>B</th>
        <th>C</th>
        <th>D</th>
        <th>E</th>
        <th>TRUK</th>
        <th>LORI</th>
        <th>HEKTAR</th>
        <th>QTY TEBU</th>
        <th>SISA HEKTAR</th>
        <th>TEBU/HA</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $truk = 0;
    $lori = 0;
    $ha = 0;
    $netto = 0;
    $A = 0;
    $B = 0;
    $C = 0;
    $D = 0;
    $E = 0;
    $tha = 0;
    foreach($result as $r){
        echo '<tr><td> '.$r->kode_blok.
            ' </td><td> '.$r->deskripsi_blok.
            ' </td><td> '.$r->nama_petani.
            ' </td><td> '.$r->kode_kat_lahan.
            ' </td><td align="center"> '.$r->A.
            ' </td><td align="center"> '.$r->B.
            ' </td><td align="center"> '.$r->C.
            ' </td><td align="center"> '.$r->D.
            ' </td><td align="center"> '.$r->E.
            '</td><td align="center"> '.$r->truk.
            ' </td><td align="center"> '.$r->lori.
            ' </td><td align="right"> '.$r->tertebang.
            ' </td><td align="right"> '.number_format($r->netto,0).
            ' </td><td align="right"> '.$r->sisa.
            ' </td><td align="right"> '.@number_format($r->netto/$r->tertebang,0).' </td></tr>';
        $A += $r->A;
        $B += $r->B;
        $C += $r->C;
        $D += $r->D;
        $E += $r->E;
        $truk += $r->truk;
        $lori += $r->lori;
        $ha += $r->tertebang;
        $netto += $r->netto;
        $tha += $r->netto/$r->tertebang;
    }
    ?>
    </tbody>
    <tfoot><tr style="font-weight:bold;background:#3c8dbc;color:white">
        <td colspan="4"> JUMLAH </td>
        <td align="center"><?php echo $A;?></td>
        <td align="center"><?php echo $B;?></td>
        <td align="center"><?php echo $C;?></td>
        <td align="center"><?php echo $D;?></td>
        <td align="center"><?php echo $E;?></td>
        <td align="center"><?php echo $truk;?></td>
        <td align="center"><?php echo $lori;?></td>
        <td align="right"><?php echo $ha;?></td>
        <td align="right"><?php echo @number_format($netto,0);?></td>
        <td></td>
        <td align="right"><?php echo @number_format($netto/$ha,0);?></td>
    </tr></tfoot>
</table>
<hr />
<table style="width:100%">
    <tr><td style="width: 60%"><br>
            <br />
            <br />
            <br />
        </td><td style="width: 20%" >&nbsp;</td>
        <td align="center"> <?=CNF_PG.' ,'.SiteHelpers::datereport(date('Y-m-d'));?>
            <br /><br /><br />
            <br /><br />
            <br />
            <br />
            ..........................
            <br />

        </td></tr>
</table>