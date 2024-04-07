<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class LoginComponent extends Component
{

    public $email, $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if ($user->role == 'administrator') {
                return redirect()->route('administrator.dashboard');
            }
        }


    }

    public function render()
    {
        return view('livewire.pages.login-component')->layout('components.layouts.auth');
    }
}
