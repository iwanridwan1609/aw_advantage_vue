<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Actions\UpdatePasswordAction;

class PasswordResetLinkController extends Controller
{
    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, UpdatePasswordAction $updatepass): JsonResponse
    {
        //action to UpdatePasswordAction
        $updatepass->handle($request);

        return response()->json(['status' => __($status)]);
    }
}
