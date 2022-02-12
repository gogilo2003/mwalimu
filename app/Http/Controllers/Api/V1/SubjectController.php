<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use Illuminate\Support\Facades\Validator;
use Ogilo\ApiResponseHelpers;

class SubjectController extends Controller
{
    use ApiResponseHelpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubjectResource::collection(Subject::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'short_name'=>'nullable|unique:subjects,name',
            'name'=>'required|unique:subjects,name'
        ]);

        if($validator->fails()){
            return $this->validationError($validator);
        }

        $subject = new Subject();
        $subject->short_name = strtoupper($request->short_name);
        $subject->name = $request->name;
        $subject->save();
        return $this->storeSuccess('Subject stored',['subject'=>new SubjectResource($subject)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id'=>'required|integer|exists:subjects,id',
            'short_name'=>'nullable|unique:subjects,short_name,'.$request->id,
            'name'=>'required|unique:subjects,name,'.$request->id,
        ]);

        if($validator->fails()){
            return $this->validationError($validator);
        }

        $subject = Subject::find($request->id);
        $subject->short_name = strtoupper($request->short_name);
        $subject->name = $request->name;
        $subject->save();
        return $this->updateSuccess('Subject updated',['subject'=>new SubjectResource($subject)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validator = Validator::make(['id'=>$id],[
            'id'=>'required|integer|exists:subjects,id',
        ]);

        if($validator->fails()){
            return $this->validationError($validator);
        }

        Subject::destroy($id);
        return $this->deleteSuccess();
    }
}
