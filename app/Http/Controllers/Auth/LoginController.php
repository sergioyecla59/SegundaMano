<?php


namespace App\Http\Controllers\Auth;


use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Método para mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Método para procesar el login
    public function login(Request $request)
    {
        // Validar los campos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Verificar si el usuario existe en la base de datos
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Si las credenciales son correctas, autenticar al usuario
            Auth::login($user);

            // Obtener URL de redirección si existe
            $redirect = $request->input('redirect');

            // Redirigir al destino o a inicio
            return redirect()->intended($redirect ?? route('inicio'));
        } else {
            // Si las credenciales son incorrectas, mostrar error
            return back()->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }


    // Método para cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
