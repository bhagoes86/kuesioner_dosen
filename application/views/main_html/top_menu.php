        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url()?>/assets/upload_foto/<?=$this->session->userdata('kd_mahasiswa')?>.jpg" alt=""><?=$this->session->userdata('nama')?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
<!--                     <li>
                      <a href="<?=base_url('mahasiswa/index/upload_foto')?>">
                        <span>Ganti Foto</span>
                      </a>
                    </li>
 -->                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="<?=base_url('mahasiswa/index/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>