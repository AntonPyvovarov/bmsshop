@if(isset($product))
    @extends('layouts.app')
        @if(isset($product->description))
            @section('description', $product->description)
        @endif
@section('title', $product->title)
@section('content')
    <div class="row justify-content-center">
        {{-- Carusel--}}
        <div class="col-md-5 py-6">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    @if(isset($product->image))
                        @foreach($product->image as  $key=>$images)
                            <div class="carousel-item @if($key==0)active @endif">
                                <img src="{{ Storage::url($images)}}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    @endif
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
        </div>

        <div class="col-md-5">
            <div class="py-1 ">
                <h1 class="card-title ">{{$product->title}}</h1>
            </div>
            <div>
                <h4 class="text-danger"><strong>{{$product->price}} грн</strong></h4>
            </div>
            <p class="text-success">Є в наявності</p>

            <hr>
            <div class="py-1 ">
                <h4>Доставка</h4>
                <table class="table table-borderless">
                    <tbody>
                    <tr>

                        <td>Нова Пошта</td>
                    </tr>
                    <tr>

                        <td>Укр Пошта</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-10">
            <hr class="py-4 ">
            <div class="row">
                <div class="content py-2 col-md-7">
                    {!! $product->content_raw !!}
                </div>
            </div>

        </div>

    </div>

@endsection
@endif
