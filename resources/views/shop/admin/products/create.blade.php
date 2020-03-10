@extends('layouts.app')

@section('content')
    <br>
    <div class="col-md-8">
        <h2>Добавлення Позиції</h2>
        <form method="POST" enctype="multipart/form-data" role="form" action="{{route('shop.admin.product.store')}}">

            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок"
                       minlength="3" required>
            </div>
            <div class="form-group">
                <label for="price">Ціна</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Ціна">
            </div>

            <div class="form-group">
                <label for="category_id">Категорія</label>
                <select class="form-control" name="category_id" id="category">
                    @foreach($categories as $categoryOption)
                        <option value="{{$categoryOption->id}}">{{$categoryOption->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="excerpt">Короткий опис</label>
                <textarea class="form-control" name="excerpt" id="excerpt" rows="5">

                        </textarea>
            </div>
            <div class="form-group">
                <label for="content_raw">Контент</label>
                <textarea class="form-control" name="content_raw" id="content_raw" rows="12">
                        </textarea>
            </div>
            <div class="form-group">
                <label for="title_image">Титульна картинка</label>
                <input type="file" class="form-control-file" id="file" name="title_image" value="{{ old('file') }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Вставити картинки</label>
                <input type="file" class="form-control-file" id="file" name="image[]" value="{{ old('file') }}"
                       multiple>
            </div>

            {{--                    <div class="form-check">--}}
            {{--                        <input class="form-check-input" name="is_published" type="checkbox" value="true"--}}
            {{--                               id="defaultCheck1">--}}
            {{--                        <label class="form-check-label" for="defaultCheck1">--}}
            {{--                            Опубликовать--}}
            {{--                        </label>--}}
            {{--                    </div>--}}

            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection
