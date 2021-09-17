<div class="col-md-12">

    <?php if (!empty($values[1])) {?>

        <div class="card mt-5">
            <div class="card-header">
                <strong>Resim Sil</strong>
            </div>
            <div class="card-body card-body">
                <form action="<?php echo $basedir; ?>blog/update/<?php echo $values[0]['id']; ?>"  method="post" class="form-horizontal">
                    <div style="margin: auto;" class="table-responsive m-b-80 col-md-7">
                        <table class="table table-borderless table-data3">
                            <thead>
                            <tr>
                                <th>Seçim</th>
                                <th style="max-width: 210px;">Resim</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($values[1] as $value) {?>
                                <tr>
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox" name="resimler[]" value="<?php echo $value['id']; ?>" >
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td style="max-width: 210px;"><img src="<?php echo $value['resimsrc']; ?>" style="max-width: 200px; max-height: 100px;"></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <button name="formResimSil" class="btn btn-danger">Sil</button>
                </form>

            </div>
        </div>

    <?php } ?>
    <!-- ***************************************************************************************************************** -->
    <div class="card mt-5">
        <div class="card-header">
            <strong>Resim Ekle</strong>
        </div>
        <div class="card-body card-body">
            <form action="<?php echo $basedir; ?>blog/update/<?php echo $values[0]['id']; ?>"  method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-multiple-input" class=" form-control-label">Resim Ekle</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-multiple-input" name="resim[]" multiple="" class="form-control-file" required>
                    </div>
                </div>
                <div class="row form-group">
                    <button type="submit" name="formResimEkle" class="btn btn-primary btn-md ml-2">
                        Ekle
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- ***************************************************************************************************************** -->
    <div class="card mt-5">
        <div class="card-header">
            <strong>Blog Güncelle</strong>
        </div>
        <div class="card-body card-block">
            <form name="form1" action="<?php echo $basedir; ?>blog/update/<?php echo $values[0]['id']; ?>"  method="POST" class="form-horizontal">
                <div class="row form-group mt-2">
                    <div class="col col-md-2">
                        <label for="text-input" class="form-control-label">Başlık</label>
                    </div>
                    <div class="col-12 col-md-10">
                        <input type="text" id="text-input" name="baslik" placeholder="Başlık" value="<?php echo $values[0]['baslik']; ?>" class="form-control" required>

                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2">
                        <label for="text-input" class="form-control-label">Blog</label>
                    </div>
                    <div class="col-12 col-md-10">
                        <textarea name="yazi" id='editor' required><?php echo $values[0]['yazi']; ?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <button type="submit" name="formGenelGuncelle" class="btn btn-success btn-md ml-2">
                        Güncelle
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
