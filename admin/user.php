<!-- Header -->
<header class="w3-container" style="padding-top:22px">
    <b><h2><i class="fa fa-users"></i>&nbsp;&nbsp;MANAJEMEN USER</h2></b>
</header>

<div class="w3-container w3-margin-bottom">
	<div class="w3-row">
		<button onclick="document.getElementById('formUser').style.display='block'" class="w3-button w3-green">
			<b>TAMBAH USER</b>
		</button>
		

		<div class="w3-modal" id="formUser">
			<div class="w3-modal-content w3-padding-large">
				<div class="w3-bar">
					<div class="w3-jumbo w3-center"><b>FORM ADD USER!!!</b></div>
				</div>
      			<div class="w3-container w3-margin-bottom">
			      	<form method="POST">
			      		<div class="w3-row w3-section">
							<input class="w3-input" type="text" placeholder="username" name="username"/>
						</div>
						<div class="w3-row w3-section">
							<input class="w3-input" type="password" placeholder="password" name="password"/>
						</div>
						<div class="w3-row w3-section">
							<select class="w3-select w3-border" name="status">
								<option value="admin">Admin</option>
								<option value="biasa">Biasa</option>
							</select>
						</div>
						<div class="w3-row w3-section">
							<input class="w3-input" type="file" name="photo"/>
						</div>
						<div class="w3-row-padding">
							<div class="w3-col s6">
								<input onclick="document.getElementById('formUser').style.display='none'" class="w3-input w3-button w3-red" value="BATAL" />
							</div>
							<div class="w3-col s6">
								<input class="w3-input w3-button w3-green" type="submit" name="buatUser"/>
							</div>
						</div>
					</form>	
      			</div>
			</div>
		</div>

		<?php
			if(isset($_POST['buatUser'])) {
				$oop = mysql_query("INSERT INTO user VALUES('', '$_POST[username]', '$_POST[password]', '$_POST[status]')");
				unset($_POST);
			}
			echo "<script>reload()</script>";
		?>


	</div>
</div>

<div class="w3-container">
	<ul class="w3-ul">
		<?php
			$bnf = mysql_query("SELECT * FROM user");
			while($tyu = mysql_fetch_array($bnf)) { ?>

	        <li class="w3-bar w3-border-bottom">          
	            <span onclick="location.href='admin/hapusUser.php?id=<?=$tyu['id']?>'" class="w3-margin-right w3-bar-item w3-button w3-red w3-large w3-right">
	                <i class="fa fa-window-close" aria-hidden="true"></i>
	            </span>            
	            <span onclick="window.open('admin.php?page=foto&id=<?=$id?>', '_SELF')" class="w3-margin-right w3-bar-item w3-button w3-blue w3-large w3-right">
	                <i class="fa fa-wrench" aria-hidden="true"></i>
	            </span>
	            <img src="img/a.png" class="w3-bar-item w3-hide-small" style="width:70px;">
	            <div class="w3-bar-item">
	            	<?php
	            		if($tyu['status'] == "admin") {
	            			?>
	            				<span class="w3-large"><?=$tyu['user']?></span>
	                			<span class="w3-margin-left w3-red w3-padding-small"><?=$tyu['status']?></span>
	            			<?php
	            		} else {
	            			?>
								<span class="w3-large"><?=$tyu['user']?></span>
	                			<span class="w3-margin-left w3-green w3-padding-small"><?=$tyu['status']?></span>
	            			<?
	            		}
	            	?>
	                
	            </div>
	        </li>

	    <?php
	    	}
	    	include "hapusUser.php";
	    ?>
    </ul>
</div>