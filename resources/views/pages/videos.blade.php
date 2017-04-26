@extends('layouts.app')

@section('title', 'Videos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">All Videos ({{ sizeof($data) }})</div>
                    <div class="panel-body">
                        @foreach($data as $video)
                            <p><a href="{{ $video->attributes->url }}" target="_blank"> {{ $video->attributes->title }}</a> <span class="text-muted small"><i class="fa fa-fw fa-eye"></i> {{ $video->attributes->view_tally }}&nbsp;&nbsp;<i class="fa fa-fw fa-check"></i> {{ $video->attributes->vote_tally }}</span></p>
                            <form role="form" method="POST" action="{{ route('videos.store') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_videoId" value="{{ $video->id }}">
                                <input type="hidden" name="_userId" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="_userIp" value="{{ $_SERVER['REMOTE_ADDR'] }}">
                                <button class="btn btn-default btn-xs" type="submit" name="_opinion" value="1" @if(\App\Models\Vote::votesLeft() == 0) disabled @endif><i class="fa fa-fw fa-thumbs-up"></i> Upvote</button>
                                <button class="btn btn-default btn-xs" type="submit" name="_opinion" value="-1" @if(\App\Models\Vote::votesLeft() == 0) disabled @endif><i class="fa fa-fw fa-thumbs-down"></i> Downvote</button>
                            </form>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
