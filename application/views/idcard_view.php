<form action="<?php echo base_url($this->lang_code."/idcard"); ?>" method="get">
<?php echo lang("ID_Card"); ?> : <input name="idcard" type="text" value="<?php echo $idcard; ?>">
<input type="submit" value="Check">
</form>
<?php
if(isset($result))
{
	echo "<hr>";
	if($result)
	{
		echo "Correct ID card.";
	}
	else
	{
		echo "Error ID card.";
	}
}
?>