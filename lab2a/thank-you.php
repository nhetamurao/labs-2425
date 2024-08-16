<?php

require "helpers/helper-functions.php";

session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$agree = $_POST['agree'];

$_SESSION['email'] = $email;
$_SESSION['password'] = $passwordHash;
$_SESSION['agree'] = $agree;

$data = $_SESSION;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $file = fopen("registrations.csv", "a");


 fputcsv($file, $data);

  // Close the file
  fclose($file);
}

// Calculate the age based on the birthdate
function calculateAge($birthdate) {
  $birthDate = new DateTime($birthdate);
  $currentDate = new DateTime();
  $age = $birthDate->diff($currentDate)->y;
  return $age;
}

$age = calculateAge($_SESSION['birthdate']);

$_SESSION['age'] = $age;

$form_data = $_SESSION;

dump_session();




?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Thank You Page
        </h1>
      </div>
      <div class="p-section--shallow">

        <table aria-label="Session Data">
            <thead>
                <tr>
                    <th></th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($form_data as $key => $val):
            ?>
                <tr>
                    <th><?php echo $key; ?></th>
                    <td>
                      <?php echo $val; ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>

            </tbody>
        </table>


      </div>
    </div>
  </div>
</section>

</body>
</html>