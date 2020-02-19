<script src="js/pushbar.js"></script>

<script>
    var pushbar = new Pushbar
    ({
        blur: true,
        overlay: true
    })
</script>
<script src="js/jquery-3.3.1.min.js"></script>
</script>

<script src="js/bootstrap.min.js"></script>

<script src="js/sweetalert.min.js"></script>
<script src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<?php

if(isset($_SESSION["idusuarios"])){?>
    <script src="js/direcciones.js"></script>
	
<?php }else{?>
	<script src="js/direccionesEmpresa.js"></script>
<?php 
}?>
?>
</body>
</html>