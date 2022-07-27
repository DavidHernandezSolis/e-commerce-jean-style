<?php 
session_destroy();

$ruta =new Ruta();
$url = $ruta->controlRuta();
echo '
	<script type="text/javascript">
	   window.location = "'.$url.'";
	</script>
';	