<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Car;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add_car');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $validatedData = $request->validate([
            
                'brand'=>'required'  ,
                'description'=>'required',
                'mileage'=>'required',
                'seats'=>'required',
                'photos'=>'required',
                'price'=>'required',

            ], [
                'brand'=>'* Brand Required'  ,
                'description'=>'* Description Required ',
                'mileage'=>'* Mileage Required ',
                'seats'=>'*Seats Required ',
                'photos'=>'* photos Required ',
                'price'=>'* price Required ',

                
        ]);

       // $validatedData['rating'] = 0;
        $image = $request->file('photos');
        if(!empty($image)){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads');
            $image->move($destinationPath, $imagename);
            $validatedData['photos'] = $imagename;
            $product = Car::create($validatedData);
        }else {
            $product = Car::create($validatedData);
        }
        
        return redirect('/add-car')->with('success','Car created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
