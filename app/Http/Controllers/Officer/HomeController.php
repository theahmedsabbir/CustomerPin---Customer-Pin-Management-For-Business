<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Officer;
use App\Visitor;
use App\Merchant;
use App\Pin;
use App\PinUsage;
use Hash;
use Auth;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('officer.home');
    }

    
    public function visitors()
    {
        return view('officer.visitors');
    }      
    
    public function addVisitor()
    {
        return view('officer.addVisitor');
    }
    
    public function storeVisitor(Request $request)
    {
    	$request->validate([
			'username' => 'required|max:255|unique:visitors',
			'email'    => 'required',
    	]);

    	if( $request->password != $request->c_password ){

			session()->flash('my_error', 'Password doesnt match');
    		return redirect()->back();
    	}

    	if( $request->phone != $request->c_phone ){

			session()->flash('my_error', 'Phone doesnt match');
    		return redirect()->back();
    	}

    	$user  = new Visitor;

    	$user->username = $request->username;
    	$user->password = Hash::make($request->password);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->address = $request->address;
    	$user->status = 1;
    	$user->merchant_id = Auth::user()->merchant_id;
    	$user->officer_id = Auth::user()->id;
    	$user->save();


		session()->flash('my_success', 'User Added');
        return redirect()->route('officer.visitors');
    }
    
    public function visitorStatus(Request $request, $id)
    {
    	$visitor = Visitor::find($id);
    	if(!is_null($visitor)){
    		if($visitor->status == 1){
    			$visitor->status = 0;
    			$visitor->save();
    		}else{
    			$visitor->status = 1;
    			$visitor->save();    			
    		}
    	}
        return redirect()->back();
    }

    
    public function visitorShow($id)
    {
    	$user = Visitor::find($id);
    	if( $user->officer_id != Auth::user()->id ){
    		return redirect()->back();
    	}
        return view('officer.visitorShow', compact('user'));
    }  
    
    public function editVisitor($id)
    {
    	$user = Visitor::find($id);

    	if( $user->officer_id != Auth::user()->id ){
    		return redirect()->back();
    	}

        return view('officer.editVisitor', compact('user'));
    }
    
    public function updateVisitor(Request $request, $id)
    {

    	$user = Visitor::find($id);

		
    	$request->validate([
			'username'    => 'unique:visitors,username,'.$user->id,
			// 'email'    => 'email|unique:visitors,email,'.$user->id,
    	],[
    		// 'image.dimensions' => 'Image should be not more than 500px width & 500px height',
    	]);

    	// password validation
		if( $request->password != null or $request->password != ""){
			if( $request->c_password != null or $request->c_password != ""){

		    	if( $request->password != $request->c_password ){

					session()->flash('my_error', 'Password not entered correctly');
		    		return redirect()->back();
		    	}
				$user->password = Hash::make($request->c_password);
			}
		}

    	if( $request->phone != $request->c_phone ){

			session()->flash('my_error', 'Phone doesnt match');
    		return redirect()->back();
    	}

    	$user->username = $request->username;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->address = $request->address;
    	$user->save();


		session()->flash('my_success', 'User Updated');
        return redirect()->back();
    }



    // self info edit 

    public function editOfficer(){
    	$user = Auth::user();
    	return view('officer.editOfficer', compact('user'));
    } 
    
    public function updateOfficer(Request $request)
    {

    	$user = Officer::find(Auth::user()->id);

		
    	$request->validate([
			'username'    => 'unique:officers,username,'.$user->id,
			// 'email'    => 'email|unique:officers,email,'.$user->id,
    	],[
    		// 'image.dimensions' => 'Image should be not more than 500px width & 500px height',
    	]);

    	// password validation
		if( $request->password != null or $request->password != ""){
			if( $request->c_password != null or $request->c_password != ""){

		    	if( $request->password != $request->c_password ){

					session()->flash('my_error', 'Password not entered correctly');
		    		return redirect()->back();
		    	}

		    	if( !(Hash::check($request->old_password, Auth::user()->password)) ){

					session()->flash('my_error', 'Old Password is not correct');
		    		return redirect()->back();
		    	}


				$user->password = Hash::make($request->c_password);
			}
		}

    	if( $request->phone != $request->c_phone ){

			session()->flash('my_error', 'Phone doesnt match');
    		return redirect()->back();
    	}
		// $user->username     = $request->username;
		$user->name         = $request->name;
		$user->email        = $request->email;
		$user->phone        = $request->phone;
		$user->address      = $request->address;
		$user->save();


		session()->flash('my_success', 'Info Updated');
        return redirect()->back();
    }


    // visitor report 



    public function visitorReport($visitorId){
        $visitor = Visitor::find($visitorId);
        if( $visitor->officer_id != Auth::user()->id ){
            return redirect()->back();
        }
        return view('officer.report', compact('visitorId'));
    }

    public function reportShow(Request $request, $visitorId){

        $visitor = Visitor::find($visitorId);
        if( $visitor->officer_id != Auth::user()->id ){
            return redirect()->back();
        }

        // dd($request);

        $from = substr($request->from,0,4).substr($request->from,5,2).substr($request->from,8,2);
        $to = substr($request->to,0,4).substr($request->to,5,2).substr($request->to,8,2);

        $pinUsages = PinUsage::where('date', '>=', $from)
                        ->where('date', '<=', $to)
                        ->where('visitor_id', $visitorId)
                        ->get();

        $class1 = 0;
        $class2 = 0;
        $class3 = 0;
        $class4 = 0;
        $class5 = 0;
        $class6 = 0;
        $class7 = 0;
        $class8 = 0;
        $class9 = 0;
        $class10 = 0;
        $total = 0;

        if( $pinUsages->count() > 0){

            foreach ($pinUsages as $pinU) {
                if($pinU->class==1){
                    $class1++;
                }
                if($pinU->class==2){
                    $class2++;
                }
                if($pinU->class==3){
                    $class3++;
                }
                if($pinU->class==4){
                    $class4++;
                }
                if($pinU->class==5){
                    $class5++;
                }
                if($pinU->class==6){
                    $class6++;
                }
                if($pinU->class==7){
                    $class7++;
                }
                if($pinU->class==8){
                    $class8++;
                }
                if($pinU->class==9){
                    $class9++;
                }
                if($pinU->class==10){
                    $class10++;
                }
            }
        }

        $total = $class1 + $class2 + $class3 + $class4 + $class5 + $class6 + $class7 + $class8 + $class9 + $class10;

        return view('officer.report', compact('total', 'class1', 'class2', 'class3', 'class4', 'class5', 'class6', 'class7', 'class8', 'class9', 'class10','from', 'to', 'visitorId'));
    }


    // login as visitor   
    
    public function visitorLogin(Request $request)
    {
        // dd($request);  
        Auth::guard('officer')->logout(); 
        Auth::guard('visitor')->loginUsingId($request->id);
        return redirect()->route('visitor.home');
    }
}