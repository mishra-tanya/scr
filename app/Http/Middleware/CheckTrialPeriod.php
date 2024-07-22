<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckTrialPeriod
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user) {
            $created_at = $user->created_at->timezone('Asia/Kolkata');;
            $trial_days = $user->trial_days;
            $trial_ends_at = $created_at->copy()->addDays($trial_days);
            if ($user->payment_status == 0 && Carbon::now()->gt($trial_ends_at)) {
                return redirect()->route('payment.page')->with('message', 'Your trial period has ended. Please subscribe to continue.');
            }
            session(['trial_ends_at' => $trial_ends_at]);
        }

        return $next($request);
    }
}
