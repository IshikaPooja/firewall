@extends('Rule::layout.app')
@section('title','Geo list')
@section('content')
<div class="container">
    <div class="col-12">

        <!-- from -->
        <div class="cart">
            <div class="cart-body">
                
                <form action="{{route('firewall.geolist_store')}}" method="post">
                @csrf
                    <div class="d-flex mt-4">
                        <div class="col-3">
                            <label for="">Country Name</label>
                            <input type="text" name="country_name" class="from-controle" required>
                        </div>

                        <div class="col-3">
                            <label for="">City Name</label>
                            <input type="text" name="city_name" class="from-controle" required>
                        </div>


                        <div class="col-3">
                            <button type="submit" class="btn btn-sm btn-info">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <hr>

        <!-- table -->
        <div class="cart">
            <div class="cart-body">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>Country name</th>
                        <th>city name</th>
                    </tr>
                    @foreach($datas as $data)
                    <tr>
                        <th>{{$data->id}}</th>
                        <th>{{$data->country_name}}</th>
                        <th>{{$data->city_name}}</th>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </div>
</div>
@endsection