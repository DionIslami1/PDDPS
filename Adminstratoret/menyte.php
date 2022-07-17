
					
						
							<nav id="menu">
						<div class="inner">
							<h2>Menytë</h2>
							<ul class="links">
                            <?php
            $result1 = mysqli_query($conn20,  "CALL Header_Logo9()");
            while ($row = mysqli_fetch_assoc($result1)) {
              extract($row); 
if($result1==null)
  mysqli_free_result($result1);
            ?>
						<li><a href="Ballina.php"><?php echo $row['Emri']; ?></a></li> 
			<?php } ?>

            <?php
            $result3 = mysqli_query($conn21, "CALL Header_Logo10()");
            while ($row = mysqli_fetch_assoc($result3)) {
              extract($row);
if($result3==null)
  mysqli_free_result($result3);
            ?>
						<li><a href="menaxhimiPerdoruesve.php"> <?php echo $row['Emri']; ?></a></li> 
			<?php } ?>

            <?php
            $result4 = mysqli_query($conn22, "CALL Header_Logo11()");
            while ($row = mysqli_fetch_assoc($result4)) {
              extract($row);
if($result4==null)
  mysqli_free_result($result4);
            ?>
                    <li><a href="Profilet_e_te_diplomuarve.php"> <?php echo $row['Emri'];?></a></li> 
	
			<?php } ?>

            <?php
            $result4 = mysqli_query($conn23, "CALL Header_Logo12()");
            while ($row = mysqli_fetch_assoc($result4)) {
              extract($row);
if($result4==null)
  mysqli_free_result($result4);
            ?>
                    <li><a href="Profilet_e_Institucioneve.php"> <?php echo $row['Emri'];?></a></li> 
	
			<?php } ?>

            <?php
            $result4 = mysqli_query($conn24, "CALL Header_Logo13()");
            while ($row = mysqli_fetch_assoc($result4)) {
              extract($row);
if($result4==null)
  mysqli_free_result($result4);
            ?>
                    <li><a href="raportet.php"> <?php echo $row['Emri'];?></a></li> 
	
			<?php } ?>

            <?php
            $result4 = mysqli_query($conn25, "CALL Header_Logo14()");
            while ($row = mysqli_fetch_assoc($result4)) {
              extract($row);
if($result4==null)
  mysqli_free_result($result4);
            ?>
                    <li><a href="ckycu.php"> <?php echo $row['Emri'];?></a></li> 
	
			<?php } ?>
								
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>
					