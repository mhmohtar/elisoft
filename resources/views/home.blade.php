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

    <title> Home </title>
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>
  </head>
  <body>
    <div class="container m-5">
        <h3>Welcome  <strong>{{ auth()->user()->name }} </strong> </h3>
        <div class="row">
            <div class="col-lg-12">
                <a href="create" class="btn btn-primary mb-2">Add Data</a>
                <div class="card p-5">
                    <h3>Profile</h3>
                    <table class="table">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Pengaturan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $row)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>
                                    <a href="edit/{{$row->id}}" class="btn btn-primary">edit</a>
                                    <a href="delete/{{$row->id}}" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>


