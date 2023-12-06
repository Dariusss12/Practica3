<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Framework;
use Illuminate\Support\Facades\DB;

class FrameworkController extends Controller
{

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'name'=>'required',
                'year'=>'required',
                'level'=>'required',
            ]);

            $framework=Framework::create([
                'name'=>$fields['name'],
                'year'=>$fields['year'],
                'level'=>$fields['level'],
            ]);
            DB::commit();
            return response()->json($framework,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function update(Request $request, Framework $framework){
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'name'=>'nullable',
                'year'=>'nullable',
                'level'=>'nullable',
            ]);

            $framework->update([
                'name'=>$fields['name']??$framework->name,
                'year'=>$fields['year']??$framework->year,
                'level'=>$fields['level']??$framework->level,
            ]);
            DB::commit();
            return response()->json($framework,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function destroy(Framework $framework)
    {
        try{
            DB::beginTransaction();
            $framework->delete();
            DB::commit();
            return response()->json('Deleted success',200);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }
}
