@extends('layouts.app')

@section('title', 'Výzva dne')


@section('background', 'light_bg')

@section('header')
    @parent
@endsection





@section('content')

    <div class="container">
        <div class="padding50"></div>
        <h1>Moje výzvy</h1>

        <p class="lead">Zadej svou přezdívku a zobraz si splněné výzvy. Také se můžeš snadno podívat na to, kdo další
            stejnou výzvu splnil.</p>
        <p class="svetle splneno ">
            <a href="/">← Zpět na výzvu dne</a>
        </p>


        <div class="row class animate__animated animate__slideInUp">
            <div class="col-md-12 order-md-1">


                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="nickname">Přezdívka</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ID</span>
                            </div>
                            <input type="text" class="form-control" id="nickname" name="nickname"
                                   placeholder="Přezdívka" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Vyžadováno
                            </div>
                        </div>
                    </div>

                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block"
                        onclick="location.href='/splnene-vyzvy/'+ document.getElementById('nickname').value">Zobrazit
                </button>

            </div>
        </div>
    </div>



@endsection
