<?php
$exchangeRates = [
	"FUSD_TCAD" => 1.435,
	"FUSD_TEUR" => 0.9236,
	"FCAD_TUSD" => 0.6967,
	"FCAD_TEUR" => 0.6436,
	"FEUR_TUSD" => 1.083,
	"FEUR_TCAD" => 1.554
];
$from_value = "";
$from_currency = "";
$to_currency = "";
$converted_value = "";

if (($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['from_value']) && isset($_GET['from_currency']) && isset($_GET['to_currency']))) {
    
    $from_value = floatval($_GET['from_value']);
    $from_currency = $_GET['from_currency'];
    $to_currency = $_GET['to_currency'];

    if ($from_value < 0) {
        $converted_value = "Please enter a valid amount!";
    } else {
        if (substr($from_currency, offset: 1) == substr($to_currency, 1)) {
            $converted_value = $from_value;
        } else {
            // Check exchange rate and make transaction
            $key = "{$from_currency}_{$to_currency}";
            if (isset($exchangeRates[$key])) {
                $converted_value = $from_value * $exchangeRates[$key];
            } else {
                $converted_value = "Conversion rate not found!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Currency Calculation</title>
    <meta name="description" content="CENG 311 Inclass Activity 5" />
</head>
<body>

    <form action="Ustun-Cankaya-Activity5.php" method="GET">
        <table>
            <tr>
                <td>From:</td>
                <td>
                    <input type="text" name="from_value" value="<?php echo htmlspecialchars($from_value); ?>" required />
                </td>
                <td>Currency:</td>
                <td>
                    <select name="from_currency">
                        <option value="FUSD" <?php if ($from_currency == "FUSD") echo "selected"; ?>>USD</option>
						<option value="FCAD" <?php if ($from_currency == "FCAD") echo "selected"; ?>>CAD</option>
						<option value="FEUR" <?php if ($from_currency == "FEUR") echo "selected"; ?>>EUR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>To:</td>
                <td>
                    <input type="text" name="to_value" value="<?php echo htmlspecialchars($converted_value); ?>" readonly />
                </td>
                <td>Currency:</td>
                <td>
                    <select name="to_currency">
                        <option value="TUSD" <?php if ($to_currency == "TUSD") echo "selected"; ?>>USD</option>
                        <option value="TCAD" <?php if ($to_currency == "TCAD") echo "selected"; ?>>CAD</option>
                        <option value="TEUR" <?php if ($to_currency == "TEUR") echo "selected"; ?>>EUR</option>
                    </select>
                </td>
            </tr>
            </tr>
				<tr>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					<input type="submit" value="convert"/>
				</td>	
			</tr>
        </table>
    </form>

</body>
</html>
