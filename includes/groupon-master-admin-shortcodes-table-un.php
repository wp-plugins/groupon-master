<?php
if(!class_exists('WP_List_Table')){
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class groupon_master_admin_shortcodes_table_un extends WP_List_Table {
	/**
	 * Display the rows of records in the table
	 * @return string, echo the markup of the rows
	 */
	function display() {
if ( $_POST) {
if ( isset($_POST['groupon_master_un_groupon_deals']) )
update_option('groupon_master_un_groupon_deals', $_POST['groupon_master_un_groupon_deals'] );
else
update_option('groupon_master_un_groupon_deals', 'false' );

if ( isset($_POST['groupon_master_un_groupon_deals_code']) )
update_option('groupon_master_un_groupon_deals_code', $_POST['groupon_master_un_groupon_deals_code'] );
else
update_option('groupon_master_un_groupon_deals_code', 'false' );
?>
<div id="message" class="updated fade">
<p><strong><?php _e('Settings Saved!', 'groupon_master'); ?></strong></p>
</div>
<?php
}
?>
<form method="post" width='1'>
<fieldset class="options">

<table class="widefat fixed" cellspacing="0">
	<thead>
		<tr>
			<th id="cb" class="manage-column column-cb check-column" scope="col" style="vertical-align:middle"><input type="checkbox"></th>
			<th id="columnname" class="manage-column column-columnname" scope="col" width="200"><legend><h3><img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Universal Shortcode', 'groupon_master'); ?></h3></legend></th>
			<th id="columnname" class="manage-column column-columnname" scope="col" width="200"></th>
			<th id="columnname" class="manage-column column-columnname" scope="col"><legend><h3><?php _e('&nbsp;[groupon-master-un]', 'groupon_master'); ?></h3></legend></th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th class="manage-column column-cb check-column" scope="col"></th>
			<th class="manage-column column-columnname" scope="col" width="200"></th>
			<th class="manage-column column-columnname" scope="col" width="200"></th>
			<th class="manage-column column-columnname" scope="col"></th>
		</tr>
	</tfoot>

	<tbody>
		<tr class="alternate">
			<th class="check-column" scope="row"></th>
			<td class="column-columnname" width="200">
<p>Check Add-ons Page.</p>
			</td>
			<td class="column-columnname" width="200"></td>
			<td class="column-columnname"></td>
		</tr>
	</tbody>
</table>
<p class="submit"><input class='button-primary' type='submit' name='update' value='<?php _e("Save Shortcode UN", 'groupon_master'); ?>' id='submitbutton' /></p>
</fieldset>
</form>
<?php
	}
//CLASS ENDS
}