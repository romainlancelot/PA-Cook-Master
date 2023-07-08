@extends('layouts.app-master')

@section('title', 'Room Offers')

@section('content')

<style>
.card-group .card {
    margin: 20px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}

.card-group .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.card-group .card img {
    border-radius: 5px 5px 0 0;
}

.card-group .card .card-body {
    padding: 20px;
}

.search-container {
    border-radius: 25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding: 20px;
    margin: 20px auto;
    background-color: white;
    opacity: 60%;
    max-width: 80%;
}

.search-container .form-control,
.search-container .btn {
    border-radius: 15px; 
}
</style>
<section class="container">
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <video class="d-block w-100 h-50" autoplay loop muted>
                    <source src="{{ asset('storage/roomoffers/Cuisine-a-louer.mp4') }}" type="video/mp4">
                </video>
                
                <div class="carousel-caption d-none d-md-block text-center">
                    <div class="row">
                        <h1 class="font-weight-bold mb-3">
                            CUISINE A LOUER
                        </h1>
                        <h2>
                            Location de cuisines équipées pour chefs, entrepreneurs et les passionnés de cuisine 
                        </h2>
                    </div>
                    <div class="row mt-4">
                        <form action="/search" method="GET" class="form-inline mx-auto">
                            <div class="search-container">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <select name="location" class="form-control">
                                            <option value=""> Où ?</option>
                                            <option value="18 rue des Blancs Manteaux Paris">18 rue des Blancs Manteaux Paris</option>
                                            <option value="42 rue de la Gastronomie Paris">42 rue de la Gastronomie Paris</option>
                                            <option value="76 avenue Culinaire Paris">76 avenue Culinaire Paris</option>
                                            <option value="15 rue du Goût Paris">15 rue du Goût Paris</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="date" name="date" class="form-control" placeholder="Sélectionnez une date">
                                    </div>
                                    <button type="submit" class="btn btn-secondary col-md-4">Rechercher</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">

    <div class="row p-5">
        <div class="row p-2">
            <h3 class="text-center text-secondary">Découvrez notre plateforme de location de cuisines pour réaliser vos projets culinaires,</h3>
        </div>
        <div class="row p-2">
            <h3 class="text-center text-secondary">que vous soyez chef, traiteur, formateur ou influenceur.</h3>
        </div>
        <div class="row p-2">
            <h3 class="text-center text-secondary">Louez la cuisine adaptée à vos besoins et donnez vie à vos idées culinaires.</h3>
        </div>
    </div>

</section>

<div class="line">
  <span class="title">Découvrez quelques-unes de nos annonces</span>
</div>

<style>
.line {
  width: 100%;
  text-align: center;
  border-bottom: 2px solid #888;
  line-height: 0.1em;
  margin: 50px 0 30px; /* Ajout d'un espace supplémentaire en bas */
}

.line .title {
  background: #fff;
  font-size: 1.5em;
  color: #666; /* Text color for paragraph text within the card body */
  text-shadow: 1px 1px 1px #ccc;
  font-weight: bold;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
</style>

<style>
    .card {
        transition: 0.3s;
        text-decoration: none; /* Remove underline from links */
        color: inherit; /* Card text color */
    }

    .card:hover {
        cursor: pointer;
    }

    .card:hover #main-image {
        opacity: 0.7; /* Make the image a bit transparent upon hover */
    }

    .card-title {
        color: #4a4a4a; /* Card title color */
        font-weight: bold; /* Card title font weight */
    }

    .card-body p {
        color: #666; /* Text color for paragraph text within the card body */
    }
</style>

