if ( ! empty( $settings['website_link']['url'] ) ) {
				$this->add_link_attributes( 'website_link', $settings['website_link'] );
			?>
				<!-- Start rendering the output -->
				<div class="card">
					<a <?php echo $this->get_render_attribute_string( 'website_link' ); ?>> <h3 class="card_title"><?php echo $ribbon_title;  ?></h3></a>
					<p class= "card__description"><?php echo $ribbon_content; ?></p>
				</div>
				<!-- End rendering the output -->

				<!-- <?php
			// } else { ?>
				<div class="card">
				<h3 class="card_title"><?php echo $card_title;  ?></h3>
				<p class= "card__description"><?php echo $card_description;  ?></p>
			</div> <?php
			// } -->

            // if ( 'yes' === $settings['show_title'] ) {


            // }