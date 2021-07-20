  <!-- Footer ------>
  <section id="footer">
      <div class="container">
          <div class="row">
              <div class="col-md-6 footer-box">
                  <p class="text-white"><img src="<?= base_url('assets/user/'); ?>images/logo.png" style="width:7% !important" alt=""><b> SIKAPEL</b></p>
                  <p>SIKAPEL adalah Sistem Informasi Klasifikasi Apel Malang yang menggunakan Metode Support Vector Machine (SVM).
                  </p>
              </div>
              <div class="col-md-6 footer-box">
                  <p id="kontak"><b>KONTAK KAMI</b></p>
                  <p><i class="fa fa-map-marker"></i>Jember</p>
                  <p><i class="fa fa-phone"></i>+62 838 5210 9582</p>
                  <p><i class="fa fa-envelope-o"></i>sikapel@gmail.com</p>
              </div>
              <div class="col-md-6 ">
                  <p class="copyright">Copyright © 2021. SIKAPEL | Designed by <a href="https://www.salvatoremandis.it/index-eng.html">Salvatore Mandis</a></p>
              </div>
          </div>
          <br>
      </div>
  </section>
  <!--- Smooth Scroll js ---------->
  <script type="text/javascript" src="<?= base_url('assets/user/') ?>js/smooth-scroll.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
  <script>
      var scroll = new SmoothScroll('a[href*="#"]');
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
                  title: 'Penambahan user baru telah selesai!',
              });
          } else if (flashData == 'notLogin') {
              Toast.fire({
                  icon: 'warning',
                  title: 'Silahkan Login terlebih dahulu!',
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
          } else if (flashData == 'Aktif') {
              Toast.fire({
                  icon: 'info',
                  title: 'Akun Telah Diaktifkan!',
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

  <!-- <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script> -->
  <!-- <script>
    new AutoNumeric.multiple('.inputan', {
        allowDecimalPadding: false,
        decimalCharacter: ".",
        digitGroupSeparator: "",
        decimalPlaces:"15"
    })

</script> -->
  <script>
      function showFileName(param, target) {
          const value = $(param).val();
          const fileName = value.split('\\').pop();
            $(target).html(fileName);
          }
  </script>
  <script>
      async function checkInput() {
          const Toast = Swal.mixin({
              toast: true,
              position: 'top',
              showConfirmButton: false,
              timer: 5000
          });
          const input = document.getElementsByClassName('inputan');
          let form = [];

          for (let i = 0; i < input.length; i++) {
              if (input[i].value) {
                  form[input[i].id] = input[i].value;
              }
          }

          if (Object.keys(form).length < 9) {
              return Toast.fire({
                  icon: 'warning',
                  title: 'Harap isi semua inputan',
              });
          }

          await getResult(form);

      }

      async function getResult(input) {
          $('#hasil').html('');
          $('#button-area').html(`
          <button type="button" class="btn-uji d-flex flex-row"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="mr-2" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="24px" height="24px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                  <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                </circle>
              </svg> Loading
            </button>
          `);
          console.log('memproses data...');
          const data = await fetch(`<?= base_url('API/ujitunggal') ?>?mean_s=${input['mean_s']}&mean_h=${input['mean_h']}&mean_i=${input['mean_i']}&skewness_h=${input['skewness_h']}&skewness_i=${input['skewness_i']}&skewness_s=${input['skewness_s']}&kurtosis_h=${input['kurtosis_h']}&kurtosis_s=${input['kurtosis_s']}&kurtosis_i=${input['kurtosis_i']}`)
              .then(res => res.json())
              .then(result => result)
              .catch(error => console.error(error))
          console.log(data.data[0]);
          console.log('data sukses');
          $('#button-area').html(`
          <button type="button" onclick="checkInput()" class="btn-uji"><i class="fa fa-area-chart"></i> Uji Data</button>
          `);
          $('#hasil').html(`
            <div class="card-hasil mt-5 animate__animated animate__bounceIn">
                <div class="col-md-12">
                <span>Hasil:</span><br>
                <img src="<?= base_url('assets/user/') ?>images/${data.data[0] == -1 ? 'manalagi' : 'green'}.png" class="mt-4" style="width:7% !important;" alt=""><br>
                <span>${data.data[0] == -1 ? 'Manalagi' : 'Green Smith'}</span>
                </div>
            </div>
          `);
      }

      $('#btn-reset').on('click', function() {
          $('#hasil').html('');
      })
  </script>
  </body>

  </html>