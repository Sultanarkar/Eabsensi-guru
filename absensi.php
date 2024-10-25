<?php
	
  session_start();
  if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
	include "koneksi.php";
	/*
	if(isset($_session['id'])){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';	
	}*/		
	$dosen_id = $_SESSION['dosen_id'];
	$dosen_name = $_SESSION["dosen_user_name"];
	$dosen_foto = $_SESSION["dosen_user_foto"];
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Absensi | SMP ISLAM NURUSH SHODIQIN</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
        <img src="img/logosmp.jpg" alt="Logo SMP" style="width: 50px; height: auto;">
        </div>
        <div class="sidebar-brand-text mx-3">SMP ISLAM NURUSH SHODIQIN</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="absensi.php">
          <i class="fas fa-fw fa-user-check"></i>
          <span>Absensi</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="absensi.php">
        <i class="fas fa-exclamation-circle"></i>
          <span>Notifikasi</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="nilai.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Nilai Tugas</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $dosen_name ;?></span>
                <img class="img-profile rounded-circle" src="img/<?= $dosen_foto; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Setting
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="mb-5 text-gray-800">Absensi</h1>
          <div class="row">
            <!-- Collapsable Card Example -->
            <div class="col-md-4 animated--fade-in">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#absen" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="absen">
                  <h6 class="m-0 font-weight-bold text-primary">Menu Pengisian Absensi MASUK</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="absen">
                  <div class="card-body">
                  <form role="form" action="detailabsensi.php" method="get" name="postform" enctype="multipart/form-data">
                  <div class="form-group">
    <label for="mahasiswa">Guru</label>
    <select id="mahasiswa" class="form-control" name="mahasiswa">
        <?php
            $sql_mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa"); // Ambil data dari tabel guru
            while ($data = mysqli_fetch_array($sql_mahasiswa)) {
                echo "<option value='$data[id]'> $data[nama] </option>"; // Ganti 'id' dan 'nama' sesuai dengan field di tabel guru
            }
        ?>
    </select>
</div>

                  <!-- Dengan ini -->
<div class="form-group">
    <label for="jam">Jam</label>
    <input type="text" id="jam" class="form-control" name="jam" readonly>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  </div>
                </div>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
            <div class="card shadow mb-4">
     <!-- Card Header - Accordion -->
     <a href="#absen" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="absen">
                  <h6 class="m-0 font-weight-bold text-primary">Menu Pengisian Absensi KELUAR</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="absen">
                  <div class="card-body">
                  <form role="form" action="detailabsensi.php" method="get" name="postform" enctype="multipart/form-data">
                  <<div class="form-group">
    <label for="mahasiswa">Guru</label>
    <select id="mahasiswa" class="form-control" name="mahasiswa">
        <?php
            $sql_mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa"); // Ambil data dari tabel guru
            while ($data = mysqli_fetch_array($sql_mahasiswa)) {
                echo "<option value='$data[id]'> $data[nama] </option>"; // Ganti 'id' dan 'nama' sesuai dengan field di tabel guru
            }
        ?>
    </select>
</div>

                  
                  <div class="form-group">
                        <label for="jadwal">Jadwal</label>
                        <select id="jadwal" class="form-control" name="jadwal">
                            <option selected>Minggu 1</option>
                            <option>Minggu 2</option>
                            <option>Minggu 3</option>
                            <option>Minggu 4</option>
                            <option>Minggu 5</option>
                            <option>Minggu 6</option>
                            <option>Minggu 7</option>
                            <option>Minggu 8</option>
                            <option>Minggu 9</option>
                            <option>Minggu 10</option>
                            <option>Minggu 11</option>
                            <option>Minggu 12</option>
                            <option>Minggu 13</option>
                            <option>Minggu 14</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  </div>
                </div>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#rekap" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="rekap">
                  <h6 class="m-0 font-weight-bold text-primary">Menu Rekap Absensi</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse hide" id="rekap">
                  <div class="card-body">
                  <form role="form" action="rekapabsensi.php" method="get" name="postform" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select id="kelas" class="form-control" name="kelas">
                    <?php
                        $sql_kelas=mysqli_query($koneksi,"select * from kelas where id_dosen='$dosen_id'");
                        while($data=mysqli_fetch_array($sql_kelas)){
                          echo "<option value='$data[0]' > $data[1] </option>";

                        }     

                      ?>   
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Pilih Kelas</button>
                  </form>
                </div>
            </div>
                  </div>
            </div>
         </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Kelompok 1</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Logout untuk keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script>
    function updateJam() {
        const now = new Date();
        const jam = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        document.getElementById('jam').value = jam;
    }

    // Update jam setiap detik
    setInterval(updateJam, 1000);

    // Panggil fungsi untuk pertama kali saat halaman dimuat
    updateJam();
</script>


</body>

</html>
