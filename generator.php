<?php
setlocale(LC_CTYPE, "UTF8", "en_US.utf8");

// Quick and dirty way to run on the command line for testing
// Example: php generator.php 'batch-id=submit_d6bsd1asidal120&card-text=test&card-color=white&icon=none'
//
if (!isset($_SERVER["HTTP_HOST"])) {
    parse_str($argv[1], $_GET);
    parse_str($argv[1], $_POST);
}

$card_color = 'white';
$fill = 'black';
$icon = '';
$mechanic = '';
if(isset($_POST['mechanic'])){
    $name = $_POST['mechanic'];
}else{
    $mechanic = '';
}
$card_text = explode("\n", $_POST['card-text']);
//$card_text = htmlentities(explode("\n", $_POST['card-text']), ENT_QUOTES, "UTF-8");
$card_count = count($card_text);
$batch = escapeshellcmd($_POST['batch-id']);
$cwd = getcwd();
$path = "$cwd/files/$batch";
$coord = '1718,3494';

// TODO: Generalize into input sanitization/fallback function
$img_file_prefix = isset($_POST['img-file-prefix']) ? escapeshellcmd(preg_replace('/[^\w\-]/', '', $_POST['img-file-prefix'])) : '';
if ($img_file_prefix == '') {
	$img_file_prefix = $batch;
}

if ($_POST['card-color'] == 'black') {
	$card_color = 'black';
	$fill = 'white';
}

switch ($_POST['icon']) {
	case "custom":
		$icon = 'custom-';
		break;
	case "reddit":
		$icon = 'reddit-';
		break;
	case "tj":
		$icon = 'tj-';
		break;
	case "starwars":
		$icon = 'starwars-';
		break;
	case "potter":
		$icon = 'potter-';
		break;
	case "tardis":
		$icon = 'tardis-';
		break;
	case "Disney":
		$icon = 'Disney-';
		break;
	case "n7":
		$icon = 'n7-';
		break;
	case "1923":
		$icon = '1923-';
		break;
	case "tabletop":
		$icon = 'tabletop-';
		break;
	case "pax":
		$icon = 'pax-';
		break;
	case "ferengi":
		$icon = 'ferengi-';
		break;
	case "homestuck":
		$icon = 'homestuck-';
		break;
	case "out-of-line":
		$icon = 'out-of-line-';
		break;
	case "reject":
		$icon = 'reject-';
		break;
	case "HOC":
		$icon = 'HOC-';
		break;
	case "snow":
		$icon = 'christmas-';
		break;
	case "hat":
		$icon = 'hat-';
		break;
	case "hanukkah":
		$icon = 'hanukkah-';
		break;
	case "seasons-greetings":
		$icon = 'seaons-greetings-';
		break;
	case "maple":
		$icon = 'canada-';
		break;
	case "au-emu":
		$icon = 'au-emu-';
		break;
	case "uk-bulldog":
		$icon = 'uk-bulldog-';
		break;
	case "jackwhite":
		$icon = 'jackwhite-';
		break;
	case "post-trump":
		$icon = 'post-trump-';
		break;
	case "roosterteeth":
		$icon = 'roosterteeth-';
		break;
	case "db2":
		$icon = 'db2-';
		break;
	case "devil":
		$icon = 'devil-';
		break;
	case "fascism":
		$icon = 'fascism-';
		break;
	case "apple":
		$icon = 'apple-';
		break;
	case "hidden":
		$icon = 'hidden-';
		break;
	case "absurd":
		$icon = 'absurd-';
		break;		
	case "ai":
		$icon = 'ai-';
		break;		
	case "human":
		$icon = 'human-';
		break;
	case "00-new":
		$icon = '00-new-';
		break;
	case "90-new":
		$icon = '90-new-';
		break;
	case "ass":
		$icon = 'ass-';
		break;
	case "clam":
		$icon = 'clam-';
		break;
	case "clam2":
		$icon = 'clam2-';
		break;
	case "climate-catastrophe":
		$icon = 'climate-catastrophe-';
		break;
	case "dad":
		$icon = 'dad-';
		break;
	case "everything-box":
		$icon = 'everything-box-';
		break;
	case "fantasy":
		$icon = 'fantasy-';
		break;
	case "few-extra":
		$icon = 'few-extra-';
		break;
	case "food":
		$icon = 'food-';
		break;
	case "geek":
		$icon = 'geek-';
		break;
	case "jewish":
		$icon = 'jewish-';
		break;
	case "metro":
		$icon = 'metro-';
		break;
	case "period":
		$icon = 'period-';
		break;
	case "picture-1":
		$icon = 'picture-1-';
		break;
	case "picture-2":
		$icon = 'picture-2-';
		break;
	case "picture-3":
		$icon = 'picture-3-';
		break;
	case "pride":
		$icon = 'pride-';
		break;
	case "retail-product":
		$icon = 'retail-product-';
		break;
	case "saves-america":
		$icon = 'saves-america-';
		break;
	case "scary":
		$icon = 'scary-';
		break;
	case "science":
		$icon = 'science-';
		break;
	case "scifi":
		$icon = 'scifi-';
		break;
	case "theatre":
		$icon = 'theatre-';
		break;
	case "weed":
		$icon = 'weed-';
		break;
	case "written-by-kids":
		$icon = 'written-by-kids-';
		break;
	case "www":
		$icon = 'www-';
		break;
	case "retail":
		$icon = 'retail-';
		break;
	case "box":
		$icon = 'box-';
		break;
	case "blackbox-press":
		$icon = 'blackbox-press-';
		break;
	case "blue-box":
		$icon = 'blue-box-';
		break;
	case "red-box":
		$icon = 'red-box-';
		break;
	case "green-box":
		$icon = 'green-box-';
		break;
	case "1":
		$icon = 'v1-';
		break;
	case "2":
		$icon = 'v2-';
		break;
	case "3":
		$icon = 'v3-';
		break;
	case "4":
		$icon = 'v4-';
		break;
	case "5":
		$icon = 'v5-';
		break;
	case "6":
		$icon = 'v6-';
		break;
}

