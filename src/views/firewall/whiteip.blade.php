@extends('Rule::layout.app')
@section('title','White IP')
@section('content')
<div class="container">
    <div class="col-12">

        <!-- from -->
        <div class="cart">
            <div class="cart-body">
        
                <form action="{{route('firewall.whitelist_store')}}" method="post">
                    @csrf
                    <div class="d-flex mt-4">
                        <div class="col-3">
                            <label for="">White IP</label>
                            <input type="text" name="whiteip" class="from-controle" required>
                        </div>

                        <div class="col-3 ">
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
                        <th>ip</th>
                    </tr>
                    @foreach($datas as $data)
                    <tr>
                        <th>{{$data->id}}</th>
                        <th>{{$data->ip}}</th>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </div>
</div>
@endsection