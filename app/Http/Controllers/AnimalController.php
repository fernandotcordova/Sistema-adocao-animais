<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;
use App\Http\Requests\AnimalRequest;
use Illuminate\Support\Facades\Validator;

class AnimalController extends Controller
{
    public function index(){
        $search = request('search');

        if($search){
            $animal = Animal::where([
                ['breed', 'like', '%'. $search. '%']
            ]) -> paginate(3) -> withQueryString() ;
        }else{
            $animal = Animal::paginate(3);

        }

        return view('welcome', ['animals' => $animal, 'search' => $search]);
    }

    public function create(){
        return view('create');
    }

    public function contact(){
        return view('contact');
    }

    //para armazenar os dados vindos do form
    //usaremos uma classe store para fazer a validação: AnimalRequest
    public function store(AnimalRequest $request){

        //salvar no banco
        $animal = new Animal;
        $animal -> name = $request -> name;
        $animal -> birth_day = $request -> birth_day;
        $animal -> breed = $request -> breed;
        $animal -> description = $request -> description;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request -> image;

            $extension = $requestImage -> extension();

            $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now") . ".") . "." . $extension;

            //mover para pasta
            $requestImage -> move(public_path('img/animals'), $imageName);

            $animal -> image = $imageName;
        }

        $user = auth() -> user();
        $animal -> user_id = $user -> id;

        $animal -> save();

        return redirect('/') -> with('msg', 'Animal adicionado com sucesso!');
    }

    public function show($id){
        $animal = Animal::findOrFail($id);

        $animalOwner = User::where('id', $animal -> user_id) -> first() -> toArray();

        return view('animals.show', ['animal' => $animal, 'animalOwner' => $animalOwner]);
    }

    public function dashboard(){
        $user = auth() -> user();

        $animals = $user -> animals() -> paginate(3);

        return view('animals.dashboard', ['animals' => $animals]);
    }

    public function destroy($id){

        Animal::findOrFail($id) -> delete();

        return redirect('/dashboard') -> with('msg', 'Animal excluído!');
    }

    //somente para retornar a view
    public function edit($id){
        $animal = Animal::findOrFail($id);

        return view('animals.edit', ['animal' => $animal]);
    }

    //para mudar dados
    public function update(AnimalRequest $request){

        //uma variável para criar referência
        $data = $request -> all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request -> image;

            $extension = $requestImage -> extension();

            $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now") . ".") . "." . $extension;

            //mover para pasta
            $requestImage -> move(public_path('img/animals'), $imageName);

            $data['image'] = $imageName;
        }

        Animal::findOrFail($request -> id) -> update($data);

        return redirect('/dashboard') -> with('msg', 'Animal atualizado!');
    }

    public function adoptShow($id){
        $user = auth() -> user();
        $userId = $user -> id;

        return view('animals.adopt', ['id'=> $id, 'userId' => $userId]);
    }

    public function adopt(Request $request){
        $user = auth() -> user();

        $userId = $user -> id;
        $userEmail = $user -> email;

        $animalId = $request -> animal_id;

        if($request->email !== $userEmail){
            return redirect('/') -> with('error', 'Não foi possível adotar o animal!');
        }

        $animal = Animal::findOrFail($animalId);

        if($animal -> delete()){
            return redirect('/') -> with('msg', 'Animal adotado!');
        } else{
            return redirect('/') -> with('error', 'Não foi possível adotar o animal!');
        }


    }
}
