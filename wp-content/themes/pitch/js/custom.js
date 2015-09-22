jQuery(function($){
    $('.your_profile').click(function(){
        if ( $( ".reg_log" ).is( ":hidden" ) ) {
            $( ".reg_log" ).slideDown( "slow" );
        } else {
            $( ".reg_log" ).hide();
        }
        });

});
