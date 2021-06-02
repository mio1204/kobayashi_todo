<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <style>
    body {
      font-size: 16px;
      margin: 5px;
      background-color: darkblue;
    }

    .content {
      margin: 10px;
      display: flex;
      justify-content: center;
    }

    .container {
      margin: 50px;
    }

    .container_inner {
      padding: 30px;
      margin: 0 auto;
      width: 50vw;
      background-color: white;
      border-radius: 15px;
    }

    .form {
      display: flex;
      justify-content: center;
    }

    h2 {
      margin: 0 20px;
    }
  </style>
</head>

<body>
  <div class="container">@yield('container')
    <div class="container_inner">
      <h2>Todo List</h2>
      <div class="form">
        @yield('form')
      </div>

      <div class="content">
        @yield('content')
      </div>
    </div>
  </div>
</body>

</html>