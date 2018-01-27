<!-- MODAL UPDATE PROFIL PEGAWAI -->
                  <div class="modal fade" id="addBookDialogs" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Update Profil Pegawai</h4>
                        </div>
                          <form class="contact-forms" method="post" >
                            <?php foreach($profil as $key); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIP<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <!-- <input type="text" name="nip" id="bookIds" required="required" class="form-control col-md-7 col-xs-12"> -->
                                        <input type="text" name="nip" value="<?php echo $key->nip; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eselon<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_eselon" id="id_eselon" class="form-control col-md-7 col-xs-12">
                                            <?php foreach ($eselon as $s){ ?>
                                                 <option value="<?php echo $s->id_eselon; ?>"><?php echo $s->eselon; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Golongan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_gol" id="id_gol" class="form-control col-md-7 col-xs-12">
                                            <?php foreach ($golongan as $g){ ?>
                                                 <option value="<?php echo $g->id_gol; ?>"><?php echo $g->nama_golongan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pendidikan Terakhir<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_pendidikan" id="id_pendidikan" class="form-control col-md-7 col-xs-12">
                                            <?php foreach ($pendidikan as $p){ ?>
                                                 <option value="<?php echo $p->id_pendidikan; ?>"><?php echo $p->nama_pendidikan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Level<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="user_level" id="user_level" class="form-control col-md-7 col-xs-12" required>
                                                 <option value="">-- Pilih --</option>
                                                 <option value="2">Dosen</option>
                                                 <option value="3">Pegawai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br /><br />
                            <div class="line line-block"></div>

                            <div class="form-group">
                                <h4 class="modal-title" id="myModalLabel">Kelompok Organisasi</h4>
                                <hr />
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Organisasi<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_unit" id="id_unit1" class="form-control col-md-7 col-xs-12" onchange="seljabatan1()">
                                            <option value="">-- Pilih Unit --</option>
                                            <?php foreach ($unit as $u){ ?>
                                                 <option value="<?php echo $u->id_unit; ?>"><?php echo $u->unit_organisasi; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_jabatan" id="id_jabatan1" class="form-control col-md-7 col-xs-12 types1" onchange="selunitkerja1()">
                                            <option value="">- Pilih Jabatan  - </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Kerja<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_unit_kerja" class="id_unit_kerja1 form-control col-md-7 col-xs-12" onchange="selsatuankerja1()">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Satuan Kerja<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_satuan_kerja" id="unitkerja1" class="id_unit_kerja unitkerja form-control col-md-7 col-xs-12" onchange="seljfu1()">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="row_dims1" class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">JFU<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_jfu1" id="id_jfu1" class="form-control col-md-7 col-xs-12">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <h3 class="alert-info" id="testDIVs"></h3>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <input type="submit" class="btn btn-primary" value="Save" />
                            </div>
                        </form>
                        <div class="form-status-holder"></div>
                      </div>
                    </div>
                  </div>
