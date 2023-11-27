<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link href="/styles/main.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>@yield('title') :: Объявления</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('post.index') }}"
                           class="nav-item nav-link">Главная
                        </a>
                    </li>
                    @auth('web')
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                               class="nav-item nav-link">Мои объявления({{ auth('web')->user()->posts()->count() }})
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('favorite') }}"
                               class="nav-item nav-link">Избранное({{ auth('web')->user()->favorites()->count() }})
                            </a>
                        </li>
                    @endauth
                    @guest('web')
                        <li class="nav-item">
                            <a href="{{ route('register') }}"
                               class="nav-item nav-link">Регистрация
                            </a>
                        </li>
                    @endguest
                </ul>
                @auth('web')
                    <p>Пользователь: {{ auth('web')->user()->name }}</p>
                    <form class="d-flex" role="search" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger" type="submit">Выйти</button>
                    </form>
                @endauth
                @guest('web')
                    <a class="btn btn-outline-success p-10" href="{{ route('login') }}">Вход</a>
                @endguest

            </div>
        </div>
    </nav>
</div>

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
