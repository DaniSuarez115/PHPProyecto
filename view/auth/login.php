<?php require 'view/header.php'; ?>

<div class="container">
    <h1>Iniciar sesión</h1>
    <form action="<?php echo constant('URL'); ?>usuarios/login" method="POST">
    <div class="form-group">
        <label for="user">Usuario</label>
        <input type="text" class="form-control" id="user" name="user" placeholder="Ingrese su usuario">
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
    </div>
    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
</form>
</div>

<?php require 'view/footer.php'; ?>