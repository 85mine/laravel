@extends('backend.layout.main')
@section('title', trans('labels.title.qr.create'))

@section('breadcrumb')
    <h2>Layouts</h2>
    <ol class="breadcrumb">
        {{--<li class="active">--}}
        {{--<a href="{{ route('admin.dashboard') }}">Home</a>--}}
        {{--</li>--}}
        <li class="active">
            <strong>Home</strong>
        </li>
    </ol>
@endsection

@section('extend-css')
<style text="text/css">
    .qrscanner video {
        max-width: 95%;
        max-height: 75%;
    }
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="qrscanner" id="scanner"></div>
                    <br>
                    <textarea id="scannedTextMemo" class="textInput form-memo form-field-input textInput-readonly" rows="3" readonly></textarea>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extend-js')
    <script type="text/javascript" src="{{url('assets/js/plugins/js-qrcode-scanner/jsqrscanner.nocache.js')}}"></script>
    <script type="text/javascript">

        // QR code
        var options = {
            // render method: 'canvas', 'image' or 'div'
            render: 'canvas',

            // version range somewhere in 1 .. 40
            minVersion: 1,
            maxVersion: 40,

            // error correction level: 'L', 'M', 'Q' or 'H'
            ecLevel: 'L',

            // offset in pixel if drawn onto existing canvas
            left: 0,
            top: 0,

            // size in pixel
            size: 200,

            // code color or image element
            fill: '#000',

            // background color or image element, null for transparent background
            background: null,

            // content
            text: 'no text',

            // corner radius relative to module width: 0.0 .. 0.5
            radius: 0,

            // quiet zone in modules
            quiet: 0,

            // modes
            // 0: normal
            // 1: label strip
            // 2: label box
            // 3: image strip
            // 4: image box
            mode: 0,

            mSize: 0.1,
            mPosX: 0.5,
            mPosY: 0.5,

            label: 'no label',
            fontname: 'sans',
            fontcolor: '#000',

            image: null
        };

        function onQRCodeScanned(scannedText)
        {
            var scannedTextMemo = document.getElementById("scannedTextMemo");
            if(scannedTextMemo)
            {
                scannedTextMemo.value = scannedText;
            }
        }

        //this function will be called when JsQRScanner is ready to use
        function JsQRScannerReady()
        {
            var jbScanner = new JsQRScanner(onQRCodeScanned);
            //reduce the size of analyzed image to increase performance on mobile devices
            jbScanner.setSnapImageMaxSize(300);
            var scannerParentElement = document.getElementById("scanner");
            if(scannerParentElement)
            {
                jbScanner.appendTo(scannerParentElement);
            }
        }

    </script>
@endsection