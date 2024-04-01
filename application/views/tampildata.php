<h2>Tampil Data Siswa</h2>
<a href="<?php echo site_url('latihancrud') ?>">+ Tambah Data</a>
<br>
<table border="1" width="100%">
    <tr style="text-align:center;">
        <td><b>NIS</b></td>
        <td><b>Nama</b></td>
        <td><b>Kelas</b></td>
        <td><b>Asal</b></td>
        <td><b>Alamat</b></td>
        <td colspan="2"><b>Aksi</b></td>
    </tr>
    <?php
        foreach ($datasiswa as $value) {
    ?>

    <tr>
        <td><?php echo $value['nis']; ?></td>
        <td><?php echo $value['nama']; ?></td>
        <td><?php echo $value['kelas']; ?></td>
        <td><?php echo $value['asalsekolah']; ?></td>
        <td><?php echo $value['alamat']; ?></td>
        <td align="center">
            <a href="<?php echo site_url('latihancrud/edit/'.$value['nis']) ?>">EDIT</a>
        </td>
        <td align="center">
            <a onclick="return confirm('Anda yakin akan menghapus data ini?)"
            href="<?php echo site_url('latihancrud/delete/'.$value['nis']) ?>">DELETE</a>
        </td>
    </tr>

    <?php
    }
    ?>
</table>