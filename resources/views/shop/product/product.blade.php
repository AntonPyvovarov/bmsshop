@extends('layouts.app')
@section('title', $product->title)

@section('content')

    <div class="col-md-8">
        <div class="py-3 ">
            <h1 class="text-info">{{$product->title}}</h1>
        </div>
        <div class="py-3">
            <p class="">
                ЦІНА :  <span class="text-danger">{{$product->price}}</span>грн
            </p>

        </div>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($product->image as  $key=>$images)
                    <div class="carousel-item @if($key==0)active @endif">
                        <img src="{{ Storage::url($images)}}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="content py-5">
            {!! $product->content_raw !!}
        </div>
    </div>
@endsection
