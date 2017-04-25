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
                        {{ var_dump($trendingVideosByViews) }}
                    </div>
                    <div class="col-md-6">
                        <h3>Top 10 by Votes</h3>
                        <hr>
                        {{ var_dump($trendingVideosByVotes) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
