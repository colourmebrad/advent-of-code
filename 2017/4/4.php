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
	$raw		= getInputFile($input);
	$data		= parseSpaceDelimintedInput($raw);
	
	echo "<pre>";
	//print_r($data);
	echo "</pre>";
	
	$numValid	= 0;
	foreach ($data as $pass)
	{
		if (partTwoValidPassphrase($pass))
		{
			$numValid++;
		}
	}
	
	echo $numValid;
}

function partTwoValidPassphrase($pass)
{
	if (count(array_unique($pass)) != count($pass))
	{
		return false;
	}
	
	echo "<pre>";
	//print_r($pass);
	echo "</pre>";
	
	for ($i = 0; $i < count($pass); $i++)
	{
		$asArray = str_split($pass[$i]);
		sort($asArray);
		$pass[$i] = implode("", $asArray);
	}
	
	echo "<pre>";
	//print_r($pass);
	echo "</pre>";
	
	for ($i = 0; $i < count($pass)-1; $i++)
	{
		for ($j = $i+1; $j < count($pass); $j++)
		{
			if ($pass[$i] == $pass[$j])
			{
				return true;
			}
		}
	}
	
	return false;
}

function isAnagram($a, $b)
{
    return count_chars($a, 1) == count_chars($b, 1);
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