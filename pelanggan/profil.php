<?php
if (!isset($_SESSION["pelanggan"])) {
  header('location: login.php');
}
?>

<style>
    label {
        color: #000 !important;
    }

    th {
        color: #000 !important;
    }

    td {
        color: #000 !important;
    }
</style>

<div class="row">
    <div class="col-md-4 hidden-print">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="text-center">Profil</h3>
            </div>
            <div class="panel-body">
                <?php if (isset($_SESSION["pelanggan"])): ?>
                <?php $id = $_SESSION["pelanggan"]["id"]; if ($query = $connection->query("SELECT * FROM pelanggan WHERE id_pelanggan=$id")): ?>
                <?php while ($data = $query->fetch_assoc()): ?>
                <form>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input disabled="on" type="text" name="nama" class="form-control" value="<?=$data['nama']?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input disabled="on" type="email" name="email" class="form-control" value="<?=$data['email']?>">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Telpon</label>
                        <input disabled="on" type="text" name="no_telp" class="form-control"
                            value="<?=$data['no_telp']?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input disabled="on" type="text" name="username" class="form-control"
                            value="<?=$data['username']?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input disabled="on" type="text" name="alamat" class="form-control"
                            value="<?=$data['alamat']?>">
                    </div>
                </form>
                <?php endwhile ?>
                <?php endif ?>
                <?php endif ?>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="text-center">Riwayat Transaksi</h3>
                </div>
                <div class="panel-body">
                    <?php if ($query = $connection->query("SELECT * FROM transaksi WHERE id_pelanggan=$id")): ?>
                    <?php $no = 1; ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Total</th>
                                <th>Lama</th>
                                <th>Jaminan</th>
                                <th>Tanggal</th>
                                <th>Jatuh Tempo</th>
                                <th class="hidden-print"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td>Rp.<?=number_format($data['total_harga'])?>,-</td>
                                <td><?=$data['lama']?> Hari</td>
                                <td><?=$data['jaminan']?></td>
                                <td><?=date("d-m-Y H:i:s", strtotime($data['tgl_sewa']))?></td>
                                <td><?=date("d-m-Y H:i:s", strtotime($data['jatuh_tempo']))?></td>
                                <td class="hidden-print">
                                    <div class="btn-group">
                                        <?php if (!$data['konfirmasi'] AND !$data["pembatalan"]): ?>
                                        <a href="?page=konfirmasi&id=<?= $data['id_transaksi'] ?>"
                                            class="btn btn-success btn-xs">Konfirmasi</a>
                                        <?php endif ?>
                                        <a href="?page=detail&id=<?= $data['id_transaksi'] ?>"
                                            class="btn btn-info btn-xs">Detail</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                    <?php endif ?>
                </div>
                <div class="panel-footer hidden-print ">
                    <a onClick="window.print();return false" class="btn btn-primary">Print</a>
                </div>
            </div>
        </div>
    </div>
</div>