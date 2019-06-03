<?php
    include 'vehiculos.php';
    $ver=new vehiculos();
    
    if (isset($_POST['ok'])) {
        $nums=$_POST['auto'];
        $duic=$_SESSION['usuario']['dui'];
        $now = $_POST['Reservacion'];
        $fechaexp = date("Y-m-d",strtotime($now."+ 5 days"));

        echo $ver->reservar($nums,$duic,$now,$fechaexp);
    }


    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema De Venta Y Reservacion de Autos</title>
    <meta name="viewport" content="initial-scale=1">
    <style type="text/css">
            body {
                background-image: url("img/34.jpg");
                background-size: 100vw 100vh;
                background-attachment: fixed;
                margin: 0;
            }
            .formulario {
                width: 450px;
                margin: auto;
                background: rgba(0, 0, 0, 0.7);
                padding: 10px 20px;
                box-sizing: border-box border-box;
                /* margin-top: 20px; */
                
                border-radius: 10px;
                box-shadow: 3px 4px 5px 0px rgba(93, 162, 183, 0.75);
                /* centrado verticalmente */
                  font-family: monospace;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                -webkit-transform: translate(-50%, -50%);
            }
            label {
                color: cornflowerblue;
                font-family: monospace;
                font-weight: bold;
                text-shadow: 0px 0px 1px #132C4D;
                color: #0080ff;
                font-size: 14px;
            }
            h2 {
                color: cornflowerblue;
                text-align: center;
                margin: 0;
                font-size: 30px;
                margin-bottom: 20px;
                text-shadow: 4px 4px 2px rgba(128, 116, 114, 0.5);
                ;
            }
            input,
            textarea {
                width: 100%;
                margin-bottom: 20px;
                box-sizing: border-box;
                font-size: 17px;
                color: cornflowerblue;
                border: solid 1px;
                border-color: cornflowerblue;
                border-radius: 5px;
                background: rgba(0, 0, 0, 0.5);
                box-shadow: 3px 4px 5px 0px rgba(93, 162, 183, 0.75);
            }

            select{
                width: 100%;
                margin-bottom: 20px;
                box-sizing: border-box;
                font-size: 17px;
                color: cornflowerblue;
                border: solid 1px;
                border-color: cornflowerblue;
                border-radius: 5px;
                background: rgba(0, 0, 0, 0.5);
                box-shadow: 3px 4px 5px 0px rgba(93, 162, 183, 0.75);
            }

            input:focus, input:hover textarea:focus,textarea:hover select:focus, select:hover{
                background: rgba(0, 0, 0, 0.8);
                border-color: dodgerblue;
                border: solid 2px;
                ;
            }
            input {
                min-height: 40px;
            }
            textarea {
                min-height: 100%;
                max-height: 250px;
                max-width: 100%;
            }
            #boton {
                background: #31384A;
                background: rgba(0, 0, 0, 0.7);
                border-radius: 20px;
                color: dodgerblue;
                padding: 20px;
            }
            #boton:hover {
                cursor: pointer;
            }
            @media (max-width: 480px) {
                form {
                    width: 100%;
                }
            }
            /*  Clases para colocar imagenes como iconos en los campos */
            .email {
                background-position: left center;
                padding-left: 20px;
                background-image: url("../img/email.png");
                background-repeat: no-repeat;
            }
            .email:hover,
            .email:focus {
                background-position: left center;
                padding-left: 20px;
                background-image: url("../img/email.png");
                background-repeat: no-repeat;
            }
            .user {
                background-position: left center;
                background-size: 16px 16px;
                padding-left: 20px;
                background-image: url("../img/user.png");
                background-repeat: no-repeat;
            }
            .user:hover,
            .user:focus {
                background-position: left center;
                background-size: 16px 16px;
                padding-left: 20px;
                background-image: url("../img/user.png");
                background-repeat: no-repeat;
            }
            .pass {
                background-position: left center;
                background-size: 16px 16px;
                padding-left: 20px;
                background-image: url("../img/key.png");
                background-repeat: no-repeat;
            }
            .pass:hover,
            .pass:focus {
                background-position: left center;
                background-size: 16px 16px;
                padding-left: 20px;
                background-image: url("../img/key.png");
                background-repeat: no-repeat;
            }
            .firm {
                background-position: left center;
                background-size: 18px 18px;
                padding-left: 22px;
                background-image: url("../img/firm.png");
                background-repeat: no-repeat;
            }
            .firm:hover,
            .firm:focus {
                background-position: left center;
                background-size: 18px 18px;
                padding-left: 22px;
                background-image: url("../img/firm.png");
                background-repeat: no-repeat;
            }
            /* Fin del estilo de los iconos de los campos del formulario */
            /* Estilo a las barras de desplazamientos */
            /* Navegador Chrome, firefox y  IE no existe la personalizacion */
            ::-webkit-scrollbar {
                width: 7px;
                height: 7px;
            }
            ::-webkit-scrollbar-button {
                width: 7px;
                height: 7px;
            }
            ::-webkit-scrollbar-thumb {
                background: #224e79;
                border: 1px solid #70defe;
                border-radius: 50px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #61bddc;
            }
            ::-webkit-scrollbar-thumb:active {
                background: #1474ad;
            }
            ::-webkit-scrollbar-track {
                background: #36647c;
                border: 1px solid #7aa7cb;
                border-radius: 50px;
            }
            ::-webkit-scrollbar-track:hover {
                background: #2b597b;
            }
            ::-webkit-scrollbar-track:active {
                background: #013747;
            }
            ::-webkit-scrollbar-corner {
                background: transparent;
            }
    </style>
</head>
<body>
    <form class="formulario" method="post">
    <h2>Reservar Auto</h2>
    <label for="auto">Seleccione el Auto que desea reservar:</label><br>  <br> <br>  
    <select name="auto">
		  <?php
            echo $ver->mostrarserie();
          ?>

	</select>
    <label for="fechaR">Fecha de Reservacion:</label> <br><br> <br> 
    <input type="date" name="Reservacion" class="user"   title="Seleccione la fecha de inicio de reservacion" required=""/>
    
    <input type="submit" name="ok" value="Reservar" id="boton" />
    </form>

    <div>
        Detalles de reservacion:
        <table>
            <tr></th><th>Dia Reservacion</th><th>Reservado por:</th><th>Fecha de Expiracion</th><th>Accion</th></tr>   
            <?php



            ?>

        </table>
    </div>
</body>
</html>