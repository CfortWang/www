    <div class="footer">
        <div  class="footer-contect">
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4 contact">
                    <div class="contact-info">
                        <span>联系方式:Contact information</span>
                        <span style="color:gray;">———————————————————</span>
                    </div>
                    <div class="contact-msg">
                        <img src="./img/phone-icon.png">
                        <span>联系电话：0755-83830566</span>
                    </div>
                    <div class="contact-msg">
                        <img src="./img/address-icon.png">
                        <span>地址:广东省深圳市南山区粤海街道三航科技大厦7008</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="promote">
                        <div style="position: relative;">
                            <img src="./img/seedo.png" class="promote-img" />
                            <div class="promoto-qr-show qr-show-seedo">
                                <img class="promoto-qr" src="./img/qrwechat.jpg">
                                <p class="promoto-p">扫一扫下载APP</p>
                            </div>
                        </div>
                        <div class="promote-span">
                            <span>下载APP</span>
                        </div>
                    </div>
                    <div class="promote">
                        <div style="position: relative;">
                            <img src="./img/wechat.png" class="promote-img" />
                            <div class="promoto-qr-show qr-show-wechat">
                                <img class="promoto-qr" src="./img/qrwechat.jpg">
                                <p class="promoto-p">扫一扫关注公众号</p>
                            </div>
                        </div>
                        <div class="promote-span">
                            <span>关注公众号</span>
                        </div>
                    </div>
                    <div class="promote ">
                        <div style="position: relative;">
                            <img src="./img/vb-icon.png" class="promote-img" />
                            <div class="promoto-qr-show qr-show-weibo">
                                <img class="promoto-qr" src="./img/qrweibo.png">
                                <p class="promoto-p">扫一扫关注微博</p>
                            </div>
                        </div>
                        <div class="promote-span">
                            <span>官方微博</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">Copyright©2016~2017 1shang.com 版权所有 沪ICP备14043374号-1</div>
    </div>
    <script>
    $(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() >= 1) {
                $('.seedo-nav').addClass('fix_nav');
                $('#up').show();
            } else {
                $('.seedo-nav').removeClass('fix_nav');
                $('#up').hide();
            }
        });
    });
    $('.promote').click(function() {
        
    })
    $(".promote-img").on("mouseenter", function () {
        $(this).next().show();
    }).on("mouseleave", function () {
        $(this).next().hide();
    });
    var timer = null;
    $('#up').click(function(){
        cancelAnimationFrame(timer);
        timer = requestAnimationFrame(function time(){
            var oTop = document.body.scrollTop || document.documentElement.scrollTop;
            if(oTop > 0){
                scrollBy(0,-50);
                timer = requestAnimationFrame(time);
                }else{
                cancelAnimationFrame(timer);
                } 
        });
    })
    </script>
