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
	$rows	= parseFile($raw);
	
	dump($rows);
	
	$defs	= array();
	
	foreach ($rows as $row)
	{
		$defs[] = parseRow($row);
	}
	
	usort($defs, "compareByWeights");
	
	dump($defs);
	
	return 0;
}

function compareByWeights($a, $b)
{
	if ($a->weight == $b->weight)
	{
		return 0;
	}
	
	return ($a->weight < $b->weight) ? -1 : 1;
}

class ProgramDef
{
	public $name;
	public $weight;
	public $children = array();
}

function parseRow($row)
{
	$def = new ProgramDef();
	
	$parts = explode("->", $row);
	
	list($name, $weight) = explode(" ", $parts[0]);
	
	$def->name = trim($name);
	$def->weight = (int)substr($weight, 1, -1);
	
	$kids	= count($parts) > 1 ? explode(",", $parts[1]) : array();
	for ($i = 0; $i < count($kids); $i++)
	{
		$kids[$i] = trim($kids[$i]);
	}
	
	$def->children = $kids;
	
	return $def;
}

function varDump($var, $title = null)
{
	if ($title != null)
	{
		echo "$title<br />";
	}
	
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
}

function dump($var, $title = null)
{
	if ($title != null)
	{
		echo "$title<br />";
	}
	
	echo "<pre>";
	print_r($var);
	echo "</pre>";
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