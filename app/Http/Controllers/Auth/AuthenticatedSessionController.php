<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Actions\LoginAction;
use App\Actions\LogoutAction;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request, LoginAction $login): Response
    {
        //action to Login Action
        $login->handle($request);

        return response()->noContent();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request, LogoutAction $logout): Response
    {
        //action to Logout Action
        $logout->handle($request);

        return response()->noContent();
    }
}
