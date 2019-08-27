<?php
    ob_start();
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
      <div class="col s12" id="header-instansi">
        <div class="card">
          <div class="card-content">
            <h5>Selamat Datang <span style="color:#0D47A1;"><?php echo $_SESSION['nama']; ?></span></h5>
            <blockquote>Anda login sebagai
              <?php
                if($_SESSION['admin'] == 1){
                    echo "<i>Super Admin</i>. Anda memiliki akses penuh terhadap sistem.";
                } elseif($_SESSION['admin'] == 2){
                    echo "<i>Administrator</i>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                } else {
                    echo "<i>Petugas Disposisi</i>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                }?>
              </blockquote>
          </div>
        </div>
      </div>
      <?php
          $count1 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_surat_masuk"));
          $count2 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_surat_keluar"));
          $count3 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_disposisi"));
          $count4 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_klasifikasi"));
          $count5 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_user"));
      ?>
      <div class="col s12 m3">
        <div class="card blue accent-1">
          <div class="card-content">
            <h5><i class="material-icons Small">mail</i> Surat
              Masuk</h5>
            <?php echo '<p class=" link">'.$count1.' file</p>'; ?>
          </div>
        </div>
      </div>

      <div class="col s12 m3">
        <div class="card light-blue accent-1">
          <div class="card-content">
            <h5><i class="material-icons Small">drafts</i> Surat
              Keluar</h5>
            <?php echo '<p class=" link">'.$count2.' file</p>'; ?>
          </div>
        </div>
      </div>

      <div class="col s12 m3">
        <div class="card cyan accent-1">
          <div class="card-content">
            <h5><i class="material-icons Small">description</i> Disposisi</h5>
            <?php echo '<p class=" link">'.$count3.' file</p>'; ?>
          </div>
        </div>
      </div>

      <!-- <div class="col s12 m3">
        <div class="card teal accent-1">
          <div class="card-content">
            <h5><i class="material-icons Small">class</i> Klasifikasi Surat</h5>
            <?php echo '<p class=" link">'.$count4.' file</p>'; ?>
          </div>
        </div>
      </div> -->

      <?php
            if($_SESSION['id_user'] == 1 || $_SESSION['admin'] == 2){?>
      <div class="col s12 m3">
        <div class="card teal accent-1">
          <div class="card-content">
            <h5><i class="material-icons Small">people</i> Pengguna</h5>
            <?php echo '<p class=" link">'.$count5.' Orang</p>'; ?>
          </div>
        </div>
      </div>
      <?php
            }
        ?>
    </div>
    <?php
        }
    ?>
  </div>
  </main>
</body>
</html>
<?php
    }
?>