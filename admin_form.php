<div class="best-cookies">
    <h1>Best Cookies User Settings:</h1>
    <!--<a class="cookie-link" href="https://github.com/Brudj/cookie-disclaimer" target="_blank">GitHub Project Link</a>-->
    <?php if ( intval($_POST['update_cookie']) && user_can(get_current_user_id(), 'manage_options') ) :
        if ( empty($_POST['title']) || empty($_POST['button_text']) ): ?>
            <p class="best-cookies__error">Cookie Text and Accept Button fields must be filled</p>
        <?php endif;
    endif; ?>
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>?page=best_cookies">
        <?php $best_cookie_settings = get_option(best_cookie_settings); ?>
        <input type="hidden" name="update_cookie" value="1">
        <div class="best-cookies__radio">
            <p>Cookie Popup Enabled?</p>
            <input type="radio" id="bestCookieStageEnabled" name="active" value="1" <?= $best_cookie_settings['active'] ? "checked" : ""; ?>>
            <label for="bestCookieStageEnabled">Yes</label>
            <input type="radio" id="bestCookieStageDisabled" name="active" value="0" <?= !$best_cookie_settings['active'] ? "checked" : ""; ?>>
            <label for="bestCookieStageDisabled">No</label>
        </div>
        <label for="base_color">Base Color<span>(main background & button text color)</span></label>
        <input type="text" name="color" class="cookie-setting color-picker-field" value="<?= $best_cookie_settings['color']; ?>" />
        <label for="form_position">Popup Position:</label>
        <?php
        $positions = array(
                1 => 'Right',
                2 => 'Left',
                3 => 'Top',
                4 => 'Bottom');
        ?>
        <select name="position" class="cookie-setting cookie-setting-small">
            <?php foreach($positions as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?= intval($best_cookie_settings['position']) === $key ? "selected" : ""; ?>><?= $value; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="cookie_statement">Cookie Title</label>
        <textarea rows="2" name="title" class="cookie-setting"><?= $best_cookie_settings['title']; ?></textarea>
        <label for="cookie_statement">Cookie Text<span>(required)</span></label>
        <?php $args = array(
            'textarea_rows' => 5,
            'quicktags' => false,
            'media_buttons' => false,
            'textarea_name' => 'text',
        );
        wp_editor( $best_cookie_settings['text'], 'editor', $args ); ?>
        <label for="accept_button">Accept Button Text<span>(required)</span></label>
        <input type="text" name="button_text" class="cookie-setting cookie-setting-small" value="<?= $best_cookie_settings['button_text']; ?>" />
        <?php submit_button( 'Update Settings' ); ?>
    </form>
</div>

