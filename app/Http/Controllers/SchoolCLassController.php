<?php

namespace App\Http\Controllers;

use App\Models\SchoolCLass;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;
use Yajra\DataTables\DataTables;

class SchoolCLassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('class.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $class = new SchoolCLass();
       $data_class = [
            'class_name'=>$request->class_name,
            'status'=>$request->status
       ];
       $class->create($data_class);
       return redirect()->route("class.index")->with('success','Class created successfull');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $class_data = SchoolCLass::find($id);
        return view('class.show',['class'=>$class_data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $class_data = SchoolCLass::find($id);
        return view('class.edit',['class'=>$class_data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data_class = [
            'class_name'=>$request->class_name,
            'status'=>$request->status
       ];
        SchoolCLass::updateOrCreate(['id'=>$request->id], $data_class );
        return redirect()->route("class.index")->with('success','Class updated successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolCLass $schoolCLass)
    {
        //
    }

    public function dtajax(Request $request)
    {
            $classes = SchoolCLass::all()->sortDesc();
            $out =  DataTables::of($classes)->make(true);
            $data = $out->getData();
            for($i=0; $i < count($data->data); $i++) {
                $output = '';
                $output .= ' <a href="'.url(route('class.show',['id'=>$data->data[$i]->id])).'" class="btn btn-primary btn-xs"  data-toggle="tooltip" title="Show Details" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-eye"></i></a>';
                $output .= ' <a href="'.url(route('class.edit',['id'=>$data->data[$i]->id])).'" class="btn btn-warning btn-xs"  data-toggle="tooltip" title="Edit Details" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                
                $data->data[$i]->action = (string)$output;
            }
            $out->setData($data);
            return $out;
    }
}
