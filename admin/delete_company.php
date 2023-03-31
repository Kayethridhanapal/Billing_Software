<?php
include "../user/connection.php";
include "add_new_company.php";
$id=$_GET["id"];
mysqli_query($link,"delete from company_name where id=$id") or die(mysqli_error($link));
?>
<script type="text/javascript">
    window.location="add_new_company.php";
</script>