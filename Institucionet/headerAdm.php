
<div class="inner">
<?php
            $result11 = mysqli_query($conn21,  "CALL HeaderADM()");
            while ($row2 = mysqli_fetch_assoc($result11)) {
              extract($row2); 
if($result11==null)
  mysqli_free_result($result11);
            ?>
            			<h2><?php echo $row2['emertimi']; ?></h2>

                        <?php
							$vizita =1;
							if(isset($_COOKIE["vizita"])) {
								$vizita=(int) $_COOKIE["vizita"];
							}   $muaji = 2592000 + time();
							setcookie("vizita", date("F jS - g:i a"), $muaji);
							if(isset($_COOKIE['vizita'])) 
							{
								$eFundit = $_COOKIE['vizita'];
								echo "<p>Vizita juaj e fundit ishte më: " . $eFundit."</p>";

							}
							else 

							{ echo"<p> Vizita juaj e parë në Platformë Digjitale, ju deshirojm mireseardhje</p>";

							}
						?>
        </div>
			<?php } ?>
