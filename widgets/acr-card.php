<?php

class Elementor_ACR_Card extends \Elementor\Widget_Base {

	public function get_name() {
		return 'acr-card';
	}

	public function get_title() {
		return esc_html__( 'ACR Card', 'elementor-acr-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'card', 'acr' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-acr-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_title',
			[
				'label' => esc_html__( 'Card title', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Your card title here', 'elementor-acr-addon' ),
				'default' => esc_html__( 'Card Title', 'elementor-acr-addon' ),
			]
		);

		$this->add_control(
			'card_description',
			[
			'label' => esc_html__( 'Card Description', 'elementor-acr-addon' ),
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'label_block'   => true,
			'placeholder' => esc_html__( 'Your card description here', 'elementor-acr-addon' ),
			'default' => esc_html__( 'Card Description', 'elementor-acr-addon' ),
			]
		);

		$this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		// Content Tab End

		// Style Tab Start
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'elementor-acr-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		// OUR CODE FOR STYLE OPTIONS WILL BE HERE

		$this->add_control(
			'title_options',
			[
				'label' => esc_html__( 'Title Options', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} h3',
			]
		);

		$this->add_control(
			'card_title_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .card_title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'description_options',
			[
				'label' => esc_html__( 'Description Options', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);      
	
		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Color', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} .card__description' => 'color: {{VALUE}}',
				],
			]
		);
	
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} p.card__description',
			]
		);
		
		$this->add_control(
			'card_description_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .card__description' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();

		// Style Tab End
	}

	protected function render() {

	// get our input from the widget settings.
	$settings = $this->get_settings_for_display();

	// get the individual values of the input
	$card_title = $settings['card_title'];
	$card_description = $settings['card_description'];
	
		if ( ! empty( $settings['website_link']['url'] ) ) {
			$this->add_link_attributes( 'website_link', $settings['website_link'] );
		?>
			<!-- Start rendering the output -->
			<div class="card">
				<a <?php echo $this->get_render_attribute_string( 'website_link' ); ?>> <h3 class="card_title"><?php echo $card_title;  ?></h3></a>
				<p class= "card__description"><?php echo $card_description;  ?></p>
			</div>
			<!-- End rendering the output -->

			<?php
		} else { ?>
			<div class="card">
			<h3 class="card_title"><?php echo $card_title;  ?></h3>
			<p class= "card__description"><?php echo $card_description;  ?></p>
		</div> <?php
		}
	}
}