<section class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="http://example.com/link-to-page" class="card">
                    <div class="card shadow-sm h-100">
                        <div style="position: relative;">
                            <img id="main-image" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto; object-fit: cover;" src="{{ asset('images/ateliers.jpeg') }}" alt="Equipment Name">
                            <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); color: white; padding: 5px;">100 € /heure</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Equipment Name</h5>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group row">
                                        <div class="col-md-12">
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#babec4}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> 12 rue michel goutier, 94380 Bonneuil sur marne </p>
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#adb3bd}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Surface 25m2. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="http://example.com/link-to-page" class="card">
                    <div class="card shadow-sm h-100">
                        <div style="position: relative;">
                            <img id="main-image" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto; object-fit: cover;" src="{{ asset('images/ateliers.jpeg') }}" alt="Equipment Name">
                            <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); color: white; padding: 5px;">100 € /heure</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Equipment Name</h5>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group row">
                                        <div class="col-md-12">
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#babec4}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> 12 rue michel goutier, 94380 Bonneuil sur marne </p>
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#adb3bd}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>  Surface 25m2. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="http://example.com/link-to-page" class="card">
                    <div class="card shadow-sm h-100">
                        <div style="position: relative;">
                            <img id="main-image" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto; object-fit: cover;" src="{{ asset('images/ateliers.jpeg') }}" alt="Equipment Name">
                            <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); color: white; padding: 5px;">100 € /heure</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Equipment Name</h5>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group row">
                                        <div class="col-md-12">
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#babec4}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> 12 rue michel goutier, 94380 Bonneuil sur marne </p>
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#adb3bd}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Surface 25m2. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="http://example.com/link-to-page" class="card">
                    <div class="card shadow-sm h-100">
                        <div style="position: relative;">
                            <img id="main-image" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto; object-fit: cover;" src="{{ asset('images/ateliers.jpeg') }}" alt="Equipment Name">
                            <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); color: white; padding: 5px;">100 € /heure</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Equipment Name</h5>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group row">
                                        <div class="col-md-12">
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#babec4}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> 12 rue michel goutier, 94380 Bonneuil sur marne </p>
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#adb3bd}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Surface 25m2. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="http://example.com/link-to-page" class="card">
                    <div class="card shadow-sm h-100">
                        <div style="position: relative;">
                            <img id="main-image" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto; object-fit: cover;" src="{{ asset('images/ateliers.jpeg') }}" alt="Equipment Name">
                            <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); color: white; padding: 5px;">100 € /heure</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Equipment Name</h5>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group row">
                                        <div class="col-md-12">
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#babec4}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> 12 rue michel goutier, 94380 Bonneuil sur marne </p>
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#adb3bd}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Surface 25m2. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="http://example.com/link-to-page" class="card">
                    <div class="card shadow-sm h-100">
                        <div style="position: relative;">
                            <img id="main-image" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto; object-fit: cover;" src="{{ asset('images/ateliers.jpeg') }}" alt="Equipment Name">
                            <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); color: white; padding: 5px;">100 € /heure</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Equipment Name</h5>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group row">
                                        <div class="col-md-12">
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#babec4}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> 12 rue michel goutier, 94380 Bonneuil sur marne </p>
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#adb3bd}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Surface 25m2. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="http://example.com/link-to-page" class="card">
                    <div class="card shadow-sm h-100">
                        <div style="position: relative;">
                            <img id="main-image" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto; object-fit: cover;" src="{{ asset('images/ateliers.jpeg') }}" alt="Equipment Name">
                            <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); color: white; padding: 5px;">100 € /heure</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Equipment Name</h5>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group row">
                                        <div class="col-md-12">
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#babec4}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> 12 rue michel goutier, 94380 Bonneuil sur marne </p>
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#adb3bd}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Surface 25m2. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="http://example.com/link-to-page" class="card">
                    <div class="card shadow-sm h-100">
                        <div style="position: relative;">
                            <img id="main-image" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto; object-fit: cover;" src="{{ asset('images/ateliers.jpeg') }}" alt="Equipment Name">
                            <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); color: white; padding: 5px;">100 € /heure</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Equipment Name</h5>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group row">
                                        <div class="col-md-12">
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#babec4}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> 12 rue michel goutier, 94380 Bonneuil sur marne </p>
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#adb3bd}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Surface 25m2. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="http://example.com/link-to-page" class="card">
                    <div class="card shadow-sm h-100">
                        <div style="position: relative;">
                            <img id="main-image" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto; object-fit: cover;" src="{{ asset('images/ateliers.jpeg') }}" alt="Equipment Name">
                            <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); color: white; padding: 5px;">100 € /heure</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Equipment Name</h5>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group row">
                                        <div class="col-md-12">
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#babec4}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> 12 rue michel goutier, 94380 Bonneuil sur marne </p>
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#adb3bd}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Surface 25m2. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<style>
.tab {
  display: flex;
  justify-content: center;
  overflow: hidden;
  border-bottom: 1px solid #ccc;
  background-color: #f1f1f1;
}

