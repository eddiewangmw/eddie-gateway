<?php

if ( ! class_exists( 'WP_List_Table' ) )
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class WPCF7_User_Form_List_Table extends WP_List_Table {

	public static function define_columns() {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'fsname' => __( 'First Name', 'contact-form-7' ),
			'lsname' => __( 'Last Name', 'contact-form-7' ),
			'student-type' => __( 'Student', 'contact-form-7' ),
			'email'=>__('Email', 'contact-form-7'),
			'created_on' => __( 'Date', 'contact-form-7' ) );

		return $columns;
	}

	function __construct() {
		parent::__construct( array(
			'singular' => 'post',
			'plural' => 'posts',
			'ajax' => false ) );
	}

	function prepare_items() {
		$current_screen = get_current_screen();
		$per_page = 20;

		$columns = $this->get_columns();
		    $hidden = array();
		    $sortable = array();
		$this->_column_headers = array($columns, $hidden, $sortable);

		$args = array(
			'posts_per_page' => $per_page,
			'orderby' => 'created_on',
			'order' => 'DESC',
			'offset' => ( $this->get_pagenum() - 1 ) * $per_page );

		if ( ! empty( $_REQUEST['s'] ) )
			$args['s'] = $_REQUEST['s'];

		if ( ! empty( $_REQUEST['orderby'] ) ) {
			if ( 'date' == $_REQUEST['orderby'] )
				$args['orderby'] = 'created_on';
			elseif ( 'fsname' == $_REQUEST['orderby'] )
				$args['orderby'] = 'fsname';
			elseif ( 'email' == $_REQUEST['orderby'] )
				$args['orderby'] = 'email';
		}

		if ( ! empty( $_REQUEST['order'] ) ) {
			if ( 'asc' == strtolower( $_REQUEST['order'] ) )
				$args['order'] = 'ASC';
			elseif ( 'desc' == strtolower( $_REQUEST['order'] ) )
				$args['order'] = 'DESC';
		}

		$this->items = WPCF7_Form::find( $args );
		$total_items = WPCF7_Form::count();
		$total_pages = ceil( $total_items / $per_page );

		$this->set_pagination_args( array(
			'total_items' => $total_items,
			'total_pages' => $total_pages,
			'per_page' => $per_page ) );
	}

	function get_columns(){
	    $columns = array(
		'username' => 'Username',
	    'email' => 'Email',
	    'date' => 'Date'
	    );
	    return $columns;
	}
	function get_sortable_columns() {
		$columns = array(
			'email' => array( 'email', true ),
			'date' => array( 'date', false ) );

		return $columns;
	}

	function get_bulk_actions() {
		// $actions = array(
			// 'delete' => __( 'Delete', 'contact-form-7' ) );

		// return $actions;
		return array();
	}

	function column_default( $item, $column_name ) {
		return '';
    }

	function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="%1$s[]" value="%2$s" />',
			$this->_args['singular'],
			$item->id );
	}
	function column_email($item){

		return $item->email;
	}
	
	function column_username($item){
		$url = admin_url( 'admin.php?page=wpcf7-show&post=' . absint( $item->id ) );
		$download_link = add_query_arg( array( 'action' => 'download' ), $url );
		$view_link = add_query_arg(array('action'=>'download'), $url);
		
		$actions = array(
			'Download' => '<a href="' . $download_link . '">' . __( 'Download', 'contact-form-7' ) . '</a>' );
		$a = sprintf( '<a class="row-title" href="%1$s" title="%2$s">%3$s</a>',
			$view_link,
			esc_attr( sprintf( __( 'Edit &#8220;%s&#8221;', 'contact-form-7' ), $item->fsname.' '.$item->lsname ) ),
			esc_html( $item->fsname.' '.$item->lsname ) );
			
		return '<strong>' . $a . '</strong> ' . $this->row_actions( $actions );
	}

	function column_date( $item ) {
		$post = get_post( $item->id );

		if ( ! $post )
			return;

		$t_time = mysql2date( __( 'Y/m/d g:i:s A', 'contact-form-7' ), $post->post_date, true );
		$m_time = $post->post_date;
		$time = mysql2date( 'G', $post->post_date ) - get_option( 'gmt_offset' ) * 3600;

		$time_diff = time() - $time;

		if ( $time_diff > 0 && $time_diff < 24*60*60 )
			$h_time = sprintf( __( '%s ago', 'contact-form-7' ), human_time_diff( $time ) );
		else
			$h_time = mysql2date( __( 'Y/m/d', 'contact-form-7' ), $m_time );

		return '<abbr title="' . $t_time . '">' . $h_time . '</abbr>';
    }
}

?>