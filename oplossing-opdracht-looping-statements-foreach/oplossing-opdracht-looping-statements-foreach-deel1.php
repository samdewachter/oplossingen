<?php

	$text = file_get_contents('./text-file.txt');
	$textChars = str_split($text);
	rsort($textChars);
	$reversedTextChars = array_reverse($textChars);
	
	$aantalVerschillendeKarakters = array();

	//begrijp ik niet goed ==> vragen aan prof!!
	foreach ($reversedTextChars as $value) {

		if ( isset ( $aantalVerschillendeKarakters[ $value ] ) ) 
		{
			++$aantalVerschillendeKarakters[ $value ];
		}
		else
		{
			$aantalVerschillendeKarakters[ $value ] = 1;
		}
	}


	/*foreach($characterSortedReversed as $value)
		{
			if ( isset ( $tellerArray[ $value ] ) )
			{
				++$tellerArray[ $value ];
			}
			else
			{
				$tellerArray[ $value ] = 1;
			}
			
		}*/
	var_dump($aantalVerschillendeKarakters);
?>

<!DOCTYPE html>

<html>


</html>