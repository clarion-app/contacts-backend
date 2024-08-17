<?php

namespace ClarionApp\ContactsBackend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ClarionApp\ContactsBackend\Models\Email;

class EmailController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'contact_id' => 'required|uuid',
            'email_address' => 'required|email'
        ]);

        $email = Email::create($validated);
        return response()->json($email, 201);
    }

    public function destroy($id) {
        $email = Email::findOrFail($id);
        $email->delete();
        return response()->json(null, 204);
    }
}
