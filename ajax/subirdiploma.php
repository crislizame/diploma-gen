<?php
if ($_FILES['diploma']["error"] > 0)
{
   // echo "Error: " . $_FILES['diploma']['error'] . "<br>";
    echo 0;
}
else
{
  /*  echo "Nombre: " . $_FILES['diploma']['name'] . "<br>";
    echo "Tipo: " . $_FILES['diploma']['type'] . "<br>";
    echo "Tamaño: " . ($_FILES["diploma"]["size"] / 1024) . " kB<br>";
    echo "Carpeta temporal: " . $_FILES['diploma']['tmp_name'];*/

  /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
    move_uploaded_file($_FILES['diploma']['tmp_name'],"../upload/" . $_FILES['diploma']['name']);
echo $_FILES['diploma']['name'];
    }
