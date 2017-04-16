@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ route('trending') }}" class="btn btn-block btn-primary" data-toggle="tooltip" data-placement="top" title="See what's trending around here!"><i class="fa fa-fw fa-youtube-play" style="font-size: 60px"></i></a>
                        </div>
                        <div class="col-xs-6">
                            <a href="{{ route('submit') }}" class="btn btn-block btn-primary" data-toggle="tooltip" data-placement="top" title="Submit your favorite video!"><i class="fa fa-fw fa-paper-plane" style="font-size: 60px"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
