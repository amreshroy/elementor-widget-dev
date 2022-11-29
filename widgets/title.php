<?php
class Elementor_Title extends \Elementor\Widget_Base {

	public function get_name() {
		return 'title';
	}

	public function get_title() {
		return esc_html__( 'title 1', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'title', 'world' ];
	}

	protected function render() {
		?>

		<p> Title </p>

		<?php
	}
}