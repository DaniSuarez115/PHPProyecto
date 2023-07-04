<?php
    require 'view/header.php';
    
    // Verificar si el usuario está autenticado
    if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
        require 'view/menu.php';
?>
<div class="container-fluid" id="contendorprincipal">
    
    <h1>Main</h1>
    <a href="<?php echo constant('URL'); ?>usuarios/logout" class="btn btn-primary">Cerrar sesión</a>
</div>
<?php
    } else {
        
        require 'view/auth/login.php';  
    }
    
    require 'view/footer.php';
?>  







