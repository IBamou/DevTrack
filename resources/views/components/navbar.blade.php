<header class="h-16 flex items-center justify-between bg-white border-b border-slate-200 px-4 sm:px-6">
    <div></div>
    <div class="flex items-center" x-data="{ open: false }">
        <div class="relative">
            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="User avatar">
                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
            </button>
            
            <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border py-1 z-50" style="display: none;">
                <div class="px-4 py-2 border-b">
                    <p class="text-sm font-medium text-slate-800">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
                </div>
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-slate-100">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>