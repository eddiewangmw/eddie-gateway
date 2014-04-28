<?php
require_once WPCF7_PLUGIN_DIR . '/admin/includes/class-user-forms-list-table.php';
	$list_table = new WPCF7_User_Form_List_Table();
	$list_table->prepare_items();

?>
<div class="wrap">
<?php screen_icon(); ?>

<h2><?php
	echo esc_html( __( 'Forms List', 'contact-form-7' ) );

?></h2>

<?php //do_action( 'wpcf7_admin_notices' ); ?>

<form method="get" action="">
	<input type="hidden" name="page" value="<?php echo esc_attr( $_REQUEST['page'] ); ?>" />
	<?php $list_table->search_box( __( 'Search Forms', 'contact-form-7' ), 'wpcf7-contact' ); ?>
	<?php $list_table->display(); ?>
</form>

</div>
<?php

?>