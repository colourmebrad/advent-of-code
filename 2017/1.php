<?

// http://adventofcode.com/2017/day/1

// input: http://adventofcode.com/2017/day/1/input

if ($_GET["part"] == 1)
{
	echo partTwo($_GET["i"], 1);
}
else
{
	$distance = strlen($_GET["i"]) / 2;
	echo partTwo($_GET["i"], $distance);
}

/*

123123

0 => 3
1 => 4
2 => 5
3 => 6/0
4 => 7/1
5 => 8/2

if ($i + $distance >= $len)
{
	$next = $i + distance - $len;
}

0 => 1
1 => 2
2 => 3
3 => 4
4 => 5
5 => 6/0

*/

function partTwo($input, $distance)
{
	$sum = 0;
	$len = strlen($input);
	
	for ($i = 0; $i < $len; $i++)
	{
		if ($i + $distance >= $len)
		{
			$next = $input[$i + $distance - $len];
		}
		else
		{
			$next = $input[$i + $distance];
		}
		
		if ($input[$i] == $next)
		{
			$sum += $input[$i];
		}
	}
	
	return $sum;
}

function partOne($input)
{
	$sum = 0;
	$len = strlen($input);
	
	for ($i = 0; $i < $len; $i++)
	{
		$next = $i == $len - 1 ? 0 : $i + 1;
		
		if ($input[$i] == $next)
		{
			$sum += $input[$i];
		}
	}
	
	return $sum;
}

?>