<?php

namespace App\Http\Controllers\Auth;

use DB;
use Mail;
use App\User;
use App\OneKey;
use Validator;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\StoreUsers;
use App\Invitation;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'role_id' => 2,
            'surname' => $data['surname'],
            'specialty' => $data['specialty'],
            'city' => $data['city'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'college_code' => $data['college_code'],
            'password' => bcrypt($data['password']),
            'email_token' => str_random(16),
            'optin' => !empty($data['optin']) ? true: false
        ]);
    }
    public function register(StoreUsers $request)
    {
        $invitation = Invitation::where('code', $request->invitation_code)->where('disabled', false)->first();
        if (!$invitation) {
            $request
              ->session()
              ->flash(
                  'error',
                  'Le code d\'invitation saisi est invalide. Veuillez réessayer.'
              );
            return back()->withInput();
        }
        $oneKey = OneKey::where('region', $request->region)->where('city', $request->city)->where('specialty', $request->specialty)->first();
        if (!$oneKey) {
            $request
              ->session()
              ->flash(
                  'error',
                  'Les informations saisie ne correspondent pas à notre base de données, veuillez vérifier votre région, ville et spécialité.'
              );
            return back()->withInput();
        }
        DB::beginTransaction();
        try {
            $user = $this->create($request->all());
            $user->invitation_id = $invitation->id;
            $user->one_key_id = $oneKey->id;
            $user->save();
            $email = new EmailVerification(
                new User([
                    'email_token' => $user->email_token,
                    'name' => $user->name
                ])
            );
            Mail::to($user->email)->send($email);
            DB::commit();
            $request
                ->session()
                ->flash(
                    'status',
                    'Inscription effectuée avec succès, un email vous a été envoyé pour confirmer votre adresse email.'
                );
            return back();
        } catch (Exception $e) {
            DB::rollback();
            return back();
        }
        return redirect('confirmation');
    }
    public function verify($token)
    {
        User::where('email_token', $token)
            ->firstOrFail()
            ->verified();
        return redirect()->route('login')->with('status', 'Votre compte a été validé avec succès. Veuillez vous connecter avec les identifiants saisis lors de votre inscription');
    }
    public function showRegistrationForm()
    {
        $regions = OneKey::select('region')->distinct()->get();
        $cities = OneKey::select('city')->distinct()->get();
        $specialties = OneKey::select('specialty')->distinct()->get();

        return view('auth.register', compact('regions', 'cities', 'specialties'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
