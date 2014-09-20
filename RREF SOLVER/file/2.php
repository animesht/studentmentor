
<html>

	<body>
		<a href="/">HOME PAGE<br><br></a>
	</body>

</html>




<?php

	$row = $_POST['row'];
	$col = $_POST['col'];

	$a = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

	for ($i=0;$i<37;$i+=1)
	{
		if (empty($_POST[$i]))
		{
			$a[$i] = 0;
		}
		else
		{
			$a[$i] = $_POST[$i];
		}
		
	}

	function pr($a,$row,$col)
	{
		for ($i=0;$i<$row;$i+=1)
		{
			for($j=0;$j<$col;$j+=1)
			{
				echo $a[$i*6+$j]." ";
			}
			echo "<br>";
		}
	}
	
	echo "Enterd array"."<br>"."<br>";
	pr($a,$row,$col);
	echo "<br><br>";
	echo "GAUSS REDUCTION"."<br><br>";
	$count = 6;
	for ($i=0;$i<$count;$i+=1)				#max row number of pivots
	{	
		pr($a,$row,$col);
		echo "<br><br>";
		$mark=0;
		while ($a[$i*6+$mark]==0)
		{
			$mark+=1;
			if ($mark+1>$col)	
			{					
				break;
			}
		}
		if ($mark+1>$col)									#if row zero then skip row
			{

			}
		else
		{	

			$temp1=$a[$i*6+$mark];							
			for ($j=$i+1;$j<$row;$j+=1)
			{
				$temp2=$a[$j*6+$mark];					#temp2 to find factor
				if($temp2==0)							#if alredy 0 then pass
				{

				}
				else
				{
					$factor= floatval($temp2/$temp1); 	#cal factor
					for ($k=$mark;$k<$col;$k+=1)
					{
						$a[$j*6+$k]-=$factor*$a[$i*6+$k];	#subtract	
						#$a[$j*6+$k]=round($a[$j*$col+$k],2);
					}
				}
			}
		}
	}

	echo "JORDAN PART"."<br><br>";
				
	$count = 6;
	for ($i=5;$i>-1;$i-=1)
	{			
		pr($a,$row,$col);
		echo "<br><br>";	
		$mark = 0;
		while ($a[$i*6+$mark]==0)
		{
			$mark+=1;
			if ($mark+1>6)
			{
				break;
			}
		}
		if ($mark+1>6)
		{
		
		}
		else
		{
			$factor=floatval(1/$a[$i*6+$mark]);			#find factor to make pivot 1
			for ($j=$mark;$j<6;$j+=1)
			{
				$a[$i*6+$j]*=$factor;
			}	
		}
		for ($k=$i-1;$k>-1;$k-=1)
		{
			$factor = floatval($a[$k*6+$mark]/1);
			for ($z=$mark;$z<6;$z+=1)
			{
				$a[$k*6+$z]-=$factor*$a[$i*6+$z];
				#$a[$k*6+$z]=round($a[$i*6+$z],2);

			}

		}
	}

?>


<html>

	<body>
		<a href="/">HOME PAGE</a>
	</body>

</html>