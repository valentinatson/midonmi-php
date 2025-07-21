<?php
/* session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit(); */

session_start();
session_unset();
session_destroy();

echo "<script>
    alert('Déconnexion réussie.');
    window.location.href = 'index.php';
</script>";

?>