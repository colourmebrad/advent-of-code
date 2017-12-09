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
	$raw	= getInputFile($input);
	$blocks	= parseFile($raw);
	
	return 0;
}

function partOne($input)
{
	$raw	= getInputFile($input);
	$blocks	= parseFile($raw);
	
	$blockCount	= count($blocks);
	
	$configs	= array($input);	// this first config is the one given in the file
	
	$cycles		= 0;
	
	while (true)
	{
		$cycles++;

		$largest = -1;
		$largestIndex = -1;
		for ($i = 0; $i < $blockCount; $i++)
		{
			if ($blocks[$i] > $largest)
			{
				$largest = $blocks[$i];
				$largestIndex = $i;
			}
		}
		
		$redCount = $largest;
		
		while ($redCount > 0)
		{
			// do the redistribution here
		}
		
		$thisConfig = implode("	", $blocks);
		
		if (array_contains($thisConfig, $configs))
		{
			//found something we've seen before
			return $cycles;
		}
		
		// check if we've seen it before and return
		
		// else add implode() to configs
	}
	
	echo "<pre>";
	print_r($blocks);
	echo "</pre>";
	
	echo "<pre>";
	print_r($configs);
	echo "</pre>";
	
	return $cycles;
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