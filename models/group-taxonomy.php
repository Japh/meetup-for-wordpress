<?php
class WP_Meetup_Group_Taxonomy extends WP_Meetup_Model {

	private $taxonomy = 'wp_meetup_group';

	function save( $group_name, $args ) {
		if ( ! taxonomy_exists( $this->taxonomy ) ) {
			return false;
		}

		wp_insert_term( $group_name, $this->taxonomy, $args );
	}

	function remove( $group_name ) {
		if ( ! taxonomy_exists( $this->taxonomy ) ) {
			return false;
		}

		if ( $term = get_term_by( 'name', $group_name, $this->taxonomy, OBJECT ) ) {
			wp_delete_term( $term->term_id, $this->taxonomy );
		}
	}

}
