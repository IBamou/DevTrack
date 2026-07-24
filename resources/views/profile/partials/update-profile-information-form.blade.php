<section>
    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <x-ui.input
            label="Name"
            name="name"
            type="text"
            :value="old('name', $user->name)"
            required
            :error="$errors->first('name')"
        />

        <x-ui.input
            label="Email"
            name="email"
            type="email"
            :value="old('email', $user->email)"
            required
            :error="$errors->first('email')"
        />

        <div class="pt-2">
            <x-ui.button type="submit">Save Changes</x-ui.button>
        </div>
    </form>
</section>
