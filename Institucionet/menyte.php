
					
						
							<nav id="menu">
						<div class="inner">
							<h2>Menytë</h2>
							<ul class="links">
                            <?php
            $result1 = mysqli_query($conn5,  "CALL Header_Logo5()");
            while ($row = mysqli_fetch_assoc($result1)) {
              extract($row); 
if($result1==null)
  mysqli_free_result($result1);
            ?>
						<li><a href="Ballina.php"><?php echo $row['Emri']; ?></a></li> 
			<?php } ?>

            <li><a href="modifiko_profilin.php?id_p_inst=<?php echo $id_p_inst;?>">Profili</a></li>

            <?php
            $result3 = mysqli_query($conn6, "CALL Header_Logo6()");
            while ($row = mysqli_fetch_assoc($result3)) {
              extract($row);
if($result3==null)
  mysqli_free_result($result3);
            ?>
						<li><a href="menaxhoSygjerimet.php"> <?php echo $row['Emri']; ?></a></li> 
			<?php } ?>

            <?php
            $result4 = mysqli_query($conn7, "CALL Header_Logo7()");
            while ($row = mysqli_fetch_assoc($result4)) {
              extract($row);
if($result4==null)
  mysqli_free_result($result4);
            ?>
                    <li><a href="raportet.php"> <?php echo $row['Emri'];?></a></li> 
	
			<?php } ?>

      <?php
            $result4 = mysqli_query($conn8, "CALL Header_Logo8()");
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
					