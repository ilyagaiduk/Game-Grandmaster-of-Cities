<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <title>Grandmaster of Cities Player Rankings</title>
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
                        <h1 class="card-title text-success">Grandmaster of Cities Player Rankings</h1>

                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Player</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <?php
                            $x = 1;
                            ?>
                            @foreach($rating as $value)
                                <tr>
                                    <td>
                                        {{ $x++ }}
                                    </td>
                                    <td>
                                        {{ $value->name }}
                                    </td>
                                    <td>
                                        {{ $value->score }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <br>
                        <a href='/'><button type='button' id='newGame' class="btn btn-warning me-3">New game</button></a>
                    </div>
                </div>
            </div>
@include('footer')
