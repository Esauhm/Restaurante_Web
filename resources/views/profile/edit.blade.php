<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-4">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Campos de edición de perfil -->
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
                    </div>

                    <div>
                        <button type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
