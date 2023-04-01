<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('env.app_name') }}</title>
</head>
<body>
  @if ($status == 'ok')
    <h1>Verifikasi Email Berhasil</h1>
    <p>{{ $message }}</p>
  @else
    <h1>Verifikasi Email Gagal</h1>
    <p>{{ $message }}</p>
  @endif
</body>
</html>