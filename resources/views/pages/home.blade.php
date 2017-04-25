@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Trending Now</div>

                <div class="panel-body">
                    <div class="col-md-6">
                        <h3>Top Videos by Views</h3>
                        {{ var_dump($trendingVideosByViews) }}
                    </div>
                    <div class="col-md-6">
                        <h3>Top Videos by Votes</h3>
                        {{ var_dump($trendingVideosByVotes) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
