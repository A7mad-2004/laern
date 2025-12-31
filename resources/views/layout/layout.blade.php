<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-light">
    <a class="navbar-brand" > </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="" class="nav-link"> home</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link"> top books</a>
            </li>

        </ul>
    </div>
</nav>

@yield('title')
@yield('main')
<footer>
    Ahmad Qosa
</footer>

</body>
</html>
