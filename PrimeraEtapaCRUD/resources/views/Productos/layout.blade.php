@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <title>Pagina de Productos</title>
</head>
<body style="margin: 0; padding:0;" class="container-fluid ">
    <div style="padding-top: 8vh ; background-color:#F7DE3A; border-bottom:solid 5px #DAA520;"   class="container-fluid text-center ">
        <h2  class=""><b>Productos</b></h2>
    </div>
    <div style="margin-top: 3%;" class="container">

    @yield('content')
    </div>
    
    <script>
        
    </script>
   
</body>
</html>