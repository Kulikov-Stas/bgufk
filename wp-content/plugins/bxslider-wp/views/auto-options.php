<div class="bxslider-field">
	<label for="bxslider_options_auto"><?php _e('Auto:', 'bxslider'); ?> </label>
	<input type="hidden" name="bxslider[options][auto]" value="false" />
	<input id="bxslider_options_auto" type="checkbox" name="bxslider[options][auto]" value="true" <?php echo ($options['auto']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_auto" class="note"><?php _e('If checked, slides will automatically transition.', 'bxslider'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_pause"><?php _e('Pause:', 'bxslider'); ?> </label>
	<input id="bxslider_options_pause" type="number" name="bxslider[options][pause]" value="<?php echo esc_attr($options['pause']); ?>" />
	<span class="note"><?php _e('The amount of time (in ms) between each auto transition.', 'bxslider'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_auto_start"><?php _e('Auto Start:', 'bxslider'); ?> </label>
	<input type="hidden" name="bxslider[options][auto_start]" value="false" />
	<input id="bxslider_options_auto_start" type="checkbox" name="bxslider[options][auto_start]" value="true" <?php echo ($options['auto_start']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_auto_start" class="note"><?php _e('Auto show starts playing on load. If unchecked, slideshow will start when the "Start" control is clicked.', 'bxslider'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_auto_direction"><?php _e('Auto Direction:', 'bxslider'); ?></label>
	<select id="bxslider_options_auto_direction" name="bxslider[options][auto_direction]">
	<?php foreach($auto_direction_options as $auto_direction_option): ?>
		<option <?php echo esc_attr($auto_direction_option['selected']); ?> value="<?php echo esc_attr($auto_direction_option['value']); ?>"><?php echo esc_attr($auto_direction_option['text']); ?></option>
	<?php endforeach; ?>
	</select>
	<span class="note"><?php _e('The direction of auto show slide transitions.', 'bxslider'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_auto_hover"><?php _e('Auto Hover:', 'bxslider'); ?> </label>
	<input type="hidden" name="bxslider[options][auto_hover]" value="false" />
	<input id="bxslider_options_auto_hover" type="checkbox" name="bxslider[options][auto_hover]" value="true" <?php echo ($options['auto_hover']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_auto_hover" class="note"><?php _e('Auto show will pause when mouse hovers over slider.', 'bxslider'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field last">
	<label for="bxslider_options_auto_delay"><?php _e('Auto Delay:', 'bxslider'); ?> </label>
	<input id="bxslider_options_auto_delay" type="number" name="bxslider[options][auto_delay]" value="<?php echo esc_attr($options['auto_delay']); ?>" />
	<span class="note"><?php _e('Time (in ms) auto show should wait before starting.', 'bxslider'); ?></span>
	<div class="clear"></div>
</div>
