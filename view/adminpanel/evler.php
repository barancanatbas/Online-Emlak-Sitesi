
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row col-lg-12 mt-5 mb-3">
                    <a href="<?php echo $basedir; ?>ev/yeni" class="btn btn-info mt-3">Yeni Konut</a>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Baslik</th>
                                        <th>aciklama</th>
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($values == false){ ?>
                                        <td colspan="3" center>veri yok</td>
                                    <?php }else{ ?>
                                    <?php foreach ($values as $veri) {?>
                                    <tr>
                                        <td><p><?php echo $veri["baslik"]; ?></p></td>
                                        <td><p><?php echo $veri["aciklama"]; ?></p></td>
                                        <td>
                                            <a href="<?php echo $basedir; ?>ev/delete/<?php echo $veri["id"]; ?>" class="btn btn-danger">Sil</a>
                                            <a href="<?php echo $basedir; ?>ev/AgetHome/<?php echo $veri["id"]; ?>" class="btn btn-success">Guncelle</a>
                                        </td>

                                    </tr>
                                <?php }}?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>