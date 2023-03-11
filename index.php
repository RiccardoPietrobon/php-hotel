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
    /* con questo ciclo vedo tutti gli hotel con le loro caratteristiche */
    
          var_dump(array_keys($hotels[0]));
          $nr_hotels = count($hotels);
    
   /*   foreach($hotels as $hotel){
        var_dump($hotel);
        var_dump($hotel["vote"]);

          var_dump(array_keys($hotels[0]));
    } */ 

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
        <h1>Lista Hotel</h1>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <?php for ($i=1; $i<($nr_hotels+1); $i++) : ?>
                  <th scope="col"> Hotel n° <?= $i ?> </th>
              <?php endfor ?>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <th scope="row">Name</th>
              <?php foreach ($hotels as $key => $hotel) : ?>
                  <td><?= $hotel["name"] ?></td>
              <?php endforeach ?>
            </tr>

            <tr>
              <th scope="row">Description</th>
              <?php foreach ($hotels as $key => $hotel) : ?>
                  <td><?= $hotel["description"] ?></td>
              <?php endforeach ?>
            </tr>

            <tr>
              <th scope="row">Parking</th>
              <?php foreach ($hotels as $key => $hotel) : ?>
                  <td><?= $hotel["parking"] ?></td>
              <?php endforeach ?>
            </tr>

            <tr>
              <th scope="row">Vote</th>
              <?php foreach ($hotels as $key => $hotel) : ?>
                  <td><?= $hotel["vote"] ?></td>
              <?php endforeach ?>
            </tr>

            <tr>
              <th scope="row">Distance_to_center</th>
              <?php foreach ($hotels as $key => $hotel) : ?>
                  <td><?= $hotel["distance_to_center"] ?></td>
              <?php endforeach ?>
            </tr>
            
          </tbody>
        </table>
            </div>
        </body>
        </html>