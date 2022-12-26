<?php

class Elementor_ACR_Ribbon extends \Elementor\Widget_Base {

	public function get_name() {
		return 'acr-ribbon';
	}

	public function get_title() {
		return esc_html__( 'ACR Ribbon', 'elementor-acr-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'ribbon', 'acr' ];
	}

	public function get_style_depends() {



		return [
			'ribbon-widget-style',
		];

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

        // Ribbon Text
        $this->add_control(
			'ribbon_text',
			[
				'label' => esc_html__( 'Ribbon Text', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Your ribbon text here', 'elementor-acr-addon' ),
				'default' => esc_html__( 'Ribbon Text', 'elementor-acr-addon' ),
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        // Ribbon Title Text
		$this->add_control(
			'ribbon_title',
			[
				'label' => esc_html__( 'Ribbon Title', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Your ribbon title here', 'elementor-acr-addon' ),
				'default' => esc_html__( 'Ribbon Title', 'elementor-acr-addon' ),
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        // Ribbon Content Text
		$this->add_control(
			'ribbon_content',
			[
			'label' => esc_html__( 'Ribbon Content', 'elementor-acr-addon' ),
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'label_block'   => true,
			'placeholder' => esc_html__( 'Your ribbon description here', 'elementor-acr-addon' ),
			'default' => esc_html__( 'Ribbon Content', 'elementor-acr-addon' ),
			]
		);

        // Ribbon Button Title Text
		$this->add_control(
			'ribbon_button_title',
			[
				'label' => esc_html__( 'Button Title', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Your button title here', 'elementor-acr-addon' ),
				'default' => esc_html__( 'Button Title', 'elementor-acr-addon' ),
			]
		);
		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-acr-addon' ),
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
			'show_title',
			[
				'label' => esc_html__( 'Show Title', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} .ribbon-title' => 'color: {{VALUE}}',
				],
				'condition' => [
					'show_title' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ribbon-title',
				'condition' => [
					'show_title' => 'yes',
				],
			]
		);

		$this->add_control(
			'ribbon_title_alignment',
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
					'{{WRAPPER}} .ribbon-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_options',
			[
				'label' => esc_html__( 'Content Options', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);      
	
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'elementor-acr-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} .package-content' => 'color: {{VALUE}}',
				],
			]
		);
	
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .package-content',
			]
		);
		
		$this->add_control(
			'ribbon_content_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'elementor-acr-addon' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor-acr-addon' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor-acr-addon' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor-acr-addon' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .package-content' => 'text-align: {{VALUE}};',
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
	$ribbon_text = $settings['ribbon_text'];
	$ribbon_title = $settings['ribbon_title'];
	$ribbon_content = $settings['ribbon_content'];
	$ribbon_button_title = $settings['ribbon_button_title'];

        // ACR Ribbon Widget
        ?>
        <div class="product">
            <div class="ribbon-wrapper">
                <div class="ribbon"><?php echo $ribbon_text; ?></div>
            </div>
            <div class="ribbon-content">
                <div class="ribbon-title"> <?php echo $ribbon_title; ?> </div>
                <div class="package-content"> <?php echo $ribbon_content; ?>
                </div>
                <div class="ribbon-button"> <button><a href="<?php echo $this->get_render_attribute_string( 'website_link' ); ?>"> <?php echo $ribbon_button_title;  ?> </a></button></div>
            </div>
        </div>

        <?php
	}
}