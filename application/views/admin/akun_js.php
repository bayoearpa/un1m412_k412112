 <script>
    $(document).ready(function() {
        $('#filter-form').submit(function(e) {
            e.preventDefault();
            var year = $('#year').val();
            var programStudi = $('#program_studi').val();

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('ppk/mon_llsd3data'); ?>',
                data: { year: year, program_studi: programStudi }, // Send both year and program_studi
                success: function(response) {
                    $('#example31082023').html(response); // Ganti isi #item-list dengan hasil AJAX
                }
            });
        });
        ////datatables
         $('#example31082023').DataTable({
                "paging": true, // Enable pagination
                "pageLength": 20, // Set the number of records per page
                'lengthChange': true,
                  'searching'   : true,
                  'ordering'    : true,
                //   'info'        : true,
                //   'autoWidth'   : false
                // Other DataTables options...
            });


// Menampilkan modal saat tombol "Edit" diklik
  $('#example31082023').on('click', '.edit-button', function() {
    var id = $(this).data('id');
    // Ambil data yang akan diedit dari server dengan AJAX
    $.ajax({
      url: '<?php echo base_url('admin/akun_get_data/'); ?>' + id, // Sesuaikan dengan URL yang sesuai
      type: 'GET',
     success: function(data) {
          console.log('Raw data from server:', data);

          try {
            var parsedData = JSON.parse(data);
            if (!parsedData || !parsedData.nim) {
              alert('Data tidak ditemukan atau kosong');
              return;
            }

            $('#enim').val(parsedData.nim);
            $('#editModal').modal('show');
          } catch (e) {
            console.error('JSON parse error:', e);
          }
        }
    });
  });
// Fungsi untuk memuat ulang tabel
function reloadTable() {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url('ppk/mon_llsd3data'); ?>',
        data: { year: $('#year').val(), program_studi: $('#program_studi').val() },
        success: function(response) {
            $('#example31082023').html(response);

             connectEditButtonListeners()
             connectInsertButtonListeners()
        }
    });
}
function connectEditButtonListeners() { 
    // Menampilkan modal saat tombol "Edit" diklik
  $('.edit-button').click(function() {
    var id = $(this).data('id');
    // Ambil data yang akan diedit dari server dengan AJAX
    $.ajax({
      url: '<?php echo base_url('ppk/mon_edit/'); ?>' + id, // Sesuaikan dengan URL yang sesuai
      type: 'GET',
      success: function(data) {
        // Isi modal dengan data yang diambil
        console.log(data); // Cetak nilai data ke konsol
        var parsedData = JSON.parse(data);
        $('#editidmon').val(parsedData.id_mon);
        $('#editNim').val(parsedData.nim);
        $('#editNama').val(parsedData.nama);
        $('#editTmptLahir').val(parsedData.tl);
        $('#editTglLahir').val(parsedData.tgll);
        $('#editAlamat').val(parsedData.alamat);
            // Set jenis kelamin sesuai dengan data dari database
            if (parsedData.jk === 'L') {
                $('#editjnsklmn').val('Laki-laki');
            } else if (parsedData.jk === 'P') {
                $('#editjnsklmn').val('Perempuan');
            }
        $('#edittgllls').val(parsedData.d3_tanggal_lulus);
        $('#editnoijs').val(parsedData.d3_no_ijasah);
        if (parsedData.status_d3 === 'sudah') {
                $('input[name="estatd3"][value="sudah"]').prop('checked', true);
            } else if (parsedData.status_d3 === 'belum') {
                $('input[name="estatd3"][value="belum"]').prop('checked', true);
            }
        $('#editKetD3').val(parsedData.ket_d3);
        // Tambahkan input lain sesuai kebutuhan
        $('#editModal').modal('show');
      }
    });
  });
}



    // Menyimpan perubahan dengan AJAX
    $('#saveAdd').click(function() {
        $.ajax({
            url: '<?php echo base_url('ppk/mon_addp'); ?>', // Sesuaikan dengan URL yang sesuai
            type: 'POST',
            data: $('#addForm').serialize(),
            success: function(response) {
                if (response == 'sukses') {
                    // Tutup modal setelah data berhasil ditambahkan
                    $('#addModal').modal('hide');
                    // Muat ulang tabel untuk menampilkan data terbaru
                    reloadTable();
                } else {
                    // Tampilkan pesan kesalahan jika perlu
                    alert('Gagal menambahkan data baru.');
                }
            }
        });
    });

     // Menyimpan perubahan dengan AJAX
    $('#saveEdit').click(function() {
        $.ajax({
            url: '<?php echo base_url('ppk/mon_editp'); ?>', // Sesuaikan dengan URL yang sesuai
            type: 'POST',
            data: $('#editForm').serialize(),
            success: function(response) {
                if (response == 'sukses') {
                    // Tutup modal setelah data berhasil ditambahkan
                    $('#editModal').modal('hide');
                    // Muat ulang tabel untuk menampilkan data terbaru
                    reloadTable();
                } else {
                    // Tampilkan pesan kesalahan jika perlu
                    alert('Gagal melakukan edit data baru.');
                }
            }
        });
    });


    });
    </script>