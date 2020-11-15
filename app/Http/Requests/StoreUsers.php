<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsers extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function attributes()
    {
        return [
            'name' => 'Nom',
            'surname' => 'Nom de famille',
            'password' => 'Mot de passe',
            'college_code' => 'Numéro de l\'ordre des médecins',
            'phone' => 'Numéro de téléphone',
            'city' => 'Ville',
            'region' => 'Région',
            'invitation_code' => 'Code d\'invitation',
            'specialty' => 'Spécialité',
            'email' => 'Email',
            'optin' => 'Accepter les CGU',
            'photo' => 'Photo de profil'
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|string|max:255',
          'surname' => 'required|string|max:255',
          'city' => 'required|string|max:255',
          'region' => 'required|string|max:255',
          'phone' => 'required|regex:/^(0)([ \-_]*)(\d[ \-_]*){9}$/',
          'college_code' => 'required|regex:/(^[0-9\/]{1,10})/',
          'invitation_code' => 'required|string',
          'specialty' => 'required|string|max:255',
          'email' => 'required|string|max:255|unique:users,email',
          'photo' => 'sometimes|required|image',
          'password' => ["required", "min:8", "confirmed", "regex:/[A-Za-z]/", "regex:/[0-9]/", "regex:/[@$!%\-\/\\~'()_+;,^*:#?&]/"],
          'optin' => 'required'
        ];
    }
}
