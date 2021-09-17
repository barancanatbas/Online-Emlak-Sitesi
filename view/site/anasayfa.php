
    <div class="slider">
        <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide"><img src="https://images6.alphacoders.com/106/thumb-1920-1068590.jpg" alt="resim yok"> </div>
          <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt=""></div>
          <div class="swiper-slide"><img src="https://images5.alphacoders.com/444/444770.jpg" alt=""></div>
        </div>
      
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      
      </div>
    </div>

    <div class="content">
      <div class="bizkimiz">
        <p></p>
      </div>
        <hr>
        <div class="medya">
            <h2 style="text-align: center; padding: 10px 0 0 0;"><i>Medya</i></h2>
            <div class="medyacard">
                <div class="MCresim"><img src="view/medya1.jpg" alt=""></div>
                <div class="MCyorum">5 yıldır ev arıyorum internette şans eseri gezerken bu siteyi gördüm ve aşırı güzel bir ev sahibi oldum </div>
            </div>
            <div class="medyacard">
                <div class="MCresim"><img src="view/medya2.jpg" alt=""></div>
                <div class="MCyorum">5 yıldır ev arıyorum internette şans eseri gezerken bu siteyi gördüm ve aşırı güzel bir ev sahibi oldum </div>
            </div>
            <div class="medyacard">
                <div class="MCresim"><img src="view/medya3.jpg" alt=""></div>
                <div class="MCyorum">5 yıldır ev arıyorum dinternette şans eseri gezerken bu siteyi gördüm ve aşırı güzel bir ev sahibi oldum </div>
            </div>
        </div>
        <hr>
        <div class="sponsorlar">
            <h2 style="text-align: center; padding: 10px 0 40px 0;"><i>Sponsorlar</i></h2>
            <div class="spresim">
                <img src="view/site/logolar/logo1.png" alt="">
            </div>
            <div class="spresim">
                <img src="view/site/logolar/logo2.png" alt="">
            </div>
            <div class="spresim">
                <img src="view/site/logolar/logo3.png" alt="">
            </div>
            <div class="spresim">
                <img src="view/site/logolar/logo4.png" alt="">
            </div>
        </div>
    </div>
    <script>
        var swiper = new Swiper('.swiper-container', {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
