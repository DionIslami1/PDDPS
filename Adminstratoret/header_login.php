
<div class="inner">
<?php
            $result1 = mysqli_query($conn17,  "CALL HeaderADM()");
            while ($row = mysqli_fetch_assoc($result1)) {
              extract($row); 
if($result1==null)
  mysqli_free_result($result1);
            ?>
            			<h2><?php echo $row['emertimi']; ?></h2>

                        
        </div>
			<?php } ?>
