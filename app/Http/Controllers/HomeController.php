<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; 
use App\Models\Categoria; 
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtener todos los productos
        $products = Producto::all();
        $categories = Categoria::all();

        // Pasar los productos a la vista 'home'
        return view('home', ['products' => $products, 'categorias' => $categories]);
    }

    public function sendEmail(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        $recipient = config('mail.to.address'); // Obtener la dirección de correo desde el archivo .env

        Mail::to($recipient)->send(new ContactFormMail($data));

        return redirect()->back()->with('success', 'Correo enviado correctamente.');
    }

    
}

