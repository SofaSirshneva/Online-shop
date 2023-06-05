<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Новая папка/st.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="jquery.maskedinput-master/dist/jquery.maskedinput.js"></script>
    <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
    <title>Diamand.ru - @yield('title')</title>
</head>
<body>
    <div style = "width: 1000px; margin-right: auto; margin-left: auto;">
    <div class = "head">
        <div class="logo">
            <img src="/Новая папка/p1.png" width="50px">
            Diamand
        </div>
    
    @auth
    <div class="registr str" style="color: red">
        <div>Здравствуй {{ auth()->user()->name }}!</div><br>
        <div><a style="margin-right:30px" href="{{ route('auth.profile') }}"> Профиль </a>
        <a href="{{ route('auth.logout') }}"> Выйти </a></div>
</div>
</div>
    @else
    <div class="registr">
        <form method="post" action="{{ route ('auth.login.do') }}">
            логин:<input type="search" required name="nick"><br> 
            пароль:<input type="password" style="margin-top: 5px;" required name="password" placeholder="или почта, или телефон"><br>
            <input type="submit" value="Вход" style="float:right; margin-top: 5px; margin-left: 18px;"/>
        </form>
        <a href="{{ route('auth.register') }}" target="frame">Регистрация</a>
       </div>
    </div>
    @endauth

    <div style="background-color: rgb(192, 244, 254); margin-top: 2%;display: inline-flex;width: 100%;">
        <div class="razdel"><a href="{{ route('static_page', 'main') }}" target="frame">Главная</a></div>
        <div class="razdel"><a href="{{ route('shop.category.view', 'Catalog') }}" target="frame">Каталог</a></div>
        <div class="razdel"><a href="{{ route('static_page', 'Contact') }}" target="frame">Контакты</a></div>
        <div class="razdel"><a href="{{ route('shop.cart.view') }}" target="frame">Корзина</a></div>
    </div>

        <div style="background-color: rgb(192, 244, 254);  max-width: 12%; min-height: 1000px; display:inline-flex;float:left">
            <div>
                <br><div class="str"><a href="{{ route('shop.category.view', 1) }}" target="frame">Украшения из красного золота</a></div><br>
                <div class="str"><a href="{{ route('shop.category.view', 2) }}" target="frame">Украшения из белого золота</a></div><br>
                <div class="str"><a href="{{ route('shop.category.view', 3) }}" target="frame">Украшения из серебра</a></div><br>
            </div>
        </div>
        @yield('content')
</div>
<footer>
    <p style="color: white">Компания @Diamand. Все права защищены</p>
</footer>
</body>

<script>
    $(()=>{
        $('[data-ajax]').click(()=>{
            var el = $(event.target);
            var after = el.data('ajax-after')!= undefined ? el.data('ajax-after') : false;
            console.log(after);
            $.ajax(el.data('ajax'))
            .done((text)=>{
                $.notify(text, "success");
                if(after)
                    eval(after);
            })
            .fail((xmlHttpRequest)=>{
                $.notify(xmlHttpRequest.statusText + ' ' + xmlHttpRequest.status, "error");
            })
        })
    })
</script>
</html>