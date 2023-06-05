@extends('layout')

@section('title')
    Профиль пользователя
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
</script>

<body>
    <div style="font-family: Cursive; width: 88%;">
        <h1 style="text-align: center; font-size: 40px; color: red;">Профиль пользователя</h1>
        <div style="margin-left: 40px; font-size: 20px;">
            <form action="{{ route ('auth.profile.update') }}" method="post" onsubmit="return check()" enctype="multipart/form-data">
            <table style="width: 730px">
            <tr>
                <th colspan="2">
                    <div class="card">
                        <div class="card-profile-img">
                        <label class="label">
                            <span>Сменить изображение</span>
                            <img src="{{ auth()->guard()->user()->pic }}" id="output" width="300px"/>
                            <input type="file" id="file" name="pic" onchange="loadFile(event)">
                        </label>
                </th>
            </tr>
            <tr style="height: 60px;"><th width="30%">Ваше имя:</th>
                <th><input type="search" style="width: 400px;"required name="name" value="{{ auth()->guard()->user()->name }}"><br></th></tr>
            <tr style="height: 60px;"><th width="30%">Ваша фамилия:</th>
                <th><input type="search" style="width: 400px;" required name="surname" value="{{ auth()->guard()->user()->surname }}"><br></th></tr>
            <tr style="height: 60px;"><th width="30%">Ваш никнейм:</th>
                 <th><input type="search" readonly style="width: 400px;" required name="nick" value="{{ auth()->guard()->user()->nick }}"><br></th></tr>
            <tr style="height: 60px;"><th width="30%">Ваш город:</th>
               <th><input type="search" style="width: 400px;" required list="cities" value="{{ auth()->guard()->user()->city }}" name="city">
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
                <th><input type="email" readonly style="width: 400px;" autocomplete="on" required name="email" value="{{ auth()->guard()->user()->email }}"><br></th></tr>
            <tr style="height: 60px;"><th>Номер телефона:</th>
                <th><input class="mask-phone" readonly type="text" style="width: 400px;" required name="number" value="{{ auth()->guard()->user()->number }}"><br></th></tr>
                <tr style="height: 60px;"><th>Старый пароль:</th>
                    <th><input type="password" id="pass" style="width: 400px;" required name="passs"><br></th></tr>
                <tr style="height: 60px;"><th>Новый пароль:</th>
                    <th><input type="password" id="pass1" style="width: 400px;" name="pass"><br></th></tr>
                <tr style="height: 60px;"><th>Подтвердите новый пароль:</th>
                    <th><input type="password" id="pass2" style="width: 400px;" name="pass2"><br></th></tr>
                <tr><th colspan="2"><button class="button" type = "submit" onclick="return checkpass();">Сохранить</button> </th></tr>
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

</div>
</div>

<script>
    var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};
</script>

</body>
@endsection