<form action="<?php echo base_url($this->lang_code."/idcard/check_id"); ?>" method="get">
<?php echo lang("ID_Card"); ?> : <input name="idcard" type="text" value="<?php echo $idcard; ?>">
<input type="submit" value="Check">
</form>
<?php
if(isset($result["code"]))
{
	echo "<hr>";
	if($result["code"]=="success")
	{
		echo $result["id"]."<br>".$result["name"];
	}
	else
	{
		echo $result["msg"];
	}
}
?>