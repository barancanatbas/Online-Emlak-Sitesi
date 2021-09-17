<div class="baslik">
    <h2>Blog Resimleri</h2>
</div>
<?php if(isset($values[0]) and !empty($values[0])){ ?>
<div class="sliderblog">
    <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php foreach ($values[0] as $value){ ?>
            <div class="swiper-slide"><img src="<?php echo $value['resimsrc']; ?>" alt="resim yok"> </div>
            <?php }?>
        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>
</div>
<?php }?>

<div class="content">
    <hr>
    <h1 style="padding: 20px 0; font-weight: bold; text-align: center; font-family: "Arial Black", arial-black";> <?php echo mb_strtoupper($values["baslik"],"utf8"); ?></h1>
    <div class="blogicerik">
        <p><?php echo  filtrecoz($values["yazi"]); ?></p>
    </div>
</div>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>
