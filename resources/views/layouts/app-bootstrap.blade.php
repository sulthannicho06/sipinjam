<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('judul', 'Aplikasi Alat')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container d-flex flex-wrap gap-3">
            <a class="navbar-brand" href="{{ route('alat.index') }}">
                Sistem Peminjaman Alat
            </a>

            @auth
                <div class="d-flex align-items-center gap-3">
                    <span class="text-white">
                        Halo, {{ auth()->user()->name }}
                    </span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                                class="btn btn-outline-light btn-sm">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <main class="container mb-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                @yield('konten')
            </div>
        </div>
    </main>
</body>
</html>