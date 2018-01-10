@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <example name="{{ Auth::user()->name }}" titulo="Home" cuerpo="{{ trans('adminlte_lang::message.logged') }}"></example>

    <script src="//js.pusher.com/3.0/pusher.min.js"></script>
    <script>
        Pusher.log = function(msg) {
            console.log(msg);
        };
        var pusher = new Pusher("{{env("PUSHER_APP_KEY")}}")
        var channel = pusher.subscribe('test-channel');
        channel.bind('test-event', function(data) {
            alert(data.text);
        });
    </script>


@endsection
