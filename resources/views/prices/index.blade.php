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
                    <div class="panel-heading">Price Quote</div>
                    <div class="panel-body">

                        <div id="app">

                            <component is="@{{ currentView }}"></component>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="/js/app.js"></script>
