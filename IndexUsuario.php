<?php
	require('config/config.php');
	require('config/db.php');
?>

<?php include('inc/header.php'); ?>


	     <?php

        $sql=("SELECT * FROM carta_recivida");
        $query=mysqli_query($conn,$sql);

        echo "<table border='1'; class='table table-dark';>";
          echo "<tr class='warning'>";
            echo "<td>ID</td>";
            echo "<td>Carta</td>";
            echo "<td>Fecha</td>";
            echo "<td>Imagen</td>";
            echo "<td>Leido</td>";
          echo "</tr>";

        ?>

                <?php

                 while($arreglo=mysqli_fetch_array($query)){
            echo "<tr class='success'>";
              echo "<td>$arreglo[0]</td>";
              echo "<td>$arreglo[2]</td>";
              echo "<td>$arreglo[8]</td>";
              echo "<td>$arreglo[9]</td>";
              echo "<td>$arreglo[5]</td>";
              //echo "<td>$arreglo[5]</td>";
          echo "</tr>";
        }
          ?>