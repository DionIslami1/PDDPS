
<ul class="contact">
<?php
            $result1 = mysqli_query($conn11,  "CALL footer_adresa()");
            while ($row = mysqli_fetch_assoc($result1)) {
              extract($row); 
if($result1==null)
  mysqli_free_result($result1);
            ?>
            			

                       
							
                        <li class="icon solid fa-home"><?php echo $row['pershkrimi']; ?></li>
						<?php } ?>

                        <?php
            $result1 = mysqli_query($conn12,  "CALL footer_telefoni()");
            while ($row = mysqli_fetch_assoc($result1)) {
              extract($row); 
if($result1==null)
  mysqli_free_result($result1);
            ?>
            			

                       
							
                        <li class="icon solid fa-phone"><?php echo $row['pershkrimi']; ?></li>
						<?php } ?>

                        <?php
            $result1 = mysqli_query($conn13,  "CALL footer_email()");
            while ($row = mysqli_fetch_assoc($result1)) {
              extract($row); 
if($result1==null)
  mysqli_free_result($result1);
            ?>
            			

                       
							
                        <li class="icon solid fa-envelope"><?php echo $row['pershkrimi']; ?></li>
						<?php } ?>

                        <?php
            $result1 = mysqli_query($conn14,  "CALL footer_facebook()");
            while ($row = mysqli_fetch_assoc($result1)) {
              extract($row); 
if($result1==null)
  mysqli_free_result($result1);
            ?>
            			

                       
							
                        <li class="icon brands fa-facebook-f"><?php echo $row['pershkrimi']; ?></li>
						<?php } ?>

                        <?php
            $result1 = mysqli_query($conn15,  "CALL footer_instagram()");
            while ($row = mysqli_fetch_assoc($result1)) {
              extract($row); 
if($result1==null)
  mysqli_free_result($result1);
            ?>
            			

                       
							
                        <li class="icon brands fa-instagram"><?php echo $row['pershkrimi']; ?></li>
						<?php } ?>
                        
         </ul>				
       
			
