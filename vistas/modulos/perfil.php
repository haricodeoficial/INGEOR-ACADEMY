<!--VALIDAR SESIÓN-->
<?php
if(!isset($_SESSION["validarSesion"])){
echo'<script>
window.location ="'.$url.'";

</script>';
exit();
}
?>

<section id="perfil">
<div class="banner-perfil">
    
</div>
</section>