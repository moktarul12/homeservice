<?php
class Cleaning_Services_Contact_Map extends WPBakeryShortCode {

    public function __construct() {
        add_shortcode('cleaning_services_contact_map', array($this, 'cleaning_services_contact_map_func'));
      }

    public function cleaning_services_contact_map_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'gmap_api_key'=>'',
            'gmap_latitude'=>'37.36274700000004',
            'gmap_longitude'=>'-122.03525300000001',
            'zoom'=> '10',
            'gmap_marker'=>'',
            'extra_class' => '',
                        ), $atts));
        ob_start();
        ?>
        <!-- Slider -->

        <div id="googleMap" class="google-map <?php
        if ($extra_class != '') {
            echo esc_attr($extra_class);
        }
        ?>">
        </div>
    <?php
    $attachement = wp_get_attachment_image_src((int) $gmap_marker, 'full');

     $g_marker = $attachement[0];
    //footer_map
    $mapkey = '';
    if (isset($gmap_api_key) && !empty($gmap_api_key)) {
        $mapkey .= '&key=' . $gmap_api_key;
    }
    ?>
  <!-- Google map -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false<?php echo $mapkey; ?>"></script>
    <script type="text/javascript">

        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: <?php echo $zoom ?>,
                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(<?php echo esc_html($gmap_latitude); ?>, <?php echo esc_html($gmap_longitude); ?>), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#e9e9e9"
                            }, {
                                "lightness": 17
                            }]
                    }, {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            }, {
                                "lightness": 20
                            }]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 17
                            }]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 29
                            }, {
                                "weight": 0.2
                            }]
                    }, {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 18
                            }]
                    }, {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 16
                            }]
                    }, {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            }, {
                                "lightness": 21
                            }]
                    }, {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#dedede"
                            }, {
                                "lightness": 21
                            }]
                    }, {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                                "visibility": "on"
                            }, {
                                "color": "#ffffff"
                            }, {
                                "lightness": 16
                            }]
                    }, {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                                "saturation": 36
                            }, {
                                "color": "#333333"
                            }, {
                                "lightness": 40
                            }]
                    }, {
                        "elementType": "labels.icon",
                        "stylers": [{
                                "visibility": "off"
                            }]
                    }, {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f2f2f2"
                            }, {
                                "lightness": 19
                            }]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#fefefe"
                            }, {
                                "lightness": 20
                            }]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#fefefe"
                            }, {
                                "lightness": 17
                            }, {
                                "weight": 1.2
                            }]
                    }]
            };
            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('googleMap');
            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);
            var image = "<?php if (isset($g_marker) && !empty($g_marker)) echo $g_marker; ?>";
            // Let's also add a marker while we're at it
            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo esc_html($gmap_latitude); ?>, <?php echo esc_html($gmap_longitude); ?>),
                map: map,
                //title: '<?php //esc_html_e('Snazzy!', 'cleaning_services-core') ?>'
                icon: image
            });
        }
    </script>
        <?php
        $output = ob_get_clean();
        return $output;
    }

 

}

new Cleaning_Services_Contact_Map();