.tab button {
  background-color: inherit;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
  color: #000;
}

.tab button:hover {
  background-color: #ddd;
}

.tab button.active {
  color: #4CAF50;
  border-bottom: 2px solid #4CAF50;
}

.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

.tabcontent.active {
  display: block;
}
</style>
<section>
<div class="line">
  <span class="title">Augmentez vos opportunités culinaires</span>
</div>

<div class="tab">
  <button class="tablinks active" onclick="openTab(event, 'Concept')">Notre Concept</button>
  <button class="tablinks" onclick="openTab(event, 'Tarifs')">Tarifs</button>
  <button class="tablinks" onclick="openTab(event, 'Avantages')">Avantages</button>
  <button class="tablinks" onclick="openTab(event, 'Assurance')">Assurance Qualité</button>
</div>

<div id="Concept" class="tabcontent active">
  <h3>Notre Concept</h3>
  <ul>
    <li>Plateforme simple et intuitive pour la réservation d'espaces de cuisine.</li>
    <li>Espaces de cuisine haut de gamme adaptés à divers besoins.</li>
    <li>Idéal pour les cours de cuisine, les fêtes privées et les séances photos culinaires.</li>
  </ul>
</div>

<div id="Tarifs" class="tabcontent">
  <h3>Tarifs</h3>
  <ul>
    <li>Tarification transparente et abordable.</li>
    <li>Prix à partir de 100€ par heure.</li>
    <li>Coût final basé sur la taille de la cuisine, l'équipement disponible et la durée de la réservation.</li>
  </ul>
</div>

<div id="Avantages" class="tabcontent">
  <h3>Avantages</h3>
  <ul>
    <li>Accès à des espaces de cuisine entièrement équipés.</li>
    <li>Disponibilité d'appareils de qualité professionnelle et d'un espace de comptoir ample.</li>
    <li>Cuisines situées dans des emplacements privilégiés pour une accessibilité facile.</li>
    <li>Réservation en quelques clics via notre plateforme conviviale.</li>
  </ul>
</div>

<div id="Assurance" class="tabcontent">
  <h3>Assurance Qualité</h3>
  <ul>
    <li>Rigoureux processus d'inspection pour chaque cuisine répertoriée.</li>
    <li>Assurance que les appareils sont en parfait état et que l'environnement est sanitaire.</li>
    <li>Expérience de qualité garantie.</li>
  </ul>
</div>
</section>

<style>
.ending-statement {
    text-align: center;
    padding: 50px 0;
    background-color: #f5f5f5;
}

.ending-statement h1 {
    font-size: 2.5em;
    font-weight: bold;
    color: #555
}

.ending-statement h2 {
    font-size: 2em;
    color: #666;
}

.ending-statement h3 {
    font-size: 1.5em;
    color: #999;
}

.ending-statement .heart {
    color: #ddd;
}

</style>

<section calsee="container">
<div class="ending-statement">
    <h1>Louez votre cuisine</h1>
    <h2>en toute confiance</h2>
    <h3>où que vous soyez<span class="heart">🤍</span></h3>
</div>
</section>

<script>
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("active");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.classList.add("active");
}

// Call the function with the default tab
document.addEventListener("DOMContentLoaded", function() {
  document.querySelector(".tablinks.active").click();
});

</script>
@endsection

