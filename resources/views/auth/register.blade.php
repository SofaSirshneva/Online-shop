@extends('layout')

@section('title')
    Регистрация
@endsection

@section('content')
<script>
        function checkpass() {  
            var pw1 = document.getElementById("pass1");  
            var pw2 = document.getElementById("pass2");  
            if(pw1.value != pw2.value)  
            {   
                alert("пароли не совпадают");  
              //  e.preventDefault();
                return false;
            } else {   
                return true;
            }  
}  
    function check(){
        if($('#ch').is(':checked')){
            alert("Форма отправлена")
            return true;
        }
        else{
            alert("Вы не согласились с политикой")
            return false;
        }
    }
</script>

<body>
    <div style="font-family: Cursive; width: 88%;">
        <h1 style="text-align: center; font-size: 40px; color: red;">Регистрация</h1>
        <div style="margin-left: 30px; font-size: 20px;">
            <form action="{{ route ('auth.register.do') }}" method="post" onsubmit="return check()" enotype="multipart/form-data">
            <table style="width: 730px">
            <tr style="height: 60px;"><th width="30%">Ваше имя:</th>
                <th><input type="search" style="width: 400px;"required name="name" value="{{ @old('name') }}"><br></th></tr>
            <tr style="height: 60px;"><th width="30%">Ваша фамилия:</th>
                <th><input type="search" style="width: 400px;" required name="surname" value="{{ @old('surname') }}"><br></th></tr>
            <tr style="height: 60px;"><th width="30%">Ваш никнейм:</th>
                 <th><input type="search" style="width: 400px;" required name="nick"><br></th></tr>
            <tr style="height: 60px;"><th width="30%">Ваш город:</th>
               <th><input type="search" style="width: 400px;" required list="cities" value="{{ @old('city') }}" name="city">
                <datalist id="cities">
                    <option value="Москва"/>
                    <option value="Владивосток"/>
                    <option value="Санкт-Петербург"/>
                    <option value="Ярославль"/>
                    <option value="Псков"/>
                    <option value="БЕЛГОРОД"/>
                    <option value="Казань"/>
                    <option value="Челябинск"/>
                </datalist>
               </th>
            <tr style="height: 60px;"><th>Email:</th>
                <th><input type="email" style="width: 400px;" autocomplete="on" required name="email"><br></th></tr>
            <tr style="height: 60px;"><th>Номер телефона:</th>
                <th><input class="mask-phone" type="text" style="width: 400px;" required name="number"><br></th></tr>
                <tr style="height: 60px;"><th>Пароль:</th>
                    <th><input type="password" id="pass1" style="width: 400px;" required name="pass" value="{{ @old('pass') }}"><br></th></tr>
                <tr style="height: 60px;"><th>Подтвердите пароль:</th>
                    <th><input type="password" id="pass2" style="width: 400px;" required name="pass2"><br></th></tr>
            <tr><th colspan="2">
                    <label style="font-size: 12px">
                        <input type="checkbox" checked="checked" name="rass">
                        Получать рассылку о наших предложениях на почту<br>
                        <input type="checkbox" id="ch">
                        Я соглашаюсь с политикой конфиденциальности
                    </label>
                </th></tr>
                    <th colspan="2"><button class="button" type = "submit" onclick="return checkpass();">Отправить</button> </th></tr>
            </form>
            </table>
        </div>
        <div style="color:red">
        @if ($errors->any())
                        <div class="alert alert-danger">
                             <ul>
                        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
</div>
    </div>
<script>
    $.mask.definitions['h'] = "[0|1|3|4|5|6|7|9]"
    $(".mask-phone").mask("+7 (h99) 999-99-99")
</script>

</body>
@endsection