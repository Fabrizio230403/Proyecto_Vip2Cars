<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Contact;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->query('search');

        $cars = Car::with('contact')
            ->when($search, function($query) use ($search) {
                $query->where('placa', 'like', "%$search%")
                      ->orWhere('marca', 'like', "%$search%")
                      ->orWhere('modelo', 'like', "%$search%")
                      ->orWhereHas('contact', function($q) use ($search) {
                          $q->where('nombre', 'like', "%$search%")
                            ->orWhere('apellidos', 'like', "%$search%");
                      });
            })
            ->paginate(10);

        $cars->appends(['search' => $search]);

        return view('cars.index', compact('cars', 'search'));
    }


    public function create()
    {
        $contacts = Contact::all();
        return view('cars.create', compact('contacts'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'placa' => 'required|unique:cars|max:20',
            'marca' => 'required|max:100',
            'modelo'=> 'required|max:100',
            'anio_fabricacion' => 'required|date|before_or_equal:today',
            'contact_id' => 'required|exists:contacts,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if($request->hasFile('imagen')){
        $validated['imagen'] = $request->file('imagen')->store('cars', 'public');
        }

        Car::create($validated);

        return redirect()->route('cars.index')->with('success','Vehículo registrado');
    }


    public function show(Car $car)
    {
        $car->load('contact');
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        $contacts = Contact::all();
        return view('cars.edit', compact('car', 'contacts'));
    }


    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'placa' => 'required|max:20|unique:cars,placa,'.$car->id,
            'marca' => 'required|max:100',
            'modelo'=> 'required|max:100',
            'anio_fabricacion' => 'required|date|before_or_equal:today',
            'contact_id' => 'required|exists:contacts,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if($request->hasFile('imagen')){
        $validated['imagen'] = $request->file('imagen')->store('cars', 'public');
        }

        $car->update($validated);

        return redirect()->route('cars.index')->with('success','Vehículo actualizado');
    }


    public function destroy(Car $car)
    {
        $car->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehículo eliminado correctamente'
        ]);
    }
    
}
