<div class="container position-absolute end-0 w-100 vh-100" style="z-index: 0; max-width: 80%;">
    <div class="w-100 vh-100 position-relative" style="z-index: 0; margin-top: 59px; padding: 0 30px;">
        <p class="text-white fw-bold fs-2">ANTREAN PEMINJAMAN</p>
        <!-- <div class="d-flex gap-2" style="align-items: center;">
            <div style="width: 30%;">
                <input type="search" name="" id="" placeholder="Pilih Ruang" style="border-radius: 3.125rem;outline: none;border: none;padding: 0.5rem 1rem;font-size: 0.8rem;width: 100%;">
            </div>
            <div style="width: 18%;">
                <input type="search" name="" id="" placeholder="Tentukan Tanggal" style="border-radius: 3.125rem;outline: none;border: none;padding: 0.5rem 1rem;font-size: 0.8rem;width: 100%;">
            </div>
            <button class="bg-biru text-white" style="border-radius: 1.25rem;padding: 0.4rem 1.5rem;border: none;">Cari</button>
        </div> -->
        <style>
            .table-striped-green {
                background-color: var(--warna-putih);
                border-radius: 5px;
            }

            .table-striped-green tbody tr td {
                padding: 0.9rem;
            }

            .table-striped-green tbody tr:nth-of-type(odd) {
                background-color: rgb(18, 119, 130, 0.5) !important;
            }
        </style>
        <div class="table-responsive">
            <table class="table-striped-green biru w-100" style="margin-top: 0.5rem;table-layout: auto;">
                <thead>
                    <tr>
                        <th class="tableHead">No</th>
                        <th class="tableHead">Nama Ruang</th>
                        <th class="tableHead">Waktu Peminjaman</th>
                        <th class="tableHead">Kepentingan</th>
                        <th class="tableHead">Status Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $joinConditions = array(
                        "ruang" => "peminjaman.RuangID = ruang.RuangID"
                    );
                    $query = readData($koneksi, "peminjaman", '', $joinConditions, 'AkunID = '.$_SESSION['idUser'].' AND StatusPeminjaman = "Menunggu Konfirmasi"');
                    if (!empty($query)) {
                        foreach ($query as $row) {
                            ?>
                            <tr>
                                <th scope="row">
                                    <?= $no++; ?>
                                </th>
                                <td>
                                    <?= $row['NamaRuang']; ?>
                                </td>
                                <td>
                                    <?= $row['WaktuPinjam']."-".$row['WaktuKembali']; ?>
                                </td>
                                <td>
                                    <?= $row['Keperluan']; ?>
                                </td>
                                <td>
                                    <?= $row['StatusPeminjaman']; ?>
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
        </div>
    </div>
</div>