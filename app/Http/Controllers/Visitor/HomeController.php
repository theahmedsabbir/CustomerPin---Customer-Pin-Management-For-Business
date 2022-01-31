<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Officer;
use App\Visitor;
use App\Merchant;
use App\Pin;
use App\PinUsage;
use Hash;
use Auth;

class HomeController extends Controller
{   
    
    public function index()
    {
        return view('visitor.home');
    }

    // self info edit 

    public function editVisitor(){
    	$user = Auth::user();
    	return view('visitor.editVisitor', compact('user'));
    } 
    
    public function updateVisitor(Request $request)
    {

    	$user = Visitor::find(Auth::user()->id);

		
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

    // pins

    public function pinCheck(){
    	return view('visitor.pinCheck');
    }

    public function pinInfo(Request $request){
    	$pin = Pin::where('pin', $request->pin)->first();
    	return view('visitor.pinInfo',compact('pin'));
    }

    public function usePin(Request $request, $id){
    	$pin = Pin::find($id);

    	if( !is_null($pin) ){
    		$pinU = new PinUsage;

    		// pinUsage insert
    		$pinU->class = $pin->class;
    		$pinU->pin_id = $pin->id;
    		$pinU->visitor_id = Auth::user()->id;
    		$pinU->merchant_id = $pin->merchant_id;
    		$pinU->date = date("Ymd");
    		$pinU->save();

    		// pin table update
    		$pin->used_status = 1;
    		$pin->save();

	    	$pinReport = 1;
	    	return view('visitor.pinInfo',compact('pinReport'));
    	}
    }

    public function report(){
    	return view('visitor.report');
    }

    public function reportShow(Request $request){

		$from = substr($request->from,0,4).substr($request->from,5,2).substr($request->from,8,2);
		$to = substr($request->to,0,4).substr($request->to,5,2).substr($request->to,8,2);

		$pinUsages = PinUsage::where('date', '>=', $from)
						->where('date', '<=', $to)
						->where('visitor_id', Auth::user()->id)
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

    	return view('visitor.report', compact('total', 'class1', 'class2', 'class3', 'class4', 'class5', 'class6', 'class7', 'class8', 'class9', 'class10','from', 'to'));
    }
}
