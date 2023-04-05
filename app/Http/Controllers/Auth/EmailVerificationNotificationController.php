<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Actions\EmailVerificationNotificationAction;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request, EmailVerificationNotificationAction $notification): JsonResponse|RedirectResponse
    {
        //action to Email Verification Action
        $notification->handle($request);

        return response()->json(['status' => 'verification-link-sent']);
    }
}
