</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="<?= base_url(); ?>"> SiCerdas</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> Alpha
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- Drop Image -->
<!-- <script src="<?= base_url(); ?>assets/dist/js/app.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>

<!-- SVM data library -->
<script src="<?= base_url() ?>assets/dist/js/lib/svm.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Enable/Disabled Form Edit profile -->
<script>
    $(document).ready(function() {
        $("#btn-edit").click(function() {
            $(".tittle").html("Edit Profil");
            $("#btn-edit").prop('hidden', true);
            $("#btn-save").prop('hidden', false);
            $("#btn-cancel").prop('hidden', false);
            $("#nm").prop('disabled', false);
            $("#hp").prop('disabled', false);
            $("#desc").prop('disabled', false);
            $("#imgedit").prop('hidden', false);
            $("#img").prop('hidden', true);
        });

        $("#btn-cancel").click(function() {
            $(".tittle").html("Profil");
            $("#btn-edit").prop('hidden', false);
            $("#btn-save").prop('hidden', true);
            $("#btn-cancel").prop('hidden', true);
            $("#nm").prop('disabled', true);
            $("#hp").prop('disabled', true);
            $("#desc").prop('disabled', true);
            $("#imgedit").prop('hidden', true);
            $("#img").prop('hidden', false);
        });
    });
</script>

<script>
    $(function() {
        $("#train").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#train_wrapper .col-md-6:eq(0)');
        $("#train2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#train2_wrapper .col-md-6:eq(0)');
        $("#test").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#test_wrapper .col-md-6:eq(0)');
        $("#laporan").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#laporan_wrapper .col-md-6:eq(0)');
        $("#uji").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#uji_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Upload gambar -->
<script>
    function triggerClick(b) {
        document.querySelector('#profileImage').click();
    }

    function displayImage(b) {
        if (b.files[0]) {
            var reader = new FileReader();
            reader.onload = function(b) {
                document.querySelector('#profileDisplay').setAttribute('src', b.target.result);
            }
            reader.readAsDataURL(b.files[0]);
        }
    }
</script>

<script>
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 5000
        });

        const flashData = $('.flash-data').data('flashdata');
        if (flashData == 'isLogin') {
            Toast.fire({
                icon: 'success',
                title: 'Anda Berhasil Login!',
            });
        } else if (flashData == 'isReg') {
            Toast.fire({
                icon: 'success',
                title: 'Pendaftaran berhasil, silahkan cek email anda untuk mengaktivasi akun!',
            });
        } else if (flashData == 'Activate') {
            Toast.fire({
                icon: 'success',
                title: 'Akun anda berhasil diaktivasi, silahkan login!',
            });
        } else if (flashData == 'Exp-token') {
            Toast.fire({
                icon: 'info',
                title: 'Token sudah kadaluarsa!',
            });
        } else if (flashData == 'Wrg-token') {
            Toast.fire({
                icon: 'error',
                title: 'Token anda salah!',
            });
        } else if (flashData == 'Fail-active') {
            Toast.fire({
                icon: 'error',
                title: 'Gagal mengaktivasi akun!',
            });
        } else if (flashData == 'blocked') {
            Toast.fire({
                icon: 'info',
                title: 'Akun anda diblokir untuk sementara, anda terdeteksi melakukan hal mencurigakan!',
            });
        } else if (flashData == 'kosong') {
            Toast.fire({
                icon: 'error',
                title: 'File tidak boleh kosong!',
            });
        } else if (flashData == 'Ubah Profil') {
            Toast.fire({
                icon: 'success',
                title: 'Profil Anda Berhasil Diubah',
            });
        } else if (flashData == 'Password') {
            Toast.fire({
                icon: 'success',
                title: 'Password Anda Berhasil Diubah',
            });
        } else if (flashData == 'Pswbaru=Pswlama') {
            Toast.fire({
                icon: 'info',
                title: 'Password baru tidak boleh sama dengan password sekarang!',
            });
        } else if (flashData == 'Pswslh') {
            Toast.fire({
                icon: 'error',
                title: 'Password sekarang salah!',
            });
        } else if (flashData == 'hapusps') {
            Toast.fire({
                icon: 'success',
                title: 'Data Berhasil Dihapus',
            });
        } else if (flashData == 'Blok') {
            Toast.fire({
                icon: 'info',
                title: 'Akun Telah Diblokir!',
            });
        } else if (flashData == 'Unblok') {
            Toast.fire({
                icon: 'info',
                title: 'Akun Telah Diaktifkan Kembali!',
            });
        } else if (flashData == 'email/pswwrong') {
            Toast.fire({
                icon: 'error',
                title: 'Email/Password Anda Salah!',
            });
        } else if (flashData == 'emailnotactivate') {
            Toast.fire({
                icon: 'error',
                title: 'Email Belum Terdaftar/diaktivasi',
            });
        } else if (flashData == 'emailnotreg') {
            Toast.fire({
                icon: 'error',
                title: 'Email Belum Terdaftar',
            });
        } else if (flashData == 'cekemail') {
            Toast.fire({
                icon: 'info',
                title: 'Silahkan Cek Email Anda, Kami Telah Mengirimkan Link Ubah Password!',
            });
        } else if (flashData == 'exptoken') {
            Toast.fire({
                icon: 'warning',
                title: 'Token Sudah Kadaluarsa',
            });
        } else if (flashData == 'wrongtoken') {
            Toast.fire({
                icon: 'warning',
                title: 'Reset Password Gagal!, Token Salah',
            });
        } else if (flashData == 'emailwrong') {
            Toast.fire({
                icon: 'warning',
                title: 'Reset Password Gagal!, Email Salah',
            });
        } else if (flashData == 'logout') {
            Toast.fire({
                icon: 'info',
                title: 'Anda Telah Logout!',
            });
        } else if (flashData == 'restore') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil di Restore!',
            });
        } else if (flashData == 'draft') {
            Toast.fire({
                icon: 'info',
                title: 'Data telah didraftkan!',
            });
        } else if (flashData == 'publish') {
            Toast.fire({
                icon: 'info',
                title: 'Data telah dipublish!',
            });
        } else if (flashData == 'save') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan',
            });
        } else if (flashData == 'formempty') {
            Toast.fire({
                icon: 'error',
                title: 'Kesalahan saat menyimpan data, mohon inputkan data yang sesuai!',
            });
        } else if (flashData == 'edit') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil diubah!',
            });
        } else if (flashData == 'hapus') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil dihapus!',
            });
        } else if (flashData == 'aktif') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil diaktifkan!',
            });
        } else if (flashData == 'nonaktif') {
            Toast.fire({
                icon: 'info',
                title: 'Data dinonaktifkan!',
            });
        } else if (flashData == 'gagal_upload') {
            Toast.fire({
                icon: 'error',
                title: 'Gagal upload!',
            });
        } else if (flashData == 'gagal_export') {
            Toast.fire({
                icon: 'error',
                title: 'Gagal export data, Data tidak boleh kosong!',
            });
        } else if (flashData == 'duplikasi') {
            Toast.fire({
                icon: 'warning',
                title: 'Gagal upload! Karena terdapat duplikasi data',
            });
        } else if (flashData == 'pengujian') {
            Toast.fire({
                icon: 'success',
                title: 'Pengujian berhasil dilakukan!',
            });
        } else if (flashData == 'truncate') {
            Toast.fire({
                icon: 'info',
                title: 'Pengosongan tabel telah selesai!',
            });
        }
    });
</script>

</body>

</html>