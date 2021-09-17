<?php if (isset($_GET["durum"])) {
    if ($_GET["durum"] == "no") {
        ?>
        <div class="alert alert-danger alert-dismissible fade show col-md-12" style="margin:5px auto;" role="alert">
            Başarısız
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }} ?>
    <?php if (isset($_GET["durum"])) {
        if ($_GET["durum"] == "yes") {
            ?>
            <div class="alert alert-success alert-dismissible fade show col-md-12" style="margin:5px auto;" role="alert">
                Başarılı
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }} ?>

        <div style="margin: auto;" class="table-responsive m-b-80 col-md-11">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Mail</th>
                        <th>Kıdem</th>
                        <th>Cinsiyet</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($values as $veri) { ?>
                        <tr>
                            <td><img style="max-width: 90px;max-height: 90px; height: 90px; width: 90px; border-radius: 50%;" class="image" src = "<?php echo $veri['resim']; ?>"></td>
                            <td><?php echo $veri["ad"]; ?></td>
                            <td><?php echo $veri["soyad"]; ?></td>
                            <td><?php echo $veri["mail"]; ?></td>
                            <td><?php echo $veri["kidem"]; ?></td>
                            <td><?php echo $veri["cinsiyet"]; ?></td>
                            <td>
                                <?php if($_SESSION["kullanici"]["kidem"] == "patron"){ ?>
                                    <a class="btn btn-danger " href="<?php echo $basedir; ?>kullanicilar/deleteUser/<?php echo $veri['id']; ?>"><i class="fas fa-trash-alt"></i> Sil</a>
                                <?php }else{ ?>
                                    <p>yetkiniz yok</p>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>