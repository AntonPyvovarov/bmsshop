@extends('layouts.app')
@section('description',$collection->description)
@section('title',$collection->title)
@section('navigation')
    @include('layouts.navigation')
@endsection
@section('content')

    <div class="row justify-content-center  ">

        @foreach($collection['products'] as $product)
            <div class="card mr-4 py-2  col-sm-9 col-md-3" style="width: 18rem;">

                <img src="{{ Storage::url($product->title_image) }}" class="card-img-top" alt="{{$product->title}}">

                <div class="card-body">
                    <h5 class="card-title text-primary">{{$product->title}}</h5>
                    <p class="card-text">{{$product->excerpt}}</p>
                    <p>
                        <a href="{{route('shop.products.show',$product->id)}}"
                           class="btn btn-outline-primary ">Перейти</a>
                        {{--                        <a href="#" class=" btn btn-success "><i class="fas fa-shopping-cart"></i></a>--}}
                    </p>
                </div>
            </div>
        @endforeach


    </div>



    @endsection
