<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/poiskuslug/wp-config.php');
//include_once('../../../wp-load.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/poiskuslug/wp-includes/wp-db.php');
?>
<style>
        #map-canvas {
            width: 80%;
            height:80%;
            margin: 0px;
            padding: 0px;
        }
        #panel {
            position: absolute;
            top: 5px;
            left: 50%;
            margin-left: -180px;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
        }
    </style>
<script src="<?php echo site_url(); ?>/wp-content/plugins/map/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo site_url(); ?>/wp-content/plugins/map/js/jquery-ui.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

    <script>
        var geocoder;
        var map;
        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-33.7969235, 150.9224326);
            var mapOptions = {
                zoom: 8,
                center: latlng
            }
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        }
        var title='';
        var coordinates='';
        var coordinates_D='';
        var coordinates_k='';
        function codeAddress() {
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

        }
        $( document ).ready(function() {
            $(document).delegate('#save',  'click', function () {
                $.post('<?php echo site_url(); ?>/wp-content/plugins/map/function.php?fun=save_post', {
                    coordinates_D: coordinates_D,
                    coordinates_k: coordinates_k,
                    title: title
                }, function (data) {
                    data = $.parseJSON(data);
                    if (data != '') {
                        window.opener.wp.media.editor.insert('[map id="' + parseInt(data) + '"]');
                        window.close();
                    }
                });

            });
        });

        google.maps.event.addDomListener(window, 'load', initialize);


    </script>

<div id="panel">
    <input id="address" type="textbox" value="Sidney, Austria">
    <input type="button" value="Geocode" onclick="codeAddress()">
    <input id="save" type="button" value="Save Map">
</div>
<div id="map-canvas"></div>
