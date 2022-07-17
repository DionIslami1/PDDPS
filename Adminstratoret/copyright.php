

<ul class="copyright">
<?php
            $result1 = mysqli_query($conn19,  "CALL copyright()");
            while ($row = mysqli_fetch_assoc($result1)) {
              extract($row); 
if($result1==null)
  mysqli_free_result($result1);
            ?>
            			

                       
							
								<li><?php echo $row['pershkrimi']; ?></li>
						
         </ul>				
       
			<?php } ?>
