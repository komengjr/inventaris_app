<link href="{{ asset('qr_login/option2/css/style.css') }}" rel="stylesheet">

<div class="p-2 p-md-3 bg-light">
    <!-- Card Scanner Kamera -->
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden mb-3">
        <!-- Header View -->
        <div class="card-header bg-white p-3 d-flex align-items-center justify-content-between border-bottom">
            <div class="d-flex align-items-center">
                <div class="icon-camera-wrapper me-2">
                    <i class="fas fa-camera text-primary fs-0"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-0 text-dark">Scan via Kamera HP</h6>
                    <span class="fs--2 text-muted">Arahkan kamera ke Barcode / QR Code inventaris</span>
                </div>
            </div>
            <span class="badge bg-soft-primary text-primary font-monospace fs--2 px-2.5 py-1 rounded-pill">
                <i class="fas fa-ticket-alt me-1"></i>{{ $tiket }}
            </span>
        </div>

        <div class="card-body p-2 p-md-3 bg-dark">
            <input type="hidden" name="tiket" id="tiket" value="{{ $tiket }}">

            <!-- Container Kamera & Viewfinder -->
            <div class="position-relative mx-auto overflow-hidden rounded-3 shadow-inner camera-container" id="QR-Code">
                <!-- Canvas Video Scanner -->
                <canvas id="webcodecam-canvas" class="w-100 h-100 d-block object-fit-cover"></canvas>

                <!-- Frame Target & Animated Scan Line -->
                <div class="scan-overlay">
                    <div class="scan-frame">
                        <div class="corner top-left"></div>
                        <div class="corner top-right"></div>
                        <div class="corner bottom-left"></div>
                        <div class="corner bottom-right"></div>
                        <div class="scan-laser"></div>
                    </div>
                </div>

                <!-- Laser Elements (Preserved for WebCodeCamJS compatibility) -->
                <div class="scanner-laser laser-rightBottom" style="display:none;"></div>
                <div class="scanner-laser laser-rightTop" style="display:none;"></div>
                <div class="scanner-laser laser-leftBottom" style="display:none;"></div>
                <div class="scanner-laser laser-leftTop" style="display:none;"></div>
            </div>

            <!-- Kontrol Kamera Toolbar -->
            <div class="row g-2 align-items-center mt-2">
                <!-- Select Switch Camera -->
                <div class="col-8 col-sm-6">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-secondary border-secondary text-white">
                            <i class="fas fa-video"></i>
                        </span>
                        <select class="form-select form-select-sm bg-secondary text-white border-secondary fw-bold" id="camera-select"></select>
                    </div>
                </div>

                <!-- Action Control Buttons -->
                <div class="col-4 col-sm-6 d-flex justify-content-end gap-1">
                    <button title="Play" class="btn btn-success btn-sm px-2.5" id="play" type="button">
                        <i class="fas fa-play me-1"></i><span class="d-none d-sm-inline">Start</span>
                    </button>
                    <button title="Pause" class="btn btn-warning btn-sm px-2.5 text-white" id="pause" type="button">
                        <i class="fas fa-pause"></i>
                    </button>
                    <button title="Stop" class="btn btn-danger btn-sm px-2.5" id="stop" type="button">
                        <i class="fas fa-stop"></i>
                    </button>
                </div>
            </div>

            <!-- Hidden Controls & Results Placeholder (Preserved for compatibility) -->
            <div style="display: none;">
                <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
                <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
                <input id="contrast" onchange="Page.changeContrast();" type="range" min="-128" max="128" value="0">
                <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
                <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
                <button id="decode-img" type="button"></button>
                <button id="grab-img" type="button"></button>
                <span id="zoom-value">Zoom: 2</span>
                <span id="brightness-value">Brightness: 0</span>
                <span id="contrast-value">Contrast: 0</span>
                <span id="threshold-value">Threshold: 0</span>
                <span id="sharpness-value">Sharpness: off</span>
                <span id="grayscale-value">grayscale: off</span>
                <span id="flipVertical-value">Flip Vertical: off</span>
                <span id="flipHorizontal-value">Flip Horizontal: off</span>
            </div>

            <div class="d-none" id="result">
                <img id="scanned-img" src="" style="width: 100%; height: auto;">
                <p id="scanned-QR"></p>
            </div>
        </div>
    </div>

    <!-- Alert Messaging Session -->
    @if ($message = Session::get('sukses'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-3" role="alert">
        <i class="fas fa-check-circle me-1"></i> <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Target Hasil Ajax Scanner -->
    <div class="col-12" id="hasil-pencarian"></div>
</div>

<style>
    .bg-soft-primary {
        background-color: #e0edff;
    }

    .icon-camera-wrapper {
        width: 36px;
        height: 36px;
        background: #e0edff;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Fixed Camera Area for Mobile Responsiveness */
    .camera-container {
        width: 100%;
        max-width: 500px;
        height: 360px;
        background-color: #000;
    }

    /* Viewfinder Overlay Style */
    .scan-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
    }

    .scan-frame {
        width: 230px;
        height: 230px;
        position: relative;
        box-shadow: 0 0 0 4000px rgba(0, 0, 0, 0.45);
        border-radius: 12px;
    }

    .corner {
        position: absolute;
        width: 20px;
        height: 20px;
        border: 4px solid #0d6efd;
    }

    .top-left {
        top: -2px;
        left: -2px;
        border-right: none;
        border-bottom: none;
        border-top-left-radius: 10px;
    }

    .top-right {
        top: -2px;
        right: -2px;
        border-left: none;
        border-bottom: none;
        border-top-right-radius: 10px;
    }

    .bottom-left {
        bottom: -2px;
        left: -2px;
        border-right: none;
        border-top: none;
        border-bottom-left-radius: 10px;
    }

    .bottom-right {
        bottom: -2px;
        right: -2px;
        border-left: none;
        border-top: none;
        border-bottom-right-radius: 10px;
    }

    /* Laser Line Animation */
    .scan-laser {
        width: 100%;
        height: 2px;
        background: #0d6efd;
        box-shadow: 0 0 15px 2px #0d6efd;
        position: absolute;
        animation: scanAnimation 2s infinite ease-in-out;
    }

    @keyframes scanAnimation {
        0% {
            top: 5%;
        }

        50% {
            top: 95%;
        }

        100% {
            top: 5%;
        }
    }
</style>

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('qr_login/option2/js/filereader.js') }}"></script>
<script type="text/javascript" src="{{ asset('qr_login/option2/js/qrcodelib.js') }}"></script>
<script type="text/javascript" src="{{ asset('qr_login/option2/js/webcodecamjs.js') }}"></script>

