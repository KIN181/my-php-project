<?php
require_once '../Controller/Scrape.php';
require_once '../vendor/autoload.php'; // PhpSpreadsheet の読み込み

use Controller\Scrape;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$scrape = new Scrape();
$quotes = $scrape->scrapeQuotes();

// CSV ダウンロード処理
if (isset($_POST['download_csv'])) {
    $filename = "quotes.csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    $output = fopen('php://output', 'w');

    // CSV ヘッダー
    fputcsv($output, ['Quote']);

    // データ書き込み
    foreach ($quotes as $quote) {
        fputcsv($output, [$quote]);
    }

    fclose($output);
    exit();
}

// Excel ダウンロード処理
if (isset($_POST['download_excel'])) {
    $filename = "quotes.xlsx";
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // ヘッダー
    $sheet->setCellValue('A1', 'Quote');

    // データ書き込み
    $row = 2;
    foreach ($quotes as $quote) {
        $sheet->setCellValue('A' . $row, $quote);
        $row++;
    }

    // Excel ファイル出力
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    $writer->save('php://output');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrape Data</title>
</head>
<body>
    <h1>Scraped Quotes</h1>

    <!-- ダウンロードボタン (CSV) -->
    <form method="POST">
        <button type="submit" name="download_csv">Download CSV</button>
    </form>

    <!-- ダウンロードボタン (Excel) -->
    <form method="POST">
        <button type="submit" name="download_excel">Download Excel</button>
    </form>

    <div>
        <!-- データ表示 -->
        <?php
        foreach ($quotes as $quote) {
            echo "<p>" . htmlspecialchars($quote) . "</p>";
        }
        ?>
    </div>
</body>
</html>
