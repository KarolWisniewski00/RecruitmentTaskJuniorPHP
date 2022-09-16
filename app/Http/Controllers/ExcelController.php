<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function second(){
        /*GO TO VIEW*/
        return view('second.second');
    }

    /*SECOND TASK*/
    public function excel(Request $request){
        /*GET DATA AND VARIABLES*/
        $cell = $request['cell'];
        $pattern = '/^([A-Z])+([0-9])+$/';
        $output = '';
        $convert_number = 0;

        /*CHECK STRING*/
        if (preg_match($pattern, $cell)){
            //split numbers and strings
            $numbers_input = preg_split('/([A-Z])+/',$cell)[1];
            $strings_input = preg_split('/([0-9])+/',$cell)[0];

            //convert excel style string to number
            foreach(str_split($strings_input) as $letter){
                $convert_number = ($convert_number * 26) + (ord(strtolower($letter)) - 96);
            }
        
            //prepare output
            $output.= $convert_number;
            $output.='.';
            $output.= $numbers_input;

            /*GO TO VIEW*/
            return redirect('second')->with('success', 'Twoja wartość to '.$output);
        }else{
            return redirect('second')->with('fail', 'Nie prawidłowy format!');
        }
    }
}
