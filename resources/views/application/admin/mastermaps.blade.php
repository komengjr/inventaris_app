@extends('layouts.template')
@section('base.css')
<link href="{{ asset('vendors/leaflet/leaflet.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/leaflet.markercluster/MarkerCluster.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/leaflet.markercluster/MarkerCluster.Default.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="row mb-3">
    <div class="col">
        <div class="card bg-100 shadow-none border">
            <div class="row gx-0 flex-between-center">
                <div class="col-sm-auto d-flex align-items-center border-bottom">
                    <img class="ms-3 mx-3" src="{{ asset('img/icon/icon.png') }}" alt="" width="50" />
                    <div>
                        <h6 class="text-primary fs--1 mb-0 mt-2">Welcome to </h6>
                        <h4 class="text-primary fw-bold mb-1">Inventaris <span class="text-info fw-medium">Management
                                System</span></h4>
                    </div>
                    <img class="ms-n4 d-none d-lg-block" src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}"
                        alt="" width="150" />
                </div>
                <div class="col-xl-auto px-3 py-2">
                    <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                    <h4 class="text-primary fw-bold mb-0">Master <span class="text-info fw-medium">Maps</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor" id="example">Maps<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#example" style="padding-left: 0.375em;"></a></h5>
            </div>
            <div class="col-auto ms-auto">

            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div id="map" style="height:500px"></div>
    </div>

