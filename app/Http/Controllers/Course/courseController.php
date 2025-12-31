<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Result;
use App\Models\Course;


class courseController extends Controller
{
    public function create()
    {
        return view('course.create');
    }
    public function store(Request $request)
    {
        $name = $request->input('name');
        $code = $request->input('code');
        $credit = $request->input('credit');

//        ## sql qoury
//        $sql = "INSERT INTO course(name,code,credit) VALUES ('$name','$code',$credit)";
//        query builder
//        $result = DB::table('courses')
//            ->insert(['name' => $name, 'code' => $code, 'credit' => $credit]);
//

//        $result =course::query()
//            ->insert(['name' => $name, 'code' => $code, 'credit' => $credit]);

//
//               $course = new Course();
//               $course->name = $name;
//               $course->code = $code;
//               $course->credit = $credit;
//               $reuslt = $course->save();
//               dd($reuslt);
        // لازم اكون معرف المتغسرات في المودل
//        $result =course::query()
//            ->create(['name' => $name, 'code' => $code, 'credit' => $credit]);
//        dd($result);
        // لو بدي اشيك اذا الاسم مش مكرر
//        $exists =  Course::query()->where('name', $name)->exists();
//        if(!$exists ){
//            $result = course::query()
//                ->create(['name'=>$name,'code'=>$code,'credit'=>$credit]);
//        }
        // لو لقيت هاتلي اياه لو ما لقيتو انشئو وهاتو
//        $course = course::query()->findOrNew(['name'=>$name,'code'=>$code,'credit'=>$credit]);


        // لو لقيت الرو عدلو لو ما لقيتو ضيفة
        $course = course::query()->updateOrCreate(
            ['name'=> $name],
            [
            'code'=>$code,
            'credit'=>$credit
        ]);

        return redirect()->back();
//
    }
    public function index( request $request)
    {
        $search = $request->input('search');
//        $sql = "select * from courses";
//        $sresult = DB::select($sql);
//        query builder
//         dd($sresult);
//          $sresult = DB::table('courses')
              $result = course::query()
                  // retutn all deleted
//                  ->withTrashed()
                  // trturn only deleted
//                   ->onlyTrashed()


//           ->leftJoin('semester_courses', 'courses.id', '=', 'semester_courses.course_id')
////            ->leftJoin('semester', 'semester_courses.semester_id', '=', 'semester.id')
//               ->leftJoin('semester', function (Builder $join) {
//               $join->on('semester.id', '=', 'semester_courses.semester_id');
//               $join->where('semester.year', '=', '2025 - 2026');
//    //
//                })



//            ->select('courses.id',/*'semester.id as semester_id','semester_courses.id as semester_courses_id', */'name', 'code', 'credit',/*'semester.year as year'*/)
//            ->where('courses.name', 'LIKE', "java%" and )
//            ->where('credit', '=', 2)
//            ->where(function ( Builder $query) {
//                $query->where('search', 'LIKE', "java%" )
//                    ->orWhere('code', 'LIKE', "dd%");
//
//            })
//                ->whereColumn('courses.id', 'semester.id')
             ->where('name', 'like', $search.'%')
//


//            ->offset(4)
//            ->limit(2)



//            ->orderBy('name','desc')
//            ->groupBy('credit')
//            ->having('credit', '>', 2)


            # y-m-d H:i:s
//                    ->whereDay('created_at','12' )
//                    ->whereMonth('created_at','12' )
//                ->WhereDate('created_at',Date('Y-m-d'))
//            ->wherenull('courses.credit')
//            ->whereBetween('credit',[2,11])
//            ->wherenot('credit', '=', 2)
//                ->whereIn('credit',[1,2,4])
                 ->get();
//        adding attribute

//        foreach ($result as $item){
//            $item->Dept = explode('-', $item->code)[0];
//        }


//        foreach ($sresult as $item){
//            $item->credit = $item->credit +1;
//            $item->save();
//        }


////                ->distinct('credit')
//                ->count();
//        ->sum('credit');
//        ->avg('credit');
//        dd($sresult);
        return view('course.index', ['courses' => $result] ,compact('search'));



    }
    public function edit($id)
    {
        $result = DB::table('courses')
            ->select('id', 'name', 'code', 'credit')
//            ->where('id',$id)
//# return one opject
//            ->first();
//            ->firstWhere('id', $id);
              ->find($id);
//           ->get();
//        dd($result);
        return view('course.edit', ['course' => $result]);

    }
    public function update(Request $request,$id)
    {
        $name = $request->input('name');
        $code = $request->input('code');
        $credit = $request->input('credit');
//        $sql = "update courses set name = '$name' , code = '$code' , credit = '$credit' where id = '$id' ";
//        $result = DB::update($sql);
//        $result = DB::table('courses')
//            ->where('id',$id)
//            ->update(['name'=>$name,'code'=>$code, 'credit'=>$credit]);
//
//
//          $result =course::query()
//              ->where('id', $id)
//              ->update(['name' => $name, 'code' => $code, 'credit' => $credit]);


         $course = course::find($id);
        $course->name = $name;
        $course->code = $code;
        $course->credit = $credit;
        $result= $course->save();
//        dd($result);
        return redirect()->route('index.course');

    }
    public function delete( Request $request,$id)
    {
//        return view('course.delete');

//        $result = DB::table('courses')
//            ->select('*')
//        ->where('id',$id)
//        ->delete();

        $result = course::query()->find($id)
        ->delete();

        return redirect()->back();


    }
    public function restore($id){
        $result = course::query()
            ->withTrashed()
            ->find($id)
            ->restore();
        return redirect()->back();
    }
    public function alldeleted(){
        $serch = request()->input('search');
        $result = course::query()
            ->onlyTrashed()
            ->get();
//        adding attribute
//        foreach ($result as $item){
//            $item->Dept = explode('-', $item->code)[0];
//        }

        return view('course.all_deleted', ['courses' => $result , 'search' => $serch]);
    }

}
