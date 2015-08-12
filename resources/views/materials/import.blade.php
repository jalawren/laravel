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
                    <div class="panel-heading">Import Materials</div>
                    <div class="panel-body">

                            @if(Storage::exists('ZPTF_MRPDATA.XLSX'))
                                <div class="alert alert-success">
                                    <span class="glyphicon glyphicon-ok"> </span>
                                    File: ZPTF_MRPDATA exists!
                                </div>
                            <a href="{{action('MaterialController@store')}}"><button type="button" class="btn btn-primary btn-block">Import Materials</button></a>

                        @else
                            <div class="alert alert-danger">
                                <span class="glyphicon glyphicon-warning-sign"></span>
                                File: ZPTF_MRPDATA not found!!
                            </div>
                            <button type="button" class="btn btn-primary btn-block disabled">Import Materials</button>
                            <br/>
                            <a href="{{action('MaterialController@import')}}"><button type="button" class="btn btn-primary btn-block">Check File</button></a>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection