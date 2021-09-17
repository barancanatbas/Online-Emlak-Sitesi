

<div class="baslik">
    <h2>Evler</h2>
</div>
<div class="content">
    <div class="evler">
        <div class="filtre">
            <form action="<?php  echo $basedir;?>ev" method="post">
                <div class="form-group" style="width: 90%;margin: auto; padding: 25px;">
                    <h3 style="padding: 10px 0;">Fiyat aralığı</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="min" placeholder="Min" required max="10000000" min="1">
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="max" placeholder="Max" required max="10000000" min="1">
                        </div>
                    </div>
                </div>
                <div class="form-group"style="width: 90%;margin: auto; padding: 25px;">
                    <h3 style="padding: 10px 0;">Durum</h3>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="durum" id="inlineRadio1" value="kira">
                        <label class="form-check-label" style="font-size: large;font-weight: 500;" for="inlineRadio1">Kira</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="durum" id="inlineRadio2" value="satılık">
                        <label class="form-check-label" style="font-size: large;font-weight: 500;" for="inlineRadio2">Satılık</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="durum" id="inlineRadio3" value="hepsi" checked>
                        <label class="form-check-label" style="font-size: large;font-weight: 500;" for="inlineRadio3">Hepsi</label>
                    </div>
                </div>
                <div class="form-group"style=" width: 90%;margin: auto; padding: 10px 25px 25px 25px;">
                    <input type="submit" name="filtre" class="btn btn-secondary btn-lg" value="Getir">
                </div>
            </form>
        </div>
        <div class="icerik">

            <?php if (isset($values)){
                foreach ($values as $value){?>
            <div class="evcard">
                <div class="evresim">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($value[0] as $resim){ ?>
                            <div class="swiper-slide"><img src="<?php echo $resim['resimsrc']; ?>" alt=""></div>
                            <?php } ?>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="evicerik">
                    <div class="evbaslik"><h3><?php echo $value["baslik"]; ?></h3></div>
                    <div class="evfiyat"><?php echo number_format($value["fiyat"], 2, ',', '.') ?> TL</div>
                    <div class="evdetay">
                        <a href="<?php echo $basedir; ?>ev/gethome/<?php echo $value['id']; ?>" class="btn btn-secondary"> Detay </a>
                    </div>
                </div>

            </div>
            <?php }} ?>
        </div>
    </div>
</div>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
    });
</script>