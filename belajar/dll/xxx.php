<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Example of Twitter Typeahead</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script  type="text/javascript" src="../js/typeahead.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var cars = [
        <?php
        include "../config.php";
		mysql_select_db("kost");
			$sql = "SELECT * FROM dataKost";
			$hasil = mysql_query($sql);
			while($x = mysql_fetch_object($hasil)){
				?>
				'<?=$x->nama;?>',
			<?
			}
			?>
	];

    // Defining the local dataset
  //  var cars = ['Audi', 'BMW', 'Bugatti', 'Ferrari', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen',];
    
    // Constructing the suggestion engine
    var cars = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: cars
    });
    
    // Initializing the typeahead
    $('.typeahead').typeahead({
        hint: true,
        highlight: true, /* Enable substring highlighting */
        minLength: 1 /* Specify minimum characters required for showing result */
    },
    {
        name: 'cars',
        source: cars
    });
});  
</script>
</head>
<body>
    <div class="bs-example">
		<h2>Type your favorite car name</h2>
        <input type="text" class="typeahead tt-query" autocomplete="off" spellcheck="false">
    </div>
</body>
</html>                            