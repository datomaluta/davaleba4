<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;


class TestController extends Controller
{
    public function index(){
        return view('test');
    }

    public function calculate(Request $request){
        if ($request->action=="plus") {
           return $request->numberOne + $request->numberTwo;
        }

        if ($request->action=="substriction") {
            return $request->numberOne - $request->numberTwo;
        }

        if ($request->action=="multiply") {
            return $request->numberOne * $request->numberTwo;
        }

        if ($request->action=="division") {
            return $request->numberOne / $request->numberTwo;
        }



//        return $request->numberTwo;
    }
}
