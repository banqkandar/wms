<?php
    //cek session
    if(!empty($_SESSION['admin'])){

        require_once 'include/config.php';
        require_once 'include/functions.php';
        $config = conn($host, $username, $password, $database);
?>
<head>
    <title>Web manajemen surat</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <?php
      $query = mysqli_query($config, "SELECT logo from tbl_instansi");
      list($logo) = mysqli_fetch_array($query);
      echo '<link rel="shortcut icon" href="upload/'.$logo.'">';
    ?>
    <link type="text/css" rel="stylesheet" href="asset/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="asset/css/jquery-ui.css">
    <link rel="stylesheet" href="css/mystyle.css">

    <script type="text/javascript" src="asset/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="asset/js/materialize.min.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="asset/js/jquery.autocomplete.min.js"></script>
    <script data-pace-options='{ "ajax": false }' src='asset/js/pace.min.js'></script>
    <script type="text/javascript">
    $(document).ready(function () {
        //jquery dropdown
        $(".dropdown-button").dropdown({
            hover: false
        });

        //jquery sidenav on mobile
        $('.button-collapse').sideNav({
            menuWidth: 240,
            edge: 'left',
            closeOnClick: true
        });

        //jquery datepicker
        $('#tgl_surat,#batas_waktu,#dari_tanggal,#sampai_tanggal').pickadate({
            selectMonths: true,
            selectYears: 10,
            format: "yyyy-mm-dd"
        });

        //jquery teaxtarea
        $('#isi_ringkas').val('');
        $('#isi_ringkas').trigger('autoresize');

        //jquery dropdown select dan tooltip
        $('select').material_select();
        $('.tooltipped').tooltip({
            delay: 10
        });

        //jquery autocomplete
        $("#kode").autocomplete({
            serviceUrl: "kode.php", // Kode php untuk prosesing data.
            dataType: "JSON", // Tipe data JSON.
            onSelect: function (suggestion) {
                $("#kode").val(suggestion.kode);
            }
        });

        //jquery untuk menampilkan pemberitahuan
        $("#alert-message").alert().delay(5000).fadeOut('slow');

        //jquery modal
        $('.modal-trigger').leanModal();
    });
</script>
</head>

<?php
    } else {
        header("Location: ../");
        die();
    }
?>