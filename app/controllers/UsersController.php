<?php

class UsersController extends BaseController {    

	/**
	 * get_login method
	 *
	 * Display the user login form.
	 *
	 * @return void
	 */
	public function getLogin()
	{
		$this->layout = View::make('layouts.login');
		$this->layout->nest('content', 'users.login');
	}

	/**
	 * post_login method
	 *
	 * Attempt to log a user into the system.
	 *
	 * @return void
	 */
	public function postLogin()
	{
		$credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];
        $remember = Input::get('remember');

        if (Auth::attempt($credentials, (bool)Input::get('remember_me')))
        {
            Session::flash('success', 'Login Successful');
            return Redirect::intended(action('HomeController@index'));
        }

        Session::flash('error', 'Your username or password was incorrect.');
        return Redirect::action('UsersController@getLogin')->withInput();	
	}

	/**
     * Send a password reminder email to a user via their email address.
     * 
     * @return Response
     */
    public function passwordReminder()
    {
        $credentials = ['email' => Input::get('email')];
        
        Password::remind($credentials, function($message, $user)
        {
            $message->subject('Code Sleeve Platform Password Recovery');
        });

        return Redirect::action('UsersController@getLogin');
    }

    /**
     * Display the password reset form.
     * 
     * @param  string $token 
     * @return Response
     */
    public function getPasswordReset($token)
    {
        $this->layout = View::make('layouts.login');
        $this->layout->nest('content', 'users.resetPassword', compact('token'));
    }

    /**
     * Resets the user's password.
     *
     * @param string $token
     */
    public function postPasswordReset()
    {
        $credentials = ['email' => Input::get('email')];

        return Password::reset($credentials, function($user, $password)
        {
            $user->password = $password;
            $user->save();

            Session::flash('success', "Your password has been changed. You can login now!");

            return Redirect::action('UsersController@getLogin');
        });
    }

}