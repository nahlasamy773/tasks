<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;


class CarController extends Controller
{

    use common;

    private $columns = ['title', 'description', 'published'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view ('cars');

        $cars = Car::get();
        return view("cars", compact("cars"));
        

        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //    return view ('addCar');


       $categories = Category::get();
       return view('addCar', compact('categories'));
       

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        

            // $cars = new Car();
            // $cars->title = $request->title;
            // $cars->description = $request->description;

            
           
            // if(isset($request->published)){
            //     $cars->published = 1;
            // }else{
            //     $cars->published = 0;
            // }


            // $cars->save();
            // return 'Data added successfully';


// $cars = new Car();
            // $cars->title = "BMW";
            // $cars->description = "BMW description";
            // $cars->published = 1;
            // $cars->save();
            // return 'Data added successfully';

                // $data= $request->only($this->columns);


                // $messages=[
                //     'title.required'=>'العنوان مطلوب',
                //     'title.string'=>'Should be string',
                //     'description.required'=> 'should be text',
                //     ];

                $messages = $this->messages();
                $data= $request->validate ([

                'title'=>'required|string|max:50',
                'description'=>'required|string',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                'category_id' =>'required|string',


                ],$messages
                );

                $fileName = $this->uploadFile($request->image, 'assets/images');    
                $data['image'] = $fileName;
        



                // $data['published']= isset($request->published);
                // Car::create ($data);
                //     return redirect('cars');


                    $data['published'] = isset($request->published);
                    Car::create($data);
                    return redirect('cars')->with('success', 'Car added successfully');





        }
          

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $car = Car::findOrFail($id);
        $car = Car::with('category')->findOrFail($id);
        return view ('showCar', compact('car'));  

        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

       


       $car = Car::findOrFail($id);
       $categories = Category::get();
   
       return view('updateCar', compact('car', 'categories'));
            



    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
        
    //     $data= $request->only($this->columns);
    //     $data['published']= isset($request->published);
    //     Car::where('id',$id)->update ($data);
    //         return redirect('cars');
    //     }

//**          */

public function update(Request $request, string $id)
{
    $messages = $this->messages();
    $data = $request->validate([
        'title' => 'required|string|max:50',
        'description' => 'required|string',
        'image' => 'nullable|mimes:png,jpg,jpeg|max:2048', // Make image field optional if you don't want to update it every time
        'category_id' => 'required|string',
    ], $messages);
    


        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            // Upload and update image if a new one is provided
            $fileName = $this->uploadFile($request->file('image'), 'assets/images');
            $data['image'] = $fileName;

        


        }
    

        $data['published'] = isset($request->published);

        // Update the car record with the new data
        $car = Car::findOrFail($id);
        $car->update($data);



    return redirect('cars')->with('success', 'Car updated successfully');


}




    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id',$id)->delete();
        return redirect('cars');
    }

//trashed

public function trashed()
{
    $cars=Car::onlyTrashed()->get();
    return view ('trashed', compact('cars'));  
}

//forceDelete
      
public function forceDelete(string $id)
{
    Car::where('id',$id)->forceDelete();
    return redirect('cars');
}


//restore
      
public function restore(string $id)
{
    Car::where('id',$id)->restore();
    return redirect('cars');
}

//method--oop
public function messages ()
{
    
   
    return[
        'title.required'=>'العنوان مطلوب',
        'title.string'=>'Should be string',
        'description.required'=> 'should be text',
        'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',

        ];

  

}



}
