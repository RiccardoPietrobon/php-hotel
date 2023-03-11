<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $nr_hotels = count($hotels);


    foreach($hotels as $hotel){
      //var_dump($hotel["name"]);
      foreach($hotel as $item){
        //var_dump($item[0]);
      }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>

        <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
</head>
<body>
    <div class="container">

        <form method="POST">
          <select class="form-select" id="garage" name="garage">
            <option>Parking</option>
            <option>No parking</option>
          </select>
        </form>

        <h1>Lista Hotel</h1>

        <table class="table">

          <thead>
            <tr>
              <th><?php echo implode('</th><th>', array_keys(current($hotels))); ?></th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($hotels as $hotel): array_map('htmlentities', $hotel); ?>
              <?php if($hotel["parking"]) : ?>
                <tr>
                  <td><?php echo implode('</td><td>', $hotel); ?></td>
                </tr>
              <?php endif ?>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>
    </body>
  </html>