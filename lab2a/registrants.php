<?php
// Open the CSV file for reading
$file = fopen("registrations.csv", "r");

?>
<html>
<head>
    <meta charset="utf-8">
    <title>Registrants List</title>
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
    <style>
        table {
            width: auto; 
            margin: 0 auto; 
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            word-wrap: break-word; 
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>Registrants List</h1>
      </div>
      <div class="p-section--shallow">

        <table border="1">
            <thead>
                <tr>
                    <th>Complete Name</th>
                    <th>Birthday</th>
                    <th>Contact Number</th>
                    <th>Sex</th>
                    <th>Program</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Agree</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Read and display data from the CSV file
            while (($data = fgetcsv($file)) !== FALSE) {
                echo "<tr>";
                foreach ($data as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
            fclose($file);
            ?>
            </tbody>
        </table>

      </div>
    </div>
  </div>
</section>

</body>
</html>
