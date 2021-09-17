
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php if($values != false){ ?>
                    <div class="table-responsive table--no-card m-b-30 m-t-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                            <tr>
                                <th>Ad Soyad</th>
                                <th>Mail</th>
                                <th>Telefon</th>
                                <th>Tarih</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($values as $veri) {?>
                                <tr>
                                    <td><p><?php echo $veri["adsoyad"]; ?></p></td>
                                    <td><?php echo $veri["mail"]; ?></td>
                                    <td><?php echo $veri["telefon"]; ?></td>
                                    <td><?php echo date("d-m-Y h:i",$veri["tarih"]); ?></td>
                                    <td>
                                        <a href="<?php echo $basedir;?>iletisim/iletisimGetir/<?php echo $veri["id"]; ?>" class="btn btn-success">Yanıtla</a>
                                    </td>
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