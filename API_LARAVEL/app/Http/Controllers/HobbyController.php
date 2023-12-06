<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hobby;
use Illuminate\Support\Facades\DB;

class HobbyController extends Controller
{
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'name'=>'required',
                'description'=>'required',
            ]);

            $hobby=Hobby::create([
                'name'=>$fields['name'],
                'description'=>$fields['description'],
            ]);
            DB::commit();
            return response()->json($hobby,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function update(Request $request, Hobby $hobby){
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'name'=>'nullable',
                'description'=>'nullable',
            ]);

            $hobby->update([
                'name'=>$fields['name']??$hobby->name,
                'description'=>$fields['description']??$hobby->description,
            ]);
            DB::commit();
            return response()->json($hobby,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function destroy(Hobby $hobby)
    {
        try{
            DB::beginTransaction();
            $hobby->delete();
            DB::commit();
            return response()->json('Deleted success',200);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }
}
