<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <x-ui.input
            label="Current Password"
            name="current_password"
            type="password"
            required
            :error="$errors->first('current_password')"
        />

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-ui.input
                label="New Password"
                name="password"
                type="password"
                required
                :error="$errors->first('password')"
            />

            <x-ui.input
                label="Confirm Password"
                name="password_confirmation"
                type="password"
                required
                :error="$errors->first('password_confirmation')"
            />
        </div>

        <div class="pt-2">
            <x-ui.button type="submit">Update Password</x-ui.button>
        </div>
    </form>
</section>
