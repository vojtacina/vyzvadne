<?php

use Illuminate\Support\Facades\Route;
use App\Models\Challenges;
use App\Models\DoneChallenges;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $current_day = date('z') + 1;
    $challenge_row = Challenges::all()->where('day', $current_day)->first();

    return view('home', [
        'today_challenge' => $challenge_row
    ]);
});

Route::get('/random', function () {
    return view('random');
})->name('random_challenge');

Route::get('/zobrazit-vyzvy', function () {
    return view('login');
})->name('login');

Route::post('/send', function (Request $request) {
    $current_day = date('z') + 1;
    $challenge_row = Challenges::all()->where('day', $current_day)->first();


    // File upload
    if (!$request->hasFile('file')) {
        $storageName = null;
    }
    else {
        $file = $request->file('file');
        $storageName = basename(Storage::put('/public/uploads', $file));
    }

    // Database write
    $challenge_id = $request->input('challenge_id');
    $secret_id = Challenges::all()->where('id', $challenge_id)->first()->secret_id;

    foreach(DoneChallenges::all()->where('nickname', $request->input('nickname')) as $one) {
        if($one->secret_id == $secret_id) {
            return view('home', [
                'today_challenge' => $challenge_row,
                'alert' => "Již jsi tuto výzvu splnil(a)",
                'alert_type' => 'negative'
            ]);
        }
    }


    $done_challenge = new DoneChallenges();
    $done_challenge->secret_id = $secret_id;
    $done_challenge->first_name = $request->input('first_name');
    $done_challenge->last_name = $request->input('last_name');
    $done_challenge->nickname = $request->input('nickname');
    $done_challenge->story = $request->input('challenge_text');
    $done_challenge->media_url = $storageName;
    $done_challenge->contact_line = $request->input('contact');;
    $done_challenge->save();

    return view('home', [
        'today_challenge' => $challenge_row,
        'alert' => "<strong>Díky za splnění výzvy!</strong> Můžeš se nyní podívat na všechny své splněné výzvy a také na to, jak plnili výzvu ostatní.",
        'alert_type' => ''
    ]);
})->name('new_done_challenge');

Route::get('/splnena-vyzva/{id}', function ($id) {

    $current_day = date('z') + 1;
    $challenge_row = Challenges::all()->where('day', $current_day)->first();

    if ($current_day == $id) {
        $challenge_name = Challenges::all()->where('day', $id)->first()->challenge_name;

        return view('new_record', [
            'challenge_id' => $id,
            'challenge_name' => $challenge_name
        ]);
    } else {
        return view('home', [
            'today_challenge' => $challenge_row,
            'alert' => " <strong>Nepodváděj!</strong> Dnes tuto výzvu nelze splnit. Výzvy je možné plnit jen ve dny, kdy jsou aktuální.",
            'alert_type' => 'negative'
        ]);
    }

});

Route::get('/splnene-vyzvy/{nickname}', function ($nickname) {

    $challenges = DoneChallenges::all()->where('nickname', $nickname)->sortByDesc('created_at');
    $first = DoneChallenges::all()->where('nickname', $nickname)->sortByDesc('created_at')->first();
    $all_challenges = Challenges::all();

    return view('done', [
        'done_challenges' => $challenges,
        'challenges' => $all_challenges,
        'nickname' => $nickname,
        'first' => $first
    ]);

});
Route::get('/vyzva/{secret_id}', function ($secret_id) {

    $challenges = DoneChallenges::all()->where('secret_id', $secret_id)->sortByDesc('created_at');
    $first = DoneChallenges::all()->where('secret_id', $secret_id)->sortByDesc('created_at')->first();
    $all_challenges = Challenges::all();
    $name = Challenges::all()->where('secret_id', $secret_id)->first()->challenge_name;

    return view('whoelse', [
        'done_challenges' => $challenges,
        'challenges' => $all_challenges,
        'challenge_name' => $name,
        'first' => $first
    ]);

});
