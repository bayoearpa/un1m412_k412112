 <section class="content">
 <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Keselarasan Vertikal Prodi <?php echo $prodi; ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                  <div class="col-md-6">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mendapatkan pekerjaan kurang dari 6 bulan</span>
              <span class="info-box-number"><?php echo $k6b; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <!-- <span class="progress-description">
                    50% Increase in 30 Days
                  </span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mendapatkan pekerjaan lebih dari 6 bulan</span>
              <span class="info-box-number"><?php echo $l6b; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <!-- <span class="progress-description">
                    20% Increase in 30 Days
                  </span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rata-rata waktu tunggu kerja <= 6 bulan</span>
              <span class="info-box-number"><?php echo round($f502); ?> Bulan</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <!-- <span class="progress-description">
                    70% Increase in 30 Days
                  </span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rata-rata waktu tunggu kerja > 6 bulan</span>
              <span class="info-box-number"><?php echo round($f506); ?> Bulan</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
             <!--  <span class="progress-description">
                    40% Increase in 30 Days
                  </span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

        </div>

         
              </div><!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>