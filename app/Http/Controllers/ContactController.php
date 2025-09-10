<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
 
    public function index(Request $request)
    {
        $search = $request->query('search');

        $contacts = Contact::when($search, function($query) use ($search) {
                $query->where('nombre', 'like', "%$search%")
                      ->orWhere('apellidos', 'like', "%$search%")
                      ->orWhere('nro_documento', 'like', "%$search%")
                      ->orWhere('correo', 'like', "%$search%")
                      ->orWhere('telefono', 'like', "%$search%");
            })
            ->paginate(10);

        $contacts->appends(['search' => $search]);

        return view('contacts.index', compact('contacts', 'search'));
    }


    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'nro_documento' => 'required|digits:8|unique:contacts,nro_documento',
            'correo' => 'nullable|email|max:100',
            'telefono' => 'nullable|digits:9',
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index')->with('success', 'Contacto registrado');
    }


    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'nro_documento' => 'required|digits:8|unique:contacts,nro_documento,'.$contact->id,
            'correo' => 'nullable|email|max:100',
            'telefono' => 'nullable|digits:9',
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')->with('success', 'Contacto actualizado');
    }


    public function destroy(Contact $contact)
    {
        if($contact->cars()->count() > 0){
            return response()->json([
                'success' => false,
                'message' => 'No se puede eliminar el contacto, tiene vehículos asociados'
            ]);
        }

        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contacto eliminado correctamente'
        ]);
    }
}
