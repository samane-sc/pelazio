<?php global $options;?>
<section class="contact-section">
    <div class="row">
        <div class="col-lg-4 d-none d-lg-block contact-section__text">
            <h5>برای کمک و راهنمایی همیشه در کنار شما هستیم</h5>
        </div>
        <div class="col-lg-8 col-md-12 contact-section__icons">
            <?php
            $lists = $options['setting']['contacts'];
            if ($lists) {
                foreach ($lists as $list) {
                    if (isset($list['address']) && !empty($list['address'])){
                        ?>
                        <div class="contact-section__icon">
                            <a><i class="<?php echo $list['icon'] ?>"></i></a>
                            <div class="contact-section__icon__col">
                                <h6><?php echo $list['name'] ?></h6>
                                <span><?php echo $list['address'] ?></span>
                            </div>
                        </div>
                    <?php }
                 }
            }
            ?>
        </div>
    </div>
</section>