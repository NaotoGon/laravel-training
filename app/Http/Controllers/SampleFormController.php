<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pet;
use App\Http\Requests\CreatePetRequest;

class SampleFormController extends Controller
{
    public function index(){
        $pets = Pet::orderBy('id', 'asc')->get();

        return view('sample_form', compact("pets"));
    }

    public function show($id){
        $pet = Pet::find($id);
        return view("sample_show", compact("pet"));
    }

    public function store(CreatePetRequest $request, Pet $pet)
    {
        $pet = $request->validated()['pet'];
        
        return DB::transaction(function () use ($pet, $request){
            $pet = new Pet();

            $pet->name = $request->pet;
            $pet->birthday = "1980/01/01";
            $pet->gender = "not set";

            $pet->save();

            return redirect("/form/index");
        });
    }

    public function delete(Request $request){
        foreach($request->delete_pets as $pet_id) {
            Pet::find($pet_id)->delete();
        }

        return redirect('/form/index');
    }

    public function update(Request $request){
        Pet::find($request->pet_id)
        ->update([
            "name" => $request->name,
            "birthday" => $request->birthday,
            "gender" => $request->gender
        ]);
        return redirect("/form/index");
    }

    public function ajax()
    {
        return view("sample");
    }

    public function ajax2()
    {
        return view("sample2");
    }
}
