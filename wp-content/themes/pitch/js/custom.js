jQuery(function($){
    $('.your_profile').click(function(){
        if ( $( ".reg_log" ).is( ":hidden" ) ) {
            $( ".reg_log" ).slideDown( "slow" );
        } else {
            $( ".reg_log" ).hide();
        }
        });
    $(document).ready(function () {
        var name = $('input[name=order_title]').val('');
        //var email = $('input[name=email]').val('');
        //var message = $('textarea[name=message]').html('');
    });
});