if ($card_color == 'black') {
	switch ($_POST['mechanic']) {
		case "none":
			$mechanic = '';
			break;
		case "p2":
			$mechanic = '-mechanic-p2';
			break;
		case "d2p3":
			$mechanic = '-mechanic-d2p3';
			break;
		case "gear":
			$mechanic = '-mechanic-gears';
			break;
	}
}

// There are currently no White Cards with Mechanics - could change
if ($card_color == 'white') {
	$mechanic = '';
}

$card_front_path = $cwd .'/img/';
$card_front = "$card_color$mechanic.png";


if ($batch != '' && $card_count < 201) {
	mkdir($path, 0777, true);
	
	if ($icon == 'custom-' && getimagesize($_FILES["customIcon"]["tmp_name"]) && move_uploaded_file($_FILES["customIcon"]["tmp_name"], $path . '/custom_icon_raw')) {

	    // The White and Black cards aren't pixel perfect - the 'three card logo' in the bottom left corner is in a slightly different spot on each 
	    // Thus to get the custom icon to line up as best as possible, we need a slightly different set of coordinates
	    if ($card_color == 'black') {
		    $coord = '1722,3495';
	    }

	    exec('convert ' . $path . '/custom_icon_raw -resize 150x150\! ' . $path . '/custom_icon');
	    exec('convert ' . $card_front_path . $card_front . ' -units PixelsPerInch -density 1200 -draw "rotate 17 image over ' . $coord . ' 0,0 \'' . $path . '/custom_icon\'" ' . $path . '/' . $icon . $card_front);
	    $card_front_path = $path . '/';
	}

	$card_front = $icon . $card_front;

	foreach ($card_text as $i => $text) {
		// Create a padded index for the filename
		$padded_i = sprintf('%03d', $i);
		
		// Process special characters - uncomment if needed
		$text = str_replace('\\x{201C}', '"', $text); // Opening quote
		$text = str_replace('\\x{201D}', '"', $text); // Closing quote
		$text = str_replace('\\x{2019}', "'", $text); // Apostrophe
		$text = str_replace('\\n', "\n", $text);      // Newline
		
		// Log the text for debugging if needed
		file_put_contents($cwd . '/card_log.txt', $text . "\n", FILE_APPEND);
		
		// Create a temporary file with the card text
		$temp_text_file = $path . '/text_' . $padded_i . '.txt';
		file_put_contents($temp_text_file, $text);
		
		// Use ImageMagick to create the card with text from the file
		$cmd = 'convert ' . 
			   escapeshellarg($card_front_path . $card_front) . ' ' .
			   '-page +444+444 ' .
			   '-units PixelsPerInch ' .
			   '-background ' . escapeshellarg($card_color) . ' ' .
			   '-fill ' . escapeshellarg($fill) . ' ' .
			   '-font ' . escapeshellarg($cwd . '/fonts/HelveticaNeueBold.ttf') . ' ' .
			   '-pointsize 15 ' .
			   '-kerning -1 ' .
			   '-density 1200 ' .
			   '-size 2450x ' .
			   'caption:@' . escapeshellarg($temp_text_file) . ' ' .
			   '-flatten ' . 
			   escapeshellarg($path . '/temp.png');
		
		exec($cmd);
		
		// Move the temporary image to the final filename
		$mv_cmd = 'mv ' . 
				  escapeshellarg($path . '/temp.png') . ' ' . 
				  escapeshellarg($path . '/' . $img_file_prefix . '_' . $padded_i . '.png');
		
		exec($mv_cmd);
		
		// Clean up the temporary text file
		if (file_exists($temp_text_file)) {
			unlink($temp_text_file);
		}
	}

	// Create a zip file with all the generated cards
	exec("cd " . escapeshellarg($path) . "; zip " . escapeshellarg($batch . ".zip") . " *.png");
}

?>
