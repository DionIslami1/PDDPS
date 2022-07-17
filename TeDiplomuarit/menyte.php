
					
						
							<nav id="menu">
						<div class="inner">
							<h2>Menytë</h2>
							<ul class="links">
                            <?php
            $result1 = mysqli_query($conn1,  "CALL Header_Logo1()");
            while ($row = mysqli_fetch_assoc($result1)) {
              extract($row); 
if($result1==null)
  mysqli_free_result($result1);
            ?>
						<li><a href="Ballina.php"><?php echo $row['Emri']; ?></a></li> 
			<?php } ?>

            <li><a href="modifiko_profilin.php?id_p_dip=<?php echo $id_p_dip;?>">Profili</a></li>

            <?php
            $result3 = mysqli_query($conn3, "CALL Header_Logo3()");
            while ($row = mysqli_fetch_assoc($result3)) {
              extract($row);
if($result3==null)
  mysqli_free_result($result3);
            ?>
						<li><a href="menaxhimiEdukimit.php"> <?php echo $row['Emri']; ?></a></li> 
			<?php } ?>

            <?php
            $result4 = mysqli_query($conn4, "CALL Header_Logo4()");
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
					