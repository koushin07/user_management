<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Contact;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        $request->validated();
        // dd($request->validated());
        DB::transaction(function () use($request) {
            $user = User::create([
                'username' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'contact_number' => $request->contact_number,
                'password' => $request->password
            ]);

            Contact::create([
                'user_creator' => auth()->id(),
                'user_created' => $user->id

            ]);

        });

        // Auth::login($user);

     //   return redirect(RouteServiceProvider::HOME);
         return back();
    }
}
