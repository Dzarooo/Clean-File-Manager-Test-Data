<!DOCTYPE html>
<html lang="PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            margin:0 10px 0 10px;
            padding:0;
            font-family: 'Montserrat', sans-serif;
        }

        p, h1, h2, h3, h4, h5 {
            padding:0;
            margin:0;
        }

        header {
            width:100%;
            height:50px;
            border-bottom:solid 1px grey;
            display:flex;
            gap:10px;
            align-items:center;
            font-size:19px;
        }

        header button {
            appearance:none;
            -moz-appearance:none;
            -webkit-appearance:none;
            position:relative;
            font-family: 'Montserrat', sans-serif;
            font-size:19px;
            padding:0;
            margin:0;
            background-color:transparent;
            border:none;
            outline:none;
            text-decoration: underline;
        }

        header button:hover {
            cursor:pointer;
        }

        header button::before {
            position:absolute;
            content: '';
            width:0%;
            height:1.5px;
            top:calc(100% - 3.5px);
            left:50%;
            background-color:rgb(171, 6, 209);
            transition:width 0.2s ease-out, left 0.2s ease-out;
        }

        header button:hover::before {
            position:absolute;
            content: '';
            width:100%;
            height:1.5px;
            top:calc(100% - 3.5px);
            left:0%;
        }

        section.forms {
            width:100%;
            display:flex;
            gap:100px;
            justify-content:center;
            margin-bottom:100px;
        }

        section.forms h2 {
            margin:20px;
        }

        section.forms input[type="text"], section input[type="number"] {
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
            outline:none;
            border: none;
            border-bottom:solid 1px black;
        }

        section.dump {
            width:100%;
            display:flex;
            gap:100px;
            justify-content:center;
            flex-wrap:wrap;
        }

        section.dump div.instancesContainer  {
            display:flex;
            gap:10px;
        }

        section.dump .instance {
            padding:20px;
            border:solid 1px grey;
            border-radius:10px;
        }

    </style>
    <title>test laravel</title>
</head>
<body>
    <header>
        @auth
            <p>Welcome, {{ Auth::user()->name }}!</p>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <p>Not logged.</p>
            <form action="{{ route('forceLogin') }}" method="POST">
                @csrf
                <button type="submit">Force login</button>
            </form>
        @endauth
    </header>
    @yield('content')
</body>
</html>