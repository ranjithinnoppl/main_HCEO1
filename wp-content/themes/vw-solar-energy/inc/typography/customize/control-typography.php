<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Solar_Energy_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-solar-energy' ),
				'family'      => esc_html__( 'Font Family', 'vw-solar-energy' ),
				'size'        => esc_html__( 'Font Size',   'vw-solar-energy' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-solar-energy' ),
				'style'       => esc_html__( 'Font Style',  'vw-solar-energy' ),
				'line_height' => esc_html__( 'Line Height', 'vw-solar-energy' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-solar-energy' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-solar-energy-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-solar-energy-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-solar-energy' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-solar-energy' ),
        'Acme' => __( 'Acme', 'vw-solar-energy' ),
        'Anton' => __( 'Anton', 'vw-solar-energy' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-solar-energy' ),
        'Arimo' => __( 'Arimo', 'vw-solar-energy' ),
        'Arsenal' => __( 'Arsenal', 'vw-solar-energy' ),
        'Arvo' => __( 'Arvo', 'vw-solar-energy' ),
        'Alegreya' => __( 'Alegreya', 'vw-solar-energy' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-solar-energy' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-solar-energy' ),
        'Bangers' => __( 'Bangers', 'vw-solar-energy' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-solar-energy' ),
        'Bad Script' => __( 'Bad Script', 'vw-solar-energy' ),
        'Bitter' => __( 'Bitter', 'vw-solar-energy' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-solar-energy' ),
        'BenchNine' => __( 'BenchNine', 'vw-solar-energy' ),
        'Cabin' => __( 'Cabin', 'vw-solar-energy' ),
        'Cardo' => __( 'Cardo', 'vw-solar-energy' ),
        'Courgette' => __( 'Courgette', 'vw-solar-energy' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-solar-energy' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-solar-energy' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-solar-energy' ),
        'Cuprum' => __( 'Cuprum', 'vw-solar-energy' ),
        'Cookie' => __( 'Cookie', 'vw-solar-energy' ),
        'Chewy' => __( 'Chewy', 'vw-solar-energy' ),
        'Days One' => __( 'Days One', 'vw-solar-energy' ),
        'Dosis' => __( 'Dosis', 'vw-solar-energy' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-solar-energy' ),
        'Economica' => __( 'Economica', 'vw-solar-energy' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-solar-energy' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-solar-energy' ),
        'Francois One' => __( 'Francois One', 'vw-solar-energy' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-solar-energy' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-solar-energy' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-solar-energy' ),
        'Handlee' => __( 'Handlee', 'vw-solar-energy' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-solar-energy' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-solar-energy' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-solar-energy' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-solar-energy' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-solar-energy' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-solar-energy' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-solar-energy' ),
        'Kanit' => __( 'Kanit', 'vw-solar-energy' ),
        'Lobster' => __( 'Lobster', 'vw-solar-energy' ),
        'Lato' => __( 'Lato', 'vw-solar-energy' ),
        'Lora' => __( 'Lora', 'vw-solar-energy' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-solar-energy' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-solar-energy' ),
        'Merriweather' => __( 'Merriweather', 'vw-solar-energy' ),
        'Monda' => __( 'Monda', 'vw-solar-energy' ),
        'Montserrat' => __( 'Montserrat', 'vw-solar-energy' ),
        'Muli' => __( 'Muli', 'vw-solar-energy' ),
        'Marck Script' => __( 'Marck Script', 'vw-solar-energy' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-solar-energy' ),
        'Open Sans' => __( 'Open Sans', 'vw-solar-energy' ),
        'Overpass' => __( 'Overpass', 'vw-solar-energy' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-solar-energy' ),
        'Oxygen' => __( 'Oxygen', 'vw-solar-energy' ),
        'Orbitron' => __( 'Orbitron', 'vw-solar-energy' ),
        'Patua One' => __( 'Patua One', 'vw-solar-energy' ),
        'Pacifico' => __( 'Pacifico', 'vw-solar-energy' ),
        'Padauk' => __( 'Padauk', 'vw-solar-energy' ),
        'Playball' => __( 'Playball', 'vw-solar-energy' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-solar-energy' ),
        'PT Sans' => __( 'PT Sans', 'vw-solar-energy' ),
        'Philosopher' => __( 'Philosopher', 'vw-solar-energy' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-solar-energy' ),
        'Poiret One' => __( 'Poiret One', 'vw-solar-energy' ),
        'Quicksand' => __( 'Quicksand', 'vw-solar-energy' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-solar-energy' ),
        'Raleway' => __( 'Raleway', 'vw-solar-energy' ),
        'Rubik' => __( 'Rubik', 'vw-solar-energy' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-solar-energy' ),
        'Russo One' => __( 'Russo One', 'vw-solar-energy' ),
        'Righteous' => __( 'Righteous', 'vw-solar-energy' ),
        'Slabo' => __( 'Slabo', 'vw-solar-energy' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-solar-energy' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-solar-energy'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-solar-energy' ),
        'Sacramento' => __( 'Sacramento', 'vw-solar-energy' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-solar-energy' ),
        'Tangerine' => __( 'Tangerine', 'vw-solar-energy' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-solar-energy' ),
        'VT323' => __( 'VT323', 'vw-solar-energy' ),
        'Varela Round' => __( 'Varela Round', 'vw-solar-energy' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-solar-energy' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-solar-energy' ),
        'Volkhov' => __( 'Volkhov', 'vw-solar-energy' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-solar-energy' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-solar-energy' ),
			'100' => esc_html__( 'Thin',       'vw-solar-energy' ),
			'300' => esc_html__( 'Light',      'vw-solar-energy' ),
			'400' => esc_html__( 'Normal',     'vw-solar-energy' ),
			'500' => esc_html__( 'Medium',     'vw-solar-energy' ),
			'700' => esc_html__( 'Bold',       'vw-solar-energy' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-solar-energy' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-solar-energy' ),
			'italic'  => esc_html__( 'Italic', 'vw-solar-energy' ),
			'oblique' => esc_html__( 'Oblique', 'vw-solar-energy' )
		);
	}
}
