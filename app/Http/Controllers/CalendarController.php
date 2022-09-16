<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /*FIRST TASK*/
    public function first(){
        /*GET DATA AND VARIABLES*/
        $year=date("Y");
        $month=date("m");
        /*GO TO VIEW*/
        return view('first.first',[
            'year'=>$year,
            'month'=>$month
        ]);
    }
    public function calendar(Request $request){
        /*GET DATA AND VARIABLES*/
        $original_date = $request['date'];
        $year = date("Y", strtotime($original_date));
        $month = date("m", strtotime($original_date));
        $rows=array();

        $days_in_month = cal_days_in_month(CAL_GREGORIAN,$month,$year);
        $first_day_id = gregoriantojd($month,1,$year);
        $first_day_name = jddayofweek($first_day_id,1);

        //protection
        if ($month==1){
            $month_before = 12;
            $year-=1;
        }else{
            $month_before = $month-1;
        }

        $counter_days=1;
        $counter_days_after=1;
        $counter_days_before=cal_days_in_month(CAL_GREGORIAN,$month_before,$year);
        $last_day_before_id=gregoriantojd($month_before,$counter_days_before,$year);
        $last_day_before_name=jddayofweek($last_day_before_id,1);


        /*PREPARE COUNTER DAYS BEFORE THAT MONTH*/
        switch($last_day_before_name){
            case 'Monday':                                  break;
            case 'Tuesday';     $counter_days_before-=1;    break;
            case 'Wednesday';   $counter_days_before-=2;    break;
            case 'Thursday';    $counter_days_before-=3;    break;
            case 'Friday';      $counter_days_before-=4;    break;
            case 'Saturday';    $counter_days_before-=5;    break;
            case 'Sunday';      $counter_days_before-=6;    break;
        }

        /*PREPARE CALENDAR*/
        for ($r=1;$r<=6;$r++){
            $row = array();
            /*FIRST ROW*/
            if ($r==1){
                //for each day
                for ($day=1;$day<=7;$day++){
                    //check witchone is first
                    if ($first_day_name == 'Monday' && $day==1){
                        array_push($row,['cur'=>$counter_days]);
                        $counter_days+=1;
                    }
                    else if ($first_day_name == 'Tuesday' && $day==2){
                        array_push($row,['cur'=>$counter_days]);
                        $counter_days+=1;
                    }
                    else if ($first_day_name == 'Wednesday' && $day==3){
                        array_push($row,['cur'=>$counter_days]);
                        $counter_days+=1;
                    }
                    else if ($first_day_name == 'Thursday' && $day==4){
                        array_push($row,['cur'=>$counter_days]);
                        $counter_days+=1;
                    }
                    else if ($first_day_name == 'Friday' && $day==5){
                        array_push($row,['cur'=>$counter_days]);
                        $counter_days+=1;
                    }
                    else if ($first_day_name == 'Saturday' && $day==6){
                        array_push($row,['cur'=>$counter_days]);
                        $counter_days+=1;
                    }
                    else if ($first_day_name == 'Sunday' && $day==7){
                        array_push($row,['cur'=>$counter_days]);
                        $counter_days+=1;
                    }
                    //type in other days
                    else if ($counter_days>1){
                        array_push($row,['cur'=>$counter_days]);
                        $counter_days+=1;
                    }
                    //days before that month
                    else{
                        array_push($row,['not'=>$counter_days_before]);
                        $counter_days_before+=1;
                    }
                }
            }

            /*OTHER ROWS*/
            else{
                //for each day
                for ($day=1;$day<=7;$day++){
                    //days after that month
                    if ($days_in_month<$counter_days){
                        array_push($row,['not'=>$counter_days_after]);
                        $counter_days_after+=1;
                    }
                    //check last day of month
                    else{
                        array_push($row,['cur'=>$counter_days]);
                        $counter_days+=1;
                    }
                }
            }
            array_push($rows,$row);
        }

        /*CONVERT MONTH TO STRING IN PL, WRITEN IN ONE LINE TO DON'T MAKE TONS LINES OF CODE*/
        switch($month){
            case 1:     $month="Styczeń";       break;
            case 2:     $month="Luty";          break;
            case 3:     $month="Marzec";        break;
            case 4:     $month="Kwiecień";      break;
            case 5:     $month="Maj";           break;
            case 6:     $month="Czerwiec";      break;
            case 7:     $month="Lipiec";        break;
            case 8:     $month="Sierpień";      break;
            case 9:     $month="Wrzesień";      break;
            case 10:    $month="Październik";   break;
            case 11:    $month="Listopad";      break;
            case 12:    $month="Grudzień";      break;
        }
        
        /*GO TO VIEW*/
        return view('first.calendar',[
            'year'=>$year,
            'month'=>$month,
            'rows'=>$rows
        ]);
    }

    /*PROTECTION*/
    public function move(){
        /*GO TO VIEW*/
        return redirect('first');
    }
}
