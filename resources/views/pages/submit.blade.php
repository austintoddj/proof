@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Submit</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="#">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="link" class="col-md-4 control-label">Video URL</label>

                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control" name="email" value="{{ old('link') }}" required>
                                    <p class="small text-muted">Example: <code>http://vimeo.com/22439234</code></p>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
