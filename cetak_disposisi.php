<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header("Location: ./");
        die();
    } else {

        echo '
        <style type="text/css">
            table {
                border: none;
                background: #fff;
                padding: 5px;
            }
            
            tr,td {
                vertical-align: top!important;
            }
            
            .isi {
                height: 300px!important;
            }
            .disp {
                text-align: center;
                padding: 1.5rem 0;
                margin-bottom: .5rem;
            }
            .logodisp {
                float: left;
                position: relative;
                width: 90px;
                height: 90px;
                margin: 0 0 0 1rem;
            }
            #lead {
                margin-top: 100px;
                width: auto;
                position: relative;
                float:right;
            }
            .lead {
                font-weight: bold;
                text-decoration: underline;
                margin-bottom: -10px;
            }
            .tgh {
                text-align: center;
            }
            #nama {
                font-size: 2.1rem;
                margin-bottom: -1rem;
            }
            #alamat {
                font-size: 16px;
            }
            .up {
                text-transform: uppercase;
                margin: 0;
                line-height: 2.2rem;
                font-size: 1.5rem;
            }
            .status {
                margin: 0;
                font-size: 1.3rem;
                margin-bottom: .5rem;
            }
            #lbr {
                font-size: 20px;
                font-weight: bold;
            }
            .aw {
                display: inline-block;
                width:50%
                margin-bottom: 4px;
            }
            .ar {
                width:50%;
                margin-bottom: 8px;
            }
            .nosurat{
                float:right;
            }
            .isiringkas {
                margin-bottom: 15px;
                text-align: justify;
            }
            .isi {
                margin-top: 50px;
            }
            @media print{
                body {
                    font-size: 12px;
                    color: #212121;
                }
                nav {
                    display: none;
                }
                table {
                    border: 0px !important;
                    width: 100%;
                    font-size: 12px;
                }
                tr,td {
                    vertical-align: top!important;
                }
                #lbr {
                    font-size: 20px;
                }
                .isi {
                    height: 200px!important;
                }
                .tgh {
                    text-align: center;
                }
                .disp {
                    text-align: center;
                    margin: -.5rem 0;
                }
                .logodisp {
                    float: left;
                    position: relative;
                    width: 60px;
                    height: 60px;
                    margin: .5rem 0 0 .5rem;
                }
                #lead {
                    margin-top: 100px;
                    width: auto;
                    position: relative;
                    float:right;
                }
                .lead {
                    font-weight: bold;
                    text-decoration: underline;
                    margin-bottom: -10px;
                }
                #nama {
                    font-size: 20px!important;
                    text-transform: uppercase;
                    margin: -10px 0 -20px 0;
                }
                .up {
                    font-size: 17px!important;
                    font-weight: normal;
                }
                .status {
                    font-size: 17px!important;
                    font-weight: normal;
                    margin-bottom: -.1rem;
                }
                #alamat {
                    margin-top: -15px;
                    font-size: 13px;
                }
                .separator {
                    border-bottom: 2px solid #616161;
                    margin: -1rem 0 1rem;
                }

                .aw {
                    display: inline-block;
                    margin-bottom: 4px;
                }
                .ar {
                    width:50%;
                    margin-bottom: 8px;
                }
                .nosurat{
                    float:right;
                }
                .isiringkas {
                    margin-bottom: 15px;
                    text-align: justify;
                }
            }
        </style>
        <body onload="window.print()">
            <div id="colres">
                <div class="disp">';
                    $query2 = mysqli_query($config, "SELECT institusi, nama, alamat, logo FROM tbl_instansi");
                    list($institusi, $nama, $alamat, $logo) = mysqli_fetch_array($query2);
                        echo '<img class="logodisp" src="./upload/'.$logo.'"/>';
                        echo '<h6 class="up">'.$institusi.'</h6>';
                        echo '<h5 class="up" id="nama">'.$nama.'</h5><br/>';
                        echo '<span id="alamat">'.$alamat.'</span>';

                    echo '
                </div>
                <hr class="separator">
                ';
                $id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
                $query = mysqli_query($config, "SELECT * FROM tbl_surat_masuk WHERE id_surat='$id_surat'");

                if(mysqli_num_rows($query) > 0){
                $no = 0;
                while($row = mysqli_fetch_array($query)){

                echo '
                <div class="aw">
                    <p><strong >Nomor</strong> : '.$row['no_surat'].'</p>
                </div>
                <div class="aw  nosurat">
                    <p> '.$row['asal_surat'].', '.indoDate($row['tgl_surat']).'</p>
                </div>
                <div class="ar ">
                    <strong>Lampiran</strong> : '.$row['keterangan'].'
                </div>
                <div class="ar ">
                    <strong>Kode Klasifikasi</strong> : '.$row['kode'].'                    
                </div>
                <div class="isiringkas">
                    <strong>Perihal</strong> : '.$row['isi'].' 
                </div>
                <div>
                    Surat dari '.$row['keterangan'].', '.indoDate($row['tgl_diterima']).' tentang Permohonan Kerja Praktek.
                </div>';
                $query3 = mysqli_query($config, "SELECT * FROM tbl_disposisi JOIN tbl_surat_masuk ON tbl_disposisi.id_surat = tbl_surat_masuk.id_surat WHERE tbl_disposisi.id_surat='$id_surat'");
                            if(mysqli_num_rows($query3) > 0){
                                $no = 0;
                                $row = mysqli_fetch_array($query3);{
                echo'
                <div>
                <p>Sehubungan dengan hal ini tersebut diatas, kami laporkan kepada '.$row['tujuan'].' bahwa Mahasiswa Bapak/Ibu atas nama: </p>
                </div>
                <div>
                <p>'.$row['isi_disposisi'].' </p>
                </div>
                <div>
                <p>'.$row['catatan'].' </p>
                </div>';
                                }
                            } else {
                                echo '
                                <div>
                                    <p> - </p> 
                                </div>
                                <div>
                                    <p> -  </p>
                                </div>
                                <div>
                                    <p> -  </p>
                                </div>';
                            }
                        } echo '
                </tbody>
            </table>
            <div id="lead">
                <p>KASI TIK POLRI BANDUNG</p>
                <div style="height: 50px;"></div>';
                $query = mysqli_query($config, "SELECT kepsek, nip FROM tbl_instansi");
                list($kepsek,$nip) = mysqli_fetch_array($query);
                if(!empty($kepsek)){
                    echo '<p class="lead">'.$kepsek.'</p>';
                } else {
                    echo '<p class="lead">Moh. Iskandar S.Kom.</p>';
                }
                if(!empty($nip)){
                    echo '<p>KOMPOL NRP. '.$nip.'</p>';
                } else {
                    echo '<p>KOMPOL NRP. -</p>';
                }
                echo '
            </div>
        </div>
        <div class="jarak2"></div>

    </body>';
    }
}
?>