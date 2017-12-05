<?

// http://adventofcode.com/2017/day/4

// input: http://adventofcode.com/2017/day/4/input

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
	echo "0";
}

function partOne($input)
{
	$raw		= getInputFile($input);
	$data		= parseSpaceDelimintedInput($raw);
	
	echo "<pre>";
	//print_r($data);
	echo "</pre>";
	
	$numValid	= 0;
	foreach ($data as $pass)
	{
		if (count(array_unique($pass)) == count($pass))
		{
			$numValid++;
		}
	}
	
	echo $numValid;
}

function getInputFile($name)
{
	return file_get_contents($name);
}

function parseSpaceDelimintedInput($input)
{
	$rows = explode("\n", $input);
	
	$data = array();
	
	foreach ($rows as $row)
	{
		$data[] = explode(" ", $row);
	}
	
	return $data;
}

?>