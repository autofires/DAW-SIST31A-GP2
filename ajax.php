<?php
require_once("cn.php");
$pelicula  = $_GET["pelicula"];
$respuesta = "<div>Consulta de categorias</div>   <form method='post'>    <table  class='blue-form' width='750'><tr class=boton13 >     <td>&nbsp;</td>     <td colspan=3>Ultima Pelicula Agregada</td>     <td>&nbsp;</td>  </tr>";
$sql       = "select  * from peliculas where titulo like '$pelicula%' order by idpelicula ";
$rs        = $conn->query($sql);

while ($fila = $rs->fetch_assoc()) {
    $respuesta .= "<tr>";
    $respuesta .= "<td width='1%'>";
    $respuesta .= "<input type=checkbox name=eliminar[] value='$fila[idpelicula]' title='$fila[idpelicula]'>";
    $respuesta .= "<td width='5%' valign=top >";
    $respuesta .= "<img src='img/camara.png' width='200'>";
    $respuesta .= "<td colspan=2 >";
    $respuesta .= "  <div class='film-info'>  <ul class='f-info'>                   <li>    <span class='f-info-title'>Título:</span>    <span class='f-info-text'>¡$fila[titulo]!</span>   </li>   <li>    <span class='f-info-title'>Título original:</span>    <span class='f-info-text'>$fila[titulo_original]!</span>   </li>                <li>    <span class='f-info-title'>Año:</span>    <span class='f-info-text'>$fila[yearp]</span>           </li>   <li>    <span class='f-info-title'>Géneros:</span>    <span class='f-info-text'>    <a href='#'>Dessarrollar </a>, <a href='#'> Falta</a>, <a href='#'>Comedia</a>    </span>           </li>   </ul>      <ul class='f-info'>           <li>    <span class='f-info-title'>Duración:</span> 
   <span class='f-info-text'>$fila[duracion] min.</span>           </li>     </ul>  <ul class='f-info'>   <li>    <span class='f-info-title'>Director:</span>    <span class='f-info-text'>$fila[director]</span>           </li>   <li>    <span class='f-info-title'>Escritores:</span>    <span class='f-info-text'>$fila[escritores]</span>           </li>  </ul>   </li>  </ul>  </div>";
    $respuesta .= "<td width='5%' rowspan=2>";
    $respuesta .= "<a href='?pag=updatecategoria.php&idcat=$fila[idpelicula]'>";
    $respuesta .= "<img src='img/editar.png' width=40 title='Modificar pelicula'></a>";
    
    //agregar imagenes   
    $respuesta .= "<a href='?pag=addimagen.php&idpelicula=$fila[idpelicula]'>";
    $respuesta .= "<img src='img/addimagen.png' width=40 title='Agregar imagen'></a>";
    $respuesta .= "<tr><td colspan=4>Sinopsis: <br>$fila[sinopsis]</td>";
}
$respuesta .= "  <tr>     <td colspan='6' align='center'>        <button type='submit' name='guardar'>Eliminar registros</button>                      </td>                   </tr>     </table>      </form> </div>  ";
echo $respuesta;
?> 