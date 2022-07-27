<?php 
session_destroy();

$url = Ruta::controlRuta();
echo '
	<script type="text/javascript">
	   window.location = "'.$url.'/login";
	</script>
';	