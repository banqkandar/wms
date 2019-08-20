<?php
    ob_start();
    //cek session
    session_start();

    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {
?>
<!doctype html>
<html lang="en">
<?php include('include/head.php'); ?>

<body class="bg">
  <header>
    <?php include('include/menu.php'); ?>
  </header>
  <div class="container">
    <?php
    if(isset($_REQUEST['page'])){
        $page = $_REQUEST['page'];
        switch ($page) {
            case 'tsm':
                include "transaksi_surat_masuk.php";
                break;
            case 'ctk':
                include "cetak_disposisi.php";
                break;
            case 'tsk':
                include "transaksi_surat_keluar.php";
                break;
            case 'asm':
                include "agenda_surat_masuk.php";
                break;
            case 'ask':
                include "agenda_surat_keluar.php";
                break;
            case 'ref':
                include "referensi.php";
                break;
            case 'sett':
                include "pengaturan.php";
                break;
            case 'pro':
                include "profil.php";
                break;
            case 'gsm':
                include "galeri_sm.php";
                break;
            case 'gsk':
                include "galeri_sk.php";
                break;
        }
    } else {
    ?>
    <div class="row">
      <?php include('include/header_instansi.php'); ?>
      <div class="col s6" id="header-instansi">
        <div class="card">
          <div class="card-content">
            <h5>Welcome <?php echo $_SESSION['nama']; ?></h5>
            <blockquote>Anda login sebagai
              <?php
              if($_SESSION['admin'] == 1){
                  echo "<strong>Super Admin</strong>. Anda memiliki akses penuh terhadap sistem.";
              } elseif($_SESSION['admin'] == 2){
                  echo "<strong>Administrator</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
              } else {
                  echo "<strong>Petugas Disposisi</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
              }?></blockquote>
          </div>
        </div>
      </div>

      <?php
          //menghitung surat masuk
          $count1 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_surat_masuk"));

          //menghitung surat masuk
          $count2 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_surat_keluar"));

          //menghitung surat masuk
          $count3 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_disposisi"));

          //menghitung klasifikasi
          $count4 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_klasifikasi"));

          //menghitung pengguna
          $count5 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_user"));
      ?>

      <!-- Info Statistic START -->
      <div class="col s12 m4">
        <div class="card red lighten-2">
          <div class="card-content">
            <h5><i class="material-icons Small">mail</i> Surat
              Masuk</h5>
            <?php echo '<p class=" link">'.$count1.' file</p>'; ?>
          </div>
        </div>
      </div>

      <div class="col s12 m4">
        <div class="card pink lighten-2">
          <div class="card-content">
            <h5><i class="material-icons Small">drafts</i> Surat
              Keluar</h5>
            <?php echo '<p class=" link">'.$count2.' file</p>'; ?>
          </div>
        </div>
      </div>

      <div class="col s12 m4">
        <div class="card purple lighten-2">
          <div class="card-content">
            <h5><i class="material-icons Small">description</i> Disposisi</h5>
            <?php echo '<p class=" link">'.$count3.' file</p>'; ?>
          </div>
        </div>
      </div>

      <div class="col s12 m4">
        <div class="card deep-purple lighten-2">
          <div class="card-content">
            <h5><i class="material-icons Small">class</i> Klasifikasi Surat</h5>
            <?php echo '<p class=" link">'.$count4.' file</p>'; ?>
          </div>
        </div>
      </div>

      <?php
            if($_SESSION['id_user'] == 1 || $_SESSION['admin'] == 2){?>
      <div class="col s12 m4">
        <div class="card indigo lighten-2">
          <div class="card-content">
            <h5><i class="material-icons Small">people</i> Pengguna</h5>
            <?php echo '<p class=" link">'.$count5.' Orang</p>'; ?>
          </div>
        </div>
      </div>
      <!-- Info Statistic START -->
      <?php
            }
        ?>

    </div>
    <!-- Row END -->
    <?php
        }
    ?>
  </div>
  <!-- container END -->

  </main>
  <!-- Main END -->

  <!-- Include Footer START -->
  <!-- <?php include('include/footer.php'); ?> -->
  <!-- Include Footer END -->

</body>
<!-- Body END -->

</html>

<?php
    }
?>