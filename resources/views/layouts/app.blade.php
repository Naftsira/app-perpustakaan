<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Perpustakaan Digital Kampus')</title>
    <style>
        * { box-sizing: border-box; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box; }
        .error { color: #b91c1c; font-size: 14px; margin-top: 4px; }
        body { font-family: sans-serif; margin: 0; color: #1f2937; }
        nav { background: #000000; border-bottom: 7px solid #FFCC00; padding: 20px 40px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; }
        nav .brand { color: #FFCC00; font-weight: bold; font-size: 18px; }
        nav img{width:4padding; height: 4rem; border: 2px #FFCC00 dashed; border-radius:50%; padding:7px; object-fit:contain;}
        nav ul { list-style: none; display: flex; gap: 20px; margin: 0; padding: 0; }
        nav ul li a { color: #cbd5e1; text-decoration: none; padding: 6px 4px; }
        nav ul li a.active { color: #FFCC00; font-weight: bold; border-bottom: 2px solid #FFCC00; }
        main { max-width: 900px; margin: 0 auto; padding: 30px 40px; }
        th {background: #000000; color:#FFCC00; text-align:center;}
        table { border-collapse: collapse; width: 100%; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 10px 12px;}
        .alert-success { background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 4px; margin-bottom: 16px; }
        .btn { display: inline-block; font-weight:bold; padding: 10px 14px; background: #FFCC00; color: #000000; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; margin-top:10px; }
        form.inline { display: inline; }
        footer { text-align: center; padding: 20px; color: #6b7280; font-size: 14px; border-top: 1px solid #e5e7eb; margin-top: 40px; }
    </style>
</head>
<body>
    @include('partials.navbar')

    <main>
        @include('partials.alert')

        @yield('content')
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </main>

    <footer>
        &copy; {{ date('Y') }} Sistem Perpustakaan Digital Kampus PENS
    </footer>
</body>
</html>
