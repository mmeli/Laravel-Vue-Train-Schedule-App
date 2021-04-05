<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use Illuminate\Support\Carbon;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Route::orderBy('created_at','DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request["departure"] = Carbon::parse($request["departure"]);
        // $request["arrival"] = Carbon::parse($request["arrival"]);
        // //store routes
        // $route = Routes::create($request->all());
        // return response('Route Creared', 201);

        $newRoute = new Route();
        $newRoute->from = $request->route["from"];
        $newRoute->to = $request->route["to"];;
        $newRoute->departure = $request->route["departure"];;
        $newRoute->arrival = $request->route["arrival"];

        $newRoute->save();

        return $newRoute;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingRoute = Route::find($id);
        $existingRoute->update($request->all());

        return response()->json('Route updated!');
        
        // $existingRoute = Route::find($id);
        // if($existingRoute){
        //     $existingRoute->completed = $request->route['completed'] ? true : false;
        //     $existingRoute->completed_at = $request->route['completed'] ? Carbon::now() : null;
        //     $existingRoute->save();
        //     return $existingRoute;
        // }

        // return "Item not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $existingRoute = Route::find($id);

        if ($existingRoute) {
            $existingRoute->delete();
            return response('Route successfully deleted', 200);
        }

        return response("Failed to delete", 401);
    }

    public function locations()
    {
        //store properly for production

        return [
            "Park",
            "Rosebank",
            "Sandton",
            "Marlboro",
            "Midrand",
            "Centurion",
            "Pretoria",
            "Hatfield",
            "Rhodesfield",
            "OR Tambo"
        ];
    }
}
