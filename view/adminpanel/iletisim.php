<div class="col-md-12">
    <div class="card mt-5">
        <div class="card-header">
            <strong>Yanıtla</strong>
        </div>
        <div class="card-body card-block">
            <form name="form1" action="<?php echo $basedir; ?>iletisim/sendMail"  method="POST" class="form-horizontal">

                <div class="row form-group mt-2">
                    <div class="col col-md-2">
                        <label for="text-input" class="form-control-label">Gönderen</label>
                    </div>
                    <div class="col-12 col-md-10">
                        <label for="text-input" class="form-control-label"><?php echo $values['adsoyad']; ?></label>
                        <input type="text" id="text-input" style="display: none;" name="adsoyad" placeholder="Başlık" value="<?php echo $values['adsoyad']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group mt-2">
                    <div class="col col-md-2">
                        <label for="text-input" class="form-control-label">Mail</label>
                    </div>
                    <div class="col-12 col-md-10">
                        <label for="text-input" class="form-control-label"><?php echo $values['mail']; ?></label>
                        <input type="text" id="text-input" style="display: none;" name="mail" placeholder="Başlık" value="<?php echo $values['mail']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group mt-2">
                    <div class="col col-md-2">
                        <label for="text-input" class="form-control-label">Telefon</label>
                    </div>
                    <div class="col-12 col-md-10">
                        <label for="text-input" class="form-control-label"><?php echo $values['telefon']; ?></label>
                        <input type="text" id="text-input" style="display: none;" name="telefon" placeholder="Başlık" value="<?php echo $values['telefon']; ?>" class="form-control">
                    </div>
                </div>

                <div class="row form-group mt-2">
                    <div class="col col-md-2">
                        <label for="text-input" class="form-control-label">Mesaj</label>
                    </div>
                    <div class="col-12 col-md-10">
                        <label for="text-input" class="form-control-label"><?php echo $values['mesaj']; ?></label>
                        <input type="text" id="text-input" style="display: none;" name="mesaj" placeholder="Başlık" value="<?php echo $values['mesaj']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group mt-2">
                    <div class="col col-md-2">
                        <label for="text-input" class="form-control-label">Konu</label>
                    </div>
                    <div class="col-12 col-md-10">
                        <input type="text" id="text-input" name="konu" placeholder="Konu" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2">
                        <label for="text-input" class="form-control-label">Cevap Yaz</label>
                    </div>
                    <div class="col-12 col-md-10">
                        <textarea name="cevap" id='editor' required></textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <button type="submit" name="formGenelGuncelle" class="btn btn-success btn-md ml-2">
                        Yanıtla
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
