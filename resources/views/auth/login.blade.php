<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Медкарта | Авторизация</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/font/iconsmind/style.css" />
    <link rel="stylesheet" href="/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="/css/main.css" />
</head>

<body class="background show-spinner">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">

                            <p class=" text-white h2">Авторизация</p>

                            <p class="white mb-0">
                                Пожалуйста, для идентификации медкарты введите свои паспортные данные.
                            </p>
                        </div>
                        <div class="form-side">
                            @if($errors->any())
                                <div class="mb-5">
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger rounded" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <h6 class="mb-4">Паспортные данные</h6>
                            <form method="POST" action="/login">
                                {{ csrf_field() }}
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" name="serial"
                                    @if(old('serial'))
                                        value="{{ old('serial') }}"
                                    @endif
                                    />
                                    <span>Серия</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" name="number" required
                                    @if(old('number'))
                                        value="{{ old('number') }}"
                                    @endif
                                    />
                                    <span>Номер</span>
                                </label>
                                <div class="d-flex justify-content-end align-items-center">
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">Войти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/js/dore.script.js"></script>
    <script src="/js/scripts.js"></script>
</body>

</html>