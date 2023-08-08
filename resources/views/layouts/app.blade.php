<!DOCTYPE html>
<html>
<head>
    <title>Título de la página</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body class="font-sans antialiased">
     <div class="min-h-screen bg-gray-100 dark:bg-gray-900">      
     @include('layouts.header')

     
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
    