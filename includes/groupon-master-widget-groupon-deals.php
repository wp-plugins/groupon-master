<?php
//Hook Widget
add_action( 'widgets_init', 'groupon_master_widget_deals' );
//Register Widget
function groupon_master_widget_deals() {
register_widget( 'groupon_master_widget_deals' );
}

class groupon_master_widget_deals extends WP_Widget {
	function groupon_master_widget_deals() {
	$widget_ops = array( 'classname' => 'Groupon Master Deals', 'description' => __('Easy to use bombastic widget that will be a great source of income for any wordpress webmaster. Groupon Master. ', 'groupon_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'groupon_master_widget_deals' );
	$this->WP_Widget( 'groupon_master_widget_deals', __('Groupon Master Deals', 'groupon_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$groupon_title = isset( $instance['groupon_title'] ) ? $instance['groupon_title'] :false;
		$groupon_title_new = isset( $instance['groupon_title_new'] ) ? $instance['groupon_title_new'] :false;
		$grouponspacer ="'";
		$show_groupondeals = isset( $instance['show_groupondeals'] ) ? $instance['show_groupondeals'] :false;
		$groupondeals_code = $instance['groupondeals_code'];
		echo $before_widget;
		
		// Display the Widget Title
		if ( $groupon_title ){
			if (empty ($groupon_title_new)){
			$groupon_title_new = "Groupon Master";
			}
		echo $before_title . $groupon_title_new . $after_title;
		}
		else{
		}
		//Display Groupon Deals
	if ( $show_groupondeals ){
		echo $groupondeals_code;
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
		$instance['show_groupondeals'] = $new_instance['show_groupondeals'];
		$instance['groupondeals_code'] = $new_instance['groupondeals_code'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'groupon_title_new' => __('Groupon Master', 'groupon_master'), 'groupon_title' => true, 'groupon_title_new' => false, 'show_groupondeals' => false, 'groupondeals_code' => false );
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
	<b>Groupon Master Website</b>
	</p>
	<p><a class="button-secondary" href="http://wordpress.techgasp.com/groupon-master/" target="_blank" title="Groupon Master Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/groupon-master-documentation/" target="_blank" title="Groupon Master Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.org/plugins/groupon-master/" target="_blank" title="Groupon Master Wordpress">RATE US *****</a></p>
	<?php
	}
 }
?>