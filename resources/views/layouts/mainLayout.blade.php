<?php
  if(!isset($_SESSION)){session_start();}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>Gestion des approvisionnements en médicaments </title>
    <link href="{{ asset('public/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('public/css/style.css') }}" type="text/css" rel="stylesheet"/>
    <script src="{{ asset('public/js/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>




</head>
<body>

    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Gestion des approvisionnements des medicaments</h4>

            <ul class="nav nav-tabs" id="navId">
                <li class="nav-item">
                    <a href="<?php echo url("/");?>" class="nav-link active">Acceuil</a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo url("/newDrugRefill");?>" class="nav-link">Enregistrer un provisionnement</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo url("/listDrugRefill");?>" class="nav-link">Lister les approvisionnements</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Nav tabs -->

    <main class="py-4">
        @yield('content')
    </main>

</body>
</html>
