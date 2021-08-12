<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Item;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $items = $user->items()->orderBy('created_at', 'desc')->paginate(9);
        

        return view('users.show', [
            'user' => $user,
            'items' => $items,
        ]);
    }
}
