<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <title> Login </title>
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>
  </head>
  <body>
    <div class="container m-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-5">
                <h3>Login</h3>
                <form method="POST" action="/auth">
                @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Masukkan Email</label>
                        <input type="email" class="form-control" id="" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Masukkan Password</label>
                        <input type="password" class="form-control" id="" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
            <a href="register" class="mt-2">belom puny akun ?</a>
        </div>
    </div>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>