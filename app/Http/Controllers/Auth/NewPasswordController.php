<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Actions\NewPasswordAction;

class NewPasswordController extends Controller
{
    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, NewPasswordAction $newpass): JsonResponse
    {
        //action to New Password Action
        $newpass->handle($request);

        return response()->json(['status' => __($status)]);
    }
}
