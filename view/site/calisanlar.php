
    <div class="baslik">
        <h2>Çalışanlar</h2>
    </div>
    <div class="content">
        <?php if(isset($values) and !empty($values)){
            foreach ($values as $value) {?>
                <div class="card" style="width: 18rem; border-radius: 5%; display: inline-block;margin-left: 20px;">
                    <img class="img" src="<?php echo $value['resim']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <p style="text-align: center; font-weight: bold;"><?php echo ucwords($value['ad'])." ".mb_strtoupper($value["soyad"],"UTF-8"); ?></p>
                        <p style="text-align: center; font-size: smaller; color: #595959;"><?php echo $value['mail']; ?></p>
                        <p style="text-align: center; font-size: smaller; color: #595959;"><?php echo $value['kidem']; ?></p>
                    </div>
                </div>
        <?php }}?>
    </div>
