<!DOCTYPE html>

<html lang="es">

<head>
    <title>Diplomas</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>

<body>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
</nav>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-8">
            <form action="#" method="post" id="exportardiploma" enctype="multipart/form-data">
                <h1>Creación de Diplomas Automatizados</h1>
                <h3>Por Favor suba el archivo siguiendo el molde establecido.</h3>
                <div class=" form-group">
                    <input type="file" class=" form-control" id="diploma" name="diploma" lang="es">
                </div>
                <button type="submit" style="margin-top: 15px" class="btn btn-primary">Subir Archivo</button>

                <p>
                    <br>
                    <a href="molde/moldediploma.xlsx" download="moldediploma">
                       Si no tienes el molde, Descarga el Molde para los diplomas dando click aqui!
                    </a></p>

            </form>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="ajax/diploma.js"></script>

</body>
</html>