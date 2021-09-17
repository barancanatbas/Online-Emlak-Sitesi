
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row col-lg-12 mt-5 mb-3">
            <a href="<?php echo $basedir; ?>blog/yeni" class="btn btn-info mt-3">Yeni Blog</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if($values){ ?>
                <div class="table-responsive table--no-card m-b-30">
                    <table class="table table-borderless table-striped table-earning">
                        <thead>
                            <tr>
                                <th>Baslik</th>
                                <th>Calışan</th>
                                <th>Tarih</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($values as $veri) {?>
                                <tr>
                                    <td><p><?php echo $veri["baslik"]; ?></p></td>
                                    <td><?php echo $veri["ad"]." ".$veri["soyad"]; ?></td>
                                    <td><?php echo date("d-m-Y h:i",$veri["tarih"]); ?></td>
                                    <?php if($_SESSION["kullanici"]["id"] == $veri["calisanid"]){ ?>
                                        <td>
                                            <a href="<?php echo $basedir; ?>blog/delete/<?php echo $veri['id']; ?>" class="btn btn-danger">Sil</a>
                                            <a href="<?php echo $basedir; ?>blog/AgetBlog/<?php echo $veri["id"]; ?>" class="btn btn-success">Guncelle</a>
                                        </td>
                                    <?php }else{ ?>
                                        <td><i class="fas fa-ban"></i></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php }else{ ?>
                    <p>veri yok</p>
                <?php }?>
            </div>
            
        </div>
    </div>
</div>