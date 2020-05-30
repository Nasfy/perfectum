<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="application/views/comentator.css">

	<title>Comentator</title>

</head>
<body>
<script type="text/javascript">
	function validateEmail(){
		let form = document.querySelector(".form");
		let validateBtn = form.querySelector(".btn-submit");
		let email = form.querySelector(".email");

		let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

		if (reg.test(email) == false) {
		  event.preventDefault()
		  email.className = "err";
	  }

	}
  </script>
	<form name="comment" method="post" action="" class="form" >
		<h2>Введите Ваш комментарий:</h2>
		<p>
			<input type="text" class="name" name="name" placeholder="ФИО/никнейм" />
			<input type="text" class="email" name="email" onBlur="validateEmail()" placeholder="емайл" required />
		</p>
		<p>
			<textarea name="text_comment" cols="60" rows="10" placeholder="текст комментария" required ></textarea>
		</p>
		<p>
			<input type="submit"  class="btn-submit" value="Отправить" />
		</p>
	</form>
	<hr>

	<?php
		if(!empty($_POST)) {
	    	header("Refresh:0");
	    }
	?>

	<?php
		if ($comment) {
			foreach ($comment as $key => $value) { ?>
				<h3> <?php echo $value->name; ?> </h3>
				<p class="date"> <?php echo $value->date; ?> </p>
				<p class="comment"> <?php echo $value->text; ?> </p>
				<hr>
	<?php }} ?>

	<div class="pagination">
		<?php echo $links; ?>
	</div>
</body>
</html>
