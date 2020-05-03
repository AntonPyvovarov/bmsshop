@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2>Добавлення Позиції</h2>
            <form method="POST" enctype="multipart/form-data" role="form" action="/contact">

                <div class="form-group">
                    <label for="name">Ваше Имя:</label>
                    <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name"
                           placeholder="Введите имя"
                           minlength="3" required>
                </div>
                <div class="form-group">
                    <label for="tel">Номер Телефона:</label>
                    <input type="tel" class="form-control" value="{{old('tel')}}" id="tel" name="tel"
                           placeholder="Введите номер телефона"
                           minlength="10" required>
                </div>
                <div class="form-group">
                    <label for="email">Почта:</label>
                    <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email"
                           placeholder="Введите почту"
                           minlength="3" required>
                </div>
                <div class="form-group">
                    <label for="massage">Ваше сообщенние</label>
                    <textarea class="form-control" name="massage" id="massage" rows="10" required>
                    {{old('massage')}}
                        </textarea>
                </div>
                @csrf
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
