<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Kontak Form</title>
</head>
<body>
<p>
  Anda mendapat sebuah pesan dari kontak form.
</p>
<p>
  Detail informasi:
</p>
<ul>
  <li>Nama: <strong>{{ $nama }}</strong></li>
  <li>Email: <strong>{{ $email }}</strong></li>
  <li>Pesan: </li>
</ul>
<hr>
<p>
  @foreach ($messageLines as $messageLine)
     {{ $messageLine }}<br>
  @endforeach
</p>
<hr>
</body>
</html>