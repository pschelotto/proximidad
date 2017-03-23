<?php
class Proximidad{

	static public function slugify($text)
	{
		$text = limpiar_caracteres_especiales($text);
		
		// replace all non letters or digits by -
		$text = preg_replace('/\W+/', '-', $text);

		// trim and lowercase
		$text = strtolower(trim($text, '-'));

		return $text;
	}

	static public function limpiar_caracteres_especiales($s) {
		$s = ereg_replace("[áàâãª]","a",$s);
		$s = ereg_replace("[ÁÀÂÃ]","A",$s);
		$s = ereg_replace("[éèê]","e",$s);
		$s = ereg_replace("[ÉÈÊ]","E",$s);
		$s = ereg_replace("[íìî]","i",$s);
		$s = ereg_replace("[ÍÌÎ]","I",$s);
		$s = ereg_replace("[óòôõº]","o",$s);
		$s = ereg_replace("[ÓÒÔÕ]","O",$s);
		$s = ereg_replace("[úùû]","u",$s);
		$s = ereg_replace("[ÚÙÛ]","U",$s);
		$s = str_replace(" ","-",$s);
		$s = str_replace("ñ","n",$s);
		$s = str_replace("Ñ","N",$s);

		return $s;
	}

	static function formatPrecio($num)
	{
		return str_replace('.',',',$num)." €";
	}
}