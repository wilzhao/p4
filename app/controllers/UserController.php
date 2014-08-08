<?

class UserController extends BaseController{

	public function __construct(){
		
	}

	public function getCreate(){
		return View::make('newuser');
	}

	public function postCreate(){

		$user = new User;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');
		try{
			$user->save();
		} catch (Exception $e){
			return Redirect::to('/user/create')->withInput();
		}
		return View::make('newuser-create');
	}

	public function getLogin(){
		return View::make('login');
	}

	public function postLogin(){
		$check = Input::only('username','password');
		if (Auth::attempt($check, $remember = true)) {
			return Redirect::intended('/');
		}
		else {
			return Redirect::to('/login')
				->withInput();
		}
	}

	public function getLogout(){

		Auth::logout();

		return Redirect::to('/');
	}

}