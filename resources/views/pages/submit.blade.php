@extends('layouts.app')

@section('title', 'Submit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Submit</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('submit') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                <label for="link" class="col-md-4 control-label">Video URL</label>

                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}" required @if(\App\Helpers\Allowable::weekend(date('l'))) placeholder="Unavailable on weekends" disabled @endif>
                                    <p class="small text-muted">Example: <code>http://vimeo.com/22439234</code></p>
                                    @if ($errors->has('link'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" name="submit" class="btn btn-primary" @if(\App\Helpers\Allowable::weekend(date('l'))) disabled @endif>
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
