<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>MySQl en PHP</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-success text-white text-center m-1" >
                    <div class="card-header">Total Vendidos </div>
                        <div class="card-body">
                            <h5 class="h1 card-title"><span id="idVendidos">35</span></h5>
                            <p class="card-text">baja en las ventas vs ventas del mes anterior  </p>
                        </div>
                    </div>
                </div>
            <div class="col md 4">
                <div class="bg-warning text-white text-center m-1" >
                    <div class="card-header">Total en Almacen</div>
                        <div class="card-body">
                            <h5 class="h1 card-title"><span id="idAlmacen">35</span></h5>
                            <p class="card-text">inventario mayor vs el  mes pasado </p>
                        </div>
                    </div>
                </div>
            <div class="col md 4">
            <div class="bg-info text-white text-center m-1">
                <div class="card-header">Total Ingresos </div>
                    <div class="card-body">
                        <h5 class="h1 card-title"><span id="idIngresos">35</span></h5>
                        <p class="card-text">disminucion de ingresos vs mes anterior </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row my 3">
            <div class="col md 12 text-center">
                <h2>Reporte en ventas  </h2>
                <canvas id="idGrafica" class="grafica"></canvas>
            </div>

        </div>
        <div class="row my 3">
            <div class="col md 12 text-center">
                <div id="idContabla">

                </div>
            </div>

        </div>

    </div>



    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/index.js"></script>
</body>
</html>