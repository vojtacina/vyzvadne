@extends('layouts.app')

@section('title', 'Výzva dne')


@section('background', 'light_bg')

@section('header')
    @parent
@endsection



@section('content')

    <div class="container">
        <div class="padding50"></div>
        @if(isset($alert))
            @if(isset($alert))
                <div class="alert {{ $alert_type }}">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    {!! $alert !!}
                </div>
            @endif
        @endif
        <h1>Výzva dne</h1>
        <div class="svetle animate__animated animate__bounceIn" id="skutek">{{ $today_challenge->challenge_name }}</div>

        <p class="svetle">
            Udělej dnes něco <strong>skvělého</strong> a měj ze sebe dobrý pocit!
        </p>
        <p class="svetle splneno animate__animated animate__pulse animate__delay-1s">
            <a href="{{ url('splnena-vyzva/'.$today_challenge->day) }}"><span><img class="check"
                                                                                   src="{{ asset('/images/check.svg') }}"></span>Splněno?</a>
        </p>
        <center><a href="https://www.instagram.com/vyzvadne/"><i class="fa fa-instagram"
                                                                 style="font-size:24px; color: #a28300;"></i></a>
        </center>


        <div id="skutek"></div>
        <br><br><br>
        <div id="license">
            Web vytvořil Vojtěch Cina<br>© {{ date("Y") }}
        </div>
        <div id="menu">Výzva dne / <a href="{{route('login')}}">Moje výzvy</a></div>
    </div>
    <br><br><br><br>



@endsection