<script>
    function CallAjaxLoginQr(code) {
        var tiket = document.getElementById("tiket").value;

        $('#hasil-pencarian').html(
            '<div class="card border-0 shadow-sm p-4 text-center my-3"><div class="spinner-border text-primary mx-auto mb-2" role="status"></div><span class="text-muted fs--1 fw-bold">Mencari Data Inventaris...</span></div>'
        );

        $.ajax({
                url: "{{ route('menu_stock_opname_scan_data_with_kamera') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": code,
                    "tiket": tiket,
                },
                dataType: 'html',
            })
            .done(function(data) {
                $('#hasil-pencarian').html(data);
            })
            .fail(function() {
                $('#hasil-pencarian').html(
                    '<div class="alert alert-danger text-center shadow-sm my-3"><i class="fas fa-exclamation-triangle me-1"></i> Terjadi kesalahan sistem. Silakan coba scan ulang.</div>'
                );
            });
    }

    (function(undefined) {
        "use strict";

        function Q(el) {
            if (typeof el === "string") {
                var els = document.querySelectorAll(el);
                return typeof els === "undefined" ? undefined : els.length > 1 ? els : els[0];
            }
            return el;
        }
        var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
        var scannerLaser = Q(".scanner-laser"),
            imageUrl = new Q("#image-url"),
            play = Q("#play"),
            scannedImg = Q("#scanned-img"),
            scannedQR = Q("#scanned-QR"),
            grabImg = Q("#grab-img"),
            decodeLocal = Q("#decode-img"),
            pause = Q("#pause"),
            stop = Q("#stop"),
            contrast = Q("#contrast"),
            contrastValue = Q("#contrast-value"),
            zoom = Q("#zoom"),
            zoomValue = Q("#zoom-value"),
            brightness = Q("#brightness"),
            brightnessValue = Q("#brightness-value"),
            threshold = Q("#threshold"),
            thresholdValue = Q("#threshold-value"),
            sharpness = Q("#sharpness"),
            sharpnessValue = Q("#sharpness-value"),
            grayscale = Q("#grayscale"),
            grayscaleValue = Q("#grayscale-value"),
            flipVertical = Q("#flipVertical"),
            flipVerticalValue = Q("#flipVertical-value"),
            flipHorizontal = Q("#flipHorizontal"),
            flipHorizontalValue = Q("#flipHorizontal-value");

        var args = {
            autoBrightnessValue: 100,
            resultFunction: function(res) {
                if (scannedImg) scannedImg.src = res.imgData;
                CallAjaxLoginQr(res.code);
                if (scannedQR) scannedQR[txt] = res.format + ": " + res.code;
            },
            getDevicesError: function(error) {
                alert("Gagal membaca daftar kamera: " + JSON.stringify(error));
            },
            getUserMediaError: function(error) {
                alert("Izin kamera ditolak atau tidak didukung: " + JSON.stringify(error));
            },
            cameraError: function(error) {
                if (error.name == "NotSupportedError") {
                    alert("Kamera memerlukan akses HTTPS!");
                } else {
                    alert("Error Kamera: " + JSON.stringify(error));
                }
            },
            cameraSuccess: function() {
                if (grabImg) grabImg.classList.remove("disabled");
            }
        };

        var decoder = new WebCodeCamJS("#webcodecam-canvas").buildSelectMenu("#camera-select", "environment|back")
            .init(args);

        if (decodeLocal) {
            decodeLocal.addEventListener("click", function() {
                Page.decodeLocalImage();
            }, false);
        }

        play.addEventListener("click", function() {
            if (decoder.isInitialized()) {
                decoder.play();
            }
        }, false);

        if (grabImg) {
            grabImg.addEventListener("click", function() {
                if (!decoder.isInitialized()) return;
                var src = decoder.getLastImageSrc();
                scannedImg.setAttribute("src", src);
            }, false);
        }

        pause.addEventListener("click", function(event) {
            if (decoder.isInitialized()) decoder.pause();
        }, false);

        stop.addEventListener("click", function(event) {
            if (grabImg) grabImg.classList.add("disabled");
            if (decoder.isInitialized()) decoder.stop();
        }, false);

        Page.changeZoom = function(a) {
            if (decoder.isInitialized()) {
                var value = typeof a !== "undefined" ? parseFloat(a.toPrecision(2)) : zoom.value / 10;
                if (zoomValue) zoomValue[txt] = zoomValue[txt].split(":")[0] + ": " + value.toString();
                decoder.options.zoom = value;
                if (typeof a != "undefined" && zoom) {
                    zoom.value = a * 10;
                }
            }
        };
        Page.changeContrast = function() {
            if (decoder.isInitialized()) {
                var value = contrast.value;
                if (contrastValue) contrastValue[txt] = contrastValue[txt].split(":")[0] + ": " + value.toString();
                decoder.options.contrast = parseFloat(value);
            }
        };
        Page.changeBrightness = function() {
            if (decoder.isInitialized()) {
                var value = brightness.value;
                if (brightnessValue) brightnessValue[txt] = brightnessValue[txt].split(":")[0] + ": " + value.toString();
                decoder.options.brightness = parseFloat(value);
            }
        };
        Page.changeThreshold = function() {
            if (decoder.isInitialized()) {
                var value = threshold.value;
                if (thresholdValue) thresholdValue[txt] = thresholdValue[txt].split(":")[0] + ": " + value.toString();
                decoder.options.threshold = parseFloat(value);
            }
        };
        Page.changeSharpness = function() {
            if (decoder.isInitialized()) {
                var value = sharpness.checked;
                decoder.options.sharpness = value ? [0, -1, 0, -1, 5, -1, 0, -1, 0] : [];
            }
        };
        Page.changeVertical = function() {
            if (decoder.isInitialized()) {
                decoder.options.flipVertical = flipVertical.checked;
            }
        };
        Page.changeHorizontal = function() {
            if (decoder.isInitialized()) {
                decoder.options.flipHorizontal = flipHorizontal.checked;
            }
        };
        Page.changeGrayscale = function() {
            if (decoder.isInitialized()) {
                decoder.options.grayScale = grayscale.checked;
            }
        };
        Page.decodeLocalImage = function() {
            if (decoder.isInitialized() && imageUrl) {
                decoder.decodeLocalImage(imageUrl.value);
                imageUrl.value = null;
            }
        };

        var getZomm = setInterval(function() {
            var a;
            try {
                a = decoder.getOptimalZoom();
            } catch (e) {
                a = 0;
            }
            if (!!a && a !== 0) {
                Page.changeZoom(a);
                clearInterval(getZomm);
            }
        }, 500);

        document.querySelector("#camera-select").addEventListener("change", function() {
            if (decoder.isInitialized()) {
                decoder.stop().play();
            }
        });
    }).call(window.Page = window.Page || {});

    // Auto Trigger Click Start Kamera
    $(document).ready(function() {
        setTimeout(function() {
            $("#play").trigger('click');
        }, 100);
    });
</script>
