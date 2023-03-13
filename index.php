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

    $filter_vote = $_GET["filter_vote"] ?? ""; //se non specificato prendi il valore vuoto
    $filter_vote_invalid = false;
    if($filter_vote > 5 || $filter_vote < 0){//mi assicuro che l'input sia valido solo se compreso tre 0 e 5
      $filter_vote = 0;
      $filter_vote_invalid = true;
    }

   
   
    $filter_parking = (bool) $_GET["filter_parking"] ?? "both"; //se non specificato prendi both, mettendo (bool) modifico la variabile in un valore booleano
    
    if($filter_parking !== "both"){
      $filter_parking = (bool) $filter_parking; //trasformo in booleano solo se strettamente diverso da both
    }

    $filtered_hotels = $hotels; //è buona norma non usare i dati originali, così ho una copia dell'array originale, sono 2 elementi diversi

//se non è vuoto filtro per voto
    if(!empty($filter_vote)){
      $temp_hotels = []; //array temporaneo dove mettere gli elementi filtrati

      foreach($filtered_hotels as $hotel) { //ciclo tutti gli elementi
        if($hotel["vote"] >= $filter_vote){ //se il voto dell hotel è maggiore del mio voto minimo
          $temp_hotels[] = $hotel; //allora lo inserisco nell'array
        }
      }

      $filtered_hotels = $temp_hotels; //metto gli hotel che rispettano le condizioni in quelli filtrati
    }


//se non è both filtro per parcheggio
    if($filter_parking !== "both"){//disuguaglianza stretta per questo si usa !==
      $temp_hotels = []; //array temporaneo dove mettere gli elementi filtrati

      foreach($filtered_hotels as $hotel) { //ciclo tutti gli elementi
        if($filter_parking === $hotel["parking"]){ //se il valore del parking è uguale 
          $temp_hotels[] = $hotel; //allora lo inserisco nell'array
        }
      }

      $filtered_hotels = $temp_hotels; //metto gli hotel che rispettano le condizioni in quelli filtrati
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>
    <div class="container">

        <h1 class="my-5">Gestione Hotel</h1>

        <section class="row my-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Filtro hotel
                    </div>
                    <div class="card-body">
                        <form method="GET" class="row">

                            <div class="col-9 mb-3">
                                <label for="filter_vote" class="form-label">Voto minimo</label>
                                <input type="number" class="form-control"
                                    <?= $filter_vote_invalid ? "is-invalid" : "" ?> id="filter_vote" name="filter_vote"
                                    min="0" max="5" value="<?= $filter_vote ?>">

                                <?php if($filter_vote_invalid) : ?>
                                <div id="filter_vote_feedback" class="invalid-feedback">Errore, ritenta.
                                </div>
                                <?php endif ?>
                            </div>

                            <div class="col-3 mb-3">
                                <!-- nei radio button devo avere il NAME uguale per poterli selezionare univocamente, CHECKED tiene selezionato di partenza-->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="filter_parking"
                                        id="filter_parking_0" <?= $filter_parking === true ? "checked" : "" ?>>
                                    <label class="form-check-label" for="filter_parking_0">
                                        Con parcheggio.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="filter_parking"
                                        id="filter_parking_1" <?= $filter_parking === false ? "checked" : "" ?>>
                                    <label class="form-check-label" for="filter_parking_1">
                                        Senza parcheggio.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="both" name="filter_parking"
                                        id="filter_parking_both" <?= $filter_parking === "both" ? "checked" : "" ?>>
                                    <label class="form-check-label" for="filter_parking_both">
                                        Entrambi.
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary">
                                    Filtra il form
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>


        <section class="row my-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Elenco hotel scelti
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Parking</th>
                                    <th scope="col">Vote</th>
                                    <th scope="col">Distance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($filtered_hotels as $key => $hotel ) : ?>
                                <!-- Qui sto stampando gli hotel filtrati -->
                                <tr>
                                    <!-- col ciclo vado a pescare tutti i valori dell'array che mi servono cambiando il nome della chiave -->
                                    <!-- i valori di key essendo impliciti di default hanno 0, 1, 2... Quindi metto +1 perchè parto da 1 -->
                                    <th scope="row"><?= $key+1 ?></th>
                                    <td><?= $hotel["name"] ?></td>
                                    <td><?= $hotel["description"] ?></td>
                                    <!-- Operatore ternario per sostituire i valori 0/1 dell'array con yes/no -->
                                    <td><?= $hotel["parking"] ? "Yes" : "No" ?></td>
                                    <td><?= $hotel["vote"] ?></td>
                                    <td><?= $hotel["distance_to_center"] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
    </div>



    </div>
</body>

</html>