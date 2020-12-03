@extends('layouts.app')

@section('title', 'Výzva dne')


@section('background', 'light_bg')

@section('header')
    @parent
@endsection





@section('content')

    <div class="container">
        <div class="padding50"></div>
        <h1>Moje splněné výzvy</h1>

        <p class="lead">Na této stránce najdeš všechny výzvy, které <strong>{{ $nickname }}</strong>
            @if(isset($first->first_name) and isset($first->last_name))
                ({{$first->first_name }} {{ $first->last_name }})
            @endif
            splnil(a).</p>
        <p class="svetle splneno ">
            <a href="{{ route('login') }}">← Zpět na zadání přezdívky</a>
        </p>
        <div class="row class animate__animated animate__slideInUp">
            <div class="col-md-12 order-md-1 center">
                <h4 class="mb-3">Přehled výzev</h4>
                <div class="cards_container">

                    @forelse($done_challenges as $done_challenge)

                        <div class="card" style="width: 400px;">
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
                                <h5 class="card-title font-special">
                                    @foreach($challenges as $this_challenge)
                                        @if($this_challenge->secret_id == $done_challenge->secret_id)
                                            {{ $this_challenge->challenge_name }}
                                        @endif
                                    @endforeach

                                </h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $done_challenge->created_at->format('d. m. Y')}}</h6>
                                <p class="card-text">{{ $done_challenge->story }}</p>
                                {{--                                <h6>Kontakt</h6>--}}
                                {{--                                <p>{{ $done_challenge->first_name }} {{ $done_challenge->last_name }}</p>--}}
                                {{--                                <p>{{ $done_challenge->contact_line }}</p>--}}
                                <a href="/vyzva/{{ $done_challenge->secret_id }}" class="card-link">Kdo další ještě splnil výzvu?</a>
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
