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
	
	$raw	= getInputFile($input);
	$data	= parseTabbedDelimintedInput($raw);
	
	foreach ($data as $row)
	{
		for ($i = 0; $i < count($row); $i++)
		{
			for ($j = 0; $j < count($row); $j++)
			{
				if ($i == $j) continue;
				
				$val = $row[$i] / $row[$j];
				
				if (isWholeNumber($val))
				{
					$sum += $val;
					echo $row[$i] . " / " . $row[$j] . " = " . $row[$i] / $row[$j] . "<br />";
				}
			}
		}
	}
	
	return $sum;
}

// holy cow, I hate both PHP and myself right now.
function isWholeNumber($num)
{
	return fmod($num, 1) == 0;
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