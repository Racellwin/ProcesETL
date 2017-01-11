<pre><?php

$productId = $_GET['IDproduktu'];
require ('connect_sql.php');
connect_database();


$dane = mysql_query("SELECT * FROM products WHERE serial_number='$productId'") ;



       echo '<br/>';
	    echo '<br/>';
		
	while ($rek = mysql_fetch_array($dane))
	{
		echo 'ID Produktu:'.$rek['id']."<br/>";
		echo 'Numer Produktu:'.$rek['serial_number']."<br/>";
		echo 'Typ produktu:'.$rek['type']."<br/>";
		echo 'Producent:'.$rek['producent']."<br/>";
		echo 'Model:'.$rek['model']."<br/>";
		echo 'Dodatkowe informacje:'.$rek['additional_info']."<br/>";
		
	};
	
	
	connect_database();

$dane2 = mysql_query("SELECT * FROM opionios  WHERE product_id='$productId'") ;

close_sql_connection();

       echo '<br/>';
	    echo '<br/>';
		
	echo "<table cellpadding=\"2\" border=1>"; 	
	echo "<tr>";
	echo "<td>".'id:';
	echo "<td>".'Autor:';
	echo "<td>".'Ocena:';
	echo "<td>".'Tresc:';
	echo "<td>".'Data dodania:';
	echo "<td>".'Rekomendacja:';
	echo "<td>".'Uzyteczna:';
	echo "<td>".'Nieuzyteczna:';
	
	while ($rek2 = mysql_fetch_array($dane))
	{
		echo "<tr>"; 
		echo "<td>".$rek2['id']."<br/>";
		echo "<td>".$rek2['author']."<br/>";
		echo "<td>".$rek2['stars']."<br/>";
		echo "<td>".$rek2['text']."<br/>";
		echo "<td>".$rek2['date']."<br/>";
		echo "<td>".$rek2['recomended']."<br/>";
		echo "<td>".$rek2['useful']."<br/>";
		echo "<td>".$rek2['useless']."<br/>";
		
	};
	 
	
	
	
?>









<html>

 
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<form method="post" action="index.html">	
 <input type="submit" value="Powrot" />
</form>


</html>
















