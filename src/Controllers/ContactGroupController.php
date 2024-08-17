<?php

namespace ClarionApp\ContactsBackend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ClarionApp\ContactsBackend\Models\Contact;
use ClarionApp\ContactsBackend\Models\Group;

class ContactGroupController extends Controller
{
    /**
     * Attach a contact to a group.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $contactId
     * @param  string  $groupId
     * @return \Illuminate\Http\Response
     */
    public function attach(Request $request, $contactId, $groupId)
    {
        $contact = Contact::findOrFail($contactId);
        $group = Group::findOrFail($groupId);

        // Avoid attaching a contact to the same group multiple times
        if (!$contact->groups()->find($groupId)) {
            $contact->groups()->attach($groupId);
            return response()->json(['message' => 'Contact added to group successfully'], 200);
        }

        return response()->json(['message' => 'Contact is already in this group'], 409);
    }

    /**
     * Detach a contact from a group.
     *
     * @param  string  $contactId
     * @param  string  $groupId
     * @return \Illuminate\Http\Response
     */
    public function detach($contactId, $groupId)
    {
        $contact = Contact::findOrFail($contactId);
        $contact->groups()->detach($groupId);

        return response()->json(['message' => 'Contact removed from group successfully'], 200);
    }

    /**
     * List all groups a contact belongs to.
     *
     * @param  string  $contactId
     * @return \Illuminate\Http\Response
     */
    public function listGroups($contactId)
    {
        $contact = Contact::with('groups')->findOrFail($contactId);
        return response()->json($contact->groups);
    }
}
