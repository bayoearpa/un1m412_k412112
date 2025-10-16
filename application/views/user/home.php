    <?php 
    foreach($catar as $c){ 
    ?>
    <!-- Main content -->
    <section class="content">
    <?php echo $this->session->flashdata('message');?>
      <div class="row">
        <div class="col-xs-12">
            <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Halo, <?php echo $c->Nama_mahasiswa ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="callout callout-info">
                <h4>Selamat Datang</h4>

                <p>Di Sistem Tracer Study STIMART "AMNI" Semarang.</p>
              </div>
              <div class="col-xs-6">
              <strong><i class="fa fa-user margin-r-5"></i> Nama Lengkap</strong>
              <p class="text-muted">
                <?php echo $c->nama ?>
              </p>
              
              <strong><i class="fa fa-barcode margin-r-5"></i> NIM / NRP</strong>
              <p class="text-muted">
                <?php echo $c->nim ?>
              </p>
              
              <strong><i class="fa fa-book margin-r-5"></i> Prodi</strong>

              <p class="text-muted">
                <?php 
                $where = array(
                'Kode_program_studi' => $c->Kode_program_studi      
                );
                $prodi = $this->m_tracer->get_data($where,'tmst_program_studi')->row();
                echo $prodi->Nama_program_studi ; 
                ?>
              </p>

              
              <strong><i class="fa fa-book margin-r-5"></i> Bekerja</strong>

              <p class="text-muted">
                <?php 
                $bekerja = $c->bekerja;
                switch ($bekerja) {
                    case "1":
                        echo "Sudah Bekerja";
                        break;
                    case "2":
                        echo "Belum Bekerja";
                        break;
                }
                                
                 ?>
              </p>

              
              <strong><i class="fa fa-book margin-r-5"></i> Perusahaan</strong>

              <p class="text-muted">
                <?php echo $c->nama_perusahaan; ?>
              </p>
                <!-- <div class="col-xs-4">
                  <button type="button" class="btn btn-block btn-success">Edit Profil</button>
                </div> -->
               <!--  <div class="col-xs-4">
                  <button type="button" class="btn btn-block btn-info">Ganti Password</button>
                </div> -->

              </div>
              <div class="col-xs-6">
              <strong><i class="fa fa-book margin-r-5"></i> Jeda</strong>

              <p class="text-muted">
                <?php echo $c->jeda." Bulan"; ?>
              </p>

              
              <strong><i class="fa fa-book margin-r-5"></i> Jenis Kelamin</strong>

              <p class="text-muted">
                 <?php 
                $jk = $c->Jenis_kelamin;
                switch ($jk) {
                    case "L":
                        echo "Laki - Laki";
                        break;
                    case "P":
                        echo "Perempuan";
                        break;
                }
                                
                 ?>
              </p>

              
              <strong><i class="fa fa-map-marker margin-r-5"></i> Domisili</strong>

              <p class="text-muted"><?php echo $c->domisili; ?></p>

              
              <strong><i class="fa fa-book margin-r-5"></i> No. Handphone</strong>

              <p class="text-muted">
                <?php echo $c->telp; ?>
              </p>

             
              <strong><i class="fa fa-book margin-r-5"></i> Tanggal Lulus</strong>

              <p class="text-muted">
                <?php echo $c->Tanggal_lulus; ?>
              </p>
              </div>
             
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->



<?php } ?>




            