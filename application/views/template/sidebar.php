<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-success">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('')?>" class="brand-link bg-success">
    <img src="<?php echo base_url()."assets/"; ?>dist/img/admin.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2"
         style="opacity: .8">
    <span class="brand-text font-weight-medium">K3LH</span>
  </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()."assets/"; ?>foto/admin.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <h5 style="text-transform:capitalize;"><?php echo $this->session->userdata('jabatan'); ?></h5>
        </div>
      </div>
		  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!--pembagian menu user-->
        <?php if ($session_jabatan=$this->session->userdata('jabatan')=='admin'){?>
          <li class="nav-item has-treeview ">
            <a href="<?php echo site_url('proyek') ?>" class="nav-link <?php if($active_header=='proyek'){?>active<?php } ?> ">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Daftar Proyek
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($active_header=='bagian'){?>menu-open<?php } ?> ">
            <a href="<?php echo site_url('bagian') ?>" class="nav-link <?php if($active_header=='bagian'){?>active<?php } ?>">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Pekerjaan Bagian
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($active_header=='sumber'){?>menu-open<?php } ?> ">
            <a href="<?php echo site_url('sumber') ?>" class="nav-link <?php if($active_header=='sumber'){?>active<?php } ?>">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Sumber Bahaya
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($active_header=='bahaya'){?>menu-open<?php } ?> ">
            <a href="<?php echo site_url('bahaya') ?>" class="nav-link <?php if($active_header=='bahaya'){?>active<?php } ?>">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Kemungkinan Bahaya
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($active_header=='identifikasi'){?>menu-open<?php } ?> ">
            <a href="<?php echo site_url('identifikasi') ?>" class="nav-link <?php if($active_header=='identifikasi'){?>active<?php } ?>">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Penilaian Resiko Proyek
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($active_header=='eval'){?>menu-open<?php } ?> ">
            <a href="<?php echo site_url('identifikasi/Evaluasi') ?>" class="nav-link <?php if($active_header=='eval'){?>active<?php } ?>">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Evaluasi Proyek
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
          </li>
          <?php }  ?>
       
        </ul>
      </nav>
      <!-- Sidebar Menu -->
            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
