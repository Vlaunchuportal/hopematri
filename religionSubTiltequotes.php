<?php
function religion_based($religion){
switch ($religion) {
	case '52': // Buddhist
		$message = 'Namastey';
		break;
	case '46': //Christian
		$message = 'Hello';
		break;
	case '37': //Hindu
		$message = 'Namastey';
		$message1 = '"Marriage is like an unconditional duties one decide to perform"';
		$message2 = '(Bhagwat Gita)';
		break;
	case '48': //Jain - Digambar
		$message = 'Hello';
		break;
	case '49': //Jain - Shwetambar
		$message = 'Hello';
		break;
	case '53': //Jewish
		$message = 'Hello';
		break;
	case '45': //Muslim - Others
		$message = 'Assalamu Alaikum';
		$message1 = '"Your spouses are a garment for you are them" <br>(Quran,2:187)';
		break;
	case '43': //Muslim - Shia
		$message = 'Assalamu Alaikum';
		break;
	case '44': //Muslim - Sunni
		$message = 'Assalamu Alaikum';
		break;
	case '51': //Parsi
		$message = 'Hello';
		break;
	case '47': //Sikh
		$message = 'Hello';
		break;
	default: 
		$message = 'Hello';
}
return array($message, $message1);
}
?>