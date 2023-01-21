<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Routing\Redirector;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    /**
     * Create a new user
     *
     * @param UserRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(UserRequest $request): RedirectResponse | Redirector
    {
        $payload = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        auth()->login(User::create($payload));

        return redirect(route('products.manage'))->with('message', 'User created and logged in');
    }

    /**
     * Logou user
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function logout(Request $request): RedirectResponse | Redirector
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Login page view
     *
     * @return View|Factory
     */
    public function login(): View | Factory
    {
        return view('users.login');
    }

    /**
     * Authenticate user
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (!auth()->attempt($formFields)) {
            return back()
                ->withErrors(['email' => 'Invalid Credentials'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect(route('products.manage'))->with('message', 'You are now logged in!');
    }
}
