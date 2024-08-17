<?php

namespace ClarionApp\ContactsBackend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ClarionApp\ContactsBackend\Models\Phone;

class PhoneController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'contact_id' => 'required|uuid',
            'phone_number' => 'required|string'
        ]);

        $phone = Phone::create($validated);
        return response()->json($phone, 201);
    }

    public function destroy($id) {
        $phone = Phone::findOrFail($id);
        $phone->delete();
        return response()->json(null, 204);
    }
}
