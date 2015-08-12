@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"> <span class="glyphicon glyphicon-usd"></span> materials</div>
                    <div class="panel-body">
                        <h3> {!! $material->id !!} </h3>

                        <p>{!! $material->description  !!} </p>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection