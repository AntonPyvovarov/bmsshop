@extends('layouts.app')
@section('description',$products[0]['category']->description)
@section('title', $products[0]['category']->title)
@section('navigation')
    @include('layouts.navigation')
@endsection

@section('content')
    <h1>{{$products[0]['category']->title}}</h1>
    <div class="row">

        @foreach($products as $product)
            <div class="card mr-4 py-3 col-sm-9 col-md-3" style="width: 18rem;">
                <img src="{{ Storage::url($product->title_image) }}" class="card-img-top" alt="{{$product->title}}">

                <div class="card-body">
                    <h5 class="card-title ">
                        <a href="{{route('shop.products.show',$product->slug)}}" class="text-dark">
                            {{$product->title}}
                        </a>
                    </h5>
                    <ul class="text-secondary">{!! $product->excerpt !!}</ul>
                    <p>
                        <a href="{{route('shop.products.show',$product->slug)}}"
                           class="btn btn-outline-dark ">Перейти</a>
{{--                                                <a href="#" class=" btn btn-success "><i class="fas fa-shopping-cart"></i></a>--}}
                    </p>
                </div>
            </div>
        @endforeach
        
    </div>

        <div class="row justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center py-4">
                    {{$products->links()}}
                </ul>
            </nav>
        </div>



    @endsection
