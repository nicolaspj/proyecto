<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>Importar Puntos</title>
</head> 
<body>
    <div class="container mt-3">
        <div class="row">
             <div class="col-12">
                   <form method="POST" encype="multipart/form-data">
                      <Input type="file" class="btn btn-primary" name="archivo"></Input>
                      <button type="submit" class="btn btn-primary" name="subir">Subir</button>
                   </form>
             </div>
        </div>

    </div>


   <?php 
   
   
        $db_host="localhost";
        $db_user="nicolas";
        $db_password="123456";
        $db_database="demo";
        $conexion= mysqli_connect($db_host,$db_user,$db_password,$db_database);
        
        if($conexion==false){
            die("Error de conexion");
        }

    ?>  
        <script>
        
        </script>
       
       <div>
             <div class="alert alert-<?php echo $resul?"primary" : "danger" ?> alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>  
                <?php echo $resul ?"Archivo subido con exito" : "Error al subir el Archivo"; 
                ?>
              </div>
        </div>      
   
           
</body>
</html> 