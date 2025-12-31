<?php

namespace App\Http\Controllers\semester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class semesterController extends Controller
{
    public function create(){

        return view('semester.create');
    }

    public function store(Request $request)
    {
        # get data from reqoust
    $qoart=$request->input('quart');
    $year=$request->input('year');
    # sql query
     #
      $sql =" INSERT INTO semester (quart,year) VALUES ('$qoart', '$year')";
       //add
       $reuslt =  DB::insert( $sql);

       #reuslt
       return redirect()->route('create.semester');


    }
    public function index(){
        $sql = "SELECT * FROM semester";
        $result = DB::select($sql);

        return view('semester.index',['data'=>$result]);

    }
    public function Edit($id){
        $result = DB::select("SELECT * FROM semester WHERE id=$id");

        return view('semester.Edit',['semester'=>$result[0]]);
    }
    public function update(Request $request,$id){
        $quart=$request->input('quart');
        $year=$request->input('year');
        $sql = "UPDATE semester SET quart='$quart', year='$year' WHERE id=$id";
        $reuslt = DB::update($sql);

        return redirect()->back();

    }
    public function delete($id){
        $sql = "DELETE FROM semester WHERE id=$id";
        $reuslt = DB::delete($sql);
        return redirect()->back();

    }
}
