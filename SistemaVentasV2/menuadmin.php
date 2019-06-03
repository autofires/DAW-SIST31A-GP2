<?php
@session_start();
if(isset($_REQUEST["cerrar"])){       
        @session_destroy();       
        header("Location:login.php");  
                    }  
?> 
<style type="text/css">
    @charset "utf-8"; 
    /* CSS Document */ 
    *{
        margin: 0;
        padding: 0;
    }
    ul.menu { 
        list-style-type: none; 
        margin: 0; 
        padding: 0; 
        overflow: hidden; 
        background-color: #333; 
    } 

    ul.menu li { 
        float: left; 
    } 

    ul.menu li a, .dropbtn { 
        display: inline-block; 
        color: white; 
        text-align: center; 
        padding: 14px 16px; 
        text-decoration: none; 
    } 

    ul.menu li a:hover, .dropdown:hover .dropbtn { 
        background-color: red; 
    } 

    ul.menu li.dropdown { 
        display: inline-block; 
    } 

    ul.menu .dropdown-content { 
        display: none; 
        position: absolute; 
        background-color: #f9f9f9; 
        min-width: 160px; 
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); 
        z-index: 1; 
    } 

    ul.menu .dropdown-content a { 
        color: black; 
        padding: 12px 16px; 
        text-decoration: none; 
        display: block; 
        text-align: left; 
    } 

    ul.menu .dropdown-content a:hover {background-color: #f1f1f1} 

    ul.menu .dropdown:hover .dropdown-content { 
        display: block; 
    } 
        /*Codigo proporcionado por Ing. Ricardo Quintanilla*/
</style>
<link rel="stylesheet" type="text/css" href="cssmenu.css"> 
<ul class=menu> 
  <li><a href="Index.php">INICIO</a></li>  
  <li class="dropdown"> 
    <a href="javascript:void(0)" class="dropbtn">MANTENIMIENTO VEHICULOS</a> 
    <div class="dropdown-content"> 
      <a href="?p=agregarautos.php">Agregar Vehiculos</a> 
      <a href="?p=aggfotos.php">Agrega Fotos a los Vehiculos</a> 
      <a href="?p=agregarmarcas.php">Agrega Marcas</a>      
    </div> 
  </li> 
  <li class="dropdown"><a href="javascript:void(0)">ADMINISTAR USUARIOS</a> 
      <div class="dropdown-content"> 
        <a href="?p=adminusuarios.php">Usuarios</a>         
      </div> 
  </li> 
  <li class="dropdown"> 
    <a href="#news">HERRAMIENTAS</a> 
  </li> 
  <li><?php
                    if (isset($_SESSION["usuario"])) {
                        echo "<a href='?cerrar=true'>CERRAR SESION</a>";
                    }
                ?></li> 
 </ul>