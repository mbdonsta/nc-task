<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function getRegister(): View
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request, UserService $userService): RedirectResponse
    {
        $attributes = $request->validated();
        $user = $userService->create($attributes);
        Auth::login($user);

        return redirect()->route('task.index');
    }
}
