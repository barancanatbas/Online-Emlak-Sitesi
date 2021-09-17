
    <div class="baslik">
        <h2>Bloglar</h2>
    </div>
    <div class="content">
        <?php if (isset($values) and !empty($values)){
            foreach ($values as $value){?>
        <div class="card" style="margin-top: 20px;width: 25rem;margin-left: 30px; display: inline-block;">
            <img class="img-blog" src="<?php echo $value[0][0]['resimsrc']; ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $value['baslik']; ?></h5>
              <p style="font-size: 14px;">Yazar : <?php echo ucwords($value['ad'])." ".mb_strtoupper($value["soyad"],"UTF-8"); ?></p>
                <p style="font-size: 14px;"><?php echo date("d-m-Y h:i",$value["tarih"]); ?></p>
              <a href="<?php echo $basedir; ?>blog/Detay/<?php echo $value['id'];?>" class="btn btn-outline-dark">Daha Fazla Oku</a>
            </div>
          </div>
        <?php }} ?>
    </div>


