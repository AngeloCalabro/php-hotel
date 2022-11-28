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

if(isset($_GET['parking']) && !empty($_GET['parking'])){
    // var_dump(($_GET));
    $temp = [] ;
    foreach($hotels as $item){
        if($item['parking'] == $_GET['parking']){
            $temp[] = $item;
        }
    };

    $hotels = $temp;
    // var_dump($hotels);
};

if(isset($_GET['vote']) && !empty($_GET['vote'])){
    // var_dump(($_GET));
    $hotels = array_filter($hotels, fn($value)=> $value['vote'] >= $_GET['vote']);
};

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Link StyleScss -->
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <form action="index.php" method="GET"
        class="text-center p-5 d-flex justify-content-center align-items-center row g-0">
        <select class="col-lg-6 form-control m-1 w-25" name="parking" id="parking">
            <option value="" selected>Tutti</option>
            <option value="parking">Parking</option>
        </select>
        <select class="col-lg-6 form-control m-1 w-25" name="vote" id="vote">
            <option value="" selected>Seleziona voto</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit" class="col-lg-3 btn btn-success m-1">Invia</button>
    </form>

    <section>
        <table class="table table-hover table-striped-columns table-bordered w-75 m-auto text-center align-middle">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza dal centro</th>
                    <th scope="col">Nr° parcheggi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach($hotels as $item){ ?>
                <tr>
                    <td><?php echo $item['name'] ?></td>
                    <td><em><?php echo $item['description'] ?></em></td>
                    <td><?php echo $item['vote'] ?></td>
                    <td><?php echo $item['distance_to_center'] ?> km</td>
                    <td><?php echo $item['parking'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <section class="mt-5">
        <div class=" container row g-0 m-auto">
            <?php foreach($hotels as $item){ ?>
            <div class="card col-4 text-center">
                <div class="text-center fw-bold"><?php echo $item['name'] ?></div>
                <div><img class="img-fluid" src="https://picsum.photos/id/142/4272/2848" alt="foto hotel"></div>
                <div><em><?php echo $item['description'] ?></em></div>
                <div class="text-center">Voto: <?php echo $item['vote'] ?></div>
                <div><?php echo $item['distance_to_center'] ?> km</div>
            </div>
            <?php
            } ?>

        </div>

    </section>

</body>

</html>