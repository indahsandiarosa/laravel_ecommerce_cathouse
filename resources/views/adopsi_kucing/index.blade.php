<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopsi Kucing</title>
</head>
<body>
    <h1>Adopsi Kucing</h1>
    <ul>
        @foreach ($kucing as $k)
            <li>{{ $k->nama }} - {{ $k->deskripsi }}</li>
        @endforeach
    </ul>
</body>
</html>