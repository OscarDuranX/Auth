<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
    <div class="row">

        <div class="col-sm-9 text-left">
            <div class="title text-left">Register</div>

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
                {!! csrf_field() !!}}
                <div class="form-grup">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control"  id="name" name="name" required maxlength="20" placeholder="El tenu nom aquí"
                           value="{{old('email')}}"/>
                </div>
                <div class="form-grup">
                    <label for="username">Usuari</label>
                    <input type="text" class="form-control"  id="user" name="user" required maxlength="30" placeholder="El tenu nom aquí"
                           value="{{old('username')}}/>
                </div>
                <div class="form-grup">
                    <label for="email">Correu</label>
                    <input type="email" class="form-control"  id="email" name="email" required
                           value="{{old('email')}}/>
                </div>
                <div class="form-grup">
                    <label for="password">Password</label>
                    <input type="password" class="form-control"  id="password" name="password" required maxlength="20"/>
                </div>
                <div class="form-grup">
                    <label for="password_confirmation">Confirma Password</label>
                    <input type="Password" class="form-control"  id="confirmaPassword" name="confirmaPassword" required maxlength="20"/>
                </div>


                <button type="submit" id="login" class="btn btn-default">Register</button>

            </form>
        </div>

    </div>
</div>
</body>
</html>
