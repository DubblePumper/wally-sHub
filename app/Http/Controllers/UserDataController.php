<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserDataRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class UserDataController extends Controller
{
    /**
     * Update the user's profile information.
    */
    public function update(UpdateUserDataRequest $request): RedirectResponse
    {
        $request->user()->userData->fill($request->validated());

        $request->user()->userData->save();

        return Redirect::route('profile.edit')->with('status', 'userdata-updated');
    }
}
