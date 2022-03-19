<?php if (count($errors)> 0): ?> 
<div class="error">
	<?php foreach ($errors as $error): ?> 
		<p><?php echo $error; ?></p>
	<?php endforeach ?>
</div>
<?php endif ?>

<style type="text/css">
	.error{
		background-color: #fedede;
		border : 3px solid #a94442;
		border-radius: 2px;
		color: #a94442
	}
</style>