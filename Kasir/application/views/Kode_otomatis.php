<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <h2>Input Barang</h2>
    <?php echo form_open('kode_otomatis/inputbarang') ?>
    kode barang : <input type="text" name="kodeBarang" value="<?php echo $kode; ?>" readonly="readonly"><br><br>
    nama barang : <input type="text" name="namaBarang" placeholder="nama barang"><br><br>
    stok barang : <input type="number" name="stokBarang" placeholder="stok"><br><br>
    harga barang : <input type="text" name="harga" placeholder="harga"><br><br>
    foto barang : <input type="file" name="stokBarang" placeholder="stok"><br><br>
    <input type="submit" name="" value="OK">
    <?php echo form_close() ?>

    <table border="1">
        <tr>
            <th>No</th>
            <th>nama barang</th>
            <th>kode barang</th>
            <th>stok barang</th>
        </tr>

        <?php $i = 1;
        foreach ($tampil as $brg) { ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $brg->nama_barang ?></td>
                <td><?php echo $brg->kode_barang ?></td>
                <td><?php echo $brg->stok ?></td>
                <td><?php echo $brg->harga ?></td>
                <td><?php echo $brg->foto ?></td>
            </tr>
        <?php $i++;
        } ?>
    </table>

</body>

</html>