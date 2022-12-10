<?php
define("HOST", getenv('ANDALOHOST'));
define("PORT", getenv('ANDALOPORT'));
define("USER", getenv('ANDALOUSER'));
define("PASSWORD", getenv('ANDALOPWD'));
define("DB", getenv('ANDALODB'));

$connection = pg_connect("host=".HOST." port=".PORT." user=".USER." password=".PASSWORD." dbname=".DB) or die ("Impossibile connettersi al server");
?>
