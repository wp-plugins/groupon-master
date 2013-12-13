<?php
//Hook Widget
add_action( 'widgets_init', 'groupon_master_widget' );
//Register Widget
function groupon_master_widget() {
register_widget( 'groupon_master_widget' );
}

class groupon_master_widget extends WP_Widget {
	function groupon_master_widget() {
	$widget_ops = array( 'classname' => 'Groupon Master', 'description' => __('Easy to use bombastic plugin that will be a great source of income for any wordpress webmaster. Groupon Master. ', 'groupon_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'groupon_master_widget' );
	$this->WP_Widget( 'groupon_master_widget', __('Groupon Master', 'groupon_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$name = "Groupon Master";
		$title = isset( $instance['title'] ) ? $instance['title'] :false;
		$grouponspacer ="'";
		$show_groupondeals = isset( $instance['show_groupondeals'] ) ? $instance['show_groupondeals'] :false;
		$groupondeals_code = $instance['groupondeals_code'];
		echo $before_widget;
		
		// Display the Widget Title
	if ( $title )
		echo $before_title . $name . $after_title;
		//Display Groupon Deals
	if ( $show_groupondeals )
		echo $groupondeals_code;
	echo $after_widget;
	}
		//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['down_link_groupon'] = $new_instance['down_link_groupon'];
		update_option('down_link_groupon', $new_instance['down_link_groupon']);
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_groupondeals'] = $new_instance['show_groupondeals'];
		$instance['groupondeals_code'] = $new_instance['groupondeals_code'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'name' => __('Groupon Master', 'groupon_master'), 'title' => true, 'show_groupondeals' => false, 'groupondeals_code' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['title'], true ); ?> id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><b><?php _e('Display Widget Title', 'groupon_master'); ?></b></label>
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_groupondeals'], true ); ?> id="<?php echo $this->get_field_id( 'show_groupondeals' ); ?>" name="<?php echo $this->get_field_name( 'show_groupondeals' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_groupondeals' ); ?>"><b><?php _e('Display Groupon Deals', 'groupon_master'); ?></b></label>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'groupondeals_code' ); ?>"><?php _e('insert Groupon Deals Code:', 'groupon_master'); ?></label></br>
	<textarea cols="35" rows="5" id="<?php echo $this->get_field_id( 'groupondeals_code' ); ?>" name="<?php echo $this->get_field_name( 'groupondeals_code' ); ?>" ><?php echo stripslashes ($instance['groupondeals_code']); ?></textarea>
	</p>
	<div class="description">Copy and Paste your groupon deals script code from groupon website.</div>
	<br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
		<p>
		<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
		&nbsp;
		<b>Shortcode Framework</b>
		</p>
		<div class="description">The shortcode framework allows you to insert Groupon Master inside Pages & Posts without the need of extra plugins or gimmicks. Fast page load times and top SEO. Only available in advanced version.</div>
	<br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Groupon Master Website</b>
	</p>
	<p><a class="button-secondary" href="http://wordpress.techgasp.com/groupon-master/" target="_blank" title="Groupon Master Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/groupon-master-documentation/" target="_blank" title="Groupon Master Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.org/plugins/groupon-master/" target="_blank" title="Groupon Master Wordpress">RATE US *****</a></p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Advanced Version Updater:</b>
	</p>
	<label for="<?php echo $this->get_field_id( 'down_link_groupon' ); ?>"><?php _e('Download Key:', 'groupon_master'); ?></label>
	<input id="<?php echo $this->get_field_id( 'down_link_groupon' ); ?>" name="<?php echo $this->get_field_name( 'down_link_groupon' ); ?>" value="<?php echo get_option('down_link_groupon'); ?>" style="width:auto;" />
	<div class="description">The advanced version updater allows to automatically update your advanced plugin. Insert your download key, it can be found in your purchase email. Example:</div>
	<div class="description">http://w.techgasp.com./.downloads_key=ngjvyqqvio1</div>
	<div class="description">Your key would be: <b>ngjvyqqvio1</b></div>
	<?php
	}
 }
?>