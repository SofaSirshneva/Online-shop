@extends('layout')

@section('title')
    Сообщение
@endsection

@section('content')
<div style="padding: 300px;">
<h1>
    @if($message == 'register_done')
        Успешная регистрация
    @elseif($message == 'register_done_but_auth_error')
        Успешная регистрация, но войти не удалось
    @elseif($message == 'auth_error')
        Неверный логин или пароль
    @elseif($message == 'profile_updated')  
        Изменения сохранены
    @elseif($message == 'access_denied')
        Нет прав!
    @else
        ???
    @endif
</h1>
</div>
@endsection