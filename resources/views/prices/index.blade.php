@extends('app')

@section('content')

    <div class="container">

        @if(Session::has('flash_message'))
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-warning-sign"> </span>
                {{ Session::get('flash_danger') }}
            </div>
        @endif

        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        Price Quote
                    </div>

                    <div class="panel-body">

                        <div id="price-quote">

                            <div class="form-group">

                                <label class="control-label">Enter Customer:</label> <br/>

                                <input type="text" v-model="customer_id" v-on="keydown:update | key 'enter'" v-attr="disabled: customer_valid">

                                <span class="br-input-valid" v-show="customer_valid">

                                    @{{ customer.name_1 }}
                                    {{--@{{ customer.city + "," }}--}}
                                    {{--@{{ customer.region }}--}}
                                </span>
                             </div>

                            <hr>

                            <div class="form-group" v-show="customer_valid">

                                <label class="control-label">Enter Material:</label> <br/>

                                <input type="text"  v-model="material_id" v-on="keydown:update | key 'enter'" v-attr="disabled: cmir_valid">

                                <span class="br-input-valid" v-show="cmir_valid">

                                    @{{ material.ext_material_grp}}
                                    @{{ " | " + customer_material.customer_material_number}}
                                    @{{ " | " + customer_material.customers_description_of_material }}
                                </span>
                            </div>

                            <button v-on="click:reset">Reset</button>

                            <br/>
                            <hr>

                            <div class="col-md-10 container">

                               <table class="table table-striped table-hover" v-show="cmir_valid">

                                   <thead>

                                        <tr>
                                            <th>Material</th>

                                            <th>Description</th>

                                            <th>Quantity</th>
                                        </tr>
                                   </thead>

                                   <tbody>

                                        <tr v-repeat="boms">

                                            <td>@{{ component.material }}</td>

                                            <td>@{{ component.material_description }}</td>

                                            <td>@{{ component_quantity }} %</td>
                                        </tr>
                                   </tbody>
                               </table>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <pre>
            @{{{"cmir" : cmir_valid, "mat" : material_valid, "cust" : customer_valid} | json }}
        </pre>

    </div>
@endsection

<script src="/js/app.js" type="text/javascript"></script>
