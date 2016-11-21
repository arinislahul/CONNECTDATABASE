<html>
<head>
	<title>Koneksi ke MySQL</title>
	<link href="../PraktekBootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php

// Connecting, selecting database
$link = mysql_connect('localhost', 'root','')
or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('showroommobil') or die('Could not select
database');

// Performing SQL query
$query = 'SELECT * FROM mobil';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
?>

<!-- Tabel Menggunakan Bootstrap -->
<div class="container">
	<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Showroom Mobil</h3>
					</div>
					<div class="panel-body">
						<a href="tambah_data.php" class="btn btn-warning">
							<span class="glyphicon glyphicon-plus"></span><button type="button" class="btn btn-default">Tambah</button></a>
						<a href="cetak_data.php" class="btn btn-success">
							<span class="glyphicon glyphicon-print"></span> <button type="button" class="btn btn-default">Cetak</button></a>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>ID Mobil</th>
									<th>Merk</th>
									<th>Model</th>
									<th>Tipe</th>
									<th>Pintu</th>
									<th>Tahun Produksi</th>
									<th>Negara Pembuat</th>
									<th>Jenis Produksi</th>
									<th>Operasi</th>
								</tr>
							</thead>
							<?php $no=0; while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
							<tbody>
								<tr>
									<td><?php echo ++$no; ?></td>
									<?php foreach ($line as $col_value) {
										echo "<td>$col_value</td>";
									} ?>	
								<td>
									<a href="edit_data.php?id=<?php echo $line['Id_Mobil'];?>" type="button" class="btn btn-sm btn-primary"> <button type="button" class="btn btn-default">EDIT</button></a>
									<a href="hapus_data.php?idx=<?php echo $line['Id_Mobil'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?');" > <button type="button" class="btn btn-default">DELETE</button></a>
									</td>	
								</tr>
							</tbody>
							<?php } ?>
						</table>
					</div>			
</div>
<form name="SEARCH" method="post" action="search.php">
<table width="300" border="0" align="left" cellpadding="0">
<tr bgcolor="PINK">
<td height="25" colspan="3">
<strong> CARI DATA MOBIL </strong>
</td>
</tr>
<tr> <td>  ID MOBIL </td>
<td> <input type="text" name="name"> <input type="SUBMIT" name="SUBMIT" id="SUBMIT" value="GO" ></td>
</tr>
</table>
</form>
<?php
// Printing results in HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo "\t<tr>\n";
foreach ($line as $col_value) {
echo "\t\t<td>$col_value</td>\n";
}
echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>
</body>
</html>