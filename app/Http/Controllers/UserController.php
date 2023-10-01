<?php

namespace App\Http\Controllers;

use App\Http\Constants\UserMessage;
use App\Http\Requests\User\AuthenticateRequest;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(): View
    {
        return view('users.register');
    }

    public function login(): View
    {
        return view('users.login');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $user = $this->user->create($request->validated());

        auth()->login($user);

        return redirect('/')
            ->with('message', UserMessage::CREATED);
    }

    public function authenticate(AuthenticateRequest $request): RedirectResponse
    {
        if (auth()->attempt($request->validated())) {
            session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()
            ->withErrors(['password' => UserMessage::ERROR_LOGIN])->onlyInput('email');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')
            ->with('message', UserMessage::LOGOUT);
    }
}
