<?

// http://adventofcode.com/2017/day/5

// input: http://adventofcode.com/2017/day/5/input

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
	$data		= parseFile($raw);
	
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	
	return 0;
}

function partOne($input)
{
	$raw			= getInputFile($input);
	$instructions	= parseFile($raw);
	
	$index		= 0;
	$steps		= 1;
	while (true)
	{
		$nextIndex = $index + $instructions[$index];
		
		if ($nextIndex >= count($instructions))
		{
			return $steps;
		}
		
		if ($nextIndex < 0)
		{
			echo "index of $nextIndex?";
			break;
		}
		
		$instructions[$index]++;
		
		$index = $nextIndex;
		
		$steps++;
	}
	
	return 0;
}
	
function getInputFile($name)
{
	return file_get_contents($name);
}

function parseFile($input)
{
	return explode("\n", $input);
}

?>