<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Home</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('layout.navbar')

    <div class="container my-3">
        @foreach($peoples as $people)
        {{ $people->name }}
        @endforeach
    </div>

    @include('layout.footer')

</body>
</html>