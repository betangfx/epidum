<h1 class="h3 mb-3">Master Data</h1>
<div class="row">
    <div class="col-12">
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist" id="MasterDataTab">
                <li class="nav-item"><a class="nav-link active" href="#daftar" data-toggle="tab"
                        role="tab">Daftar Jaksa</a></li>
                <li class="nav-item"><a class="nav-link" href="#jabatan" data-toggle="tab" role="tab">Jabatan</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="daftar" role="tabpanel">
                    <table id="list_jaksa" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								$no = 1;
								$jaksa = new master();
								foreach ($jaksa->jaksa('read','','',$UserID) as $row) {
								?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $row['NIP'];?></td>
                                <td><?php echo $row['NamaLengkap'];?></td>
                                <td><?php echo $row['Jabatan'];?></td>
                                <td>
                                    <a href="#" alt="Ubah Jabatan" title="Ubah Jabatan"
                                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="ubah" data-header="Ubah Jabatan" data-sub-header="" data-module="master"
                                    data-submodule="jabatan" data-form="master" data-folder="setting" data-id="<?php echo $row['JabatanID'];?>"
                                    data-userid="<?php echo $UserID;?>">
                                    <iclass="align-middle" data-feather="edit-3"></i>
                                    <a href="#" alt="Hapus Jabatan" title="Hapus Jabatan"
                                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="hapus" data-header="Hapus Jabatan" data-sub-header="" data-module="master"
                                    data-submodule="jabatan" data-form="master" data-folder="setting" data-id="<?php echo $row['JabatanID'];?>"
                                    data-userid="<?php echo $UserID;?>" data-userlevel="<?php echo $UserLevel?>">
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
                            <button class="btn btn-primary" href="#" alt="Tambah Jaksa" title="Tambah Jaksa"
								data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="md"
								data-action="tambah" data-header="Tambah Jaksa" data-sub-header="" data-module="master"
								data-submodule="jaksa" data-form="master" data-folder="setting" data-id=""
								data-userid="<?php echo $UserID;?>" data-userlevel="<?php echo $UserLevel?>">Tambah Jaksa</button>
                        </div>
                    </div>
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
