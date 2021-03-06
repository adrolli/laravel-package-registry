<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required',
    ];

    public function submitForm(Request $request)
    {

        if (Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {

            $request->session()->regenerate();
            return redirect()->intended('dashboard');

        } else {

            session()->flash('error', 'User and password do not match.');

        }

    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
