<template>
    <div class="google-map" :id="mapName">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: [
            'name',
            'latitude',
            'longitude',
            'zoom'
        ],

        data: function () {
            return {
                mapName: this.name + "-map",
                markers: [],
                pins: []
            }
        },

        mounted: function () {
            const element = document.getElementById(this.mapName)
            const options = {
                zoom: this.zoom,
                center: new google.maps.LatLng(this.latitude,this.longitude),
                disableDefaultUI: true,
                zoomControl: true,
                scaleControl: true,
                styles: [
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#ff9500"
                            },
                            {
                                "saturation": "-27"
                            },
                            {
                                "lightness": "30"
                            },
                            {
                                "gamma": "1.23"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#00ffcf"
                            },
                            {
                                "saturation": "-38"
                            },
                            {
                                "lightness": "42"
                            },
                            {
                                "gamma": 1
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "lightness": "-16"
                            },
                            {
                                "weight": "1.24"
                            },
                            {
                                "hue": "#00ffe0"
                            },
                            {
                                "saturation": "-54"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#ffc200"
                            },
                            {
                                "saturation": "-55"
                            },
                            {
                                "lightness": 45.599999999999994
                            },
                            {
                                "gamma": "0.36"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#FF0300"
                            },
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 51.19999999999999
                            },
                            {
                                "gamma": 1
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#FF0300"
                            },
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 52
                            },
                            {
                                "gamma": 1
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#0078FF"
                            },
                            {
                                "saturation": -13.200000000000003
                            },
                            {
                                "lightness": 2.4000000000000057
                            },
                            {
                                "gamma": 1
                            }
                        ]
                    }
                ]
            }
            const map = new google.maps.Map(element, options);
            const bounds = new google.maps.LatLngBounds();
            this.markers = this.$children;

            for(var i = 0; i < this.markers.length; i++){
                var pin = this.markers[i];
                this.pins.push({
                    latitude: pin._data.markerCoordinates.latitude,
                    longitude: pin._data.markerCoordinates.longitude,
                });

                const position = new google.maps.LatLng(pin.latitude, pin.longitude);
                const marker = new google.maps.Marker({
                    position,
                    map,
                    icon: '/wp-content/themes/kma-slim/img/map-pin.png'
                });

                const infowindow = new google.maps.InfoWindow({
                    maxWidth: 279,
                    content: pin.$refs.infowindow,
                    title: pin._data.name
                });

                marker.addListener('click', function(){
                    infowindow.open(map, marker);
                });

                bounds.extend(position);
                //map.fitBounds(bounds);

            }
        },

    }
</script>