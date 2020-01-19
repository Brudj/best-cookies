<?php
$best_cookie_settings = get_option(best_cookie_settings);
$front_positions_arr = array(
    1 => 'top:0;right:0;width:300px;height:100%;align-content: baseline;transform:translate(100%,0);',
    2 => 'top:0;left:0;width:300px;height:100%;align-content: baseline;transform:translate(-100%,0);',
    3 => 'top:0;left:0;width:100%;height:auto;transform:translate(0,-100%);',
    4 => 'bottom:0;left:0;width:100%;height:auto;transform:translate(0,100%);'
);
?>
<div class="best-cookies <?= $best_cookie_settings['position'] ?: $best_cookie_settings['button_size']; ?>" style="<?= $front_positions_arr[$best_cookie_settings['position']]; ?>">
    <span class="best-cookies__close"></span>
    <div class="best-cookies__bg" style="background-color:<?= $best_cookie_settings['color']; ?>"></div>
    <div class="best-cookies__left">
        <?php if ( $best_cookie_settings['title'] ) : ?>
            <h5><?= $best_cookie_settings['title']; ?></h5>
        <?php endif; ?>
        <p><?= $best_cookie_settings['text']; ?></p>
    </div>
    <a class="best-cookies__button" href="javascript:void(0);" style="color:<?= $best_cookie_settings['color']; ?>">
        <?= $best_cookie_settings['button_text']; ?>
    </a>
</div>