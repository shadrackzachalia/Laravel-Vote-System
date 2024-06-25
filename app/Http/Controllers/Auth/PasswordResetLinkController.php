<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Voters;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordResetLinkController extends Controller
{
    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:voters']);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send("emails.forget-password",['token'=>$token], function ($message) use ($request){
            $message ->to($request->email);
            $message ->Subject("Reset Password");
        });

        return redirect()->to(route('password.request'))->with('status', "We have sent an email to reset password");

        // Attempt to send the password reset link to the user's email
        //$status = Password::sendResetLink(
          //  $request->only('email')
        //);

        //return $status === Password::RESET_LINK_SENT
              //      ? back()->with(['status' => __($status)])
                 //   : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword($token){
        return view('auth.newpassword',compact('token'));
    }

    // Method to handle resetting the password
    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:voters',
            'password' => 'required|min:8|confirmed',
        ]);

        $email = $request->email;
        $token = $request->token;

        // Check if the token and email are valid
        $passwordReset = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'Invalid token!']);
        }

        // Update the user's password
        $user = Voters::where('email', $email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'No user found with this email address!']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the reset token
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        return redirect()->route('user.login')->with('status', 'Password has been reset!');
    }
}