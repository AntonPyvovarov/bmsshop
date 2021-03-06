@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
        <header>
            <h1>Доставка и Оплата</h1>
        </header>
    <hr>
        <section>
            <h2 class="py-2">Доставка Новой Почтой</h2>
            <p>Отправка "Новой Почтой" осуществляется до 13:00. Отправка происходит каждый день кроме воскресенья.</p>
            <p>
                Срок доставки по Украине "Новой Почтой" составит 1-3 дня.
                В <b>Киев</b>, <b>Львов</b>, <b>Днепр</b> доставка составляет 1 день.
            </p>
            <p>
                Стоимость достаки Новой Почтой:
            </p>
            <ul>
                <li>по Винницкой от 35грн</li>
                <li> по Украине  от 40грн</li>
            </ul>
            <hr>
            <h3 class="py-2">Доставка Укрпочтой</h3>
            <p>Отправка "Укрпочтой" осуществляется до 13:00. Отправка происходит каждый день кроме воскресенья.</p>
            <p>Срок доставки по Украине "Укрпочтой" составит 1-5 дней. </p>
            <p>Стоимость доставки Укрпочтой по Украине :</p>
            <ul>
                <li>Стандарт от 25грн</li>
                <li>Експресс от 29грн </li>
            </ul>
            <hr>
            <h3 class="py-2">Варианты оплаты:</h3>
            <ul>
                <li>Оплата наложеным платежом</li>
                <li>Оплата на карту Приват</li>
                <li>Безопасная сделка через OLX</li>
            </ul>
        </section>
        </div>
    </div>
@endsection
