<?php
require_once '../Controller/Scrape.php';

use Controller\Scrape;

$scrape = new Scrape();

$quotes = $scrape->scrapeQuotes();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScrapeData</title>
</head>
<body>
    <h1>Scraped Quotes</h1>

    <div>
        <?php
        foreach ($quotes as $quote) {
            echo "<p>" . htmlspecialchars($quote) . "</p>";
        }
        ?>

    </div>
    
</body>
</html>