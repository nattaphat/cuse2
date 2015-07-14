<?php
class AuthController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showLoginfrm()
	{
        //print App::environment();exit;
		if(Auth::check())
		{
            if(Auth::getUser()->grp_id == 1) {
            //return View::make('layouts.admin');
            return Redirect::to('policy-content');
            }
            else {
                $policy = new Policy();
                $per_page = Config::get('nhc/site.policy_perpage') ;
                //var_dump($policy->getAllPolicy($per_page)->toArray());exit;
                return View::make('welcome')
                        ->with('relate_policy',Policy::getPolicyByUserId())
                        ->with('paginator',$policy->getAllPolicy($per_page));
            }
		}
		return View::make('login');
	}

	public function loginAction()
	{
        Input::flash();
        //$data = Input::all();
        $data = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
		// 'min:3' ensures that the value is greater than or equal to the parameter provided
		// 'max:32' ensure that the value is less than or equql to the parameter provided
		$rules = array(
			//'username' => array('alpha', 'min:4','max:16','required'), 
			'username' => array( 'min:4','max:16','required'), 
            'password' => array('required','alpha_num'),
		);

        $messages = array(
            'username.required' => 'กรุณาระบุชื่อผู้ใช้งาน',
            'username.min'      => 'ชื่อผู้ใช้งานจะต้องยาวกว่า :min ตัวอักษร',
            'password.required' => 'กรุณาระบุรหัสผ่าน'
        );

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->passes())
        {	
            $usernhc = Usernhc::where('username','=',$data['username'])->first(array('status','grp_id'));
            
            if(isset($usernhc) && $usernhc->status=='yes'){
                if(Auth::attempt($data))
                {
                    //Redirect to secure area.
                    return Redirect::to('admin')
                            ->with('success','เข้าสู่ระบบสำเร็จ');
                            //->with(array('success'=>'Yor have logged in successfully','grp_id'=>$usernhc->grp_id));
                }else
                {   
                    //Redirect to the login page.
                    return Redirect::to('login')
                            ->withErrors(array('password'=>'รหัสผ่านไม่ถูกต้อง'));
                }
            }//end if user->active
        	else{
                return Redirect::to('login')
                            ->withErrors(array('status'=>'ท่านยังไม่ได้ลงทะเบียนหรือยังไม่ได้รับอนุญาตให้เข้าสู่ระบบ'));
            }
        }
        //Something went wrong.
        return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
	}

	public function logoutAction()
	{
		// Log out
        
        if(Auth::User())
        {
            $user = new Usernhc();
            $user_id = Auth::User()->id;
            $user_info = $user->getUsernhcById($user_id);
            $logs = new Logs();
            $logs->ip = Request::getClientIp();
            $logs->host = Request::root(); 
            $logs->lastpage = '';
            $logs->last_visit = date('Y-m-d H:i:s');
            $logs->role_id = $user_info[0]->role_id;
            $logs->data_id = rand(1, 11);
            $logs->userid = $user_id;
            $logs->save();    
        }
        

        // Redirect to homepage
        if(Auth::logout())
        {
            Auth::logout();
            return Redirect::to('login')->with('success', 'ออกจากระบบสำเร็จ');
        }else
        {
            return Redirect::to('login')->with('success', 'ออกจากระบบสำเร็จ');
        }
	}

    public function registerFrmAction()
    {
    	$agency = Agency::all();
    	return View::make('register')->with('agency',$agency);
    }

    public function registerAction()
    {
        Input::flash();
        $data = Input::all();
        $nhc_config = Config::get('nhc/site.init_privacy');

        $rules = array(
            'fname' => 'required',
            'agency_id' =>'required', 
            'username' =>'required | alpha_dash',
            'username' =>'required',
            'password' =>'required | min:6 |same:password_confirmation',
            'password_confirmation' => 'required',
            'email' =>'required | email '
        );


        $messages = array(
            'fname.required' => 'กรุณาระบุชื่อผู้ใช้งาน',
            'agency_id.required' => 'กรุณาระหน่วยงานสังกัด',
            'username.required' => 'กรุณาระบุชื่อผู้ใช้งาน',
            'username.alpha_dash' => 'ชื่อผู้ใช้งานต้องประกอบด้วยตัวอักษร ตัวเลข หรืออันเดอร์สกอร์เท่านั้น',
            'password.required' => 'กรุณาระบุรหัสผ่าน',
            'password.min' => 'ความยามรหัสผ่านอย่างน้อย :min อักษร',
            'password.same' => 'รหัสผ่านที่กรอกไม่ตรงกัน',
            'password_confirmation.required'=>'กรุณาระบุรหัสผ่านอีกครั้ง',
            'email.required' => 'กรุณาระบุอีเมล์',
            'email.email' => 'รูปแบบอีเมล์ไม่ถูกต้อง',
        );

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()){
            
            $usernhc = new Usernhc();
            $ck_email = $usernhc->checkUserByEmail($data['email']);
            $ck_username = $usernhc->checkUsername($data['username']);
            if( (!$ck_email) && (!$ck_username) ) 
            {
                $usernhc->agency_id = $data['agency_id'];
                $usernhc->grp_id = $data['grp_id'];
                $usernhc->username = $data['username'];
                $usernhc->password = Hash::make($data['password']);
                $usernhc->email = $data['email'];
                $usernhc->fname = $data['fname'];
                $usernhc->lname = $data['lname'];
                $usernhc->telno = $data['telno'];
                $usernhc->status = $data['status'];
                $usernhc->save();

                //set basic privacy to new user
                $privacy = new Privacy(); 
                $privacy->userid = $usernhc->getUserIdByUserName($data['username']);
                // $privacy->fname = true;
                // $privacy->lname = false;
                // $privacy->email = false;
                // $privacy->telno = false;
                // $privacy->agency = false;
                // $privacy->ministry = false;
                // $privacy->role = false;

                $rs = PrivacyInit::all()->toArray();
                foreach ($rs as $key => $value) {
                    $result[$value['name_en']]['val'] = $value['init_value'];
                    $result[$value['name_en']]['th'] = $value['name_th'];
                    $result[$value['name_en']]['en'] = $value['name_en'];
                }

                $privacy->fname = $result['fname']['val'];
                $privacy->lname = $result['lname']['val'];
                $privacy->email = $result['email']['val'];
                $privacy->telno = $result['telno']['val'];
                $privacy->agency = $result['agency']['val'];
                $privacy->ministry = $result['ministry']['val'];
                $privacy->role = $result['role']['val'];
                $privacy->save();

                $role = new RoleUser();
                $role->role_id = 6; 
                $role->user_id = $usernhc->getUserIdByUserName($data['username']);
                $role->save();
                
                return Redirect::route('login')->with('success','ระบบบันทึกการลงทะเบียนสำเร็จกรุณารอ 24 ชั่วโมงจึงจะสามารถเข้าใช้งานระบบได้');                            
            }else{
                return Redirect::route('regis')
                                    ->withInput()
                                    ->withErrors(array(
                                        'message'=>'อีเมล์หรือชื่อผู้ใช้งานมีอยู่ในระบบแล้ว'
                                        ));
            }
            
        }else{
            return Redirect::route('regis')->withErrors($validator);
        }

    }

    public function resetpwdFrmAction()
    {
    	return View::make('resetpwd');
    }

    public function remindpwdAction()
    {
     	$data = Input::all();
    	//var_dump($data);exit();
		$rules = array(
			'emailremind' => 'email',
            'emailremind' =>'required', 
		);

		$messages = array(
			'emailremind.email' => 'รูปแบบอีเมล์ไม่ถูกต้อง',
			'emailremind.required' => 'กรุณาระบุอีเมล์'
		);

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()){
        	$usernhc = new Usernhc();
            $ck_email = $usernhc->checkUserByEmail($data['emailremind']);

            if($ck_email)//if it has an email in system
            {
                $credentials = array('email' => $data['emailremind']);
                //return 'pass';
                Password::remind($credentials, function($message, $user)
                {
                    $message->subject('ระบบคลังสารสนเทศกลาง:กู้รหัสผ่าน');
                });
                return Redirect::to('login')
                                    ->with('success','ระบบดำเนินการส่งอีเมล์สำเร็จ');
            }else{
                return Redirect::to('resetpassword')
                            ->withErrors(array('emailremind' => 'ไม่มีอีเมล์นี้ในระบบ'));
            }
            
        }else{
        	//return 'fail';
        	return Redirect::to('resetpassword')->withErrors($validator);
        }
    }

    public function resetpwdAction()
    {
        $data = Input::all();
        //var_dump($data);exit();

        $rules = array(
            'emailremind' =>'required | email',
            'password' => 'required | min:6 | same:password_confirmation'
        );

        $messages = array(
            'emailremind.email' => 'รูปแบบอีเมล์ไม่ถูกต้อง',
            'emailremind.required' => 'กรุณาระบุอีเมล์',
            'password.required' => 'กรุณาระบุรหัสผ่าน',
            'password.same'=>'รหัสผ่านที่กรอกไม่ตรงกัน',
            'password.min' => 'ความยามรหัสผ่านอย่างน้อย :min ตัวอักษร',
        );

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()){
            $ck_email = new Usernhc();
            $rs_ckemail = $ck_email->checkUserByEmail($data['emailremind']);
            
            if($rs_ckemail)
            {
                $credentials = array(
                            'email' => Input::get('emailremind'),
                            'password' => Input::get('password'),
                            'password_confirmation' => Input::get('password_confirmation'),
                            'token' => Input::get('token'),
                            );
                
                Password::reset($credentials, function($user, $password)
                {
                    $user->password = Hash::make($password);
                    $user->save();
                });
                return Redirect::to('/login')->with('success','เปลี่ยนรหัสผ่านสำเร็จ');
            }else
            {
                return Redirect::to('/password/reset/'.$data['token'])
                                        ->withErrors(array(
                                                'message'=> 'ไม่มีอีเมล์นี้ในระบบ'
                                            ));
            }
            
        }else{
            //return 'fail';
            return Redirect::to('/password/reset/'.$data['token'])->withErrors($validator);
        }
    }

}