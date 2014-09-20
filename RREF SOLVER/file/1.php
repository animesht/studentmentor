<?php
if ((empty($_POST['row'])) or (empty($_POST['col'])))
	{
		header("Location: /error");
	}
?>



<html lang="en">

<head>

    <title>RREF Solver</title>

    <link href="./bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./font-awesome.css" rel="stylesheet" type="text/css">
    <link href="./font1.css" rel="stylesheet" type="text/css">
    <link href="./font2.css" rel="stylesheet" type="text/css">

    <style type="text/css">

    textarea {
        width: 300px;
        height: 7em;
    }

    input, select, textarea {
        background-color: #234567;
    }


</style>
</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="/">
                    <i class="fa fa-play-circle"></i>  <span class="light">RREF</span> Solver
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/">Enter another</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="intro-text">the rref</h3>
                        



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
			echo "<div class = \"row\"><div class = \"col-lg-3\">";
			for($j=0;$j<$col;$j+=1)
			{
				echo "<div class=\"intro-text\">".$a[$i*6+$j]."</div>"." ";
			}
			echo "</div></div>";
			echo "<br>";
		}
	}
	
				
			echo "<br>";

	$count = 6;
	for ($i=0;$i<$count;$i+=1)				#max row number of pivots
	{	
			echo "<br>";
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

	
				
	$count = 6;
	for ($i=5;$i>-1;$i-=1)
	{			
				
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
	}	echo "<span style = \"font-size: 22pt\">";
		for ($i=0;$i<$row;$i+=1)
		{
			for($j=0;$j<$col;$j+=1)
			{
				echo $a[$i*6+$j]." ";
				
			}
			echo "<br>";
		}
		echo "</span>";
		
	
#		for ($i=0;$i<$row;$i+=1)
#		{
#				echo "<div class = \"row\">";
#				echo "<div class = \"col-md-1\"></div>";
#				echo "<div class = \"col-md-2\">";
#			for($j=0;$j<$col;$j+=1)
#			{	echo "<div clss = \"col-xs-1\"></div>";
#				echo "<div class=\"col-xs-1\">";
#				echo "<div class=\"intro-text\">".$a[$i*6+$j]."</div>"."";
#				echo "</div> ";
#				echo "\n"."\n";
#			}
#				echo "</div>";
#				echo "<div class = \"col-md-5\"></div>";
#				echo "</div>";
#
#		}


?>
<br><br>
<span class="light" style="font-size: 20pt;">Get the steps<a href = "/clone"> here</span>

					<br><br><br>
                        <a href="#contact" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header
 <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Did this help you?</h2>
                <p>Feel free to thank me :P <br>
                    Feedback is always welcome :)</p>
                <p><a href="kushagra14056@iiitd.ac.in">kushagra14056@iiitd.ac.in</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    
                    <li>
                        <a href="https://github.com/kush789" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/kushagra1996" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

   
    <!-- Footer -->
    <footer>
        <div class="container text-center">
        </div>
    </footer>

    <script src="./jquery-1.11.0.js"></script>

    <script src="./bootstrap.min.js"></script>

    <script src="./jquery.easing.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="./grayscale.js"></script>

</body>

</html>


