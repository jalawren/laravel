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

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th> File </th>
                                <th> Database Model </th>
                                <th> Update schedule </th>
                                <th> File Exists </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($files as $key => $value)
                                <tr>
                                    <td>
                                        {!! $value->full_file_name  !!}
                                    </td>
                                    <td>
                                        {!! $value->model !!}
                                    </td>
                                    <td>
                                        {!! $value->schedule / (60*60*24) !!} days
                                    </td>
                                    <td>
                                        @if($value->file_exists($value->full_file_name) == 1)
                                            File Found
                                            <span class="glyphicon glyphicon-ok"> </span>

                                        @else
                                            File Not Found
                                            <span class="glyphicon glyphicon-warning-sign"> </span>
                                        @endif
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection