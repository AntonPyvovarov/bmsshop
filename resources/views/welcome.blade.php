@extends('layouts.app')
@section('content')

{{--    carusel--}}
<div class="row justify-content-center">
    <div class="col-md-9">
        <h2 class="text-center py-2">Последние поступления</h2>
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($products as $key=>$product)
                    <div
                        @if ($key==0)
                        class="carousel-item active"
                        @else
                        class="carousel-item "
                        @endif
                        data-interval="10000">

                        <img src="{{Storage::url($product->title_image)}}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <hr>
        <h3 class="py-2 text-center">Категории</h3>
        <div class="row mb-2 py-3">
            @if($categories)
                @foreach ( $categories as $category )
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0">
                            <a class="stretched-link" href="{{route('sort',[$category->id])}}">{{$category->title}}</a>
                        </h3>
                        <p class="card-text mb-auto">{{$category->description}}</p>
                        <a class="btn btn-success " href="{{route('sort',[$category->id])}}">Перейти</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <div class="col-auto d-none d-lg-block">
                            <img src="{{ Storage::url($category->image) }}" class="bd-placeholder-img" width="250" height="250"alt="{{$category->title}}">
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            @endif
        </div>
    </div>
    </div>

</div>

@endsection
