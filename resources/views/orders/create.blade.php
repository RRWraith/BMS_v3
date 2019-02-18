@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Kamarier</div>
     </h2> 
@endsection
@section('content')


    <div class="jumbotron">
    <form method="GET" action="/orders/create">
       @csrf  
       @php 
        $products = App\Product::all();
        $nrProduktesh = count($products);
       @endphp
        @if($nrProduktesh>0)

            {{-- Forma --}}
            @foreach($products as $key=>$product)
                <div><label>{{$product->name}}</label><input type="radio" id="product" name="products" value="{{$product->prod_id}}" required> </div>    
            @endforeach

            <br> <br>
            <div><label>Sasia:</label> <input type="number" name="sasia" id="sasia"  placeholder="Sasia" required/> </div>

            <button type="submit">Create Order</button>
            @php
                $existing = json_decode(Request::get('vlerat'));
                $current = [];
                if(Request::get('products') && Request::get('sasia')) {
                    $current = array(
                    'prod_id'=>Request::get('products'),
                    'sasia'=>Request::get('sasia')
                );
                }

                if(!empty($current)){
                    $existing[] = $current;
                }
                
                
            @endphp
            <input type="hidden" name="vlerat" value="{{json_encode($existing)}}"/>
            </form>

            {{--Fund Forma --}}

            @else
                <h1>No Products to make a order</h1>
        @endif
    </form>
</div>



{{-- Pjesa kryesore qe kalona ne store ben redirect diku tjeter --}}
    <form method="POST" action="/orders">
    @csrf  
    @php
        $array= json_encode($_GET);
    @endphp
    
    <input type="hidden" name="vlerat" value="{{json_encode($existing)}}"/>
        @if(empty($existing))
        <h1>Need to add at least one product</h1>
        @else 
        <button type="submit" id="butonPrije">Prije Faturen</button>
        @endif
    </form>

@endsection