<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function store(Request $request)
    {
        try{
            $hero = new Hero();
            $hero->name = $request->name;
            $hero->origin = $request->origin;
            $hero->date_of_birth = $request->date_of_birth;
            $hero->date_of_death = $request->date_of_death;
            $hero->description = $request->description;
            if($hero->save()){
                return response()->json([
                    'success' => true,
                    'data'    => $hero
                ], 200);
            }
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e
            ], 403);
        }
    }

    public function get_heroes()
    {
        $heroes = Hero::get();
        if(!$heroes){
            return response()->json([
                'success' => false,
                'data'    => ''
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data'    => $heroes
        ], 200);
    }
    
    public function get_hero($id)
    {
        $hero = Hero::find($id);
        if(!$hero){
            return response()->json([
                'success' => false,
                'data'    => ''
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data'    => $hero
        ], 200);

    }

    public function update(Request $request, $id)
    {
        try{
            $hero = Hero::find($id);
            $hero->name = $request->name;
            $hero->origin = $request->origin;
            $hero->date_of_birth = $request->date_of_birth;
            $hero->date_of_death = $request->date_of_death;
            $hero->description = $request->description;
            if($hero->save()){
                return response()->json([
                    'success' => true,
                    'data'    => $hero
                ], 200);
            }
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e
            ], 403);
        }
    }

    public function delete($id)
    {
        try{
            $hero = Hero::find($id);
            if($hero->delete()){
                return response()->json([
                    'success' => true,
                    'message' => "Selected data has been deleted."
                ], 200);
            }
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e
            ], 403);
        }
    }
}
