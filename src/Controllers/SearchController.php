<?php

namespace ClarionApp\ContactsBackend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ClarionApp\ContactsBackend\Models\Contact;
use ClarionApp\ContactsBackend\Models\Group;

class SearchController extends Controller
{
    /**
     * Search and filter contacts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchContacts(Request $request)
    {
        $query = Contact::query();

        // Filter by name
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Filter by contact type
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        // Filter by group ID
        if ($request->has('group_id')) {
            $query->whereHas('groups', function ($q) use ($request) {
                $q->where('id', $request->group_id);
            });
        }

        // Include relationships if needed
        if ($request->filled('include')) {
            $includes = explode(',', $request->include);
            $query->with($includes);
        }

        $contacts = $query->get();

        return response()->json($contacts);
    }
}
