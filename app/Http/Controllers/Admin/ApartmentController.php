<?php

namespace App\Http\Controllers\Admin;


use App\Models\Service;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info=Apartment::all();
        return view('admin.apartment.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('admin.apartment.create_apartment', compact('services'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $userData = Auth::user()->id;
        $newRecord = new Apartment();


        $request->validate([
            'title'=>'required|max:100',
             'rooms'=>'required|numeric|min:1|max:10',
             'bedrooms'=>'required|numeric|min:1|max:10',
             'bathrooms'=>'required|numeric|min:1|max:10',
            //  'latitude'=>'required|numeric|min:1|max:10',
            //  'longitude'=>'required|numeric|min:1|max:10',
             'square_meters'=>'required|numeric|min:1',
             'price'=>'required|numeric|min:1',
             'address'=>'required|max:100',
             'description'=>'required|max:200',
             'services'=>'required'
        ]);


        if(array_key_exists('image', $data)){
            $cover_url= Storage::put('apartment_covers', $data['image']);
            $data['cover']=$cover_url;
        }
        array_push($data, $userData);

        $newRecord->fill($data);
        $newRecord->save();


        if(array_key_exists("services", $data)){
            $newRecord->services()->sync($data["services"]);
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file=Apartment::findOrFail($id);
        $services = Service::all();

        return view('admin.apartment.edit_apartment', compact('file', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new_info = $request->all();



        $apartment = Apartment::findOrFail($id);
        $apartment->update($new_info);

        if(array_key_exists('services', $new_info)){
            $apartment->services()->sync($new_info['services']);
        }else{
            $apartment->services()->sync([]);
        }

        return redirect()->route('mainPage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy=Apartment::findOrFail($id);
        if($destroy->cover){
            Storage::delete($destroy->cover);
        }
        $destroy->services()->sync([]);
        $destroy->delete();

        return redirect()->route('mainPage');

    }
}
