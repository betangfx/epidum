<h1 class="h3 mb-3">Master Data</h1>
<div class="row">
    <div class="col-12">
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#ringkasan" data-toggle="tab"
                        role="tab">Daftar Jaksa</a></li>
                <li class="nav-item"><a class="nav-link" href="#jabatan" data-toggle="tab" role="tab">Jabatan</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="ringkasan" role="tabpanel">
                </div>
                <div class="tab-pane" id="jabatan" role="tabpanel">
                    <table id="list_jenjang" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								$no = 1;
								$jabatan = new master();
								foreach ($jabatan->jabatan('read','','',$UserID) as $row) {
								?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $row['Jabatan'];?></td>
                                <td>
                                    <a href="#" alt="Ubah Jabatan" title="Ubah Jabatan"
                                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="ubah" data-header="Ubah Jabatan" data-sub-header="" data-module="master"
                                    data-submodule="jabatan" data-form="master" data-folder="setting" data-id="<?php echo $row['JabatanID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <iclass="align-middle" data-feather="edit-3"></i>
                                    <a href="#" alt="Hapus Jabatan" title="Hapus Jabatan"
                                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="hapus" data-header="Hapus Jabatan" data-sub-header="" data-module="master"
                                    data-submodule="jabatan" data-form="master" data-folder="setting" data-id="<?php echo $row['JabatanID'];?>"
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
                            <button class="btn btn-primary float-right" href="#" alt="Tambah Jabatan" title="Tambah Jabatan"
								data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
								data-action="tambah" data-header="Tambah Jabatan" data-sub-header="" data-module="master"
								data-submodule="jabatan" data-form="master" data-folder="setting" data-id=""
								data-UserID="<?php echo $UserID;?>">Tambah Jenjang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>