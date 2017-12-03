<?

// http://adventofcode.com/2017/day/3

// input: http://adventofcode.com/2017/day/3/input

if ($_GET["part"] == 1)
{
	echo partOne($_GET["size"], $_GET["value"]);
}
else if ($_GET["part"] == 2)
{
	echo partTwo($_GET["size"], $_GET["value"]);
}
else
{
	echo sqrt($_GET["size"]);
}

function partTwo($input)
{
	return 0;
}

function partOne($size, $value)
{
	$grid = buildMemoryGrid($size);
	
	// get the dimensions
	$dim = sqrt($size);
	$middleIndex = floor($dim / 2);
	
	$one	= array($middleIndex, $middleIndex);
	
	echo "<pre>";
	print_r($one);
	echo "</pre>";
	
	$coords	= getCoords($grid, $value);
	
	echo "<pre>";
	print_r($coords);
	echo "</pre>";
	
	// get distance
	
	$distance = abs($one[0] - $coords[0]) + abs($one[1] - $coords[1]);

	return $distance;
}

function getCoords($grid, $value)
{
	$size = count($grid);

	for ($i = 0; $i < $size; $i++)
	{
		for ($j = 0; $j < $size; $j++)
		{
			if ($grid[$i][$j] == $value)
			{
				return array($i, $j);
			}
		}
	}
	
	return null;
}

// I don't feel like trying to be clever, I'll just build it to start
// this falls to fucking pieces if it doesn't $size doesn't have a sqrt() if an odd number. not sorry
function buildMemoryGrid($size)
{
	$grid = array();
	
	echo "size: $size<br />";
	
	// get the dimensions
	$dim = sqrt($size);
	
	echo "dimensions: {$dim}x$dim<br />";
	
	// build the grid with placeholder values, I guess?
	for ($i = 0; $i < $dim; $i++)
	{
		$grid[] = array();
		for ($j = 0; $j < $dim; $j++)
		{
			$grid[$i][] = "*";
		}
	}
	
	$middleIndex = floor($dim / 2);
	
	echo "1 is at [$middleIndex][$middleIndex]<br />";
	
	$grid[$middleIndex][$middleIndex] = 1;
	
	$currentVal = 2;
	$currentRow = $middleIndex;
	$currentCol = $middleIndex+1;
	
	$dir		= "right";
	
	// This gets the job done ¯\_(ツ)_/¯
	while (true)
	{
		$grid[$currentRow][$currentCol] = $currentVal;
		$currentVal++;

		if ($dir == "right")
		{
			if ($grid[$currentRow-1][$currentCol] == "*")
			{
				$dir = "up";
				$currentRow--;
			}
			else
			{
				$currentCol++;
			}
		}
		else if ($dir == "up")
		{
			if ($grid[$currentRow][$currentCol-1] == "*")
			{
				$dir = "left";
				$currentCol--;
			}
			else
			{
				$currentRow--;
			}
		}
		else if ($dir == "left")
		{
			if ($grid[$currentRow+1][$currentCol] == "*")
			{
				$dir = "down";
				$currentRow++;
			}
			else
			{
				$currentCol--;
			}
		}
		else if ($dir == "down")
		{
			if ($grid[$currentRow][$currentCol+1] == "*")
			{
				$dir = "right";
				$currentCol++;
			}
			else
			{
				$currentRow++;
			}
		}
		
		if ($currentVal > $size)
		{
			break;
		}
	}
	
	debugRenderGrid($grid);
	
	return $grid;
}

function debugRenderGrid($grid)
{
	echo "<pre>";
	foreach ($grid as $row)
	{
		foreach ($row as $col)
		{
			echo "$col	";
		}
		echo "\n";
	}
	echo "</pre>";
}

?>