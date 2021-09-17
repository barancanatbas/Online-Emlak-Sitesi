<div class="content">
    <div class="evdetayresim">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($values[0] as $resim){ ?>
                <div class="swiper-slide"><img src="<?php echo $resim['resimsrc']; ?>" alt=""></div>
                <?php }?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="bilgiler">
        <div class="evdetaybaslik"><h1><?php echo $values['baslik']; ?></h1></div>
        <div class="adres"><h4><?php echo number_format($values["fiyat"], 2, ',', '.') ?> TL</h4></div>
        <div class="evdetaydurum"><h5><?php echo $values['durum']; ?></h5></div>
        <div class="adres"><h5><?php echo $values['adres']; ?></h5></div>
        <hr style="width: 95%;margin: auto;">
        <div class="aciklama">
            <h3>Açıklamalar</h3>
            <p><?php echo $values['aciklama']; ?></p>
        </div>
        <hr style="width: 95%;margin: auto;">
        <div class="ozellikler">
            <h3>Özellikler</h3>
            <p>
                <?php echo filtrecoz($values['ozellikler']); ?>
            </p>
        </div>
    </div>
</div>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 1) + '</span>';
            },
        },
    });
</script>