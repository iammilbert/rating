<?php 
session_start();
$_SESSION = array();
session_destroy();

?>
<?php include ('header2.php');?>

<script type="text/javascript">
	window.location="index.php";
</script>

<?php include ('footer.php');?>
