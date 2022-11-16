 <section class="content">
 <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Keselarasan Vertikal Prodi <?php echo $prodi; ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                   <div id="donut-chart-vertikal" style="height: 300px;width: 100%;"></div>

                        <table width="50%" class="table">
                          <tr>
                            <td><b>SLT :</b></td>
                            <td>Setingkat Lebih Tinggi</td>
                            <td><?php echo $v1; ?>%</td>
                          </tr>
                          <tr>
                            <td><b>TS :</b></td>
                            <td>Tingkat yang Sama</td>
                            <td><?php echo $v2; ?>%</td>
                          </tr>
                          <tr>
                            <td><b>SLR :</b></td>
                            <td>Setingkat Lebih Rendah </td>
                            <td><?php echo $v3; ?>%</td>
                          </tr>
                          <tr>
                            <td><b>TPPT :</b></td>
                            <td>Tidak Perlu Pendidikan Tinggi </td>
                            <td><?php echo $v4; ?>%</td>
                          </tr>
                    </table>
         
              </div><!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>