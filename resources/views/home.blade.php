@extends('layouts.app')
@section('content')
    <div class="col-md-12 justify-content-center">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body bg-light text-success text-center">
                <h2><b>Welcome to my Blog<b></h2>
            </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class=" carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            </ol>
            <div class="carousel-inner" style="height:500px ;border: 5px,">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/posts/1617057955.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/posts/1617059720.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/posts/1617059931.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/posts/1617060103.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/posts/1617060319.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/posts/1617060538.jpg">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection
