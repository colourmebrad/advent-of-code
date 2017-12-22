<?

// http://adventofcode.com/2017/day/6

// input: http://adventofcode.com/2017/day/6/input

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
	
	$blockCount	= count($blocks);
	
	$configs	= array($raw);	// this first config is the one given in the file
	
	while (true)
	{
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
		
		$blocks[$largestIndex] = 0;
		
		$redIndex = $largestIndex;
		
		while ($redCount > 0)
		{
			$redIndex = $redIndex == $blockCount - 1 ? 0 : $redIndex + 1;

			$blocks[$redIndex]++;
			
			$redCount--;
		}
		
		$thisConfig = implode("	", $blocks);
		
		$foundIndex = array_search($thisConfig, $configs);
		
		if ($thisConfig == "2	4	1	2")
		{
			echo "foundIndex is $foundIndex<br />";
		}
		
		$configs[] = $thisConfig;

		if ($foundIndex !== false)
		{
			echo "loopCycles = " . count($configs) . " - $foundIndex<br />";
			$loopCycles = count($configs) - 1 - $foundIndex;
			break;
		}
	}
	
	echo "<pre>";
	print_r($configs);
	echo "</pre>";
	
	return $loopCycles;
}

function partOne($input)
{
	$raw	= getInputFile($input);
	
	$blocks	= parseFile($raw);
	
	$blockCount	= count($blocks);
	
	$configs	= array($raw);	// this first config is the one given in the file
	
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
		
		$blocks[$largestIndex] = 0;
		
		$redIndex = $largestIndex;
		
		while ($redCount > 0)
		{
			$redIndex = $redIndex == $blockCount - 1 ? 0 : $redIndex + 1;

			$blocks[$redIndex]++;
			
			$redCount--;
		}
		
		$thisConfig = implode("	", $blocks);
		
		if (in_array($thisConfig, $configs))
		{
			$configs[] = $thisConfig;	// just so I can see it in the print_r
			break;
		}
		
		$configs[] = $thisConfig;
	}
	
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