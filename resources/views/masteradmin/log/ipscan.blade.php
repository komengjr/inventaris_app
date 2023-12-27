{{-- {{$data->countryName}}
{{$data->countryCode}}
{{$data->regionCode}}
{{$data->regionName}}
{{$data->cityName}}
{{$data->zipCode}}
{{$data->isoCode}}
{{$data->postalCode}}
{{$data->latitude}}
{{$data->longitude}}
{{$data->metroCode}}
{{$data->areaCode}}
{{$data->timezone}} --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-uppercase">{{$data->countryName}}, {{$data->countryCode}} , {{$data->timezone}} , {{$data->regionName}}</div>
            <div class="card-body">
                <div id="marker-map" class="gmaps"></div>
            </div>
        </div>

    </div>
</div>
<!-- google maps api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKXKdHQdtqgPVl2HI2RnUa_1bjCxRCQo4&callback=initMap" async
        defer></script>
    {{-- <script src="{{ asset('assets/plugins/gmaps/map-custom-script.js') }}"></script> --}}
    <script>
        // google map scripts

        var map;

        function initMap() {




            // marker map
            var myLatLng = {
                lat: {{$data->latitude}},
                lng: {{$data->longitude}}
            };
            var map = new google.maps.Map(document.getElementById('marker-map'), {
                zoom: 4,
                center: myLatLng
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });

            google.maps.event.addDomListener(window, 'load', initMap);

        }










        // routes map

        // style map
    </script>
