<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Officer;
use App\Visitor;
use App\Merchant;
use App\Pin;
use App\PinUsage;
use Hash;
use Auth;


use Illuminate\Contracts\Auth\Authenticatable;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('merchant.home');
    }
    
    public function officers()
    {
        return view('merchant.officers');
    }    
    
    public function addOfficer()
    {
        return view('merchant.addOfficer');
    }
    
    public function storeOfficer(Request $request)
    {
    	$request->validate([
			'username' => 'required|max:255|unique:officers',
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

    	$user  = new Officer;

    	$user->username = $request->username;
    	$user->password = Hash::make($request->password);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->address = $request->address;
    	$user->status = 1;
    	$user->merchant_id = Auth::user()->id;
    	$user->save();


		session()->flash('my_success', 'Officer Added');
        return redirect()->route('merchant.officers');
    }
    
    public function officerStatus(Request $request, $id)
    {
    	$officer = Officer::find($id);
    	if(!is_null($officer)){
    		if($officer->status == 1){
    			$officer->status = 0;
    			$officer->save();
    		}else{
    			$officer->status = 1;
    			$officer->save();    			
    		}
    	}
        return redirect()->back();
    }
    
    public function officerShow($id)
    {
    	$user = Officer::find($id);
        return view('merchant.officerShow', compact('user'));
    }
    
    public function editOfficer($id)
    {
    	$user = Officer::find($id);
        return view('merchant.editOfficer', compact('user'));
    }
    
    public function updateOfficer(Request $request, $id)
    {

    	$user = Officer::find($id);

		
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


		session()->flash('my_success', 'Officer Updated');
        return redirect()->back();
    }





    
    public function visitors()
    {
        return view('merchant.visitors');
    }      
    
    public function addVisitor()
    {
        return view('merchant.addVisitor');
    }
    
    public function storeVisitor(Request $request)
    {
    	$request->validate([
			'username' => 'required|max:255|unique:visitors',
			// 'email'    => 'required|unique:visitors',
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
    	$user->merchant_id = Auth::user()->id;
    	$user->save();


		session()->flash('my_success', 'User Added');
        return redirect()->route('merchant.visitors');
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
        if( $user->merchant_id != Auth::user()->id ){
            return redirect()->back();
        }
        return view('merchant.visitorShow', compact('user'));
    }  
    
    public function editVisitor($id)
    {
    	$user = Visitor::find($id);
        return view('merchant.editVisitor', compact('user'));
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


    // report 


    public function visitorReport($visitorId){
        $visitor = Visitor::find($visitorId);
        if( $visitor->merchant_id != Auth::user()->id ){
            return redirect()->back();
        }
        return view('merchant.visitorReport', compact('visitorId'));
    }

    public function visitorReportShow(Request $request, $visitorId){

        $visitor = Visitor::find($visitorId);
        if( $visitor->merchant_id != Auth::user()->id ){
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

        return view('merchant.visitorReport', compact('total', 'class1', 'class2', 'class3', 'class4', 'class5', 'class6', 'class7', 'class8', 'class9', 'class10','from', 'to', 'visitorId'));
    }




    public function report(){
        return view('merchant.report');
    }

    public function reportShow(Request $request){

        $from = substr($request->from,0,4).substr($request->from,5,2).substr($request->from,8,2);
        $to = substr($request->to,0,4).substr($request->to,5,2).substr($request->to,8,2);

        $pinUsages = PinUsage::where('date', '>=', $from)
                        ->where('date', '<=', $to)
                        ->where('merchant_id', Auth::user()->id)
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

        return view('merchant.report', compact('total', 'class1', 'class2', 'class3', 'class4', 'class5', 'class6', 'class7', 'class8', 'class9', 'class10','from', 'to'));
    }



    // self info edit 

    public function editMerchant(){
    	$user = Auth::user();
    	return view('merchant.editMerchant', compact('user'));
    } 
    
    public function updateMerchant(Request $request)
    {

    	$user = Merchant::find(Auth::user()->id);

		
    	$request->validate([
			'username'    => 'unique:merchants,username,'.$user->id,
			// 'email'    => 'email|unique:merchants,email,'.$user->id,
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

		$user->username     = $request->username;
		$user->name         = $request->name;
		$user->email        = $request->email;
		$user->phone        = $request->phone;
		$user->product_type = $request->product_type;
		$user->address      = $request->address;
		$user->save();


		session()->flash('my_success', 'Info Updated');
        return redirect()->back();
    }



    // pin

    public function pins($filter){
        if ($filter=="all") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="unused") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('used_status', 0)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="used") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('used_status', 1)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class1") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('class', 1)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class2") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('class', 2)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class3") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('class', 3)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class4") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('class', 4)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class5") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('class', 5)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class6") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('class', 6)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class7") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('class', 7)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class8") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('class', 8)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class9") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('class', 9)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class10") {
            $pins = Pin::where('merchant_id', Auth::user()->id )->where('class', 10)->orderBy('id', 'asc')->paginate(200);
        }else{
            $pins = Pin::where('merchant_id', Auth::user()->id )->orderBy('id', 'asc')->paginate(200);
        }
        
        return view('merchant.pins', compact('pins'));
    } 

    public function pinGenerate(){
        return view('merchant.pinGenerate');
    } 

    public function pinStore(Request $request){
        // dd($request);

        // unique 14 digit pin generate 
        // check database 
        // if not regenerate
        // when found store in db & add it to a array
        // 

        //getting requirements
        $number = $request['pin_no'];
        $class = $request['class'];
        $loggedInUser = Auth::user()->id;

        $pinDisplay = "<p align='center' style='font-size:20px;' onClick='this.select();'>";

        
        for( $i=1; $i<=$number; $i++ ) {

            // generating single pin 
            $pin = rand(100,999).date("H").$loggedInUser.date("is").$i;
            $pinlength = strlen((string) $pin);            
            if($pinlength < 14) {
                for($j=0; $j<(14-$pinlength); $j++) {
                    $pin .= rand(1,9);
                }
            }
            // insert into db
            $pinDb = new Pin;
            $date = date("Ymd");

            $pinDb->class = $class;
            $pinDb->merchant_id = Auth::user()->id;
            $pinDb->pin = $pin;
            $pinDb->date = $date;
            $pinDb->used_status = 0;
            $pinDb->save();


            // pin append with string
            $pinDisplay .= $pin."<br/>";
        }

        $pinDisplay .= "</p>";

        return redirect()->route('merchant.pinGenerate', compact('pinDisplay'));
    } 


    // login as visitor   
    
    public function visitorLogin(Request $request)
    {
        // dd($request);  
        Auth::guard('merchant')->logout(); 
        Auth::guard('visitor')->loginUsingId($request->id);
        return redirect()->route('visitor.home');
    }


}