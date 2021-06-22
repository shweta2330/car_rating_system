<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Ratingdata;
use Illuminate\Http\Request;
use Auth;
use DB;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['car_list'] = Car::all();


        for($i=0;$i<count($data['car_list']);$i++) {
           
            $value = $data['car_list'][$i];
            $car_rating = Ratingdata::where('car_id',$value->id)->get();
            
            $mileage = 0;
            $maintenance_cost = 0;
            $comfort = 0;
            foreach ($car_rating as  $row) {
                $mileage += $row['mileage'];
                $maintenance_cost += $row['maintenance_cost'];
                $comfort += $row['comfort'];
            }
            $avg_mileage = count($car_rating)==0?"rating not available":$mileage/count($car_rating);
            $avg_maintenance_cost = count($car_rating)==0?"rating not available":$maintenance_cost/count($car_rating);
            $avg_comfort = count($car_rating)==0?"rating not available":$comfort/count($car_rating);
            $data['car_list'][$i]['avg_mileage'] = $avg_mileage;
            $data['car_list'][$i]['avg_maintenance_cost'] = $avg_maintenance_cost;
            $data['car_list'][$i]['avg_comfort'] = $avg_comfort;
           
           
        }
        for($i=0;$i<count($data['car_list']);$i++) {
           $value = $data['car_list'][$i];
            

        }



        return view('car_list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function car_detail($id)
    {   $data['single_car'] = Car::where('id',$id)->get();
        return view('car_detail',$data); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        
        if($request->ratetype == "mileage"){
            $data = [
                "user_id"=>$id,
                "car_id"=>$request->car_id,
                "mileage"=>$request->ratevalue,
               
            ];
        }else if($request->ratetype == "mai"){
            $data = [
                "user_id"=>$id,
                "car_id"=>$request->car_id,
                "maintenance_cost"=>$request->ratevalue,
                
            ];
        }else if($request->ratetype == "comfort"){
            $data = [
                "user_id"=>$id,
                "car_id"=>$request->car_id,
                "comfort"=>$request->ratevalue,
            ];
        }
        $exixtdata = Ratingdata::where('user_id',$id)->where('car_id',$request->car_id)->get();

        if(count($exixtdata)> 0) {
            Ratingdata::where('user_id',$id)->where('car_id',$request->car_id)->update($data);
        }else{
            Ratingdata::create($data);
        }
        
        

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
