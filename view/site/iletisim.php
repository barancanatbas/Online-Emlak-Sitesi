
    <div class="content">
        <h1>Görüşlerinizi Bildirin</h1>
        <hr class="col-md-12">
        <form action="<?php  echo $basedir;?>iletisim/send" class="col-md-6" method="post">
            <div class="form-group" style="margin: 6px 0;">
                <label style="padding: 5px 0;">Ad Soyad</label>
                <input type="text" class="form-control" name="adsoyad" placeholder="Adın Soyadın" required>
            </div>
            <div class="form-group" style="margin: 6px 0;">
                <label style="padding: 5px 0;">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email Adresin" required>
            </div>
            <div class="form-group" style="margin: 6px 0;">
                <label style="padding: 5px 0;">Telefon</label>
                <input type="text" class="form-control" name="tel" placeholder="Telefon Numaran (isteğe bağlı)">
            </div>
            <div class="form-group" style="margin: 6px 0;">
                <label style="padding: 5px 0;">Mesaj</label>
                <textarea rows="6" class="form-control" name="mesaj" placeholder="Mesaj" required></textarea>
            </div>
            <div class="form-group" style="margin: 12px 0;">
                <input type="submit" name="send" value="Gönder" style="margin-bottom: 30px;" class="btn btn-success">
            </div>
        </form>

    </div>
