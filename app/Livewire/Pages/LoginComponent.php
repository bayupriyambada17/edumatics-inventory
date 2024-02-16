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

        if (auth()->attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) {
            session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Invalid credentials');
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.pages.login-component')->layout('template.auth.auth');
    }
}
