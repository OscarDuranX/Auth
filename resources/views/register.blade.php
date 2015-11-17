<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">

        <div class="col-sm-9">
            <div class="title">Register</div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{route('auth.postRegister')}}">
                {!! csrf_field() !!}
                <div class="form-grup" id="emailFormGroup">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control"  id="name" name="name" required maxlength="20" placeholder="El tenu nom aquí"
                           value="{{old('email')}}"
                            v-on:onblur="checkEmailExists"
                    />
                    <div v-show="exist"> Email ja existeix!</div>
                </div>
                <div class="form-grup">
                    <label for="username">Usuari</label>
                    <input type="text" class="form-control"  id="user" name="user" required maxlength="30" placeholder="El tenu nom d'usuari"
                           value="{{old('user')}}"/>
                </div>
                <div class="form-grup">
                    <label for="email">Correu</label>
                    <input type="email" class="form-control"  id="email" name="email" requiredç
                           placeholder="Correu"
                           value="{{old('email')}}"/>
                </div>
                <div class="form-grup">
                    <label for="password">Password</label>
                    <input type="password" class="form-control"  id="password" name="password" required maxlength="20"
                           placeholder="Contrasenya"
                    />
                </div>
                <div class="form-grup">
                    <label for="password_confirmation">Confirma Password</label>
                    <input type="Password" class="form-control"  id="confirmaPassword" name="confirmaPassword" required maxlength="20"
                           placeholder="Repeteig contrasenya"
                    />
                </div>


                <button type="submit" id="login" class="btn btn-primary">Register</button>
                <button id="reset" class="btn btn-primary">Reset</button>

            </form>
        </div>

    </div>
</div>
<script src="{{ asset('js/all.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
