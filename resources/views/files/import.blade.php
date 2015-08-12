@extends('app')

@section('content')

    <div class="container">
        @if(\Session::has('flash_message'))
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-warning-sign"> </span>
                {{ \Session::get('flash_danger') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">File Manager</div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="/files/import">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                @foreach($files as $key => $value)
                                <div class="form-group">
                                    <label class="col-md-4 control-label">{!! $value->full_file_name !!}</label>
                                    <div class="col-md-6">
                                        {{--<form action="/file-upload" class="dropzone">--}}
                                            {{--<div class="fallback">--}}
                                                {{--<input name="file" type="file" multiple />--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                        <input type="file" class="form-control" name="{!! strtolower($value->file_name) !!}"  >
                                    </div>
                                </div>

                                @endforeach

                        </form>
                        <form action="/files/import" class="dropzone">
                            <div class="fallback">
                                <input name="file" type="textarea" multiple />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
