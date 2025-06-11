<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <title>Countries of the world</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
</head>

@include('menu')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fw-bold text-success bg-white">Countries of the world</h1>
                <a href='/'><button type='button' id='newGame' class="btn btn-warning mb-1">New Game</button></a>
                <div class="row">
                    @foreach($countries as $value)

                        <div class="col-sm-3 mb-1">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{$value->country}}, <img src="/img/img/{{$value->iso2}}.png" width="25px"/></h5>


                                    <a href="/cities/country/{{$value->iso2}}" class="btn btn-success">more info</a>


                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>





                    </div>
                </div>
            </div>
            @include('footer')
