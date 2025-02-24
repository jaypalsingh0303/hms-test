<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container pt-5">
    @include("includes.flash-message")

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-body">
                <h5 class="text-center mb-4">Doctor Dashboard</h5>
                <p>Hi.. {{auth()->guard("admin")->user()->name}},</p>
                <p>Email: {{auth()->guard("admin")->user()->email}}</p>

                <p>Doctors: {{$doctor}}</p>
                <p>Patients: {{$patient}}</p>
                <p>Users: {{$user}}</p>

                <a href="{{route("auth.admin.logout")}}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
