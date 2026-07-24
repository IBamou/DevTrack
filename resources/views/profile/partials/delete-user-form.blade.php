<section>
    <form method="post" action="{{ route('profile.destroy') }}" class="flex items-end gap-3">
        @csrf
        @method('delete')

        <div class="flex-1">
            <x-ui.input
                label="Enter your password to confirm deletion"
                name="password"
                type="password"
                placeholder="Password"
                required
                :error="$errors->first('password', 'userDeletion')"
            />
        </div>

        <x-ui.button type="submit" variant="danger">Delete Account</x-ui.button>
    </form>
</section>
