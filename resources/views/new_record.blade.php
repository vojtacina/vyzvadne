@extends('layouts.app')

@section('title', 'Výzva dne')


@section('background', 'light_bg')

@section('header')
    @parent
@endsection





@section('content')

    <div class="container">
        <div class="padding50"></div>
        <h1>Zapsat splněnou výzvu</h1>

        <p class="lead">Gratulujeme ti ke splnění této výzvy! Poděl se o to, jak jsi ji splnil(a). Po odeslání budeš
            mít možnost si prohlédnou i další příběhy jiných lidí k této výzvě</p>
        <p class="lead">Zapamatuj si přezdívku, kterou vyplníš a můžeš se kdykoliv přijít podívat, jestli někdo
            další tuto výzvu také splnil.</p>
        <p class="lead">Tvá výzva byla:</p>
        <p class="lead font-special">{{ $challenge_name }}</p>
        <p class="svetle splneno ">
            <a href="/">← Zpět na výzvu dne</a>
        </p>


        <div class="row class animate__animated animate__slideInUp">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Podrobnosti</h4>
                <form class="needs-validation" action="{{ route('new_done_challenge') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Jméno</label>
                            <input type="text" name="first_name" class="form-control" id="firstName" placeholder=""
                                   value="" required>
                            <div class="invalid-feedback">
                                Povinné
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Příjmení</label>
                            <input type="text" name="last_name" class="form-control" id="lastName" placeholder=""
                                   value="" required>
                            <input style="display: none" type="text" name="challenge_id" class="form-control"
                                   id="challenge_id" placeholder="" value="{{ $challenge_id }}">
                            <div class="invalid-feedback">
                                Povinné
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Tvůj identifikátor</label>
                        <small>Pod touto přezdívkou si budeš moci zobrazit své již splněné výzvy</small>
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

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1">Jaké bylo plnění výzvy? Poděl se prosím zde. 🙃</label>
                        <textarea name="challenge_text" class="form-control" id="challenge_text" rows="6"
                                  required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="customFile">Ukaž, jak jsi výzvu splnil(a). Fotkou nebo videem.</label>
                        <small>(jpg, jpeg, png, mp4, mov, qt | max 2MB)</small>
                        <div class="custom-file">
                            <input name="file" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Vybrat soubor...</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Kontakt na tebe <span class="text-muted">(Nepovinné)</span></label>
                        <small>Pokud chceš ostaním umožnit se s tebou spojit, nech na sebe kontakt (email, Instagram,
                            apod.)</small>
                        <input name="contact" type="text" class="form-control" id="address2"
                               placeholder="Jak tě můžou ostatní kontaktovat?">
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Odeslat 🤗</button>
                </form>
            </div>
        </div>
    </div>



@endsection
