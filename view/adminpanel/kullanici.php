<?php if (isset($_GET["durum"])) {
    if ($_GET["durum"] == "no") {
        ?>
        <div class="alert alert-danger alert-dismissible fade show col-md-12" style="margin:5px auto;" role="alert">
            <strong>Hata !</strong> Güncelleme Başarısız
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }} ?>
    <?php if (isset($_GET["durum"])) {
        if ($_GET["durum"] == "yes") {
            ?>
            <div class="alert alert-success alert-dismissible fade show col-md-12" style="margin:5px auto;" role="alert">
                Güncelleme Başarılı
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }} ?>
        <div>

            <form name="form1" action="<?php echo $basedir; ?>/kullanicilar/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="card-header">
                    <strong>Profile Fotoğrafı</strong>
                </div>
                <div class="row form-group col-md-11 mt-5">
                    <div style="width: 200px; height: 200px; padding: 5px;" class="image img-200">
                        <img src='<?php echo $values["resim"]; ?>' style="max-height: 200px;" alt="John Doe" />
                    </div>
                    <div class="col-md-5 mt-3">
                        <input type="file" id="file-input" name="resim" class="form-control-file">
                    </div>
                </div>
                <div>
                    <input type="submit" style="margin-left: 10px;margin-bottom: 20px;" name="guncelleresim" class="btn btn-success btn-md" value="Güncelle">
                </div>
            </form>

            <form name="form2" action="<?php echo $basedir; ?>/kullanicilar/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="card-header">
                    <strong>Genel Bilgiler</strong>
                </div>
                <div class="row form-group col-md-11 mt-5">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Adı</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="ad" value="<?php echo $values['ad']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group col-md-11">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Soyad</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="soyad" value="<?php echo $values['soyad']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group col-md-11">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Kullanıcı Adı</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="kuladi" value="<?php echo $values['kuladi']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group col-md-11">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Telefon</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="text-input" name="telefon" value="<?php echo $values['telefon']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group col-md-11">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="email-input" name="mail" value="<?php echo $values['mail']; ?>" class="form-control" required>
                    </div>
                </div>
                <div>
                    <input type="submit" style="margin-left: 10px;margin-bottom: 20px;" name="guncellegenel" class="btn btn-success btn-md" value="Güncelle">
                </div>
            </form>
            <form name="form3" action="<?php echo $basedir; ?>/kullanicilar/update" method="post" enctype="multipart/form-data" onsubmit="return kontrol();" class="form-horizontal">
                <div class="card-header">
                    <strong>Şifre</strong>
                </div>
                <div class="row form-group col-md-11 mt-5">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">Yeni Şifre</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="password-input" name="yenisifre1" placeholder="Şifre" class="form-control">

                    </div>
                </div>
                <div class="row form-group col-md-11">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">Yeni Re-Sifre</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="password-input" name="yenisifre2" placeholder="Şifre" class="form-control">

                    </div>
                </div>
                <div>
                    <input type="submit" style="margin-left: 10px;margin-bottom: 20px;" name="guncellesifre" class="btn btn-success btn-md" value="Güncelle">
                </div>
            </form>
        </div>
        <script>
            function kontrol(){
                var form = document.forms["form3"];
                var sifre1 = form["yenisifre1"].value;
                var sifre2 = form["yenisifre2"].value;
                if (sifre1 != sifre2) 
                {
                    alert("şifreleri aynı giriniz.");
                    return false;
                }
            }
        </script>