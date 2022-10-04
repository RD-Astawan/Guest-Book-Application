<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include('Layouts.header')
	<style>
		/* HIDE RADIO */
		[type=radio] { 
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
            }

            /* IMAGE STYLES */
            [type=radio] + img {
            cursor: pointer;
            width: 40px;
            height:40px;
            background-image:none;
            }

            /* CHECKED STYLES */
            [type=radio]:checked + img {
            outline: 2px solid #f00;
            }
	</style>
</head>
<body>
	@include('sweetalert::alert')
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="blue">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="index.html" class="logo">
					<img src="{{ asset('logo/logo.png') }}" alt="navbar brand" class="navbar-brand" style="margin-left:60px;" width="50px">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			@include('Layouts/navbar')
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		@include('Layouts/sidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
			@yield('content')
			
		</div>
		
	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('template/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('template/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('template/js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('template/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('template/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('template/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

	<!-- Moment JS -->
	<script src="{{ asset('template/js/plugin/moment/moment.min.js') }}"></script>

	<!-- Chart JS -->
	<script src="{{ asset('template/js/plugin/chart.js/chart.min.js') }}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('template/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

	<!-- Chart Circle -->
	<script src="{{ asset('template/js/plugin/chart-circle/circles.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ asset('template/js/plugin/datatables/datatables.min.js') }}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('template/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<!-- Bootstrap Toggle -->
	<script src="{{ asset('template/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{ asset('template/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('template/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

	<!-- Google Maps Plugin -->
	<script src="{{ asset('template/js/plugin/gmaps/gmaps.js') }}"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('template/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
	<script src="{{ asset('cdn/sweetalert2.js') }}"></script>
	<!-- Azzara JS -->
	<script src="{{ asset('template/js/ready.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#datatables').DataTable({
				"ordering":false,
			});
		});
		//Verifikasi with 1 value
		function selectFunction() {
			var kode = 1;
			var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
			$.ajax({
				headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            	},
				type: "get",
				url: "/konfirm/"+kode,
				success: function(resp){
					if(resp.success) {
						swal.fire("Berhasil!", resp.message, "success");
						setTimeout(function(){
							window.location.reload();
						}, 1000);
                    } else {
                        swal.fire("Error!", 'Sumething went wrong.', "error");
                    }
				}
			});
		}
		//Verifikasi with 0 value
		function selectFunction2() {
			var kode = 0;
			var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
			$.ajax({
				headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            	},
				type: "get",
				url: "/konfirm2/"+kode,
				success: function(resp){
					if(resp.success) {
						swal.fire("Berhasil!", resp.message, "success");
						setTimeout(function(){
							window.location.reload();
						}, 1000);
                    } else {
                        swal.fire("Error!", 'Sumething went wrong.', "error");
                    }
				}
			});
		}
		//Verifikasi with 1 value
		function selectBtn() {
			var kode = 1;
			var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
			$.ajax({
				headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            	},
				type: "get",
				url: "/konfirmBtn/"+kode,
				success: function(resp){
					if(resp.success) {
						swal.fire("Berhasil!", resp.message, "success");
						setTimeout(function(){
							window.location.reload();
						}, 1000);
                    } else {
                        swal.fire("Error!", 'Sumething went wrong.', "error");
                    }
				}
			});
		}
		//Verifikasi with 0 value
		function selectBtn2() {
			var kode = 0;
			var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
			$.ajax({
				headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            	},
				type: "get",
				url: "/konfirmBtn2/"+kode,
				success: function(resp){
					if(resp.success) {
						swal.fire("Berhasil!", resp.message, "success");
						setTimeout(function(){
							window.location.reload();
						}, 1000);
                    } else {
                        swal.fire("Error!", 'Sumething went wrong.', "error");
                    }
				}
			});
		}
	</script>
</body>
</html>