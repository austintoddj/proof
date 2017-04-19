@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Videos</div>

                    <div class="panel-body">
                        <p><i class="fa fa-fw fa-check-square-o"></i> Display all videos here</p>
                        <div class="well">
                            {{ var_dump($data) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
