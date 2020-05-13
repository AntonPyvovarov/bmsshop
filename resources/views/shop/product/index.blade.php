@extends('layouts.app')
@section('navigation')
    @include('layouts.navigation')
@endsection

@section('content')
    <div class="row justify-content-center">

        @foreach($products as $product)
            <div class="card mr-4 py-2  col-sm-9 col-md-3" style="width: 18rem;">

                <img src="{{ Storage::url($product->title_image) }}" class="card-img-top" alt="{{$product->title}}">

                <div class="card-body">
                    <h2 class="card-title">
                        <a href="{{route('shop.products.show',$product->slug)}}" class="text-dark ">
                            {{$product->title}}
                        </a>
                    </h2>
                    <ul class="text-secondary">{!! $product->excerpt !!}</ul>
                    <p>
                        <a href="{{route('shop.products.show',$product->slug)}}"
                           class="btn btn-outline-primary ">Перейти</a>
                        <a href="#" class=" btn btn-success "><i class="fas fa-shopping-cart"></i></a>
                        <span >{{$product->price}}</span>
                    </p>
                </div>
            </div>
        @endforeach


    </div>
{{--    @if($products->total()>$products->count())--}}
{{--        <div class="row justify-content-center">--}}
{{--            <nav aria-label="Page navigation example">--}}
{{--                <ul class="pagination justify-content-center py-4">--}}
{{--                    {{$products->links()}}--}}
{{--                </ul>--}}
{{--            </nav>--}}
{{--        </div>--}}
{{--    @endif--}}
@endsection
