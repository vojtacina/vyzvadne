@extends('layouts.app')

@section('title', 'Výzva dne')


@section('background', 'light_bg')

@section('header')
    @parent
@endsection





@section('content')

    <div class="container">
        <div class="padding50"></div>
        <h1>Kdo splnil výzvu</h1>
        <p class="lead font-special">{{ $challenge_name }}</p>

        <p class="lead">Na této stránce najdeš jména a příběhy všech lidí, kteří výzvu splnili.</p>
        <p class="svetle splneno ">
            <a href="javascript:history.back()">← Zpět</a>
        </p>
        <div class="row class animate__animated animate__slideInUp">
            <div class="col-md-12 order-md-1 center">
                <h4 class="mb-3">Přehled výzev</h4>
                <div class="cards_container">

                    @forelse($done_challenges as $done_challenge)

                        <div class="card">
                            @if (file_exists(public_path('storage/uploads/'.$done_challenge->media_url)))
                                @if (substr($done_challenge->media_url, -3) == 'jpg' or substr($done_challenge->media_url, -3) == 'png' or substr($done_challenge->media_url, -4) == 'jpeg')
                                    <img class="card-img-top"
                                         src="{{ asset('storage/uploads/'.$done_challenge->media_url) }}">
                                @elseif((substr($done_challenge->media_url, -3) == 'mp4') or (substr($done_challenge->media_url, -2) == 'qt'))
                                    <video class="card-img-top" controls="true" playsinline src="{{ asset('storage/uploads/'.$done_challenge->media_url) }}">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif

                            @endif
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $done_challenge->first_name }} {{ $done_challenge->last_name }}

                                </h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $done_challenge->created_at->format('d. m. Y')}}</h6>
                                <p class="card-text">{{ $done_challenge->story }}</p>
                                {{--                                <h6>Kontakt</h6>--}}
                                {{--                                <p>{{ $done_challenge->first_name }} {{ $done_challenge->last_name }}</p>--}}
                                @if(isset($done_challenge->contact_line))
                                <p class="card-text contact-line">{{ $done_challenge->contact_line }}</p>
                                    @endif
                            </div>
                        </div>

                    @empty
                        Nejsou žádné splněné výzvy
                    @endforelse
                </div>
            </div>
        </div>
    </div>






@endsection
