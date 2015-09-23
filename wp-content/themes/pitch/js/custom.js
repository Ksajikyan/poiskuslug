jQuery(function($){
    $('.your_profile').click(function(){
        if ( $( ".reg_log" ).is( ":hidden" ) ) {
            $( ".reg_log" ).slideDown( "slow" );
        } else {
            $( ".reg_log" ).hide();
        }
        });

    $('.add_post').click(function() {
        $('#post_form').show();
    });
    $('#datepicker').datepicker();
    $("#map-address-btn").click(function(event){
        event.preventDefault();
        var address = $("#location-address").val();					// grab the address from the input field
        codeAddress(address);										// geocode the address
    });
});
