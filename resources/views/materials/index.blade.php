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
                                <th> Description </th>
                                <th> EMG </th>
                                <th> Cost </th>
                                <th> Cost Unit </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($materials as $x)
                                <tr>
                                    <td> <a href="{!! action('MaterialController@show', [$x->id]) !!}">{!! $x->id !!}</a> </td>
                                    <td> {!! $x->description !!} </td>
                                    <td> {!! $x->emg !!} </td>
                                    @if($x->uom == 'KG')
                                    <td> $ {!! number_format(($lb * $x->cost), 2) !!}  </td>
                                    @else
                                        <td> $ {!! number_format(($x->cost), 2) !!} </td>
                                    @endif
                                    <td> {!! $x->uom !!} </td>

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