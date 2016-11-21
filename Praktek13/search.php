<?php
include "connect.php";
$id_mobil= $_POST['name']; //get the nama value from form
$q = "SELECT * from mobil where Id_Mobil like '%$id_mobil%' "; //query to get the search result
$result = mysql_query($q); //execute the query $q
if($result===FALSE){
	die(mysql_error());
}
echo "<center>";
echo "<h2> Hasil Searching </h2>";
echo "<table border='1' cellpadding='5' cellspacing='8'>";
echo "
<tr bgcolor='orange'>
<td>ID MOBIL</td>
<td>MERK</td>
<td>MODEL</td>
<td>TIPE</td>
<td>PINTU</td>
<td>TAHUN PRODUKSI</td>
<td>NEGARA PEMBUAT</td>
<td>JENIS PRODUKSI</td>
</tr>";
while ($data = mysql_fetch_array($result)) {  //fetch the result from query into an array
echo "
<tr>
<td>".$data['Id_Mobil']."</td>
<td>".$data['Merk']."</td>
<td>".$data['Model']."</td>
<td>".$data['Tipe']."</td>
<td>".$data['Pintu']."</td>
<td>".$data['Tahun_Produksi']."</td>
<td>".$data['Negara_Pembuat']."</td>
<td>".$data['Jenis_Produksi']."</td>
</tr>";
}
echo "</table>";
?>
