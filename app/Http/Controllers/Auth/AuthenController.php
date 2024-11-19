<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthenController extends Controller
{
    public function showFormRegister()
    {
        return view('auth.register');
    }
    public function handleRegister()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users'),
                'email'
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[\W_]/'
            ]
        ]);

        try {
            $user = User::query()->create($data);

            Auth::login($user);

            request()->session()->regenerate();

            return redirect()->route('member.index')->with('success', true);
        } catch (\Throwable $th) {
            return back()->with('success', false);
        }
    }
    public function showFormLogin()
    {
        return view('auth.login');
    }
    public function handleLogin()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();

            /**
             * @var User
             */
            
            $user = Auth::user();

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('client.index');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không khớp với hồ sơ của chúng tôi.',
        ])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
