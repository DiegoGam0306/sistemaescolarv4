<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

$user = DB::table('usuarios')
->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
->where('nombreusuario', $_POST['usuario'])->first();

$mensaje = '';
if ($user->password == $_POST['password']) {
    $mensaje = "<h1> Bienvenido {$user->nombreperfil} {$user->nombreusuario} </h1>
    <br><a href='inicio.php?0{$user->idusuario}'>Entrar al Sistema escolar </a>";
} else {
    $mensaje = "<h1>Usario y/o contraseña erroneo, intente otra vez</h1>
    <br><a href='index.html'>Regresar</a>";
}

echo $mensaje;