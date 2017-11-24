<!-- Header -->
<header class="w3-container" style="padding-top:22px">
    <b><h2><i class="fa fa-users"></i>&nbsp;&nbsp;MANAJEMEN USER BIASA</h2></b>
</header>

<div class="w3-container">
	<ul class="w3-ul">
		<table class="w3-table w3-striped w3-bordered">
		    <tr>
		    	<th>ID</th>
		      	<th>Username</th>
		      	<th class="w3-right">Menu</th>
		    </tr>
		<?php
			$bnf = mysql_query("SELECT * FROM userBiasa");
			while($tyu = mysql_fetch_array($bnf)) { ?>

			<tr>
				<td class="w3-large"><?=$tyu['id']?></td>
				<td class="w3-large">
					<b><?=$tyu['userBiasa']?></b>
				</td>
				<td>
					<span onclick="location.href='hapusUserBiasa.php?id=<?=$tyu['id']?>'" class="w3-margin-right w3-bar-item w3-button w3-red w3-large w3-right">
	                	<i class="fa fa-ban" aria-hidden="true"></i>
	            	</span>
				</td>
			</tr>
	    <?php
	    	}
	    ?>
	    </table>
    </ul>
</div>