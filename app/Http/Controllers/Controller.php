<?php

namespace App\Http\Controllers;
use App\User;
use App\questions;
use App\answers;
use App\results;
use App\ResultExcel;
use Response;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   

    public function index(){
    	if(Auth::check()){
			return redirect('questions');
		}
		else{
			return view('home');
		}
    	
    }

    public function addUser(Request $request){
    	$response = array();
    	$response['code'] = 400;
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required'
    	]);

    	$name = $request['name'];
    	$email = $request['email'];
        $password = $request['password'];
    	$user = new User();

    	//Check if user already exist

    	$checkUserExist = User::where('email', $email)->get();

    	if($checkUserExist->count() > 0){
    		
            if(Auth::attempt(['email' => $email, 'password' => $password]))
            {
                $response['code'] = 200;
                $response['message'] = "Login Successfully";
            }
            else{
                $response['code'] = 201;
                $response['message'] = "Failed to login";
            }
            
    	}
    	else{

    		$user->name = $name;
    		$user->email = $email;
            $user->password = bcrypt($password);
    		$saveUserRecord = $user->save();
    		if($saveUserRecord){

                if(Auth::attempt(['email' => $email, 'password' => $password]))
                {
                    
                    $response['code'] = 200;
                    $response['message'] = "Login Successfully";
                    
                }
                else{
                    $response['code'] = 200;
                    $response['message'] = "Failed to login";
                }
            }
    		else{
    			$response['code'] = 201;
    			$response['message'] = "Failed to creat user account, Please try again later";
                
    		}
    	}


    	return Response::json($response);

    }

    public function Question(){
        $questions = questions::get();
        $user_id = Auth::user()->id;
        $getUserResult = results::where('user_id', $user_id)->get();


        return view('questions', ['questions' => $questions, 'getUserResult' => $getUserResult]);
    }

    static public function getAnswers($question_id){
        $answers = answers::where('question_id', $question_id)->get();

        return $answers;
    }

    public function submitAns(Request $request){
        $response = array();
        $response['code'] = 400;


        $response['score'] = 0;
        $response['failed'] = 0;


        // die($answers);
        for ($i=1; $i <= 8 ; $i++) { 
            // $score = $request['questions'.$i];
            if(answers::where('question_id', $i)->where('answer', $request['questions'.$i])->where('status', 1)->first()){
                
                $response['code'] = 200;
                $response['score'] = $response['score'] + 1;
            }
            else{
                $response['code'] = 200;
                $response['failed'] = $response['failed'] + 1;
            }

        }
            $getUser = Auth::user()->email;
            
            $saveRecord = new results();
            
            $getUserInfo = User::where('email', $getUser)->get();
            $user_id = $getUserInfo[0]->id;
            $saveRecord->user_id = $getUserInfo[0]->id;
            $saveRecord->passed = $response['score'];
            $saveRecord->failed = $response['failed'];

            $checkIFTest = results::where('user_id', $user_id)->count();
            if($checkIFTest > 0){
                $response['code'] = 201;
                $response['message'] = "This test can only be taken once";
                $response['messagetype'] = "alert alert-danger";
            }
            else{
                 $recordSaved = $saveRecord->save();
                if($recordSaved){ 
                    $response['code'] = 200;
                    $response['message'] = "Thank you for taking your test, Your score result has been saved";
                    $response['messagetype'] = "alert alert-success";
                }
                else{
                    $response['code'] = 201;
                    $response['message'] = "Failed to save your score";
                    $response['messagetype'] = "alert alert-danger";
                }  
            }
             

        return redirect()->back()->with([
            'score' => $response['score'],
            'failed' => $response['failed'],
            'message' => $response['message'],
            'messagetype' => $response['messagetype']
        ]);
    }

    public function export(){
    	// $users = User::all();

        //return Excel::download($users, 'users.csv');
        return (new ResultExcel())->download('scoreboard.xlsx');
    }

    public function About(){
    	return view('about');
    }

    public function Logout(){
    	Auth::logout();
		return view('home');
    }
}
