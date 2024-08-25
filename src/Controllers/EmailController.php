<?php

namespace ClarionApp\ContactsBackend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ClarionApp\ContactsBackend\Models\Email;

class EmailController extends Controller
{
    /**
     * Get all email addresses for a contact.
     * 
     * @param  string  $contact_id
     * @return \Illuminate\Http\Response
     */
    public function index($contact_id) {
        $emails = Email::where('contact_id', $contact_id)->get();
        return response()->json($emails);
    }

    /**
     * Store a new email address for a contact.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'contact_id' => 'required|uuid',
            'email_address' => 'required|email',
            'label' => 'nullable|string'
        ]);

        $email = Email::create($validated);
        return response()->json($email, 201);
    }

    /**
     * Update a contact's existing email address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $email = Email::findOrFail($id);
        $validated = $request->validate([
            'email_address' => 'sometimes|email',
            'label' => 'nullable|string'
        ]);

        $email->update($validated);
        return response()->json($email);
    }

    /**
     * Delete an email address from a contact.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $email = Email::findOrFail($id);
        $email->delete();
        return response()->json(null, 204);
    }
}
