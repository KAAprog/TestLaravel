<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    //afficher le formulaire de connexion
    public function showLoginForm():View{
        return view('aith.login');
    }
    //Traiter la soumission du formulaire
    public function login(Request $request):RedirectResponse{
        // Validation des données
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Tentative d'authentification
          if (Auth::attempt([
            'login'    => $credentials['login'],
            'password' => $credentials['password'],
            'statut'   => 'ACTIF',
            ], $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'))
                    ->with('success', 'Connexion réussie.');
                }

                 return back()
                 ->withErrors(['login' => 'Identifiants incorrects ou compte inactif.'])
                 ->onlyInput('login');
            }
    //Déconnexion de l'utilisateur
    public function logout(Request $request):RedirectResponse{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
                ->with('success', 'Déconnexion réussie.');
    }
}
