<!DOCTYPE html>
<html>
<head>
    <title>Test Code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<h1> </h1>   
<div class="container">
    @yield('konten')
</div>
   
</body>
</html>