</div>
@endsection
@section('base.js')
<script src="{{ asset('vendors/leaflet/leaflet.js') }}"></script>
<script src="{{ asset('vendors/leaflet.markercluster/leaflet.markercluster.js')}}"></script>
<script src="{{ asset('vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}"></script>
<script>
    /* -------------------------------------------------------------------------- */

    /*                                   leaflet                                  */

    /* -------------------------------------------------------------------------- */

    var leafletActiveUserInit = function leafletActiveUserInit() {
        var points = [
            @foreach($cabang as $cab) {
                lat: {{ $cab->latitude }},
                long: {{ $cab->longtitude }},
                name: '{{ $cab->nama_cabang }}',
                street: '{{ $cab->city }}',
                location: '{{ $cab->alamat }}',
                link: '{{ $cab->link_gambar }}',
            },

            @endforeach

        ];
        var _window2 = window,
            L = _window2.L;
        var mapContainer = document.getElementById("map");

        if (L && mapContainer) {
            var getFilterColor = function getFilterColor() {
                return localStorage.getItem("theme") === "dark" ? [
                    "invert:98%",
                    "grayscale:69%",
                    "bright:89%",
                    "contrast:111%",
                    "hue:205deg",
                    "saturate:1000%",
                ] : [
                    "bright:101%",
                    "contrast:101%",
                    "hue:23deg",
                    "saturate:225%",
                ];
            };

            var tileLayerTheme =
                "https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png";
            var tiles = L.tileLayer.colorFilter(tileLayerTheme, {
                attribution: null,
                transparent: true,
                filter: getFilterColor(),
            });
            var map = L.map("map", {
                center: L.latLng(10.737, 0),
                zoom: 0,
                layers: [tiles],
                minZoom: 1.3,
                zoomSnap: 0.5,
                dragging: !L.Browser.mobile,
                tap: !L.Browser.mobile,
            });
            var mcg = L.markerClusterGroup({
                chunkedLoading: false,
                spiderfyOnMaxZoom: false,
            });
            points.map(function(point) {
                var name = point.name,
                    location = point.location,
                    link = point.link,
                    street = point.street;
                var icon = L.icon({
                    iconUrl: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAApCAYAAADAk4LOAAAACXBIWXMAAAFgAAABYAEg2RPaAAADpElEQVRYCZ1XS1LbQBBtybIdiMEJKSpUqihgEW/xDdARyAnirOIl3MBH8NK7mBvkBpFv4Gy9IRSpFIQiRPyNfqkeZkY9HwmFt7Lm06+7p/vN2MmyDIrQ6QebALAHAD4AbFuWfQeAAACGs5H/w5jlsJJw4wMA+GhMFuMA99jIDJJOP+ihZwDQFmNuowWO1wS3viDXpdEdZPEc0odruj0EgN5s5H8tJOEEX8R3rbkMtcU34NTqhe5nSQTJ7Tkk80s6/Gk28scGiULguFBffgdufdEwWoQ0uoXo8hdAlooVH0REjISfwZSlyHGh0V5n6aHAtKTxXI5g6nQnMH0P4bEgwtR18Yw8Pj8QZ4ARUAI0Hl+fQZZGisGEBVwHr7XKzox57DXZ/ij8Cdwe2u057z9/wygOxRl4S2vSUHx1oucaMQGAHTrgtdag9mK5aN+Wx/uAAQ9Zenp/SRce4TpaNbQK4+sTcGqeTB/aIXv3XN5oj2VKqii++U0JunpZ8urxee4hvjqVc2hHpBDXuKKT9XMgVYJ1/1fPGSeaikzgmWWkMIi9bVf8UhotXxzORn5gWFchI8QyttlzjS0qpsaIGY2MMsujV/AUSdcY0dDpB6/EiOPYzclR1CI5mOez3ekHvrFLxa7cR5pTscfrXjk0Vhm5V2PqLUWnH3R5GbPGpMVD7E1ckXesKBQ7AS/vmQ1c0+kHuxpBj98lTCm8pbc5QRJRdZ6qHb/wGryXq3Lxszv+5gySuwvxueXySwYvHEjuQ9ofTGKYlrmK1EsCHMd5SoD7mZ1HHFCBHLNbMEshvrugqWLn01hpVVJhFgVGkDvK7hR6n2B+d9C7xsqWsbkqHv4cCsWezEb+o2SR+SFweUBxfA5wH7kShjKt2vWL57Px3GhIFEezkb8pxvUWHYhotAfCk2AtkEcxoOttrxUWDR5svb1emSQKj0WXK1HYIgFREbiBqmoZcB2RkbE+byMZiosorVgAZF1ID7yQhEs38wa7nUqNDezdlavC2HbBGSQkGgZ8uJVBmzeiKCRRpEa9ilWghORVeGB7BxeSKF5xqbFBkxBrFKUk/JHA7ppENQaCnCjthK+3opCEYyANztXmZN858cDYWSUSHk3A311GAZDvo6deNKUk1EsqnJoQlkYBNlmxQZeaMgmxoUokICoHDce351RCCiuKoirJWEgNOYvQplM2VCLhUqF7jf94rW9kHVUjQeheV4riv0i4ZOzzz/2y/+0KAOAfr4EE4HpCFhwAAAAASUVORK5CYII=\n        ",
                });
                var marker = L.marker(
                    new L.LatLng(point.lat, point["long"]), {
                        icon: icon,
                    }, {
                        name: name,
                        location: location,
                    }
                );
                var popupContent = '\n        <h6 class="mb-1">'
                    .concat(name, '</h6>\n        <p class="m-0 text-500">')
                    .concat(street, ", ")
                    .concat(location, "</p>\n     <img src="+link+" width='300'> ");
                var popup = L.popup({
                    minWidth: 180,
                }).setContent(popupContent);
                marker.bindPopup(popup);
                mcg.addLayer(marker);
                return true;
            });
            map.addLayer(mcg);
            var themeController = document.body;
            themeController.addEventListener("clickControl", function(_ref9) {
                var _ref9$detail = _ref9.detail,
                    control = _ref9$detail.control,
                    value = _ref9$detail.value;

                if (control === "theme") {
                    tiles.updateFilter(
                        value === "dark" ? [
                            "invert:98%",
                            "grayscale:69%",
                            "bright:89%",
                            "contrast:111%",
                            "hue:205deg",
                            "saturate:1000%",
                        ] : [
                            "bright:101%",
                            "contrast:101%",
                            "hue:23deg",
                            "saturate:225%",
                        ]
                    );
                }
            });
        }
    };
    docReady(leafletActiveUserInit);
</script>
@endsection
