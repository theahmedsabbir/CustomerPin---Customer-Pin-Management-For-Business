<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Merchant;
use App\Pin;
use App\PinUsage;
use Hash;
use Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('admin.home');
    }
    
    public function merchants()
    {
        return view('admin.merchants');
    }
    
    
    public function addMerchant()
    {
        return view('admin.addMerchant');
    }
    
    public function merchantStatus(Request $request, $id)
    {
    	$merchant = Merchant::find($id);
    	if(!is_null($merchant)){
    		if($merchant->status == 1){
    			$merchant->status = 0;
    			$merchant->save();
    		}else{
    			$merchant->status = 1;
    			$merchant->save();    			
    		}
    	}
        return redirect()->route('admin.merchants');
    }
    
    public function storeMerchant(Request $request)
    {
    	$request->validate([
			'username' => 'required|max:255|unique:merchants',
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

    	$merchant  = new Merchant;

    	$merchant->username = $request->username;
    	$merchant->password = Hash::make($request->password);
    	$merchant->name = $request->name;
    	$merchant->email = $request->email;
    	$merchant->phone = $request->phone;
    	$merchant->address = $request->address;
    	$merchant->product_type = $request->product_type;
    	$merchant->status = 1;
    	$merchant->save();


		session()->flash('my_success', 'Merchant Added');
        return redirect()->route('admin.merchants');
    }



    
    public function merchantShow($id)
    {
        $user = Merchant::find($id);
        return view('admin.merchantShow', compact('user'));
    }  


    
    
    public function editMerchant($id)
    {
        $user = Merchant::find($id);
        return view('admin.editMerchant', compact('user'));
    }


    
    public function updateMerchant(Request $request, $id)
    {
        // dd($request);

        $user = Merchant::find($id);

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


        session()->flash('my_success', 'Merchant Updated');
        return redirect()->back();
    }


    public function merchantReport($id){
        return view('admin.merchantReport', compact('id'));
    }

    public function reportShow(Request $request, $id){

        // dd($request);

        $from = substr($request->from,0,4).substr($request->from,5,2).substr($request->from,8,2);
        $to = substr($request->to,0,4).substr($request->to,5,2).substr($request->to,8,2);

        $pinUsages = PinUsage::where('date', '>=', $from)
                        ->where('date', '<=', $to)
                        ->where('merchant_id', $id)
                        ->get();

        $class1  = 0;
        $class2  = 0;
        $class3  = 0;
        $class4  = 0;
        $class5  = 0;
        $class6  = 0;
        $class7  = 0;
        $class8  = 0;
        $class9  = 0;
        $class10 = 0;
        $total   = 0;

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

        return view('admin.merchantReport', compact('total', 'class1', 'class2', 'class3', 'class4', 'class5', 'class6', 'class7', 'class8', 'class9', 'class10','from', 'to', 'id'));
    }
    
    
    // self info
    public function editAdmin()
    {
        return view('admin.editAdmin');
    }


    
    public function updateAdmin(Request $request)
    {
		$admin = Auth::user();
		
    	$request->validate([
			// 'email'    => 'email|unique:admins,email,'.$admin->id,
    	],[
    		// 'image.dimensions' => 'Image should be not more than 500px width & 500px height',
    	]);

    	if( $request->old_password != null or $request->old_password != ""){
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


    				$admin->email = $request->email;
    				$admin->password = Hash::make($request->password);
    				$admin->save();


    			}
    		}
    	}


		$admin->email = $request->email;
		$admin->save();


		session()->flash('my_success', 'Info Updated');
        return redirect()->back();
    }

    // pins



    public function pins($filter){
        if ($filter=="all") {
            $pins = Pin::orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="unused") {
            $pins = Pin::where('used_status', 0)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="used") {
            $pins = Pin::where('used_status', 1)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class1") {
            $pins = Pin::where('class', 1)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class2") {
            $pins = Pin::where('class', 2)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class3") {
            $pins = Pin::where('class', 3)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class4") {
            $pins = Pin::where('class', 4)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class5") {
            $pins = Pin::where('class', 5)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class6") {
            $pins = Pin::where('class', 6)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class7") {
            $pins = Pin::where('class', 7)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class8") {
            $pins = Pin::where('class', 8)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class9") {
            $pins = Pin::where('class', 9)->orderBy('id', 'asc')->paginate(200);
        } elseif ($filter=="class10") {
            $pins = Pin::where('class', 10)->orderBy('id', 'asc')->paginate(200);
        }else{
            $pins = Pin::orderBy('id', 'asc')->paginate(200);
        }
        
        return view('admin.pins', compact('pins'));
    } 

    public function pinDel(Request $request){

        $pinDels = $request->del;

        foreach ($pinDels as $pinDelId) {
            // delete from pin usage 
            $pinU = PinUsage::where('pin_id', $pinDelId)->first();

            if( !is_null($pinU) ){
                $pinU->delete();
            }
            // delete from pin
            $pin = Pin::find($pinDelId);

            if( !is_null($pin) ){
                $pin->delete();
            }
        }

        session()->flash('my_success', "Pin Deleted Successfully");
        return redirect()->back();
    }




    // login as merchant   
    
    public function merchantLogin(Request $request)
    {
        // dd($request);  
        Auth::guard('admin')->logout(); 
        Auth::guard('merchant')->loginUsingId($request->id);
        return redirect()->route('merchant.home');
    }
}
