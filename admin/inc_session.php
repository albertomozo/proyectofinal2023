<?php
session_start();
if (!isset($_SESSION['usuario'])){
    header("location:caducada.php");
    exit;
}
$usuario='';
if (isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
}
$rol='';
if (isset($_SESSION['rol'])){
    $rol = $_SESSION['rol'];
} 
$usuarioid = '';
if (isset($_SESSION['usuarioid'])){
    $usuarioid = $_SESSION['usuarioid'];
}