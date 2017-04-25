@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-fw fa-fire"></i> Trending Now</div>

                <div class="panel-body">
                    <div class="col-md-6">
                        <h3>Top 10 by Views</h3>
                        <hr>
                        @foreach($trendingVideosByViews as $video)
                            <p><a href="{{ $video->attributes->url }}" target="_blank"> {{ $video->attributes->title }}</a> <span class="text-muted small">({{ $video->attributes->view_tally . ' ' . str_plural('view', $video->attributes->view_tally) }})</span></p>
                            <p>
                                <a href="#" class="btn btn-default btn-xs" @if(\App\Models\Vote::votesLeft() == 0) disabled @endif><i class="fa fa-fw fa-thumbs-up"></i> Upvote</a>
                                <a href="#" class="btn btn-default btn-xs" @if(\App\Models\Vote::votesLeft() == 0) disabled @endif><i class="fa fa-fw fa-thumbs-down"></i> Downvote</a>
                            </p>
                            <hr>
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h3>Top 10 by Votes</h3>
                        <hr>
                        @foreach($trendingVideosByVotes as $video)
                            <p><a href="{{ $video->attributes->url }}" target="_blank"> {{ $video->attributes->title }}</a> <span class="text-muted small">({{ $video->attributes->vote_tally . ' ' . str_plural('vote', $video->attributes->vote_tally) }})</span></p>
                            <p>
                                <a href="#" class="btn btn-default btn-xs" @if(\App\Models\Vote::votesLeft() == 0) disabled @endif><i class="fa fa-fw fa-thumbs-up"></i> Upvote</a>
                                <a href="#" class="btn btn-default btn-xs" @if(\App\Models\Vote::votesLeft() == 0) disabled @endif><i class="fa fa-fw fa-thumbs-down"></i> Downvote</a>
                            </p>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
