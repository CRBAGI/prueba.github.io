<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Modificar.css">
    <title>Modificar Datos</title>
</head>
<body>

    <h1 class="Titulo">MODIFICAR CLIENTE</h1>
     <div class="container">
        <?php
        //Primer if de la ventada donde pide id
                    if (!$_POST){    
                ?>
            <form  action="<?=$_SERVER['PHP_SELF'];?>" method="post">
               <label> ID CLIENTE: </label>
               <input type="text" name="ID">
                <input type="submit" value="Buscar">
        
            </form>
    </div>
    
    <div class="container">
       <?php
                }  //aqui termine el if y empieza el ifelse de la primera ventana
                //donde hace la consultay es la 2da ventana 
                elseif(isset($_POST['ID'])){

                   

                include("conexion.php");
                $cn=conectarse();
                $idc= $_POST["ID"];
                // Realizar la consulta
                    $sql = "SELECT * FROM clientes WHERE idcli = $idc";
                    $resultado = $cn->query($sql);

                    // Verificar si hay resultados
                    if ($resultado->num_rows > 0) {
                    // Iterar sobre los resultados y guardarlos en un arreglo
                    $clientes = array();
                    while($fila = $resultado->fetch_assoc()) {
                        $clientes[] = $fila;
                    }
                    ?>



             <div class="card container">
                
           
            <form  method="post" action="<?=$_SERVER['PHP_SELF'];?>"  onsubmit="return confirmarEnvio()">

                <?php
                    
                    
                     // Mostrar los resultados
                     //Css
                     
                    foreach($clientes as $cliente) {
                        echo "ID CLIENTE: <input type='text' name='idcli' id='id' value="."'$cliente[idcli]'> ";
                        echo "NOMBRE: <input type='text' name='nombre' id='nombre' value="."'$cliente[nombre]'>";
                        echo "APELLIDOS: <input type='text' id='apellidos' name='apellidos' value="."'$cliente[apellidos]'>";
                        echo "CORREO: <input type='text' id='correo' name='correo' value="."'$cliente[email]'>";
                        echo "TELEFONO: <input type='text' id='telefono' name='telefono' value="."'$cliente[tel]'>";

                    }
                    
                    /*
                    // Sin CSS
                    foreach($clientes as $cliente) {
                        echo "ID CLIENTE: <input type='text' name='idcli' id='id' value="."'$cliente[idcli]'> <br>";
                        echo "NOMBRE: <input type='text' name='nombre' id='nombre' value="."'$cliente[nombre]'><br>";
                        echo "APELLIDOS: <input type='text' id='apellidos' name='apellidos' value="."'$cliente[apellidos]'><br>";
                        echo "CORREO: <input type='text' id='correo' name='correo' value="."'$cliente[email]'><br>";
                        echo "TELEFONO: <input type='text' id='telefono' name='telefono' value="."'$cliente[tel]'><br>";

                    }
                    */


                    ?>

                <div> 
                        <input type='submit' value='modificar'>
                        <input type='reset' value='cancelar' onclick=window.location.href="Modificar.php">
               </div>    
              </div>  
              </div>  
                         
                        <!-- <button onclick='goBack()'>Volver</button-->


                 
            </form>
            <script>
                            function confirmarEnvio() {
                                // Obtener los valores de los campos del formulario
                                var id = document.getElementById("id").value;
                                var nombre = document.getElementById("nombre").value;
                                var apellido = document.getElementById("apellidos").value;
                                var email = document.getElementById("correo").value;
                                var telefono = document.getElementById("telefono").value;
                                
                                // Mostrar los datos en la ventana de confirmación
                                if (confirm("¿Estás seguro de que deseas enviar los siguientes datos?\n\nId: " + id + "\nNombre: " + nombre + "\nApellidos: " + apellido + "\nEmail: " + email + "\nTelefono: " + telefono )) {
                                    return true; // Si el usuario presiona "Aceptar", se envía el formulario
                                } else {
                                    return false; // Si el usuario presiona "Cancelar", no se envía el formulario
                                }
                                }
                      
                        </script> 
           
            <?php
                    }
                    else {
                        echo "<div class='form'>";
                        echo "<label>No se encontraron resultados.</label>";
                        echo "<br>";
                        echo "<input type='reset' value='cancelar' onclick=window.location.href='Modificar.php'>";
                        echo "</div>";
                        }



            ?>



            <?php
            //Corchete de if else
                }
                else{
                    include("conexion.php");
                    $cn=conectarse();
                    $idcliente= $_POST["idcli"];
                    //echo $idcliente;
                    $nombre= $_POST["nombre"];
                    $apellido= $_POST["apellidos"];
                    $correo= $_POST["correo"];
                    $telefono= $_POST["telefono"];
                    $sql1 = "UPDATE clientes SET nombre = '$nombre', apellidos = '$apellido', email = '$correo', tel = '$telefono' WHERE idcli = $idcliente;
                    ";
                    $actualizar = $cn->query($sql1);
                    echo "<div class='final'>";
                     echo "<label>Datos actualizados</label>";
                     echo "<br>";
                    echo "<button onclick=window.location.href='Modificar.php'>Modificar a otro</button>";
                    echo  "</div>";
                }
            ?>
            



</body>
</html>