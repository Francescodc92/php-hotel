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
  $filterParcking = (($_GET['parcking'] ?? 'off') == 'on') ? true : false;
  $filterVote = (int) ($_GET['vote'] ?? '0');
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!--style css-->
  <link rel="stylesheet" href="./CSS/style.css">
  
  <title>PHP Hotel</title>
</head>
<body class="index-body">
    <div class="container">
      <h1 class="text-center mt-5">Hotel</h1>
      <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="parcking" name="parcking" <?= $filterParcking ? 'checked' : '' ?> >
            <label class="form-check-label" for="parcking">Hotel con parcheggio</label>
          </div>
          <select class="form-select mb-3" name="vote">
            <option <?= $filterVote == 0 ? 'selected' : '' ?> value="0">voto</option>
            <option <?= $filterVote == 1 ? 'selected' : '' ?> value="1">voto uguale o superiore 1 </option>
            <option <?= $filterVote == 2 ? 'selected' : '' ?> value="2">voto uguale o superiore 2</option>
            <option <?= $filterVote == 3 ? 'selected' : '' ?> value="3">voto uguale o superiore 3</option>
            <option <?= $filterVote == 4 ? 'selected' : '' ?> value="4">voto uguale o superiore 4</option>
            <option <?= $filterVote == 5 ? 'selected' : '' ?> value="5">voto uguale a 5</option>
          </select>
        <button type="submit" class="btn btn-primary">Filtra</button>
      </form>
      <!--end filter form-->
      <table class="table table-bordered mt-5">
        <thead>
          <tr>
            <?php foreach ($hotels[0] as $key => $value) { ?>
              <th>
                  <?= $key ?> 
              </th>        
            <?php
              }
            ?>
             
          </tr>
        </thead>
        <!--end table head-->
        <tbody>
          <?php 
            foreach ($hotels as $hotel) { 
          ?>
            <tr>
              <?php 
                foreach ($hotel as $key => $data) { 
              ?>
              <?php 
                if (($hotel['parking'] == $filterParcking || $filterParcking == false) && $hotel['vote'] > $filterVote ) {
              ?>
                  
                  <td>
                    <?php 
                      if ($data == 1 && $key == 'parking') {
                    
                        echo "Si" ;
                    
                      }elseif($data == "" && $key == 'parking') {
                      
                        echo "No";
                      
                      }elseif($key == 'distance_to_center'){
    
                        echo '<strong>'.$data.'</strong> km';
                      
                      }elseif($key == 'name'){
                    
                        echo '<strong class="text-danger">'.$data.'</strong>';
                    
                      }else{
                    
                        echo $data;
                    
                      }
                    ?>
                  </td>
              <?php
                }
              ?>
              <?php
                }
              ?>
            </tr>
          <?php
            }
          ?>
        </tbody>
        <!--end table body-->
      </table>
      <!--end table hotel list-->
    </div>
    <!--end container-->
</body>
</html>

