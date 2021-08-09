<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use App\Http\Resources\Rating as RatingResource;
use Illuminate\Support\Facades\DB;

class CalificacionController extends Controller
{
    public function setrating(Request $request)
    {
        return new RatingResource(Rating::create([
            'receta_id' => $request->get('receta'),
            'user_id' => $request->get('user'),
            'rating' => $request->get('rating')
        ]));
    }

    public function getrating($id)
    {


        return RatingResource::collection(Rating::all()->where('receta_id', $id));
    }

    public function updateRating(Request $request)
    {

        return DB::table('ratings')
            ->where('user_id', $request->get('user'))
            ->update(['rating' => $request->get('rating')]);
    }
}
