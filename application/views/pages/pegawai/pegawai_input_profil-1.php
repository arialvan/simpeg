<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="form" name="form">
                    <table id="datatable-buttons" class="table table-responsive">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nip</th>
                          <th>Nama</th>
                          <th>Eselon</th>
                          <th>Golongan-Jabatan</th>
                          <th>Jabatan</th>
                          <th>Pendidikan</th>
                          <th>Unit Organisasi</th>
                          <th>Unit Kerja</th>
                          <th>Unit Satuan Kerja</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach($pegawai as $dt){ 
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                              <?php echo $dt->nip; ?>
                              <input type="hidden" id="nip" name="nip[]" value="<?php echo $dt->nip; ?>" />
                          </td>
                          <td><?php echo $dt->nama_peg; ?></td>
                          <td>
                              <select name="id_eselon" id="id_eselon">
                                <?php foreach ($eselon as $s){ ?>
                                     <option value="<?php echo $s->id_eselon; ?>"><?php echo $s->eselon; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                          <td>
                              <select name="id_gol" id="id_gol">
                                <?php foreach ($golongan as $g){ ?>
                                     <option value="<?php echo $g->id_gol; ?>"><?php echo $g->nama_golongan; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                          <td><select name="id_jabatan" id="id_jabatan">
                                <?php foreach ($jabatan as $j){ ?>
                                     <option value="<?php echo $j->id_jabatan; ?>"><?php echo $j->nama_jabatan; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                          <td><select name="id_pendidikan" id="id_pendidikan">
                                <?php foreach ($pendidikan as $p){ ?>
                                     <option value="<?php echo $p->id_pendidikan; ?>"><?php echo $p->nama_pendidikan; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                          <td><select name="id_unit" id="id_unit">
                                <?php foreach ($unit as $u){ ?>
                                     <option value="<?php echo $u->id_unit; ?>"><?php echo $u->unit_organisasi; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                          <td><select name="id_unit_kerja" id="id_unit_kerja">
                                <?php foreach ($unitkerja as $uk){ ?>
                                     <option value="<?php echo $uk->id_unit_kerja; ?>"><?php echo $uk->unit_kerja; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                          <td><select name="id_satuan_kerja" id="id_satuan_kerja">
                                <?php foreach ($satuankerja as $sk){ ?>
                                     <option value="<?php echo $sk->id_satuan_kerja; ?>"><?php echo $sk->satuan_kerja; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                          <td><input id="submit" name="submit" onclick="myFunction()" type="button" value="Save" class="btn-success"></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    </form>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            
          </div>
   </div>

