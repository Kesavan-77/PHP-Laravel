<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
$_SESSION["name"] = "kesavan";
$_SESSION["age"] = 21;
echo "Session variables are set.";

// session_unset();
// session_destroy();
?>

</body>
</html>