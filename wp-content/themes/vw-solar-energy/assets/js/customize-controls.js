( function( api ) {

	// Extends our custom "vw-solar-energy" section.
	api.sectionConstructor['vw-solar-energy'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );