<head>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="content" style="display: flex; gap: 8px; flex-direction: column;">
    <div class="tujupuluh">
        <h1>
            Jadwal Ruang
        </h1>
    </div>
    <div class="cari" style="display: flex; gap: 16px; align-items: center;">
        <input class="search-box" type="text" placeholder=" Pilih Kelas atau Ruang" style="width: 296px;">
        <input class="search-box" type="text" placeholder=" Tentukan Tanggal" style="width: 168px;">
        <button class="search-button">Cari</button>
        <button class="tambah">Tambah</button>
    </div>
    <table class="table " style="table-layout: auto;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ruang</th>
                <th>Hari</th>
                <th>Kelas</th>
                <!-- <th>Sesi ke-</th> -->
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Mata Kuliah</th>
                <th>Dosen Pengajar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
                    $no = 1;
                    $joinConditions = array(
                        "ruang" => "jadwalruang.RuangID = ruang.RuangID",
                        "hari" => "jadwalruang.HariID = hari.HariID",
                        "kelas" => "jadwalruang.KelasID = kelas.KelasID",
                        "sesi s" => "jadwalruang.SesiMulaiID = s.SesiID",
                        "sesi p" => "jadwalruang.SesiAkhirID = p.SesiID",
                        "matakuliah" => "jadwalruang.MataKuliahID = matakuliah.MataKuliahID",
                        "akun" => "jadwalruang.AkunID = akun.AkunID",
                    );
                    $query = readData($koneksi, "jadwalruang", '*, s.WaktuMulai AS WM, p.WaktuSelesai AS WS', $joinConditions);
                    if (!empty($query)) {
                        foreach ($query as $row) {
                    ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $row['NamaRuang']; ?></td>
                <td><?= $row['NamaHari']; ?></td>
                <td><?= $row['NamaKelas']; ?></td>
                <!-- <td><?= $row['JudulSesi']; ?></td> -->
                <td><?= $row['WM']; ?></td>
                <td><?= $row['WS']; ?></td>
                <td><?= $row['NamaMataKuliah']; ?></td>
                <td><?= $row['Nama']; ?></td>
                <td>
                <a href="index.php?page=controller/jadwal_ruang.php&aksi=ubah&id" role="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal<?= $row['JadwalRuangID']; ?>" data-bs-whatever="@mdo">Edit</a>
                    <a href="index.php?page=controller/jadwal_ruang.php&aksi=hapus&id=<?php echo $row['JadwalRuangID']; ?>"
                        onclick="javascript:return confirm('Hapus Data Anggota ?');" class="btn btn-danger btn-xs"><i
                            class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                </td>
                <?php
                        }
                    } else {
                            ?>
                <td colspan="4">Tidak Ada Data Tersedia</td>
                <?php
                    }
                        ?>
            </tr>
        </tbody>
    </table>
    <!-- </div>  -->
</div>
<?php
                    $no = 1;
                    $joinConditions = array(
                        "ruang" => "jadwalruang.RuangID = ruang.RuangID",
                        "hari" => "jadwalruang.HariID = hari.HariID",
                        "kelas" => "jadwalruang.KelasID = kelas.KelasID",
                        "sesi s" => "jadwalruang.SesiMulaiID = s.SesiID",
                        "sesi p" => "jadwalruang.SesiAkhirID = p.SesiID",
                        "matakuliah" => "jadwalruang.MataKuliahID = matakuliah.MataKuliahID",
                        "akun" => "jadwalruang.AkunID = akun.AkunID",
                    );
                    $query = readData($koneksi, "jadwalruang", '', $joinConditions);
                    if (!empty($query)) {
                        foreach ($query as $row) {
                    ?>
        <div class="modal fade" id="editModal<?= $row['JadwalRuangID']; ?>" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel<?= $row['JadwalRuangID']; ?>">Edit Ruangan
                            
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="index.php?page=controller/jadwal_ruang.php&aksi=ubah" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id" class="col-form-label">ID Ruang :</label>
                                <input type="text" name="data[]" class="form-control" id="id" value="<?= $row['RuangID']; ?>"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="id" class="col-form-label">ID Kelas :</label>
                                <select name="data[]" id="label" class="form-select">
                                <?php
                                $query2 = readData($koneksi, "kelas");
                                foreach ($query2 as $row2){
                                    $selected = ($row2['KelasID'] == $row['KelasID']) ? 'selected' : '';
                                    echo "<option value=".$row2['KelasID']." $selected>".$row2['NamaKelas']."</option>";
                                }
                                ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="col-form-label">ID Hari :</label>
                                <select name="data[]" id="label" class="form-select">
                                <?php
                                $query2 = readData($koneksi, "hari");
                                foreach ($query2 as $row2){
                                    $selected = ($row2['HariID'] == $row['HariID']) ? 'selected' : '';
                                    echo "<option value=".$row2['HariID']." $selected>".$row2['NamaHari']."</option>";
                                }
                                ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="col-form-label">ID Mata Kuliah :</label>
                                <select name="data[]" id="label" class="form-select">
                                <?php
                                $query2 = readData($koneksi, "matakuliah");
                                foreach ($query2 as $row2){
                                    $selected = ($row2['MataKuliahID'] == $row['MataKuliahID']) ? 'selected' : '';
                                    echo "<option value=".$row2['MataKuliahID']." $selected>".$row2['NamaMataKuliah']."</option>";
                                }
                                ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="col-form-label">ID Akun :</label>
                                <select name="data[]" id="label" class="form-select">
                                <?php
                                $query2 = readData($koneksi,  "akun", '', '', 'LevelID = 2');
                                foreach ($query2 as $row2){
                                    $selected = ($row2['AkunID'] == $row['AkunID']) ? 'selected' : '';
                                    echo "<option value=".$row2['AkunID']." $selected>".$row2['Username']."</option>";
                                }
                                ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="col-form-label">ID SesiAkhir :</label>
                                <select name="data[]" id="labelmulai<?= $row['JadwalRuangID']; ?>" class="form-select">
                                <?php
                                $query2 = readData($koneksi, "sesi");
                                foreach ($query2 as $row2){
                                    // $selected = ($row2['SesiMulaiID'] == $row['SesiID']) ? 'selected' : '';
                                    $selected = ($row2['SesiID'] == $row['SesiMulaiID']) ? 'selected' : '';
                                    echo "<option value=".$row2['SesiID']." $selected>".$row2['WaktuMulai']."</option>";
                                }
                                ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="col-form-label">ID SesiAkhir :</label>
                                <select name="data[]" id="labelakhir<?= $row['JadwalRuangID']; ?>" class="form-select">
                                <?php
                                $query2 = readData($koneksi, "sesi");
                                foreach ($query2 as $row2){
                                    $selected = ($row2['SesiID'] == $row['SesiAkhirID']) ? 'selected' : '';
                                    echo "<option value=".$row2['SesiID']." $selected>".$row2['WaktuSelesai']."</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning" data-bs-dismiss="modal" aria-hidden="true"><i
                                    class="bi bi-x-lg"></i>Ubah</button>
                            <button type="submit" class="btn btn-danger" aria-hidden="true"><i
                                    class="bi bi-floppy"></i>Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
<!-- End Edit Ruang -->

</main>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>