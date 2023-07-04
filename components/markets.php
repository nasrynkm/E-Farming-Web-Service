<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Market Prices - June 14, 2023</title>
  <link rel="stylesheet" href="../css/markets.css">
</head>

<body>
  <div class="market-page">
    <h1>BEI ZA JUMLA ZA MAZAO MAKUU YA CHAKULA NCHINI (TZS /KILO 100) 14 JUNI, 2023</h1>
    <div class="market-table">
      <table>
        <tr>
          <th rowspan="2">Region</th>
          <th rowspan="2">District</th>
          <th colspan="2">Maize</th>
          <th colspan="2">Rice</th>
          <th colspan="2">Sorghum</th>
          <th colspan="2">Bulrush Millet</th>
          <th colspan="2">Finger Millet</th>
          <th colspan="2">Wheat Grain</th>
          <th colspan="2">Beans</th>
          <th colspan="2">Irish Potatoes</th>
        </tr>
        <tr>
          <th>Min Price</th>
          <th>Max Price</th>
          <th>Min Price</th>
          <th>Max Price</th>
          <th>Min Price</th>
          <th>Max Price</th>
          <th>Min Price</th>
          <th>Max Price</th>
          <th>Min Price</th>
          <th>Max Price</th>
          <th>Min Price</th>
          <th>Max Price</th>
          <th>Min Price</th>
          <th>Max Price</th>
          <th>Min Price</th>
          <th>Max Price</th>
        </tr>
        <?php
        $data = array(
          array("Arusha", "Arusha", "98,000", "100,000", "250,000", "320,000", "90,000", "100,000", "95,000", "110,000", "115,000", "117,000", "NA", "NA", "240,000", "280,000", "100,000", "110,000"),
          array("Dar es Salaam", "Tandika", "135,000", "150,000", "200,000", "330,000", "150,000", "160,000", "130,000", "140,000", "180,000", "200,000", "200,000", "220,000", "290,000", "350,000", "120,000", "130,000"),
          array("Dodoma", "Kibaigwa", "85,000", "88,000", "320,000", "350,000", "65,000", "75,000", "NA", "NA", "NA", "NA", "NA", "NA", "320,000", "320,000", "120,000", "120,000"),
          array("Dodoma", "Majengo", "87,000", "100,000", "275,000", "300,000", "85,000", "110,000", "120,000", "130,000", "85,000", "100,000", "45,500", "48,000", "250,000", "290,000", "76,000", "98,500"),
          array("Morogoro", "Morogoro", "97,656", "109,375", "300,000", "340,000", "135,000", "150,000", "100,000", "110,000", "160,000", "170,000", "210,000", "220,000", "320,000", "335,000", "105,600", "111,100"),
          array("Mtwara", "Mtwara", "100,000", "120,000", "250,000", "340,000", "150,000", "150,000", "NA", "NA", "150,000", "150,000", "NA", "NA", "300,000", "300,000", "200,000", "200,000"),
          array("Iringa", "Iringa", "90,000", "100,000", "180,000", "300,000", "150,000", "150,000", "180,000", "200,000", "170,000", "170,000", "200,000", "200,000", "250,000", "300,000", "70,000", "70,000"),
          array("Tabora", "Tabora", "78,000", "80,000", "290,000", "300,000", "160,000", "170,000", "NA", "NA", "190,000", "200,000", "NA", "NA", "250,000", "270,000", "90,000", "100,000"),
          array("Shinyanga", "Shinyanga", "100,000", "150,000", "220,000", "280,000", "70,000", "150,000", "150,000", "200,000", "200,000", "200,000", "200,000", "200,000", "280,000", "300,000", "120,000", "150,000"),
          array("Mwanza", "Mwanza", "115,000", "125,000", "200,000", "300,000", "150,000", "180,000", "150,000", "200,000", "NA", "NA", "NA", "NA", "260,000", "330,000", "100,000", "130,000"),
          array("Kagera", "Bukoba", "98,000", "105,000", "196,000", "280,000", "170,000", "200,000", "170,000", "200,000", "170,000", "180,000", "200,000", "250,000", "190,000", "250,000", "90,000", "100,000"),
          array("Mara", "Musoma", "115,000", "115,000", "220,000", "220,000", "130,000", "130,000", "250,000", "250,000", "250,000", "250,000", "NA", "NA", "180,000", "180,000", "100,000", "100,000"),
          array("Manyara", "Manyara", "130,000", "132,000", "220,000", "240,000", "220,000", "230,000", "100,000", "110,000", "120,000", "150,000", "140,000", "150,000", "270,000", "300,000", "95,000", "100,000"),
          array("Ruvuma", "Songea", "60,000", "65,000", "280,000", "320,000", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "250,000", "280,000", "90,000", "90,000"),
          array("Sumbawanga", "Sumbawanga", "60,000", "65,000", "170,000", "200,000", "NA", "NA", "NA", "NA", "105,000", "150,000", "90,000", "90,000", "180,000", "210,000", "65,000", "75,000"),
          array("Tanga", "Tanga", "105,000", "107,000", "240,000", "250,000", "140,000", "140,000", "NA", "NA", "197,000", "197,000", "180,000", "180,000", "280,000", "297,000", "120,000", "120,000")
        );

        foreach ($data as $row) {
          echo "<tr>";
          foreach ($row as $cell) {
            echo "<td>$cell</td>";
          }
          echo "</tr>";
        }
        ?>
      </table>
    </div>

    <div class="button-container">
      <a href="https://www.mit.go.tz/uploads/documents/sw-1686814852-Wholesale%20Prices%2014th%20June,%202023.pdf" download="Market_Prices_June_14_2023.pdf" class="button" id="download-btn">Download .pdf</a>
    </div>
  </div>

  <!-- SweetAlert CDN js Link and PhP file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php @include '../alerts.php'; ?>
</body>

</html>