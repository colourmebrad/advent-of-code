<?

// http://adventofcode.com/2017/day/2

// input: http://adventofcode.com/2017/day/2/input

if ($_GET["part"] == 1)
{
	echo partOne($_GET["i"]);
}
else
{
	echo partTwo($_GET["i"]);
}

function partTwo($input)
{
	$sum = 0;
	
	return $sum;
}

function partOne($input)
{
	$sum = 0;
	
	$raw	= getInputFile($input);
	$data	= parseTabbedDelimintedInput($raw);
	
	foreach ($data as $row)
	{
		$sum += max($row) - min($row);
	}
	
	return $sum;
}

function getInputFile($name)
{
	return file_get_contents($name);
}

function parseTabbedDelimintedInput($input)
{
	$rows = explode("\n", $input);
	
	$data = array();
	
	foreach ($rows as $row)
	{
		$data[] = explode("	", $row);
	}
	
	return $data;
}

?>