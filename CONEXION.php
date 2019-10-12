<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
<?php
    
    $host = "localhost" ;
    $nombredb = "el_ninio_mensajero";
    $usuario = "root" ;
    $pass = "";
    
    
    $conexion = mysqli_connect($host,$usuario,$pass,$nombredb);
    if(mysqli_connect_errno()){
        //SI NO SE COENCTA A LA BASE DE DATOS CON EL SERVIDOR
        echo "FALLO DE CONEXION CON LA BASE DE DATOS";
        //SALIR DEL CODIGO PHP
        
        exit();
    }
    //prueba
            $mysqli = new MySQLi("localhost", "root","", "academ");
        if ($mysqli -> connect_errno) {
            die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
                . ") " . $mysqli -> mysqli_connect_error());
        }
        else
    //FIN

    mysqli_select_db($conexion,$nombredb) or die ("NO SE ENCUENTRA LA BASE DE DATOS");//RECONOCE ERRORE EN CASO DE QUE EL NOMBRE DE LA BASE DE DATOS NO SEA CORRECTO
    
    mysqli_set_charset($conexion,"utf8");//incluye caracteres latinos
    $consulta = "Select * from administrador" ;
    $resultados = mysqli_query($conexion, $consulta);
    //USAS NUMERO DE CAMPO PARA USAR
     
     while(($fila=mysqli_fetch_row($resultados))== true){
    //$fila = mysqli_fetch_row($resultados);//CADA QUE LA LLAMAS SOLO DEVUELVE E LPRIMER ELEMENTO DEL RESULTADO  LOS VALORES NUMERICOS
    echo $fila[1] ;
    echo $fila[2] ;
    echo $fila[3] ;
    echo $fila[0] ;
    echo $fila[4] ;
    echo $fila[5] . "<br>";    
    }
    
    //USAS EL NOMBRE DE LOS PARAMETRO PARA USAR
    while(($fila=mysqli_fetch_array($resultados,MYSQL_ASSOC))== true){
    
    echo $fila['ID_ADMINISTRADOR'];
    echo $fila['NOMBRE_USUARIO_ADMIN'];
    echo $fila['CONTRASENIA_ADMIN'] . "<br>";   
    }
    
    mysqli_close($conexion);//CERRAR LA CONEXION 
    //PARA IMPORTAR SE REQUIERE OPEN DOCUMENT 
    //%PELIGRO es para buscar dentro de la base de datos
    // select * from productos where nombre_articulo like balones
    // select * from productos where nombre_articulo like ceni_ero
?>

</body>
</html>