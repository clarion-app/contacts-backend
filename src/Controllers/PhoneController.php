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
            'phone_number' => 'required|string',
            'label' => 'nullable|string'
        ]);

        $phone = Phone::create($validated);
        return response()->json($phone, 201);
    }

    public function update(Request $request, $id) {
        $phone = Phone::findOrFail($id);
        $validated = $request->validate([
            'phone_number' => 'sometimes|string',
            'label' => 'nullable|string'
        ]);

        $phone->update($validated);
        return response()->json($phone);
    }

    public function destroy($id) {
        $phone = Phone::findOrFail($id);
        $phone->delete();
        return response()->json(null, 204);
    }
}
