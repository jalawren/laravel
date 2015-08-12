@extends('app')

@section('content')

    <div class="container">
        @if(\Session::has('flash_success'))
            <div class="col-md-10 col-md-offset-1 alert alert-success">
                <span class="glyphicon glyphicon-ok"> </span> {{ \Session::get('flash_success') }}
            </div>
        @elseif(\Session::has('flash_danger'))
            <div class="col-md-10 col-md-offset-1 alert alert-danger">
                <span class="glyphicon glyphicon-warning-sign"> </span> {{ \Session::get('flash_danger') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Materials</div>
                    <div class="panel-body">

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th> Material </th>
                                <th> Item </th>
                                <th> Component </th>
                                <th> Quantity </th>
                                <th>  Unit </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($boms as $x)
                                <tr>
                                    {{--<td> <a href="{!! action('MaterialController@show', [$x->id]) !!}">{!! $x->id !!}</a> </td>--}}
                                    <td> {!! $x->material_id !!} </td>
                                    <td> {!! $x->item_number !!} </td>
                                    <td> {!! $x->component->description !!} </td>
                                    <td> {!! $x->component_quantity !!} </td>
                                    <td> {!! $x->component_unit !!} </td>


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