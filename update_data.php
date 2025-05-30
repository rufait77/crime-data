<?php
// Include the database connection file
require_once 'db_connect.php'; // Ensure this is included before you use $pdo

// Include PhpSpreadsheet library (make sure the autoload is included)
require_once 'vendor/autoload.php'; 

// Truncate the bank_financials table before inserting new data
$pdo->exec("TRUNCATE TABLE bank_financials"); // This ensures the table is cleared first

// Get the document root directory dynamically
$documentRoot = $_SERVER['DOCUMENT_ROOT']; // This will give the root directory of your project

// Convert backslashes to forward slashes for consistency
$documentRoot = str_replace('/', '\\', $documentRoot); // Replace backslashes with forward slashes
// echo $documentRoot;
// $projectRoot = $documentRoot . '\\excel_check\\';
// echo $projectRoot;
// Path to the Excel file
$projectRoot = 'G:\\Xampp Installed\\htdocs\\excel_check\\';
$excelFile = 'data/bank_data_1.xlsx';

// Load the spreadsheet
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFile);
$sheet = $spreadsheet->getActiveSheet();
$rows = $sheet->toArray();

// Prepare the insert statement for bank data
$stmt = $pdo->prepare(
    "INSERT INTO bank_financials (bank_name, total_asset, total_liability, total_capital, net_income, eps, no_of_staff, no_of_branch, bank_logo) 
    VALUES (:bank_name, :total_asset, :total_liability, :total_capital, :net_income, :eps, :no_of_staff, :no_of_branch, :bank_logo)"
);

// Start a database transaction
$pdo->beginTransaction();

foreach ($rows as $index => $row) {
    // Skip the header row
    if ($index === 0) continue;

    // Get the bank logo path (assuming it's in the last column of the row)
    $bankLogo = $row[8]; // Adjust the index based on the actual column number for the logo

    // Convert the absolute path to a relative path
    if (strpos($bankLogo, $projectRoot) === 0) {
        // Remove the absolute path part and get only the relative path
        $relativePath = str_replace($projectRoot, '', $bankLogo);
    } else {
        // If it's already a relative path, just use it
        $relativePath = $bankLogo;
    }

    // Ensure that the relative path is not empty
    if (!empty($relativePath)) {
        // Convert any backslashes in the path to forward slashes for consistency
        $relativePath = str_replace('\\', '/', $relativePath);

        // Execute the insert query with the bank data and logo path
        $stmt->execute([
            ':bank_name' => $row[0], // bank_name
            ':total_asset' => $row[1], // total_asset
            ':total_liability' => $row[2], // total_liability
            ':total_capital' => $row[3], // total_capital
            ':net_income' => $row[4], // net_income
            ':eps' => $row[5], // eps
            ':no_of_staff' => $row[6], // no_of_staff
            ':no_of_branch' => $row[7], // no_of_branch
            ':bank_logo' => $relativePath // bank_logo (the relative path to the image)
        ]);
    }
}

// Commit the transaction
$pdo->commit();
header('Location: insert_data.php');
?>
