@extends('layouts.app')

@section('title', __('green.welcome_about_us'))
@section('description', __('green.welcome_about_us'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('home') }}">Головна</a></li>
                    <li class="breadcrumb-item"><a class="link-secondary" href="{{ route('user.greenhouse') }}">{{ __('Мої теплиці') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $equipment->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="d-flex align-content-start align-items-end">
                <h3 class="mb-0 pr-3">{{ $equipment->name }}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        @if (true)
            <div class="col-12 mb-3">
                <p class="fs-5 text-muted mb-0">{{ __('Виконано замовлення') }}</p>
                <div class="d-flex justify-content-end">
                    <div class="w-100 progress mb-1" style="height: 30px;">
                        <div class="temperature-progress-bar progress-bar bg-success" role="progressbar" style="width: 62%;" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"><span class="fs-5">62%</span></div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="d-flex justify-content-end">
                    <a role="button" aria-pressed="true" class="btn btn-danger ms-2" role="button" href="#" aria-label="{{ __('Stop') }}">
                        {{ __('Stop') }}
                    </a>
                </div>
            </div>
        @else
            <div class="col-12 mb-3">
                <div class="d-flex justify-content-end">
                    <a role="button" aria-pressed="true" class="btn btn-primary ms-2" role="button" href="{{ route('admin.users.create') }}" aria-label="{{ __('Нове замовлення') }}">
                        {{ __('Нове замовлення') }}
                    </a>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-6 col-sm-6 col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">Температура</h4>
                    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="text-warning" style="height: 40px;"><path fill="currentColor" d="M176 384c0 26.51-21.49 48-48 48s-48-21.49-48-48c0-20.898 13.359-38.667 32-45.258V208c0-8.837 7.163-16 16-16s16 7.163 16 16v130.742c18.641 6.591 32 24.36 32 45.258zm48-84.653c19.912 22.564 32 52.195 32 84.653 0 70.696-57.302 128-128 128-.299 0-.61-.001-.909-.003C56.789 511.509-.357 453.636.002 383.333.166 351.135 12.225 321.756 32 299.347V96c0-53.019 42.981-96 96-96s96 42.981 96 96v203.347zM224 384c0-39.894-22.814-62.144-32-72.553V96c0-35.29-28.71-64-64-64S64 60.71 64 96v215.447c-9.467 10.728-31.797 32.582-31.999 72.049-.269 52.706 42.619 96.135 95.312 96.501L128 480c52.935 0 96-43.065 96-96z" class=""></path></svg>
                </div>
                <a href="#" class="stretched-link" aria-label="index"></a>
                <h3>
                    <b>+<span class="pct-counter" id="temperature">0</span> C</b>
                </h3>
                <div class="col-12 py-3 px-3" style="min-height: 60px;">
                    <div class="progress mb-1" style="height: 5px;">
                        <div class="temperature-progress-bar progress-bar bg-warning" role="progressbar" style="width: 21.9%;" aria-valuenow="21.9" aria-valuemin="16" aria-valuemax="30"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-small">+16</span>
                        <span class="text-small"></span>
                        <span class="text-small">+30</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">CO<small>2</small></h4>
                    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="text-secondary" style="height: 40px;"><path fill="currentColor" d="M571.7 238.8c2.8-9.9 4.3-20.2 4.3-30.8 0-61.9-50.1-112-112-112-16.7 0-32.9 3.6-48 10.8-31.6-45-84.3-74.8-144-74.8-94.4 0-171.7 74.5-175.8 168.2C39.2 220.2 0 274.3 0 336c0 79.6 64.4 144 144 144h368c70.7 0 128-57.2 128-128 0-47-25.8-90.8-68.3-113.2zM512 448H144c-61.9 0-112-50.1-112-112 0-56.8 42.2-103.7 97-111-.7-5.6-1-11.3-1-17 0-79.5 64.5-144 144-144 60.3 0 111.9 37 133.4 89.6C420 137.9 440.8 128 464 128c44.2 0 80 35.8 80 80 0 18.5-6.3 35.6-16.9 49.2C573 264.4 608 304.1 608 352c0 53-43 96-96 96z" class=""></path></svg>
                </div>
                <a href="#" class="stretched-link" aria-label="index"></a>
                <h3>
                    <b><span class="pct-counter" id="co">714</span></b>
                </h3>
                <div class="col-12 py-3 px-3" style="min-height: 60px;">
                    <div class="progress mb-1" style="height: 5px;">
                        <div class="co-progress-bar progress-bar bg-secondary" role="progressbar" style="width: 71.4%;" aria-valuenow="714" aria-valuemin="300" aria-valuemax="1500"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-small">300</span>
                        <span class="text-small"></span>
                        <span class="text-small">1500</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">Світло</h4>
                    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="text-warning" style="height: 40px;"><path fill="currentColor" d="M256 143.7c-61.8 0-112 50.3-112 112.1s50.2 112.1 112 112.1 112-50.3 112-112.1-50.2-112.1-112-112.1zm0 192.2c-44.1 0-80-35.9-80-80.1s35.9-80.1 80-80.1 80 35.9 80 80.1-35.9 80.1-80 80.1zm256-80.1c0-5.3-2.7-10.3-7.1-13.3L422 187l19.4-97.9c1-5.2-.6-10.7-4.4-14.4-3.8-3.8-9.1-5.5-14.4-4.4l-97.8 19.4-55.5-83c-6-8.9-20.6-8.9-26.6 0l-55.5 83-97.8-19.5c-5.3-1.1-10.6.6-14.4 4.4-3.8 3.8-5.4 9.2-4.4 14.4L90 187 7.1 242.5c-4.4 3-7.1 8-7.1 13.3 0 5.3 2.7 10.3 7.1 13.3L90 324.6l-19.4 97.9c-1 5.2.6 10.7 4.4 14.4 3.8 3.8 9.1 5.5 14.4 4.4l97.8-19.4 55.5 83c3 4.5 8 7.1 13.3 7.1s10.3-2.7 13.3-7.1l55.5-83 97.8 19.4c5.4 1.2 10.7-.6 14.4-4.4 3.8-3.8 5.4-9.2 4.4-14.4L422 324.6l82.9-55.5c4.4-3 7.1-8 7.1-13.3zm-116.7 48.1c-5.4 3.6-8 10.1-6.8 16.4l16.8 84.9-84.8-16.8c-6.6-1.4-12.8 1.4-16.4 6.8l-48.1 72-48.1-71.9c-3-4.5-8-7.1-13.3-7.1-1 0-2.1.1-3.1.3l-84.8 16.8 16.8-84.9c1.2-6.3-1.4-12.8-6.8-16.4l-71.9-48.1 71.9-48.2c5.4-3.6 8-10.1 6.8-16.4l-16.8-84.9 84.8 16.8c6.5 1.3 12.8-1.4 16.4-6.8l48.1-72 48.1 72c3.6 5.4 9.9 8.1 16.4 6.8l84.8-16.8-16.8 84.9c-1.2 6.3 1.4 12.8 6.8 16.4l71.9 48.2-71.9 48z" class=""></path></svg>
                </div>
                <a href="#" class="stretched-link" aria-label="index"></a>
                <h3>
                    <b><span class="pct-counter">ВКЛ</span></b>
                </h3>
                <div class="col-12 px-3" style="min-height: 60px;">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-end flex-column">
                            <div class="mx-auto"><h5 class="fw-bold text-secondary">Вкл</h5></div>
                            <div class="mx-auto"><h4 class="fw-bold text-secondary">03:00</h4></div>
                        </div>
                        <div class="d-flex align-items-end flex-column">
                            <div class="mx-auto"><h5 class="fw-bold text-secondary">Вимк</h5></div>
                            <div class="mx-auto"><h4 class="fw-bold text-secondary">22:00</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 mb-3">
            <div class="card text-center h-100">
                <div class="card-header">
                    Повідомлення про помилки
                </div>
                <div class="card-body p-0">
                    @if (false)
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <div class="d-flex justify-content-center align-items-center h-100" style="min-height: 9rem;">Немає повідомлень</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    var ws;
    var wsUri = "ws:";
    var loc = window.location;
    console.log(loc);
    if (loc.protocol === "https:") { wsUri = "wss:"; }
    // This needs to point to the web socket in the Node-RED flow
    // ... in this case it's ws/simple
    wsUri += "//" + loc.host + ":1880" + "/ws/simple";

    document.addEventListener("DOMContentLoaded", function(){
        wsConnect();
    });

    function wsConnect() {
        console.log("connect",wsUri);
        ws = new WebSocket(wsUri);
        //var line = "";    // either uncomment this for a building list of messages
        ws.onmessage = function(msg) {
            var line = "";  // or uncomment this to overwrite the existing message
            // parse the incoming message as a JSON object
            var data = msg.data;
            completed_data = JSON.parse(data);
            console.log(completed_data);
            // build the output from the topic and payload parts of the object
            line += data;
            // replace the messages div with the new "line"
            document.getElementById('temperature').innerHTML = completed_data.FIRST;
            document.getElementsByClassName('temperature-progress-bar').item(0).setAttribute('aria-valuenow',completed_data.FIRST);
            document.getElementsByClassName('temperature-progress-bar').item(0).setAttribute('style','width:'+Number(((completed_data.FIRST - 16) * 100) / (30 - 16))+'%');
            document.getElementById('co').innerHTML = completed_data.PPM;
            document.getElementsByClassName('co-progress-bar').item(0).setAttribute('aria-valuenow',completed_data.PPM);
            document.getElementsByClassName('co-progress-bar').item(0).setAttribute('style','width:'+Number(((completed_data.PPM - 300) * 100) / (1500 - 300))+'%');
            //ws.send(JSON.stringify({data:data}));
        }
        ws.onopen = function() {
            // update the status div with the connection status
            // document.getElementById('status').innerHTML = "connected";
            //ws.send("Open for data");
            console.log("connected");
        }
        ws.onclose = function() {
            // update the status div with the connection status
            // document.getElementById('status').innerHTML = "not connected";
            // in case of lost connection tries to reconnect every 3 secs
            setTimeout(wsConnect,3000);
        }
    }

    function doit(m) {
        if (ws) { ws.send(m); }
    }
</script>
@endsection