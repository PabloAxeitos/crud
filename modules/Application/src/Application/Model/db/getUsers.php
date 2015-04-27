<?php


$config = readConfig("../configs/application.config.php");

function getUsers($config)
{
    //conectar a la BD
    $link = mysqli_connect($config['host'], 
                    		$config['user'], 
                    		$config['password']
    						);
    
    if ($link->connect_errno)
    {
    	echo "Error al conectar a MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
    }
    
  
    //seleccionar BD
	mysqli_select_db($link, $config['database']);
    
    //realizar la consulta
    $query = "SELECT * FROM user";
    

    
    //enviar la consulta (atento a ese if de test)
    $result = (mysqli_query($link, $query));
    

    //recorrer el recordset
    while($row = mysqli_fetch_assoc($result))
    {
        $users[] = $row;
    }
    
//     echo "<pre> Resultado de consulta:" . "\n";
//     print_r($users);
//     echo "</pre>";
    
    //cierra la conexion Si o no?
    mysqli_close($link);
    
    return $users;
    
    
    
}

