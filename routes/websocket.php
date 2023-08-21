<?php


use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

Websocket::on('connect', function ($websocket,Request $request) {
    // in connect callback, illuminate request will be injected here
    $websocket->emit('message', 'welcome');
    session(['websocket_request' => $request]);
    var_dump($request->user());
});
Websocket::on('sendmsg', function ($websocket,$data) {
    Websocket::loginUsingId(1);
    var_dump($data);
});

Websocket::on('disconnect', function ($websocket) {
    // called while socket on disconnect
});

Websocket::on('example', function ($websocket, $data) {
    var_dump('message', $data);
});
