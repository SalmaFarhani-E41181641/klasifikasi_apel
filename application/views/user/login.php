<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $judul; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url('assets/user/') ?>images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/user/') ?>vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/user/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/user/') ?>vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/user/') ?>vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/user/') ?>vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/user/') ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/user/') ?>css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?= base_url('assets/user/') ?>svg/undraw_Login_re_4vu2.svg" alt="IMG">
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
				</div>

				<form class="login100-form validate-form" action="<?= base_url('Auth') ?>" method="post">
					<span class="login100-form-title">
						Gabung
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Masuk
						</button>
					</div>

					<!-- <div class="text-center p-t-12">
						<span class="txt1">
							Lupa
						</span>
						<a class="txt2" href="#">
							Password?
						</a>
					</div> -->

					<div class="text-center p-t-120">
						<a class="txt2" href="<?= base_url('Main'); ?>">
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							kembali ke Beranda
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="<?= base_url('assets/user/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/user/') ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url('assets/user/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/user/') ?>vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/user/') ?>vendor/tilt/tilt.jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/user/') ?>js/main.js"></script>
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
					icon: 'warning',
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