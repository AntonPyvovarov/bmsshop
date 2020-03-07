@extends('layouts.app')
@section('content')
    <div class="row justify-content-center ">

        @foreach($products as $product)
            <div class="card mr-2 " style="width: 18rem;">
                <img src="{{Storage::url($product->title_image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-danger">{{$product->title}}</h5>
                    <p class="card-text">{{$product->excerpt}}</p>
                    <p>
                        <a href="{{route('shop.products.show',$product->id)}}"
                           class="btn btn-outline-primary ">Перейти</a>
                        <a href="#" class=" btn btn-success "><i class="fas fa-shopping-cart"></i></a>
                    </p>
                </div>
            </div>
        @endforeach
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{$products->links()}}
            </ul>
        </nav>

    </div>


@endsection
