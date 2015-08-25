@extends('app')

@section('content')

    <div class="container">

        @if(\Session::has('flash_message'))

            <div class="alert alert-danger">

                <span class="glyphicon glyphicon-warning-sign"></span>

                {{ Session::get('flash_danger') }}
            </div>
        @endif

        <div class="row">

            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">

                    <div class="panel-heading">File Manager</div>

                    <div class="panel-body">


                        <div>

                        <form action="/files/import" class="dropzone" id="excel-drop">
                                {!! csrf_field() !!}
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection