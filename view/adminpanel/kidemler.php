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
        <?php if($_SESSION["kullanici"]["kidem"] == "patron"){ ?>
            <div style="margin: auto;" class="row col-md-8 mt-5 mb-5">
                <a href="<?php echo $basedir; ?>kidem/yeni" class="btn btn-success mt-2">Yeni Kıdem</a>
            </div>
        <?php } ?>
        <div style="margin: auto;" class="table-responsive m-b-80 col-lg-8">
            <table class="table table-data3">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Kidem</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($values as $veri) { ?>
                        <tr>
                            <td style="text-align: left;"><?php echo $veri["id"]; ?></td>
                            <td><?php echo $veri["kidem"]; ?></td>
                            <td><a href="<?php echo $basedir; ?>kidem/delete/<?php echo $veri['id']; ?>" class="btn btn-danger"><i style="padding-right: 5px;" class="far fa-trash-alt"></i>Sil</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>