<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <title>Cities of the {{$name->country}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
</head>

@include('menu')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fw-bold text-success bg-white">Cities of the {{$name->country}}</h1>
                <a href='/'><button type='button' id='newGame' class="btn btn-warning mb-1">New Game</button></a>
                <div class="row">
                    @foreach($country as $value)

                        <div class="col-sm-3 mb-1">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{$value->city_ascii}}</h5>
                                    <p class="card-text">{{$value->country}}, <img src="/img/img/{{$value->iso2}}.png" width="25px"/></p>
                                    <p class="card-text">{{$value->admin_name}}</p>
                                    <p class="card-text"><?php echo number_format($value->population, 0, ',', ' ');?> people</p>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-sm-12 text-center">
                        {!! $country->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>





                    </div>
                </div>
            </div>
            @include('footer')
