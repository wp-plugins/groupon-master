<?php
//Hook Widget
add_action( 'widgets_init', 'groupon_master_widget_buttons' );
//Register Widget
function groupon_master_widget_buttons() {
register_widget( 'groupon_master_widget_buttons' );
}

class groupon_master_widget_buttons extends WP_Widget {
	function groupon_master_widget_buttons() {
	$widget_ops = array( 'classname' => 'Groupon Master Buttons', 'description' => __('Sell even more by linking your wordpress to your Amazon Profile. ', 'groupon_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'groupon_master_widget_buttons' );
	$this->WP_Widget( 'groupon_master_widget_buttons', __('Groupon Master Buttons', 'groupon_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$groupon_title = isset( $instance['groupon_title'] ) ? $instance['groupon_title'] :false;
		$groupon_title_new = isset( $instance['groupon_title_new'] ) ? $instance['groupon_title_new'] :false;
		$grouponspacer ="'";
		$url_loc = plugins_url();
		$show_grouponbutton = isset( $instance['show_grouponbutton'] ) ? $instance['show_grouponbutton'] :false;
		$grouponbutton_page = $instance['grouponbutton_page'];
		echo $before_widget;
		
		// Display the Widget Title
		if ( $groupon_title ){
			if (empty ($groupon_title_new)){
			if(is_multisite()){
			$groupon_title_new = get_site_option('groupon_master_name');
			}
			else{
			$groupon_title_new = get_option('groupon_master_name');
			}
		echo $before_title . $groupon_title_new . $after_title;
		}
		else{
		echo $before_title . $groupon_title_new . $after_title;
		}
	}
	else{
	}
	//Display Groupon Profile Button
	if ( $show_grouponbutton ){
		echo '<a href="'.$grouponbutton_page.'" target="_blank"><img src="'.$url_loc.'/groupon-master/images/techgasp-groupon-button.png"></a>';
	}
		else{
	}
	echo $after_widget;
	}
		//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['groupon_title'] = strip_tags( $new_instance['groupon_title'] );
		$instance['groupon_title_new'] = $new_instance['groupon_title_new'];
		$instance['show_grouponbutton'] = $new_instance['show_grouponbutton'];
		$instance['grouponbutton_page'] = $new_instance['grouponbutton_page'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'groupon_title_new' => __('Groupon Master', 'groupon_master'), 'groupon_title' => true, 'groupon_title_new' => false, 'show_grouponbutton' => false, 'grouponbutton_page' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['groupon_title'], true ); ?> id="<?php echo $this->get_field_id( 'groupon_title' ); ?>" name="<?php echo $this->get_field_name( 'groupon_title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'groupon_title' ); ?>"><b><?php _e('Display Widget Title', 'groupon_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'groupon_title_new' ); ?>"><?php _e('Change Title:', 'groupon_master'); ?></label>
	<br>
	<input id="<?php echo $this->get_field_id( 'groupon_title_new' ); ?>" name="<?php echo $this->get_field_name( 'groupon_title_new' ); ?>" value="<?php echo $instance['groupon_title_new']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_grouponbutton'], true ); ?> id="<?php echo $this->get_field_id( 'show_grouponbutton' ); ?>" name="<?php echo $this->get_field_name( 'show_grouponbutton' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_grouponbutton' ); ?>"><b><?php _e('Groupon Profile Button', 'groupon_master'); ?></b></label><br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'grouponbutton_page' ); ?>"><?php _e('insert your Groupon Profile Link:', 'groupon_master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'grouponbutton_page' ); ?>" name="<?php echo $this->get_field_name( 'grouponbutton_page' ); ?>" value="<?php echo $instance['grouponbutton_page']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Groupon Master Website</b>
	</p>
	<p><a class="button-secondary" href="http://wordpress.techgasp.com/groupon-master/" target="_blank" title="Groupon Master Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/groupon-master-documentation/" target="_blank" title="Groupon Master Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.techgasp.com/groupon-master/" target="_blank" title="Get Add-ons">Get Add-ons</a></p>
	<?php
	}
 }
?>