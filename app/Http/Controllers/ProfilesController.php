<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfilesController extends Controller
{
    public function index(){ //listar todos los elementos almacenados en esa tabla
        return response()->json(Profile::all(),200); //Profile es el modelo. 200: es el OK
    }

    public function show($id){
        $the_profile = Profile::find($id);
        if(is_null($the_profile)){
            return response()->json(['message'=>'Not Found'],404);
        }
        else{
            return response()->json($the_profile::find($id),202);
        }
    }


    public function store(Request $request){
        $url = "";
        if ($request -> file('image') && 
           ($request -> file('image')->getClientOriginalExtension() == 'jpg'||
            $request -> file('image')->getClientOriginalExtension() == 'png')){
            $file = $request -> file('image');
            $extension = $file -> getClientOriginalExtension();
            $filename=$request->user_id . '-' . time() . '.' . $extension;
            $url =$file->move('avatars',$filename);
        }else{
            return response (['message' => 'se debe cargar una imagen'], 400);
        }

        $the_Profile = Profile::where('user_id', '=', $request->user_id)->first();
        if (is_null($the_Profile)) {
            $data = $request->all();
            $data["url_avatar"] = $url;
            $the_Profile = Profile::create($data);
            //error_log('data perfil >' .$data["user_id"]);
            //$the_Profile = Profile::create($request->all());
             return response($the_Profile, 201);
        } else {
            return response()->json(['message' => 'El usuario ya tiene un perfil']);
        }

        // $the_profile=Profile::create($request->all());
        // return response($the_profile,201);
    }

    public function update(Request $request,$id){
        $the_profile=Profile::find($id);
        if(is_null($the_profile)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_profile->update($request->all());
            return response()->json($the_profile::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_profile=Profile::find($id);
        
        if(is_null($the_profile)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_profile->delete();
            return response()->json(null,204);
        }
    }
}
