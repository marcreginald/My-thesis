<script type="text/javascript" src="<?= base_url() ?>assets/plugins/instascan-master/src/adapter.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/instascan-master/src/vue.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/instascan-master/src/instascan.min.js"></script>

<div class="col-md-12">
    <div class="card card-box">
        <div class="card-head">
            <header>QR Code Scan</header>
            <div class="tools">
                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
            </div>
        </div>
        <div class="card-body" style="background-image: url('<?= base_url() ?>assets/plugins/instascan-master/assets/setup.jpg');">
            <div class="row" id="app">
                <div class="col-sm-12 text-center" id="div_video">
                    <video id="preview"></video>
                </div>
                <div class="col-sm-12 text-center" v-if="cameras.length === 0">
                    <img src="<?= base_url() ?>assets/images/qr.png" alt="QR" class="img-thumbnail">
                    <br>
                    No cameras found
                </div>
                <div class="col-sm-12 text-center" v-for="camera in cameras">
                    <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
                    <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                        <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
                    </span>
                </div>
                <div class="col-sm-12 text-center" id="div_no_scan_yet" v-if="scans.length === 0">No scans yet</div>
                <div>
                    <transition-group name="scans" tag="div">
                        <div v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}</div>
                    </transition-group>
                </div>
                <div class="col-sm-12 text-center" style="margin-top: 30px;">
                    <h4 id="h4_camera_found"></h4>
                    <div class="btn-group">
                        <button class="btn btn-primary" onclick="start_camera()" id="start_camera"><span class="fa fa-play"></span></button>
                        <button class="btn btn-danger" onclick="stop_camera()" id="stop_camera"><span class="fa fa-stop"></span></button>
                    </div>
                </div>
                <div class="col-sm-12 text-center">
                    <h4 id="content"></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    var app = new Vue({
      el: '#app',
      data: {
        scanner: null,
        activeCameraId: null,
        cameras: [],
        scans: []
      },
      mounted: function () {
        var self = this;
        self.scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5 });
        self.scanner.addListener('scan', function (content, image) {
          self.scans.unshift({ date: +(Date.now()), content: content });
        });
        Instascan.Camera.getCameras().then(function (cameras) {
          self.cameras = cameras;
          if (cameras.length > 0) {
            self.activeCameraId = cameras[0].id;
            self.scanner.start(cameras[0]);
          } else {
            console.error('No cameras found.');
          }
        }).catch(function (e) {
          console.error(e);
        });
      },
      methods: {
        formatName: function (name) {
          return name || '(unknown)';
        },
        selectCamera: function (camera) {
          this.activeCameraId = camera.id;
          this.scanner.start(camera);
        }
      }
    });

    function stop_camera(){
        scanner.stop();
    }

</script>



<style type="text/css">
    
    body {
        padding-top: 50px;
    }

    .thumbnail {
        border: 0;
    }

    #webcodecam-canvas, #scanned-img {
        background-color: #2d2d2d;
    }

    #camera-select {
        display: inline-block;
        width: auto;
    }

    .btn {
        margin-bottom: 2px;
    }

    .form-control {
        height: 32px;
    }

    .h4, h4 {
        width: auto;
        float: left;
        font-size: 20px;
        line-height: 1.1;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .controls {
        float: right;
        display: inline-block;
    }

    .well {
        position: relative;
        display: inline-block;
    }

    .panel-heading {
        display: inline-block;
        width: 100%;
    }

    .container {
        width: 100%
    }

    pre {
        border: 0;
        border-radius: 0;
        background-color: #333;
        margin: 0;
        line-height: 125%;
        color: whitesmoke;
    }

    button {
        outline: none !important;
    }

    .table-bordered {
        color: #777;
        cursor: default;
    }

    .table-bordered a:hover {
        text-decoration: none;
    }

    .table-bordered th a {
        float: right;
        line-height: 3.49;
    }

    .table-bordered td a {
        float: left;
    }

    .table-bordered th img {
        float: left;
    }

    .table-bordered th, .table-bordered td {
        vertical-align: middle !important;
    }

    .scanner-laser {
        position: absolute;
        margin: 40px;
        height: 30px;
        width: 30px;
        opacity: 0.5;
    }

    .laser-leftTop {
        top: 0;
        left: 0;
        border-top: solid red 5px;
        border-left: solid red 5px;
    }

    .laser-leftBottom {
        bottom: 0;
        left: 0;
        border-bottom: solid red 5px;
        border-left: solid red 5px;
    }

    .laser-rightTop {
        top: 0;
        right: 0;
        border-top: solid red 5px;
        border-right: solid red 5px;
    }

    .laser-rightBottom {
        bottom: 0;
        right: 0;
        border-bottom: solid red 5px;
        border-right: solid red 5px;
        JS
    }

    #webcodecam-canvas {
        background-color: #272822;
    }
    #scanned-QR{
        word-break: break-word;
    }

</style>

<div class="col-md-12">
    <div class="card card-box">
        <div class="card-head">
            <header>WebCodeCamJS</header>
            <div class="tools">
                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
            </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-sm-12">
                    <select class="form-control" id="camera-select"></select>
                </div>
                <div class="col-sm-12">
                    <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                </div>
                <div class="col-sm-12 myBody">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript" src="< ?= base_url() ?>assets/plugins/webcodecamjs-master/js/filereader.js"></script>
