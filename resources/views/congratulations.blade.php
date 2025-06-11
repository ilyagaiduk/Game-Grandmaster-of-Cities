<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <title>Congratulations!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.6.3.js"
    integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous">
  </script>
</head>
@include('menu')
    <div class="container">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8 text-center">

            <div class="card">
                <div class="card-header bg-success text-white">
                    <a href="{{ route('index') }}"><button type='button' id='newGame' class="btn btn-warning mt-3 mb-3 me-3">New game</button></a>
                </div>
                <div class="card-body">
                  <h1 class="card-title text-success">Congratulations! You beat the computer!</h1>
                  <br>
                  <br>
                  <h3 class="card-title">The computer named the cities:</h3>
                  <?php
                  $dataComputer = [];
                  $compData = explode(", ", $computer);
                  foreach($compData as $value) {
                    $dataComputer[] = $value;
                  }
                  $computer = implode(", ", $dataComputer);
                  ?>
                  <?php
                  $dataCity = [];
                  $cityData = explode(", ", $CityData);
                  foreach($cityData as $value) {
                    $dataCity[] = $value;
                  }
                  $dataCity[] = $city;
                  if (($key = array_search("", $dataCity)) !== false) {
    unset($dataCity[$key]);
}
                  $cities = implode(", ", $dataCity);
                  ?>
                  <p class="card-text">{{ $computer }}</p>
                  <input type="hidden" value="{{ $computer }}" name='computer'>
                  <h3 class="card-title">You named the cities:</h3>
                  <p class="card-text">{{ $cities }}</p>
                  <input type="hidden" value="{{ $cities }}" name='CityData'>
                  <h3 class="card-title">{{ $name }}, you scored <span class="text-success">{{ $score }}</span> points.</h3>
                  <input type="hidden" value="{{ $score + 2}}" name='score'>
                  <input type="hidden" value="{{ $name }}" name='name'>
                  </form>
                    </div>
              </div>
            </div>
        </div>
    </div>
    @include('footer')
