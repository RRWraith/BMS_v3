@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Porosi</div>
     </h2> 
@endsection
@section('content')
    @role('admin|kamarier|menaxher')

    <a href="orders/create" class="btn btn-primary">Krijo Porosi te re</a> <br> <br>
    <table class="table table-striped">
        <tr>
            <th>Order_ID</th>
            <th>Kamarier_id</th>
            <th>Koha e krijimit</th>
            <th>Shiko Detaje</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user_id}}</td>
                <td>{{$order->created_at}}</td>
                <td><a href="/orders/{{$order->id}}">Shiko {{$order->id}}</a></td>
            </tr>
        @endforeach
        @endrole
@endsection
