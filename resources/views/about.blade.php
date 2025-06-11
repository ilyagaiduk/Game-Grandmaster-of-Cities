<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <title>About Grandmaster of Cities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
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
                        <h1 class="card-title text-success">About Grandmaster of Cities</h1>
                        <p>The city game is a classic intellectual game that has gained popularity in many countries. It is
                        not only a great way to spend time with friends or family, but also an opportunity to expand
                        your geographical knowledge. In this article, we will discuss the rules of the game, its
                        features, and the benefits for participants.</p>

                        <h2 class="card-title text-success">Rules of the Game</h2>

                        <p>The rules of the city game are quite simple and easy to understand:</p>

                        <ol><li>Choosing a Country: To start the game, participants can choose a specific country or play
                        with city names from around the world. This depends on the participants' level of preparation
                        and their desire to explore the geography of a particular region.</li>

                        <li>Starting the Game: The computer starts the game by naming the first city, for example,
                        "New York."</li>

                        <li>Continuation: The player must name a city that begins with the last letter of the
                        previous city. In this case, that letter is "k," so the player might say "Krasnodar."</li>

                        <li>No Repetitions: A city that has already been mentioned cannot be repeated. This adds an
                        element of complexity and stimulates participants' memory.</li>

                        <li>End of the Game*: The game continues until one of the players can no longer name a new
                        city. The winner is the one who names the last city.</li></ol>

                        <h2 class="card-title text-success">Features of the Game</h2>

                       <ul><li>City Database: The game is supported by an extensive database of cities by country. This
                        allows players to choose cities from a specific country or play on an international level. Such
                        a database helps avoid errors and makes the game more dynamic.</li>

                        <li>Variety of Options: The ability to choose a country or play with cities from different
                        parts of the world makes each game unique. This allows the game to be adapted to the
                        participants' level of knowledge.</li>

                        <li>Educational Element: The city game develops memory, broadens horizons, and helps memorize
                        geographical names. It's an excellent way to learn about new cities and countries in a playful
                        manner.</li>

                        <h2 class="card-title text-success">Benefits of the Game</h2>

                        <p>The city game is not only a fun pastime but also a beneficial activity. It promotes the
                        development of cognitive skills such as memory, attention, and quick reaction. In addition, it
                        helps discover new facts about our planet and its geography.</p>

                        <p> The city game is a wonderful way to spend time usefully, enhancing your knowledge of geography
                        and training your memory. Thanks to its simple rules and the ability to choose the level of
                        difficulty, it is suitable for people of all ages. So gather with friends or family and embark
                        on an exciting journey through the cities of the world!</p>



                        <a href='/'><button type='button' id='newGame' class="btn btn-warning me-3">New Game</button></a>
                    </div>
                </div>
            </div>
            @include('footer')
