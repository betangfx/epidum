<div class="row">
    <div class="col-12">
        <h1 class="text-center">Profil Pengguna</h1>
        <div class="card">
            <div class="card-body">
                <?php
                // check if profil exist
                $profil = new profil_data();
                $row = count($profil->profil($UserID));
                if ($row > 0) {
                    foreach($profil->profil($UserID) as $row) {
                    $UserIDProfil           =   $row['UserID'];
                    $UsernameProfil         =   $row['Username'];
                    $UserLevelIDProfil      =   $row['UserLevelID'];
                    $UserLevelProfil        =   $row['UserLevel'];
                    $NIP                    =   $row['NIP'];
                    $PangkatID              =   $row['PangkatID'];
                    $JabatanID              =   $row['JabatanID'];
                    $Nama                   =   $row['Nama'];
                    $TempatLahir            =   $row['TempatLahir'];
                    $TanggalLahir           =   $row['TanggalLahir'];
                    $NoTelp                 =   $row['NoTelp'];
                    $Email                  =   $row['Email'];
                    $Alamat                 =   $row['Alamat'];
                    $Kota                   =   $row['Kota'];
                    $Provinsi               =   $row['Provinsi'];
                    $Kodepos                =   $row['Kodepos'];
                    }
                  } else {
                    $UserIDProfil           =   $UserID;
                    $UsernameProfil         =   $Username;
                    $UserLevelIDProfil      =   $UserLevelID;
                    $level = new level_data();
					foreach ($level->level($UserLevelID) as $row) {
                    $UserLevelProfil        =   $row['UserLevel'];
                    }
                    $NIP                    =   '';
                    $PangkatID              =   '';
                    $JabatanID              =   '';
                    $Nama                   =   '';
                    $TempatLahir            =   '';
                    $TanggalLahir           =   '';
                    $NoTelp                 =   '';
                    $Email                  =   '';
                    $Alamat                 =   '';
                    $Kota                   =   '';
                    $Provinsi               =   '';
                    $Kodepos                =   '';
                  }
            ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-row">
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $id;?>">
                                </div>
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
                                </div>
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
                                </div>
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="UserID" name="UserID" value="<?php echo $UserID;?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">Username</label>
                                <input type="text" class="form-control" id="Username" name="Username" value="<?php echo $UsernameProfil;?>" readonly>
                                <input type="hidden" class="form-control" id="UserID" name="UserID" value="<?php echo $UserIDProfil;?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLastName">Userlevel</label>
                                <input type="text" class="form-control" id="UserLevel" name="UserLevel" value="<?php echo $UserLevelProfil;?>" readonly>
                                <input type="hidden" class="form-control" id="UserLevelID" name="UserLevelID" value="<?php echo $UserLevelIDProfil;?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputLastName">Nama Lengkap</label>
                                <input type="text" class="form-control" id="Nama" name="Nama" value="<?php echo $Nama;?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">Nomor Induk Pegawai</label>
                                <input type="text" class="form-control" id="NIP" name="NIP" value="<?php echo $NIP;?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">Pangkat</label>
                                <select class="form-control" id="Pangkat" name="Pangkat" required>
                                    <option value=""></option>
                                    <?php
                                        $pangkat = new pangkat_data();
							            foreach ($pangkat->pangkat('') as $row) {
							        ?>
                                    <option value="<?php echo $row['PangkatID'];?>" <?php if ($PangkatID == $row['PangkatID']) { echo "selected='selected'";} ?>><?php echo $row['Pangkat'];?>
                                    </option>
                                    <?php
							            }
						            ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">Jabatan</label>
                                <select class="form-control" id="Pangkat" name="Pangkat" required>
                                    <option value=""></option>
                                    <?php
                                        $jabatan = new jabatan_data();
							            foreach ($jabatan->jabatan('') as $row) {
							        ?>
                                    <option value="<?php echo $row['JabatanID'];?>" <?php if ($JabatanID == $row['JabatanID']) { echo "selected='selected'";} ?>><?php echo $row['Jabatan'];?>
                                    </option>
                                    <?php
							            }
						            ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">Tempat Lahir</label>
                                <input type="text" class="form-control" id="TempatLahir" name="TempatLahir" value="<?php echo $TempatLahir;?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLastName">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="TanggalLahir" name="TanggalLahir" value="<?php echo $TanggalLahir;?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">No. Telp / HP</label>
                                <input type="text" class="form-control" id="NoTelp" name="NoTelp" value="<?php echo $NoTelp;?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLastName">Email</label>
                                <input type="text" class="form-control" id="Email" name="Email" value="<?php echo $Email;?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputFirstName">Alamat</label>
                                <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?php echo $Alamat;?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputFirstName">Kabupaten/Kota</label>
                                <input type="text" class="form-control" id="Kota" name="Kota" value="<?php echo $Kota;?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputLastName">Provinsi</label>
                                <input type="text" class="form-control" id="Provinsi" name="Provinsi" value="<?php echo $Provinsi;?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputLastName">Kode Pos</label>
                                <input type="text" class="form-control" id="Kodepos" name="Kodepos" value="<?php echo $Kodepos;?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <img alt="Chris Wood" src="<?php echo $site_url;?>/images/avatars/avatar.jpg" class="rounded-circle img-responsive mt-2" width="256" height="256">
                            <div class="mt-2">
                                <span class="btn btn-primary"><i class="fas fa-upload"></i> Upload</span>
                            </div>
                            <small>For best results, use an image at least 128px by 128px in .jpg format</small>
                        </div>
                    </div>
                </div>

                <button type="button" id="submit_profile" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>