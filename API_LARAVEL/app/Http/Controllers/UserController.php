<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Framework;
use App\Models\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index(){
        $user = User::findOrFail(1);
        $frameworks = Framework::get();
        $hobbies = Hobby::get();

        $formattedInfo = [
            'id' => $user->id,
            'name' => $user->name,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'city' => $user->city,
            'country' => $user->country,
            'summary' => $user->summary,
            'frameworks' => $frameworks->map(function ($framework) {
                return [
                    'id' => $framework->id,
                    'name' => $framework->name,
                    'level' => $framework->level,
                    'year' => $framework->year,
                ];
            }),
            'hobbies' => $hobbies->map(function ($hobby) {
                return [
                    'id' => $hobby->id,
                    'name' => $hobby->name,
                    'description' => $hobby->description,
                ];
            }),
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];
    
        // Retorna la respuesta JSON formateada
        return response()->json([$formattedInfo], 200);
    }

    public function update(Request $request){
        $user = User::findOrFail(1);
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'name'=>'nullable',
                'lastname'=>'nullable',
                'email'=>'nullable',
                'city'=>'nullable',
                'country'=>'nullable',
                'summary'=>'nullable',
            ]);

            $user->update([
                'name'=>$fields['name']??$user->name,
                'lastname'=>$fields['lastname']??$user->lastname,
                'email'=>$fields['email']??$user->email,
                'city'=>$fields['city']??$user->city,
                'country'=>$fields['country']??$user->country,
                'summary'=>$fields['summary']??$user->summary,
            ]);
            DB::commit();
            return response()->json($user,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    /*
    public function updateFrameWorks(Request $request){
        $user = User::findOrFail(1);
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'name' => 'required|string',
                'level' => 'required|string',
                'year' => 'required|string',
            ]);
            $frameworks = $user->frameworks ?? [];
            $newHobby = [
                'name' => $request->input('name'),
                'level' => $request->input('level'),
                'year' => $request->input('year'),
            ];

            $frameworks[] = $newHobby;

            $user->update([
                'frameworks'=>$frameworks,
            ]);
            DB::commit();
            return response()->json($user,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
    

    public function updateHobbies(Request $request){
        $user = User::findOrFail(1);
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
            ]);
            $hobbies = $user->hobbies ?? [];
            $newHobby = [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ];

            $hobbies[] = $newHobby;

            $user->update([
                'hobbies'=>$hobbies,
            ]);
            DB::commit();
            return response()->json($user,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
    */
}
