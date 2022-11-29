<?php
class Elementor_ACR_Title extends \Elementor\Widget_Base {

	public function get_name() {
		return 'title';
	}

	public function get_title() {
		return esc_html__( 'ACR Title', 'elementor-addon' );
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

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'ACR Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Title', 'elementor-addon' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		?>

		<p> Title </p>

		<?php
	}
}