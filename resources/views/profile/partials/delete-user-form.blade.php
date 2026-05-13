<section>
    <p class="text-sm text-slate-600 mb-4">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
    
    <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
        @csrf
        @method('delete')

        <div>
            <label class="block text-sm font-medium text-slate-700">Enter your password to confirm deletion</label>
            <input type="password" name="password" required
                class="w-full mt-1 px-3 py-2 border border-slate-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                placeholder="Password">
            @error('password', 'userDeletion')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700">
            Delete Account
        </button>
    </form>
</section>