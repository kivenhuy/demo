<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\SchoolCLass;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;
use Yajra\DataTables\DataTables;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $class_data = SchoolCLass::all();
        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class_data = SchoolCLass::all();
        return view('student.create',['class'=>$class_data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $student = new Students();
       $data_student = [
            'class_id'=>(int)$request->class_id,
            'student_name'=>$request->student_name,
            'student_age'=>$request->student_age,
            'student_gender'=>$request->gender,
            'student_phone'=>$request->student_phone
       ];
    //    dd($data_student);
       $student->create($data_student);
       return redirect()->route("student.index")->with('success','student created successfull');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student_data = Students::find($id);
        $class_name = SchoolCLass::find($student_data->class_id)->class_name;
        return view('student.show',['student_data'=>$student_data,'class_name'=>$class_name]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student_data = Students::find($id);
        $class_name = SchoolCLass::find($student_data->class_id)->class_name;
        return view('student.edit',['student_data'=>$student_data ,'class_name'=>$class_name,'class_id'=>$student_data->class_id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data_student = [
            'class_id'=>(int)$request->class_name,
            'student_name'=>$request->student_name,
            'student_age'=>$request->student_age,
            'student_gender'=>$request->gender,
            'student_phone'=>$request->student_phone
       ];
        Students::updateOrCreate(['id'=>$request->id], $data_student );
        return redirect()->route("student.index")->with('success','student updated successfull');
    }


    public function dtajax(Request $request)
    {
            $studentes = Students::all()->sortDesc();
            $out =  DataTables::of($studentes)->make(true);
            $data = $out->getData();
            for($i=0; $i < count($data->data); $i++) {
                $output = '';
                $output .= ' <a href="'.url(route('student.show',['id'=>$data->data[$i]->id])).'" class="btn btn-primary btn-xs"  data-toggle="tooltip" title="Show Details" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-eye"></i></a>';
                $output .= ' <a href="'.url(route('student.edit',['id'=>$data->data[$i]->id])).'" class="btn btn-warning btn-xs"  data-toggle="tooltip" title="Edit Details" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                $data->data[$i]->action = (string)$output;
                $data->data[$i]->class_name = SchoolCLass::find($data->data[$i]->class_id)->class_name;
            }
            $out->setData($data);
            return $out;
    }
}
