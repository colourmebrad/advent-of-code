<?

// http://adventofcode.com/2017/day/7

// input: http://adventofcode.com/2017/day/7/input

if ($_GET["part"] == 1)
{
	echo partOne($_GET["input"]);
}
else if ($_GET["part"] == 2)
{
	echo partTwo($_GET["input"]);
}

function partTwo($input)
{
	$raw	= getInputFile($input);
	$data	= parseFile($raw);
	
	return 0;
}

function partOne($input)
{
	$raw	= getInputFile($input);
	$data	= parseFile($raw);
	
	return 0;
}
	
function getInputFile($name)
{
	return file_get_contents($name);
}

function parseFile($input)
{
	return explode("	", $input);
}

?>