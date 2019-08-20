<?php
    //cek session
    if(!empty($_SESSION['admin'])){
?>
<noscript>
    <meta http-equiv="refresh" content="0;URL='./enable-javascript.html'" />
</noscript>
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <br />
        </div>
    </div>
    <div class="footer-copyright blue-grey darken-1 white-text">
        <div class="container" id="footer">
            <?php
                $query = mysqli_query($config, "SELECT * FROM tbl_instansi");
                while($data = mysqli_fetch_array($query)){
            ?>
            <span class="white-text copyright-date">&copy; <?php echo date("Y"); ?> <?php echo $data['nama'] .'</span>
                ';?>
                <?php } ?>
        </div>
    </div>
</footer>

<?php
    } else {
        header("Location: ../");
        die();
    }
?>