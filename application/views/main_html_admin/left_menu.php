        <div class="col-md-3 left_col menu_fixed" style="overflow: visible;">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
<!--               <a href="<?=base_url('admin/index/')?>" class="site_title">
                <img src="<?=base_url()?>/assets/images/logo-title.jpeg"/>
              </a>   -->
              <a href="<?=base_url('admin/index/')?>" class="site_title">
                <!-- <img class="mCS_img_loaded" src="<?=base_url()?>/assets/images/logo-md.jpeg"/> <span>WETA</span>                 -->
              </a>
              <!-- <i class="fa fa-paw"></i> <span>WETA</span> -->
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?=base_url()?>/assets/upload_foto/user.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?=$this->session->userdata('nama_admin')?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              <h3>&nbsp;</h3>
                <ul class="nav side-menu">
                  <li>
                    <a href="<?=base_url('admin/index/matkul')?>"><i class="fa fa-book"></i> Data Matkul</a>
                  </li>
                  <li>
                    <a href="<?=base_url('admin/index/dosen')?>"><i class="fa fa-user"></i> Data Dosen</a>
                  </li>
                  <li>
                    <a href="<?=base_url('admin/index/mahasiswa')?>"><i class="fa fa-users"></i> Data Mahasiswa</a>
                  </li>
                   <li>
                    <a href="<?=base_url('admin/index/pertanyaan')?>"><i class="fa fa-question-circle-o"></i> Data Pertanyaan</a>
                  </li>
                   <li>
                    <a href="<?=base_url('admin/index/kelas')?>"><i class="fa fa-building"></i> Data Kelas</a>
                  </li>
                   <li>
                    <a href="<?=base_url('admin/index/matkul_dosen')?>"><i class="fa fa-sticky-note-o"></i> Data Matkul Dosen</a>
                  </li>
                   <li>
                    <a href="<?=base_url('admin/index/jadwal')?>"><i class="fa fa-sticky-note"></i> Data Jadwal</a>
                  </li>
                  <li>
                    <a href="<?=base_url('admin/index/laporan')?>"><i class="fa fa-bar-chart"></i> Data Vote Matkul</a>
                  </li>
                  <li>
                    <a href="<?=base_url('admin/index/kritiksaran')?>"><i class="fa fa-comments-o"></i> Data Kritik dan Saran</a>
                  </li>
                  <li>
                    <a href="<?=base_url('admin/index/grafik')?>"><i class="fa fa-line-chart"></i> Grafik</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="NONE">
                <span class="glyphicon glyphicon-none" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="NONE">
                <span class="glyphicon glyphicon-none" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=base_url('admin/index/logout')?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>