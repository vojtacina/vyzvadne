@extends('layouts.app')

@section('title', 'Výzva dne')


@section('background', 'light_bg')

@section('header')
    @parent
@endsection



@section('content')

    <div id="skutek"></div>

    <p>
        Udělej <strong>cokoliv</strong>, co se ti zalíbí!
    </p>


    <div style="display:none;"><div style="clear: both; left: 0; margin: 0;  width: 100%; "><div style="margin: 5px; border-radius: 4px; background: #fff; color: #000; font-family: sans-serif; font-size: 14px; font-weight: normal; border: 1px solid #999; text-align: center;"><span style="margin: 5px 0 5px 0; display: inline-block; padding-left: 125px; background: url(https://www.endora.cz/images/icon.png) no-repeat left center; text-align: left;"><b style="font-weight: bold;">Získejte registraci domén s tld .online, .space, .store, .tech zdarma!</b><br>Stačí si k jedné z těchto domén vybrat hosting Plus nebo Mega a registraci domény od nás dostanete za 0 Kč!</span><a style="margin: 9px 0 5px 30px; vertical-align: top; text-decoration: none; font-weight: bold; display: inline-block; color: white; background-color: #1ca2e1; border-radius: 3px; padding: 5px 10px;" href="https://www.endora.cz/objednavka/objednat?utm=kafo&program=plus&order-tld=online" target="_blank">Objednat</a></div></div></endora></div>

    <center><button id="cudlik" onclick="nahoda()"><strong>Vygeneruj !</strong></button></center>

    <div id="skutek"></div>
    <br><br><br><div id="license">
        Web vytvořil Vojtěch Cina<br>© 2019

    </div>
    <div id="menu"><a href="/">Výzva dne</a> / Náhodná výzva </div>



@endsection
