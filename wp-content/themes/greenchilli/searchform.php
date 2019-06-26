<form method="get" id="searchform" class="search-form" action="<?php echo home_url(); ?>" _lpchecked="1">
	<fieldset>
		<input type="text" name="s" id="s" value="" placeholder="Поиск" onfocus="if(this.value=='Поиск')this.value='';" x-webkit-speech onwebkitspeechchange="transcribe(this.value)"> 
	</fieldset>
	<input class="submit" type="submit" />
</form>