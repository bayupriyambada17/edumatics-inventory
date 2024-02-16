<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.pages.admin.logout')->layout('template.admin.main');
    }
}
