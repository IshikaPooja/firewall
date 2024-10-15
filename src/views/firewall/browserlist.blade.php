@extends('Rule::layout.app')
@section('title','Browser Name')
@section('content')
<div class="container">
    <div class="col-12">

        <!-- from -->
        <div class="cart">
            <div class="cart-body">
        
                <form action="{{route('firewall.browserlist_store')}}" method="post">
                    @csrf
                    <div class="d-flex mt-4">
                        <div class="col-3">
                            <label for="">Browser Name</label>
                            <input type="text" name="browser_name" class="from-controle" required>
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
                        <th>Browser Name</th>
                    </tr>
                    @foreach($datas as $data)
                    <tr>
                        <th>{{$data->id}}</th>
                        <th>{{$data->browser_name}}</th>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </div>
</div>
@endsection