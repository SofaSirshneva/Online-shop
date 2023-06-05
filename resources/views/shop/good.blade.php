@extends('layout')

@section('title')
    Каталог
@endsection

@section('content')
<div style="padding: 25px;">
    <div style="text-align: left; margin-top: 2%; float: left;">
        <img src="{{ URL::to('/') }}/images/{{ $item->image }}" width="80%">
    </div>
    <div  style="text-align: left; margin-top: 2%;font-size: 40px;">
        <b>{{ $item->name }}</b><br>
        {{ $item->price }}
        <button data-ajax="{{ route('shop.cart.add', $item->id)}}" class="button">Купить</button>
    </div>
    <div class="tabbed">
        <div class="tabs"><a href="#general">Подробное описание</a><a href="#mozilla">Отзывы</a><a href="#add">Добавить отзыв</a></div>
        <div id="general" class="tab">
            <p> {{ $item->description }} </p>
                <ul> @foreach($item->properties as $property)
                <li>{{ $property->property_name}} : {{$property->property_value}}</li>
                @endforeach
                </ul>
          </div>
        <div id="mozilla" class="tab">
            <div style="width:450px; float:left">
                <b>Eлена, 22 июня 2022</b><br>
                <p>Cерьги красивые, крепкий английский замок. Есть один недостаток, конструкция серьги: очень длинный штырь и за цветком припаян металл, соответственно, у тех, у кого тонкая мочка, серьга вываливается наружу, не прилегая плотно к уху. Пришлось сзади надеть силиконовую застёжку, а затем, застегнуть замок. Серьга встала на место. Может этот способ будет полезен следующим покупателям</p>
                <b>Юлия, 17 марта 2022</b>
                <p>Эти серьги получила в подарок на день рождения ещё в 2018 году. Спустя 4 года все камушки на месте, блестят и радуют. Серьги немаленькие, но на ушках не ощущаются, сидят хорошо, на тонкой мочке не перевешивают, смотрятся бесподобно. Очень красивые, качество на высоте.👍🏻👍🏻👍🏻🥰</p>
                <b>Ольга, 6 апреля 2021</b>
                <p>Эти серьги я решила купить вместе с кольцом сразу, как только увидела! Они прекрасны своим изяществом и великолепным сочетанием сапфиров и бриллиантов.</p>
            </div>
            <div>
                <img src="oz.png" width="300px">
            </div>
        </div>
        <div id="add" class="tab">
            <table style="margin-top: 20px;">
            <tr><th><label style="float:left">Ваша оценка:</label></th>
            <th><div class="rating-area">
                <input type="radio" id="star-5" name="rating" value="5">
                <label for="star-5" title="Оценка «5»"></label>	
                <input type="radio" id="star-4" name="rating" value="4">
                <label for="star-4" title="Оценка «4»"></label>    
                <input type="radio" id="star-3" name="rating" value="3">
                <label for="star-3" title="Оценка «3»"></label>  
                <input type="radio" id="star-2" name="rating" value="2">
                <label for="star-2" title="Оценка «2»"></label>    
                <input type="radio" id="star-1" name="rating" value="1">
                <label for="star-1" title="Оценка «1»"></label>
            </div></th>
        </tr>
            <tr><th style="vertical-align: top;"><label >Ваш отзыв:</label></th><th><textarea name="comment"></textarea></th></tr>
            <tr><th colspan="2"><button class="button">Отправить</button></th></tr>
        </table>
        
        </div>
        </div>
    </div>
@endsection