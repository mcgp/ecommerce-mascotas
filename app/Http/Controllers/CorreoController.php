<?php

// En app/Http/Controllers/CorreoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class CorreoController extends Controller
{
    public function enviarCorreo(Request $request)
    {
        // Validar los datos del formulario según sea necesario
        $request->validate([
            'email' => 'required|email',
            'mensaje' => 'required',
        ]);

        // Enviar el correo
        Mail::to('maria.1701614679@ucaldas.edu.co')->send(new ContactFormMail($request->all()));

        return redirect()->back()->with('success', 'Correo enviado exitosamente.');
    }
}