<script type="text/javascript" src="< ?= base_url() ?>assets/plugins/webcodecamjs-master/js/qrcodelib.js"></script>
<script type="text/javascript" src="< ?= base_url() ?>assets/plugins/webcodecamjs-master/js/webcodecamjs.js"></script>
<script type="text/javascript" src="< ?= base_url() ?>assets/plugins/webcodecamjs-master/js/main.js"></script> -->

<!-- <script type="text/javascript" src="js/jquery.js"></script> -->
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/webcodecamjs-master/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/webcodecamjs-master/js/webcodecamjquery.js"></script>

<script type="text/javascript">
    var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
    var arg = {
        resultFunction: function(result) {
            /*
                result.format: code format,
                result.code: decoded string,
                result.imgData: decoded image data
            */
            var aChild = document.createElement('li');
            aChild[txt] = result.format + ': ' + result.code;
            document.querySelector('.myBody').appendChild(aChild);
        }
    };
    /* -------------------------------------- Available parameters --------------------------------------*/
    var options = {
        DecodeQRCodeRate: 5,                    // null to disable OR int > 0 !
        DecodeBarCodeRate: 5,                   // null to disable OR int > 0 !
        successTimeout: 500,                    // delay time when decoding is succeed
        codeRepetition: true,                   // accept code repetition true or false
        tryVertical: true,                      // try decoding vertically positioned barcode true or false
        frameRate: 15,                          // 1 - 25
        width: 320,                             // canvas width
        height: 240,                            // canvas height
        constraints: {                          // default constraints
            video: {
                mandatory: {
                    maxWidth: 1280,
                    maxHeight: 720
                },
                optional: [{
                    sourceId: true
                }]
            },
            audio: false
        },
        flipVertical: false,                    // boolean
        flipHorizontal: false,                  // boolean
        zoom: -1,                               // if zoom = -1, auto zoom for optimal resolution else int
        beep: '<?= base_url() ?>assets/plugins/webcodecamjs-master/audio/beep.mp3',                 // string, audio file location
        decoderWorker: '<?= base_url() ?>assets/plugins/webcodecamjs-master/js/DecoderWorker.js',   // string, DecoderWorker file location
        brightness: 0,                          // int
        autoBrightnessValue: false,             // functional when value autoBrightnessValue is int
        grayScale: false,                       // boolean
        contrast: 0,                            // int
        threshold: 0,                           // int 
        sharpness: [],      // to On declare matrix, example for sharpness ->  [0, -1, 0, -1, 5, -1, 0, -1, 0]
        resultFunction: function(result) {
            /*
                result.format: code format,
                result.code: decoded string,
                result.imgData: decoded image data
            */
            alert(result.code);
        },
        cameraSuccess: function(stream) {           //callback funtion to camera success
            console.log('cameraSuccess');
        },
        canPlayFunction: function() {               //callback funtion to can play
            console.log('canPlayFunction');
        },
        getDevicesError: function(error) {          //callback funtion to get Devices error
            console.log(error);
        },
        getUserMediaError: function(error) {        //callback funtion to get usermedia error
            console.log(error);
        },
        cameraError: function(error) {              //callback funtion to camera error  
            console.log(error);
        }
    };

    /*---------------------------- Example initializations Javascript version ----------------------------*/
    new WebCodeCamJS("canvas").init(arg);
    /* OR */
    var canvas = document.querySelector('#webcodecam-canvas');
    new WebCodeCamJS(canvas).init();
    /* OR */
    new WebCodeCamJS('#webcodecam-canvas').init();

    /*------------------------ Example initializations jquery & Javascript version ------------------------*/
    var decoder = new WebCodeCamJS('#webcodecam-canvas');

    var decoder = $("#webcodecam-canvas").WebCodeCamJQuery(args).data().plugin_WebCodeCamJQuery;

    decoder.buildSelectMenu('#camera-select', sel); //sel : default camera optional
    /* Chrome & MS Edge: build select menu
    *  Firefox: the default camera initializes, return decoder object 
    */
    //simple initialization
    decoder.init();
    /* Select environment camera if available */
    decoder.buildSelectMenu('#camera-select', 'environment|back').init(args);
    /* Select user camera if available */
    decoder.buildSelectMenu('#camera-select', 'user|front').init(args);
    /* Select camera by name */
    decoder.buildSelectMenu('#camera-select', 'facecam').init(args);
    /* Select first camera */
    decoder.buildSelectMenu('#camera-select', 0).init(args);
    /* Select environment camera if available, without visible select menu*/
    decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init().play();   

    /* --------------------------------------- Available Functions: ----------------------------------------*/
    /* camera stop & delete stream */
    decoder.stop();
    /* camera play, restore process */
    decoder.play();
    /* get current image from camera */
    decoder.getLastImageSrc();
    /* decode local image */
    /* if url is defined download image before staring open process */
    decoder.decodeLocalImage(url);
    /* get optimal zoom */
    decoder.getOptimalZoom();
    /* Configurable options */
    decoder.options['parameter'];
    /* Example: 
    ** decoder.options.brightness = 20;         - set brightness to 20
    ** decoder.options.DecodeQRCodeRate = null; - disable qrcode decoder
    */
</script>