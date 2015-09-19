var a = (a===undefined) ? '47.712519' : a;
var b = (b===undefined) ? '104.161486' : b;
var t = (t===undefined) ? 'Sydney' : t;
var site_url = (site_url===undefined) ? '' : site_url;
$(document).ready(function () {

    $('.widgets-chooser-actions').find('.button-primary').click(function () {
        if ($(this).parents('.widget').find('.map').length == 1 && $('.map').length == 1) {
            setTimeout(function () {
                $('.map').first().nextAll('input').remove();
                $('.map').first().remove();

                geocoder = new google.maps.Geocoder();

                var latlng = new google.maps.LatLng( a,b);
                var mapOptions = {
                    zoom: 8,
                    center: latlng
                    }
                map = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions);
                    $('#geo').click(function () {
                        var address = document.getElementById('address').value;
                        geocoder.geocode( { 'address': address}, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                map.setCenter(results[0].geometry.location);
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: results[0].geometry.location

                                });

                                title = $('#address').val();
                                coordinates = marker.getMap();
                                coordinates_D = coordinates.center.D;
                                coordinates_k = coordinates.center.k;

                            } else {
                                alert('Geocode was not successful for the following reason: ' + status);
                            }

                        });

                    });
                    $('#save_widget').click( function () {
                        $.post(site_url+"/wp-content/plugins/map/function.php?fun=save_wgt", {
                            coordinates_D: coordinates_D,
                            coordinates_k: coordinates_k,
                            title: title
                        }, function (data) {
                            data = $.parseJSON(data);
                            if (data != '') {
                                $('.map').last().nextAll('p').last().children('textarea').val('[map id="' + parseInt(data) + '"]');
                alert('Your location saved');
                            }
                        });

                    });
                    $('.map').last().parents('form').find('.widget-control-save').click(function(){
                        if($(this).parents('form').find('#map-canvas2').children().length==1){
                    setTimeout(function(){
                        $('.map').last().append('<div id="map-canvas2"></div>');
                    geocoder = new google.maps.Geocoder();

                    var coordinate_k = parseFloat(coordinates_k);
                    var coordinate_D = parseFloat(coordinates_D);
                    var latlng = new google.maps.LatLng(coordinate_k,coordinate_D);
                    var mapOptions = {
                    zoom: 8,
                    center: latlng
                    }

                    map = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions);
                    }, 500);
                }
                });
                }, 1000);
                }else{
					alert('You already have a map widget');
					event.preventDefault();
					return false;
				}
                });

    $('.map').last().parents('form').find('.widget-control-save').click(function(){
        if($(this).parents('form').find('#map-canvas2').children().length==1){
            setTimeout(function(){
                $('.map').last().append('<div id="map-canvas2"></div>');
                geocoder = new google.maps.Geocoder();

                var coordinate_k = parseFloat(coordinates_k);
                var coordinate_D = parseFloat(coordinates_D);
                var latlng = new google.maps.LatLng(coordinate_k,coordinate_D);
                var mapOptions = {
                    zoom: 8,
                    center: latlng
                }

                map = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions);
            }, 500);
        }
    });

                $('.map').last().append('<div id="map-canvas2"></div>');

                var geocoder;
                var map;
                $('.widget').click(function(){
                    if($(this).find('#map-canvas2').children().length==0){
                    geocoder = new google.maps.Geocoder();

                    var latlng = new google.maps.LatLng(a,b);
                    var mapOptions = {
                    zoom: 8,
                    center: latlng
                    }

                    map = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions);
                    }
                });

                var title='';
                var coordinates='';
                var coordinates_D='';
                var coordinates_k='';
                $('.map').last().after('<input id="save_widget" type="button" value="Save Map">');
                    $('.map').last().after('<input type="button" value="Geocode" id="geo">');
                        $('.map').last().after('<input id="address" type="textbox" value="'+t+'">');
                            $('#geo').click(function () {
                                var address = document.getElementById('address').value;
                                geocoder.geocode( { 'address': address}, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                map.setCenter(results[0].geometry.location);
                                var marker = new google.maps.Marker({
                                map: map,
                                position: results[0].geometry.location

                                });

                                title = $('#address').val();
                                coordinates = marker.getMap();
                                coordinates_D = coordinates.center.D;
                                coordinates_k = coordinates.center.k;

                                } else {
                                alert('Geocode was not successful for the following reason: ' + status);
                                }

                    });

                });

                            $('#save_widget').click( function () {
                                $.post(site_url+"/wp-content/plugins/map/function.php?fun=save_wgt", {
                                    coordinates_D: coordinates_D,
                                    coordinates_k: coordinates_k,
                                    title: title
                                }, function (data) {
                                    data = $.parseJSON(data);
                                    if (data != '') {
                                        $('.map').last().nextAll('p').last().children('textarea').val('[map id="' + parseInt(data) + '"]');
                                        alert('Your location saved');
                                    }
                                });

                                });

                            obj = new Object();

                            var editor = $('#tinymce');
                            obj = editor;
                            $('#wp-content-media-buttons').append("<button id='post_map' type='button'>Map</button>");
                            $('#post_map').click(function(){
                                window.open(site_url+'/wp-content/plugins/map/post_map.php', 'Post-Map', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=800, height=500, top=50, left=500');
                                return false;
                            });
});