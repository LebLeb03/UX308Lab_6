( function( api ) {

	// Extends our custom "resume-kit-pro" section.
	api.sectionConstructor['resume-kit-pro'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
