<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function getLogin(): View
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        if (Auth::attempt($attributes)) {
            return redirect()->route('task.index');
        }

        return redirect()->route('auth.login')->withInput()->withErrors([
            'email' => __('Credentials does not match')
        ]);
    }
}
