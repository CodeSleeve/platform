<?php namespace Codesleeve\Platform\Controllers;

use Input, View, Password, Session, Redirect;

class PasswordResetController extends BaseController
{
    /**
     * Show the password reminder page (if we want to do it this way)
     * Most likely we will just show a modal or something.
     *
     * @return Response
     */
    public function create()
    {
        $this->layout = render("platform::layouts.login");

        $this->layout->nest('content', viewpath("platform::password_reset.create"), compact('token'));
    }

	/**
     * Send a password reminder email to a user via their email address.
     *
     * @return Response
     */
    public function store()
    {
        $credentials = ['email' => Input::get('email')];

        Password::remind($credentials, function($message, $user)
        {
            $message->subject('Code Sleeve Platform Password Recovery');
        });

        Session::flash('success', "An email with instructions on how to recovery your password as been sent.");

        return Redirect::action($this->namespaced("AuthController@create"));
    }

    /**
     * Display the password reset form for a given $token
     *
     * @param  string $token
     * @return Response
     */
    public function edit($token)
    {
        $this->layout = render("platform::layouts.login");

        $this->layout->nest('content', viewpath("platform::password_reset.edit"), compact('token'));
    }

    /**
     * Resets the user's password.
     *
     * @param string $token
     */
    public function update($token)
    {
        $credentials = ['email' => Input::get('email')];

        return Password::reset($credentials, function($user, $password)
        {
            $user->password = $password;

            $user->save();

            Session::flash('success', "Your password has been changed. You can login now!");

            return Redirect::action($this->namespaced("AuthController@create"));
        });
    }
}