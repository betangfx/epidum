<h1 class="h3 mb-3">Pengaturan Akun</h1>
<div class="row">
    <div class="col-12">
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#ringkasan" data-toggle="tab"
                        role="tab">Sekilas</a></li>
                <li class="nav-item"><a class="nav-link" href="#infoakun" data-toggle="tab" role="tab">Akun Trading</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#tambahdana" data-toggle="tab" role="tab">Penambahan
                        Dana</a></li>
                <li class="nav-item"><a class="nav-link" href="#tarikdana" data-toggle="tab" role="tab">Penarikan
                        Dana</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="ringkasan" role="tabpanel">
                    <table id="list_ringkasan_akun" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Total<br />Penambahan Dana</th>
                                <th>Total<br />Penarikan Dana</th>
                                <th>Saldo<br />Sekarang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								$ringkasanAkun 	= new settingAkun();
								foreach ($ringkasanAkun->ringkasanAkun($UserID) as $row) {
								?>
                            <tr>
                                <td><?php echo $row['TotalTambahDana'];?></td>
                                <td><?php echo $row['TotalTarikDana'];?></td>
                                <td><?php echo $row['SaldoAkhir'];?></td>
                                <?php	
									}
								?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="infoakun" role="tabpanel">
                    <table id="list_info_akun" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Broker</th>
                                <th>No Akun</th>
                                <th>Leverage</th>
                                <th>Keuangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								
								$infoAkun = new settingAkun();
								foreach ($infoAkun->infoAkun('read','','','','',$UserID) as $row) {
								?>
                            <tr>
                                <td><?php echo $row['Broker'];?></td>
                                <td><?php echo $row['NoAkun'];?></td>
                                <td><?php echo $row['Leverage'];?></td>
                                <td>
                                    <button class="btn btn-primary" href="#" alt="Tambah/Tarik Dana" title="Tambah/Tarik Dana"
                                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="tambah" data-header="Keuangan Akun" data-sub-header="- Tambah/Tarik Dana" data-module="akun"
                                    data-submodule="transaksi" data-form="akun" data-folder="setting" data-id=""
                                    data-UserID="<?php echo $UserID;?>"><i class="fas fa-money"></i> Tambah/Tarik Dana</button>
                                </td>
                                <td>
                                    <a href="#" alt="Ubah Akun" title="Ubah Akun"
                                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="ubah" data-header="Ubah Akun" data-sub-header="" data-module="akun"
                                    data-submodule="infoakun" data-form="akun" data-folder="setting" data-id=""
                                    data-UserID="<?php echo $UserID;?>">
                                    <iclass="align-middle" data-feather="edit-3"></i>
                                    <a href="#" alt="Hapus Akun" title="Hapus Akun"
                                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="hapus" data-header="Hapus Akun" data-sub-header="" data-module="akun"
                                    data-submodule="infoakun" data-form="akun" data-folder="setting" data-id=""
                                    data-UserID="<?php echo $UserID;?>">
                                    <iclass="align-middle" data-feather="trash"></i>
                                </td>
                            </tr>
                            <?php 
								}
							?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-primary float-right" href="#" alt="Tambah Akun" title="Tambah Akun"
								data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
								data-action="tambah" data-header="Tambah Akun" data-sub-header="" data-module="akun"
								data-submodule="infoakun" data-form="akun" data-folder="setting" data-id=""
								data-UserID="<?php echo $UserID;?>">Tambah Akun</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tambahdana" role="tabpanel">
                    <table id="list_tambah_dana" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Transaksi</th>
                                <th>Tanggal</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								$no = 1;
								$infoTransaksi = new settingAkun();
								foreach ($infoTransaksi->infoTransaksi('read_tambah', '', '', '', '', '', $UserID) as $row) {
								?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $row['Transaksi'];?></td>
                                <td><?php echo $row['Nominal'];?></td>
                                <td><?php echo $row['TglTransaksi'];?></td>
                                <td>
                                    <a href="#" alt="Ubah Penambahan Dana" title="Ubah Penambahan Dana"
                                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="ubah" data-header="Keuangan Akun" data-sub-header="- Tambah Dana" data-module="akun"
                                    data-submodule="transaksi" data-form="akun" data-folder="setting" data-id="<?php echo $row['AkunTransaksiID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="edit-3"></i>
                                    </a>
                                    <a href="#" alt="Hapus Penambahan Dana" title="Hapus Penambahan Dana"
                                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="hapus" data-header="Keuangan Akun" data-sub-header="- Tambah Dana" data-module="akun"
                                    data-submodule="transaksi" data-form="akun" data-folder="setting" data-id="<?php echo $row['AkunTransaksiID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php 
								}
								
							?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="tarikdana" role="tabpanel">
                    <table id="list_tarik_dana" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Transaksi</th>
                                <th>Tanggal</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								$no = 1;
								$infoTransaksi = new settingAkun();
								foreach ($infoTransaksi->infoTransaksi('read_tarik', '', '', '', '', '', $UserID) as $row) {
								?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $row['Transaksi'];?></td>
                                <td><?php echo $row['Nominal'];?></td>
                                <td><?php echo $row['TglTransaksi'];?></td>
                                <td>
                                    <a href="#" alt="Ubah Penarikan Dana" title="Ubah Penarikan Dana"
                                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="ubah" data-header="Keuangan Akun" data-sub-header="- Tarik Dana" data-module="akun"
                                    data-submodule="transaksi" data-form="akun" data-folder="setting" data-id="<?php echo $row['AkunTransaksiID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="edit-3"></i>
                                    </a>
                                    <a href="#" alt="Hapus Penarikan Dana" title="Hapus Penarikan Dana"
                                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="hapus" data-header="Keuangan Akun" data-sub-header="- Tarik Dana" data-module="akun"
                                    data-submodule="transaksi" data-form="akun" data-folder="setting" data-id="<?php echo $row['AkunTransaksiID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php 
								}
								
							?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>