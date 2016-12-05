<form action="<?php  echo esc_url(home_url('/')); ?>/" method="get">
    <fieldset>
        <input type="text" name="s" id="s" data-placeholder="<?php echo esc_html__('Search for...', 'focuson'); ?>" value="<?php echo esc_html__('Search for...', 'focuson'); ?>" />
        <input type="submit" id="searchsubmit" value="<?php echo esc_html__('Search', 'focuson'); ?>" />
    </fieldset>
</form>