<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <title>Game of Cities - Grandmaster of Cities</title>
    <meta name="description" content="Intellectual geographic game in cities. Name the city by the last letter of the previous name."/>
    <meta property="og:title" content="Game of Cities - Grandmaster of Cities"/>
<meta property="og:description" content="Intellectual geographic game in cities. Name the city by the last letter of the previous name."/>
<meta property="og:image" content="https://grandcities.pro/img/opengraph.jpg"/>
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
                  <h5 class="card-title">Start playing cities</h5>
                  <p class="card-text">You are playing with the computer, you have to write the city with which letter the name ends.</p>
                  <h2 class="card-title">{{ $cityStart['city'] }}</h2>
            <h2 class="card-title">{{ $cityStart['country'] }} <img src='/img/img/{{ $cityStart['iso2']}}.png' width="25px"></h2>
                  <h1 class="card-title text-success">Name a city starting with the letter {{ $cityStart['bukva'] }}</h1>
                  <form method="post" action="{{ route('startGame') }}">
                    @csrf
                    <input name="bukva" value="{{ $cityStart['bukva'] }}" type="hidden">
                  <button type="submit" name="newSubmit" class="btn btn-success me-3">Send</button>
                  <input autocomplete="off" minlength="2" name="City" type="text" id='City' class="mt-3 me-3" placeholder="City">

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
                  <select name="country">
                    <option value="The whole world">The whole world</option>
                    @foreach($countries as $value)
                    <option value="{{$value->country }}">{{$value->country }}</option>
                    @endforeach
                  </select>
                  <br>
                  <br>
                  <span>Your Name (required to participate in the rating)</span><input autocomplete="off" name='name' type="text">
                  <h3 class="card-title">The computer named the cities:</h3>
                  <p class="card-text">{{ $cityStart['city'] }}</p>
                  <input type="hidden" value="{{ $cityStart['city'] }}" name='computer'>
                  <h3 class="card-title">You named the cities:</h3>
                  <p class="card-text">-</p>
                  </form>
                  <h5 class="card-title mt-5">Rules of the game</h5>
                  <p class="card-text">The computer starts the game with the name of the city, you need to write the city that the last letter ends with. You can't repeat. You can choose the country in which cities you will play.</p>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script>
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
      </script>
@include('footer')
