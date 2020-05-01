@extends('layouts.app')

@section('content')
    <div class="col-md-8">

        <h2>Добавлення Категорії</h2>
        <form method="POST" enctype="multipart/form-data" role="form" action="{{route('shop.admin.category.store')}}">
            @csrf

            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" value="{{old('title')}}" id="title" name="title"
                       placeholder="Назва Категорії"
                       minlength="3" required>
            </div>
            <div class="form-group">
                <label for="description">Контент</label>
                <textarea class="form-control" name="description" id="description" rows="3">
                    {{old('description')}}
                        </textarea>
            </div>
            <div class="form-group">
                <label for="image">Титульна картинка</label>
                <input type="file" class="form-control-file" id="file" name="image" value="{{old('file') }}">
            </div>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
