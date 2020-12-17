<?php
  function GenereerDataSet($tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant)
  {	
	PrintLaTeX(0.25, Encode(0.25, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo " & ";
	PrintLaTeX(-0.25, Encode(-0.25, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo "\\\\ <br/>";
	PrintLaTeX(0.50, Encode(0.50, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo " & ";
	PrintLaTeX(-0.50, Encode(-0.50, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo "\\\\ <br/>";
	PrintLaTeX(1, Encode(1, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo " & ";
	PrintLaTeX(-1, Encode(-1, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo "\\\\ <br/>";
	PrintLaTeX(2, Encode(2, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo " & ";
	PrintLaTeX(-2, Encode(-2, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo "\\\\ <br/>";
	PrintLaTeX(3, Encode(3, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo " & ";
	PrintLaTeX(-3, Encode(-3, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo "\\\\ <br/>";
	PrintLaTeX(4, Encode(4, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo " & ";
	PrintLaTeX(-4, Encode(-4, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo "\\\\ <br/>";
	PrintLaTeX(5, Encode(5, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo " & ";
	PrintLaTeX(-5, Encode(-5, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo "\\\\ <br/>";
	PrintLaTeX(8, Encode(8, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo " & ";
	PrintLaTeX(-8, Encode(-8, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo "\\\\ <br/>";
	PrintLaTeX(9, Encode(9, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo " & ";
	PrintLaTeX(-9, Encode(-9, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo "\\\\ <br/>";
	PrintLaTeX(16, Encode(16, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo " & ";
	PrintLaTeX(-16, Encode(-16, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo "\\\\ <br/>";
	PrintLaTeX(17, Encode(17, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo " & ";
	PrintLaTeX(-17, Encode(-17, $tekenbit, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant));
	echo "\\\\ <br/>";


  }

  function PrintLaTeX($getal, $bin)
  {
	echo $getal;
	echo " & ";
	PrintHex($bin);
  }


  function PrintBin($bin)
  {
	for($i=0; $i<strlen($bin); $i++)
	{
		if($i > 0)
		{
			if(fmod($i,4) == 0)
				echo "&nbsp;";
			if(fmod($i,8) == 0)
				echo "&nbsp;";
		}
		echo $bin[$i];
	}
  }

  function PrintHex($bin)
  {
	$getal = 0;
	for($i=0; $i<strlen($bin); $i++)
	{
		$getal = $getal * 2 + $bin[$i];
		if($i > 0)
		{
			if(fmod($i,4) == 3)
			{
				echo strtoupper(dechex($getal));
				$getal = 0;
			}
			if(fmod($i,8) == 0)
				echo "&nbsp;";
		}
	}

  }

  function Encode($getal, $tekenbitPos, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant)
  {
	$output = "";
	if($getal >= 0)
		$output = $output . $tekenbitPos;
	else
		$output = $output . (1-$tekenbitPos);

	$getal = abs($getal);

	if($getal > 0)
		$exp = floor(log($getal, $grondtal));
	else
		$exp = 0;

	switch ($negExp) {
		case "ones":
			$output = $output . EncodeExpOnes($exp, $grondtal, $bitsExp);
			break;
		case "twos":
			$output = $output . EncodeExpTwos($exp, $grondtal, $bitsExp);
			break;
		case "biased":
			$output = $output . EncodeExpBiased($exp, $grondtal, $bitsExp);
			break;
		default:
			echo "<STRONG>ERROR: invalid $negExp, use \'ones\',\'twos\'</STRONG><BR/>";
	}

	$output = $output . EncodeMantisse($getal, $exp, $grondtal, $start1Mant, $bitsMant);


	return $output;
  }

  function EncodeExpOnes($exp, $grondtal, $bitsExp)
  {
	$out = "";
	$valBit = pow($grondtal,$bitsExp-1);
	$isNeg = $exp < 0;
	$exp = abs($exp);

	for($i=$bitsExp-1; $i>=0; $i--)
	{
		if(abs($exp) >= $valBit)
		{
			$out = $out . (($isNeg)?0:1);
			$exp = $exp - $valBit;
		}
		else
		{
			$out = $out . (($isNeg)?1:0);
		}

		$valBit = $valBit / $grondtal;
	}

	return $out;
  }

  function EncodeExpTwos($exp, $grondtal, $bitsExp)
  {
	$out = EncodeExpOnes($exp, $grondtal, $bitsExp);
	$i = $bitsExp-1;
	$carry = true;
	
	if($exp < 0)
	{
		while ($carry && $i>=0)
		{
			$som = $out[$i] + 1;
			$carry = $som >= $grondtal;
			$out[$i] = fmod($som, $grondtal);
			$i--;
		}
	}

	return $out;
  }

  function EncodeExpBiased($exp, $grondtal, $bitsExp)
  {
	$out = "";

	$exp = $exp + pow($grondtal,$bitsExp-1)-1;
	$valBit = pow($grondtal,$bitsExp-1);


	for($i=$bitsExp-1; $i>=0; $i--)
	{
		if($exp >= $valBit)
		{
			$out = $out . 1;
			$exp = $exp - $valBit;
		}
		else
		{
			$out = $out . 0;
		}

		$valBit = $valBit / $grondtal;
	}


	return $out;
  }


  function EncodeMantisse($getal, $exp, $grondtal, $start1Mant, $bitsMant)
  {
	$out = "";
	$valBit = pow($grondtal,$exp);
	$getal = abs($getal);

	if(!$start1Mant)
	{
		$getal = $getal - $valBit;
		$valBit = $valBit / $grondtal;
	}

	for($i=0; $i<$bitsMant; $i++)
	{
		if($getal >= $valBit)
		{
			$out = $out . 1;
			$getal = $getal - $valBit;
		}
		else
		{
			$out = $out . 0;
		}

		$valBit = $valBit / $grondtal;
	}

	return $out;
  }

?>

<HTML>
<HEAD>
<TITLE>Floating Point Oefeningen</TITLE>
</HEAD>
<BODY>
<H1>Voorstelling van getallen: floating point</H1>
<?php
if(sizeof($_POST) > 0)
{
	echo '<pre>';
	var_dump($_POST);
	echo '</pre>';
       // function GenereerDataSet($tekenbitPos, $grondtal, $negExp, $bitsExp, $start1Mant, $bitsMant)
	   
	echo "ones complement" 
	echo '<br />'
	GenereerDataSet(0, 2, 'ones', 10, false, 13);
	echo '<br />'
	
	echo "ones complement" 
	echo '<br />'
	GenereerDataSet(0, 2, 'twos', 10, false, 13);
	echo '<br />'
	GenereerDataSet(0, 2, 'biased', 10, false, 13);
	echo '<br />'
	//GenereerDataSet(0, 2, 'biased', 10, false, 13);

//	echo "Bytes = " . rand(minBytes, maxBytes);
}
else
{
?>
	<form action="floatingpoint.php" method="post">
		Aantal bytes: <input type="text" name="minBytes" value="2"/> tot <input type="text" name="maxBytes" value="8" /> <br/>
		Grondtal: <input type="checkbox" name="grondtal2" checked="checked">2 <input type="checkbox" name="grondtal8">8 <input type="checkbox" name="grondtal10">10 <input type="checkbox" name="grondtal16">16 <br/>
		<input type="submit" value="Genereer" />
	</form>
<?php
}
?>
</BODY>
</HTML>