@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Videos ({{ sizeof($data->data) }})</div>
                    <div class="panel-body">
                        @foreach($data->data as $video)
                            <a href="{{ $video->attributes->url }}" target="_blank">
                                <p><i class="fa fa-fw fa-youtube-play"></i> {{ $video->attributes->title }}</p>
                            </a>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
