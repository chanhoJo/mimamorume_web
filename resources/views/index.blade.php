<!DOCTYPE html>
<html lang="en">

<head>
    <title>PlayRTC Tutorial</title>
    <meta charset="utf-8">
    <script type='text/javascript' src='{{URL::to('/')}}/js/jquery-1.12.4.min.js'></script>
    <script type='text/javascript' src='{{URL::to('/')}}/js/playrtc.js'></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .local-video {
            width: 80px;
            height: 60px;
            z-index: 10;
            position: relative;
            top: -100px;
            right: 30px;
        }

        .remote-video {
            margin-top: 20px;
            margin-bottom: 20px;
            width: 320px;
            height: 240px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h1 class="page-header">PlayRTC Tutorial</h1>
        </div>

        <div class="col-md-6">
            <h2 class="h3">Caller</h2>
            <h3 class="h4">Create and Connect Channel</h3>
            <form class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="createChannelId">Channel Id</label>
                    <input class="form-control" type="text" id="createChannelId" placeholder="Create and connect the channel." value="" readonly>
                </div>
                <button class="btn btn-default" id="createChannel">
                    <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Create Channel
                </button>
            </form>

            <video class="remote-video center-block" id="callerRemoteVideo"></video>
            <video class="local-video pull-right" id="callerLocalVideo"></video>

        </div>

        <div class="col-md-6">
            <h2 class="h3">Callee</h2>
            <h3 class="h4">Connect Channel</h3>
            <form class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="connectChannelId">Channel Id</label>
                    <input class="form-control" type="text" id="connectChannelId" placeholder="Enter the channel id." value="">
                </div>
                <button class="btn btn-default" id="connectChannel">
                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Connect Channel
                </button>
            </form>

            <video class="remote-video center-block" id="calleeRemoteVideo"></video>
            <video class="local-video pull-right" id="calleeLocalVideo"></video>

        </div>
    </div>
</div>

<!--<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>-->
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->

{{--<script src="http://www.playrtc.com/sdk/js/playrtc.js"></script>--}}
<script>
    'use strict';

    var createChannelButton = document.querySelector('#createChannel');
    var createChannelId = document.querySelector('#createChannelId');
    var appCaller;

    appCaller = new PlayRTC({
        projectKey: "60ba608a-e228-4530-8711-fa38004719c1",
        localMediaTarget: "callerLocalVideo",
        remoteMediaTarget: "callerRemoteVideo"
    });

    appCaller.on('connectChannel', function(channelId) {
        createChannelId.value = channelId;
    });

    createChannelButton.addEventListener('click', function(e) {
        e.preventDefault();
        appCaller.createChannel();
    }, false);
</script>
<script>
    'use strict';

    var connectChannelId = document.querySelector('#connectChannelId');
    var connectChannelButton = document.querySelector('#connectChannel');
    var appCallee;

    appCallee = new PlayRTC({
        projectKey: "60ba608a-e228-4530-8711-fa38004719c1",
        localMediaTarget: "calleeLocalVideo",
        remoteMediaTarget: "calleeRemoteVideo"
    });

    connectChannelButton.addEventListener('click', function(e) {
        e.preventDefault();
        var channelId = connectChannelId.value;
        if (!channelId) { return };
        appCallee.connectChannel(channelId);
    }, false);
</script>
</body>

</html>