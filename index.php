<?php
// Variabili contenenti i dati di connessione al db.
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = 'root';
$db_name = 'example_db';

// Creo connessioni al db.
$connection = new mysqli( $db_hostname, $db_username, $db_password, $db_name );

// Check sulla connessione al database che mostra un messaggio di errore nel caso in cui qualcosa on sia andato a buon fine.
if ( $connection->connect_error ) {
	die ( 'Connessione al database non riuscita' . $connection->connection_error );
}

// Query. Dichiaro la variabile ossia la query che voglio seguire, e poi la inserisco nel query result.
$query = 'SELECT id, title, date, content FROM posts'; 
$query_result = $connection->query($query);
?>

<!-- Anche se qui chiudo il php, le variabili che ho definito posso comunque scrivere php nel mio html, aprendolo e chiudendolo. -->

<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
	<meta name="description" content="blabla">
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style_responsive.css">
</head>
<body>
	<?php
	if ( $query_result->num_rows > 0 ) {
		while ( $row = $query_result->fetch_assoc() ) {
			// Codice HTML per formattare i post.
	?>

	<div class="wrapper" id="<?php eco $row['id']; ?>">
		<h1 class="title distanza"><?php eco $row['title']; ?></h1>
		<h4 class="date distanza"><?php eco $row['date']; ?></h4>
		<p class="content distanza"><?php eco $row['content']; ?></p>
	
	<?php
		}
	}
	?>
	</div>	
</body>
</html>