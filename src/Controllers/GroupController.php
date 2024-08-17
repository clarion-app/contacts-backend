<?php

namespace ClarionApp\ContactsBackend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ClarionApp\ContactsBackend\Models\Group;

class GroupController extends Controller
{
    public function index() {
        $groups = Group::all();
        return response()->json($groups);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'group_type' => 'required|in:friend,business'
        ]);

        $group = Group::create($validated);
        return response()->json($group, 201);
    }

    public function show($id) {
        $group = Group::findOrFail($id);
        return response()->json($group);
    }

    public function update(Request $request, $id) {
        $group = Group::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'group_type' => 'sometimes|in:friend,business'
        ]);

        $group->update($validated);
        return response()->json($group);
    }

    public function destroy($id) {
        $group = Group::findOrFail($id);
        $group->delete();
        return response()->json(null, 204);
    }
}
