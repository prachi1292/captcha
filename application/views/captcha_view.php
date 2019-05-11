<?php echo validation_errors(); ?> 
<?php echo form_open('captcha'); 

?>
<p>
  <label for="name">Name:
    <input id="name" name="name" type="text" />
  </label>
</p>

<img src="http://localhost/captcha/image.php" id="myimg">
<a href="javascript:void(0)" id="refresh_image">Refresh</a>
<p>
  <label for="name">Captcha:
    <input id="captcha" name="captcha" type="text" />
  </label>
</p>

<?php echo form_submit("submit", "Submit"); ?> 
<?php echo form_close(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
	$("#refresh_image").click(function(){
   	$("#myimg").attr("src","http://localhost/captcha/image.php");
	})
</script>