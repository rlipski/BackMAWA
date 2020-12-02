<?php

namespace App\Http\Controllers\api\mawa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return  Advertisement::all();
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
          $this->validate($request, [
            'name' => 'required|min:4',
            'description' => 'required|min:10',
            'phone' => 'unique:advertisement,phone,',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'location' => 'required|min:4',
            'importance' =>'required|min:1',
        ]);

        $adv = Advertisement::create([
            'name' => $request->name,
            'description' => $request->description,
            'phone' => $request->phone,
            'location' => $request->location,
            'price' => $request->price,
            'importance' => $request->importance,
           
        ]);

        return response()->json(['created' => $adv], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  Advertisement::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return  Advertisement::find($id);
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
         $this->validate($request, [
            'name' => 'required|min:4',
            'description' => 'required|min:10',
            'phone' => 'unique:advertisement,phone,',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'location' => 'required|min:4',
            'importance' =>'required|min:1',

            ]); 
            $advertisement = Advertisement::whereId($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'phone' => $request->phone,
                'location' => $request->location,
                'price' => $request->price,
                'importance' => $request->importance,
                ]);

                return response()->json([$advertisement], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::find($id); 
        $advertisement->delete(); //delete 
        DB::table('advertisement')->where($id)->delete();
    }
}
