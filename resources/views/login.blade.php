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
            <div class="content">
                <div class="title">Login</div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('login_error'))
                    <div class="alert alert-danger">
                        <ul>
                           {{ Session::get('login_error') }}
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{route('auth.postLogin')}}" class="form-inline">
                    {!! csrf_field() !!}
                    <div class="form-grup">
                        <label>Usuari</label>
                        <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email" required placeholder="Correu"/>
                    </div>
                    <div class="form-grup">
                        <label>Password</label>
                        <input type="password" class="form-control"  id="password" name="password" required placeholder="Password"/>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember">Remember me</label>
                    </div>

                    <button type="submit" id="login" class="btn btn-default">Login</button>
                    <button type="reset" class="btn btn-default">Reset</button>

                </form>
                <a id="Register" href="{{route('auth.register')}}">Registrat</a>
            </div>
        </div>
    </body>
</html>
