

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <button type="button" class="btn btn-info m-t-30" data-toggle="modal" data-target="#exampleModalCenter">
                    Ekle
                </button>
                <?php if($values != false){ ?>
                    <div class="table-responsive table--no-card m-b-30 m-t-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                            <tr>
                                <th>Başlık</th>
                                <th>Yapılacak İş</th>
                                <th>Oluşturma Tarihi</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($values as $veri) { ?>
                                <tr>
                                    <td><p><?php echo $veri["title"]; ?></p></td>
                                    <td><?php echo $veri["content"]; ?></td>
                                    <td><?php echo date("d-m-Y h:i",$veri["createDate"]); ?></td>
                                    <td style="max-width: 30px">
                                        <a href="<?php echo $basedir; ?>yapilacaklar/update/<?php echo $veri['id']; ?>" class="btn btn-success">Yapıldı</a>
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Onay</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo $basedir; ?>yapilacaklar/insert" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Başlık</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="baslik" placeholder="Başlık">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">İçerik</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="icerik"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="btnekle" class="btn btn-primary" value="Ekle">
                </div>
            </form>
        </div>
    </div>
</div>