<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Company;

class FormController extends Controller
{
    public function third(){
        /*GO TO VIEW*/
        return view('third.third');
    }

    public function register_priv(){
        /*GO TO VIEW*/
        return view('third.register_priv');
    }

    /*THIRD TASK*/
    public function register_priv_save(Request $request){
        /*VALIDATION*/
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:companies|unique:users|email',
            'date' => 'required',
            'password' => 'required|max:255|min:8',
            'password_verification' => 'required|max:255|min:8|required_with:password|same:password',
        ]);

        /*HASH PASSWORD*/
        $request->password = Hash::make($request->password);

        /*SAVE IN DATA BASE*/
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->date=$request->date;
        $user->password=$request->password;
        $db=$user->save();

        /*GO TO VIEW*/
        if ($db == 1){
            return redirect('register_priv')->with('success', 'Poprawnie zarejestrowano!');
        }else{
            return redirect('register_priv')->with('fail', 'Coś poszło nie tak!');
        }
    }

    public function register_company(){
        /*GO TO VIEW*/
        return view('third.register_company');
    }

    public function register_company_save(Request $request){
        /*VALIDATION*/
        $request->validate([
            'name' => 'required|unique:companies|max:255',
            'email' => 'required|unique:companies|unique:users|email',
            'nip' => 'required',
            'password' => 'required|max:255|min:8',
            'password_verification' => 'required|max:255|min:8|required_with:password|same:password',
        ],[
            'name.required' => 'To pole jest wymagane!',
            'name.unique' => 'Nazwa ma być unikalna!',
            'name.max' => 'Maksymalna ilość znaków to 255!',
            'email.required' => 'To pole jest wymagane!',
            'email.unique' => 'Ten email jest już zajęty!',
            'email.email' => 'Podaj prawidłowy format!',
            'nip.required' => 'To pole jest wymagane!',
            'password.required' => 'To pole jest wymagane!',
            'password.max' => 'Maksymalna ilość znaków to 255!',
            'password.min' => 'Minimalna ilość znaków to 8!',
            'password_verification.required' => 'To pole jest wymagane!',
            'password_verification.max' => 'Maksymalna ilość znaków to 255!',
            'password_verification.min' => 'Minimalna ilość znaków to 8!',
            'password_verification.same' => 'Hasła muszą pasować do siebie!',
            'password_verification.required_with' => 'Hasła muszą pasować do siebie!',
        ]);

        /*CUSTOM VALIDATION*/
        $value = $request->nip;
        $value = preg_replace('/[^0-9]+/', '', $value);
        if (strlen($value) !== 10) {
            return redirect('register_company')->with('fail', 'Numer NIP powinien się składać z 10 cyfr!');
        }

        /*HASH PASSWORD*/
        $request->password = Hash::make($request->password);

        /*SAVE IN DATA BASE*/
        $company = new Company();
        $company->name=$request->name;
        $company->email=$request->email;
        $company->nip=$value;
        $company->password=$request->password;
        $db=$company->save();

        /*GO TO VIEW*/
        if ($db == 1){
            return redirect('register_company')->with('success', 'Poprawnie zarejestrowano!');
        }else{
            return redirect('register_company')->with('fail', 'Coś poszło nie tak!');
        }
    }
}
