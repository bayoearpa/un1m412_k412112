 <section class="content">
 <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Keselarasan Horizontal Prodi <?php echo $prodi; ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                   <div id="donut-chart-horizontal" style="height: 300px;width: 100%;"></div>

                        <table width="50%" class="table">
                          <tr>
                            <td><b>SE :</b></td>
                            <td>Sangat Erat</td>
                            <td><?php echo $v1; ?>%</td>
                          </tr>
                          <tr>
                            <td><b>E :</b></td>
                            <td>Erat</td>
                            <td><?php echo $v2; ?>%</td>
                          </tr>
                          <tr>
                            <td><b>CE :</b></td>
                            <td>Cukup Erat </td>
                            <td><?php echo $v3; ?>%</td>
                          </tr>
                          <tr>
                            <td><b>KE :</b></td>
                            <td>Kurang Erat </td>
                            <td><?php echo $v4; ?>%</td>
                          </tr>
                          <tr>
                            <td><b>TSS :</b></td>
                            <td>Tidak Sama Sekali</td>
                            <td><?php echo $v5; ?>%</td>
                          </tr>

                    </table>
         
              </div><!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>