<h1 class="nombre-pagina">Crear cuenta</h1>
<p class="descripcionpagina">Llena el siguiente formulario para crear una cuenta</p>

<?php 

include_once __DIR__ . "/../templates/alertas.php";?>

<form class=" formulario" method="POST" action="/crear-cuenta">

<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Tú  nombre" value="<?php echo s($usuario->nombre) ?>" >
</div>
<div class="campo">
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido" placeholder="Tú  apellido" value="<?php echo s($usuario->apellido) ?>">
</div>
<div class="campo">
    <label for="telefono">Teléfono</label>
    <input type="tel" id="telefono" name="telefono" placeholder="Tú  telefono" value="<?php echo s($usuario->telefono) ?>" >
</div>
<div class="campo">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" placeholder="Tú  E-mail" value="<?php echo s($usuario->email) ?>" >
</div>
<div class="campo">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Tú Password">
</div>

<input type="submit" value="Crear cuenta" class="boton" >
</form>


<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/olvide">Olvidaste tu pasword</a>

</div>