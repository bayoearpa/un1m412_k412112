    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Berita</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Berita</th>
                  <th>Uploader</th>
                  <th>Proses</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($jobinfo as $j){ 
                 ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $j->tanggal ?></td>
                  <td><?php echo $j->nama ?></td>
                  <td><?php echo $j->keterangan ?></td>
                  <td>
                    <a class="btn btn-warning btn-sm" href="<?php echo base_url().'admin/editberita/'.$j->id_berita; ?>"><i class="fa fa-pencil"></i>Edit</a>
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url().'admin/deleteberita/'.$j->id_berita; ?>"><i class="fa fa-trash"></i>Delete</a>
                  </td>
                </tr>
               <?php } ?>
               
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                 <th>Tanggal</th>
                 <th>Berita</th>
                  <th>Uploader</th>
                 <th>Proses</th>
                </tr>
                </tfoot>
              </table>
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