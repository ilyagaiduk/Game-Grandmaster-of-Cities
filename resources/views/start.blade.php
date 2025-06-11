<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <title>Start game</title>
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
            <div class="col-xs-12 text-center">

            <div class="card">
                <div class="card-header bg-success text-white">
                    <a href="{{ route('index') }}"><button type='button' id='newGame' class="btn btn-warning mt-3 mb-3 me-3">New game</button></a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">The game has begun! You are playing cities {{ $country }}</h5>
                  <p class="card-text">You are playing with the computer, you have to write the city with which letter the name ends</p>
                  <h2 class="card-title">{{ $cityStart['city'] }}</h2>
            <h2 class="card-title">{{ $cityStart['country'] }} <img src='/img/img/{{ $cityStart['iso2']}}.png' width="25px"></h2>
                  <h1 class="card-title text-success">Name the city starting with the letter {{ $cityStart['bukva'] }}</h1>
                  <form method="post" action="{{ route('startGame') }}#newGame" id="js-form-validate">
                    @csrf
                    <input name="bukva" value="{{ $cityStart['bukva'] }}" type="hidden">
                  <div class="some-form__line">
                  <input autocomplete="off" min="2" name="City" type="text" id='City' class="mt-3 me-3 required" placeholder="City">
                  </div>
                  <div class="some-form__submit">
                    <button type="submit" name="newSubmit" class="btn btn-success mt-3 mb-3me-3">Send</button>
                      </div>

                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                  <h5 class="card-title">Select country</h5>
                  <select name="country" style="width:auto">
                    <option value="The whole world">The whole world</option>
                    @foreach($countries as $value)
                    <option @if($value->country == $country) selected="selected" @endif value="{{$value->country }}">{{$value->country }}</option>
                    @endforeach
                  </select>
                  <br>
                  <br>
                  <h3 class="card-title">The computer named the cities:</h3>
                  <?php
                  $dataComputer = [];
                  $compData = explode(", ", $computer);
                  foreach($compData as $value) {
                    $dataComputer[] = $value;
                  }
                  $dataComputer[] = $cityStart['city'];
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
                  <input type="hidden" value="{{ $timestamp }}" name='timestamp'>
                  </form>
                    </div>
              </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
    $("#newGame").on("click", function(){

        if (confirm("Are you sure you want to start a new game?")) {
       return true;

    } else {

        return false;

    }


    });
});

$('#City').on('keyup', function() {
     if (this.value.length == 1) {
        let letter = $('#City').val()
        letter = letter.toUpperCase();
       let bukva = "<?php echo $cityStart['bukva']; ?>"
        if(letter != bukva) {
            alert('You started entering the city with the wrong letter! Start with the letter ' + bukva )
            $('#City').val('')
        }

     }
});
$('#City').bind('keyup blur',function() {
    $(this).val($(this).val().replace(/[^a-z\s'-]/gi, ""))
        });



        $('#js-form-validate').submit(function(e) {
    var textInput = $('.required').val();
    if (textInput.length === 0 || textInput.length == 1) {
        e.preventDefault();
        alert('The City field is empty or contains 1 character. Enter a city.');
    }
    // В противном случае, форма будет отправлена.
        });

</script>
