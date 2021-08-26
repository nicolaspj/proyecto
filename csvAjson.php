
<?php

$error = '';
/*$db_host="localhost";
$db_user="nicolas";
$db_password="123456";
$db_database="demo";
$conexion= mysqli_connect($db_host,$db_user,$db_password,$db_database);
if($conexion==false){
    die("Error de conexion");  */
     if(isset($_POST["upload_file"]))
       {
           if($_FILES['file']['name'])
            {
               $file_array = explode(".", $_FILES['file']['name']);

                $file_name = $file_array[0];

               $extension = end($file_array); 

              if($extension == 'csv')
                {
                     $column_name = array();

                     $final_data = array();

                     $file_data = file_get_contents($_FILES['file']['tmp_name']);

                     $data_array = array_map("str_getcsv", explode("\n", $file_data));

                     $labels = array_shift($data_array);

                     foreach($labels as $label)
                     {
                       $column_name[] = $label;
                     }

                     $count = count($data_array) - 1;

                    for($j = 0; $j < $count; $j++)
                        {
                          $data = array_combine($column_name, $data_array[$j]);

                          $final_data[$j] = $data;
                        }
                           //descarga de forma local
                          /*header('Content-disposition: attachment; filename='.$file_name.'.json');

                           header('Content-type: application/json');
    

                          */
                         
                                                
                    $resJson= json_encode($final_data,JSON_PRETTY_PRINT);
                    //echo $resJson.fi;
                    echo file_put_contents('archivo.txt',$resJson);
                    /*res json guardarlo como file_get_context()*/ 
                    $query = "INSERT INTO usuarios
                    ()
                      VALUES('$std_id', '$std_name', '$std_age', '$std_gender', '$std_no', '$std_street', '$std_city', '$std_country', '$std_postal', '$std_dept', '$std_sem', '$std_major')";
                   echo $query; die;
                   
                   if(!mysqli_query($query,$connect)) { 
                    die('Error : Query Not Executed. Please Fix the Issue! ' . mysql_error());
                   } else{ 
                    echo "Data Inserted Successully!!!";
                   } 
                }
                else
                  {
                    $error = 'Ingrese solamente <b>.csv</b> ';
                  }
            }
         else
             {
            $error = 'Ingrese solamente archivo CSV ';
             }
       }//if isset
      
//}
?>

<!DOCTYPE html>
<html>
  	<head>
    	<title>Convert CSV to JSON using PHP</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="http://code.jquery.com/jquery.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	</head>
  	<body>
  		<div class="container">
  			<br />
  			<br />
    		<h1 align="center">Convert CSV to JSON using PHP</h1>
    		<br />
    		<div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Select CSV File</h3>
          </div>
          <div class="panel-body">
            <?php
            if($error != '')
            {
              echo '<div class="alert alert-danger">'.$error.'</div>';
            }
            ?>
            <form method="post" enctype="multipart/form-data">
              <div class="col-md-6" align="right">Select File</div>
              <div class="col-md-6">
                <input type="file" name="file" />
              </div>
              <br /><br /><br />
              <div class="col-md-12" align="center">
                <input type="submit" name="upload_file" class="btn btn-primary" value="Upload" />
              </div>
            </form>
          </div>
        </div>
    	</div>
    	
  	</body>
</html>


