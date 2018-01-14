            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3><u>General</u></h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-users"></i> Data Pegawai <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>Pegawai/PegawaiAll">Pegawai All</a></li>
                        <li><a href="<?php echo base_url() ?>Pegawai">Pegawai Profil</a></li>
                    </ul>
                  </li>    
                </ul>
              </div>
              <div class="menu_section">
                  <h3><u>Insert Data</u></h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-plus"></i>Master<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>Master">Tabel Master</a></li>
                        <li><a href="<?php echo base_url() ?>Pegawai/SetOrganisasi">Setting Organisasi</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-user-plus"></i>Pegawai<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>Pegawai/FormPegawai">Insert Pegawai</a></li>
                      <li><a href="<?php echo base_url() ?>Pegawai/InputProfilPegawai">Insert Profil</a></li>
                      <li><a href="<?php echo base_url() ?>Import">Import Excel</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-history"></i>Riwayat<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>Riwayat">Pendidikan</a></li>
                      <li><a href="<?php echo base_url() ?>Riwayat/RiwayatJabatan">Jabatan</a></li>
                      <li><a href="<?php echo base_url() ?>Riwayat/RiwayatDiklat">Diklat</a></li>
                      <li><a href="<?php echo base_url() ?>Riwayat/RiwayatSeminar">Seminar</a></li>
                    </ul>
                  </li>
                </ul>
                
              </div>

            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url() ?>Login/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>assets/images/logo.png" alt=""><?php echo $name; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url() ?>Login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->