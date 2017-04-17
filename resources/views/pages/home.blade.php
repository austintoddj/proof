@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Trending Now</div>

                <div class="panel-body">
                    <p><i class="fa fa-fw fa-check-square-o"></i> Display 10 Ten Trending Videos by Votes/Views</p>
                    <pre>{{ var_dump($data) }}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
