<?php
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Agrega más campos si es necesario
        ]);

        return redirect()->route('profile.show')
            ->with('success', 'Profile updated successfully.');
    }
    public function edit()
    {
        return view('profile.edit');
    }
}
