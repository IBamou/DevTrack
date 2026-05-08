@php
    $showUrl = route('projects.show', $project);
    $progress = max(0, min(100, (int) ($project->progress ?? 0)));
    $status = $project->status ?? 'healthy';
@endphp

<div
    class="relative bg-white rounded-lg border border-slate-200 p-5 block hover:border-blue-300 hover:shadow-md transition-all">
    {{-- Full card clickable link without breaking nested menu links/buttons --}}
    <a href="{{ $showUrl }}"
        class="absolute inset-0 z-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        aria-labelledby="project-title-{{ $project->id }}"></a>

    <div class="relative z-10 pointer-events-none">
        <div class="flex justify-between items-start">
            {{-- <span
                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                {{ $project->category ?? 'Development' }}
            </span> --}}
            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                    @if($status === 'healthy') bg-green-100 text-green-700
                    @elseif($status === 'at_risk') bg-yellow-100 text-yellow-800
                    @else bg-red-100 text-red-700
                    @endif
                ">
                {{ ucfirst(str_replace('_', ' ', $status)) }}
            </span>
            <div x-data="{ open: false }" @click.outside="open = false" class="relative z-20 pointer-events-auto">
                <button type="button" @click.stop.prevent="open = !open" class="text-slate-400 hover:text-slate-600"
                    aria-label="Project actions">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>

                <div x-show="open" x-transition x-cloak @click.stop
                    class="absolute right-0 mt-1 w-32 bg-white rounded-md shadow-lg border border-slate-200 z-30 overflow-hidden">
                    <a href="{{ $showUrl }}" class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">
                        View
                    </a>

                    @can('update', $project)
                        <a href="{{ route('projects.edit', $project) }}"
                            class="block px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">
                            Edit
                        </a>
                    @endcan

                    @can('delete', $project)
                        <form action="{{ route('projects.archive', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="w-full text-left px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">
                                Archive
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>

        <h3 id="project-title-{{ $project->id }}" class="text-lg font-semibold text-slate-800 mt-3">
            {{ $project->title }}
        </h3>

        <p class="text-sm text-slate-600 mt-1 line-clamp-2">
            {{ $project->description }}
        </p>

        <div class="mt-4">
            <div class="flex justify-between text-sm mb-1">
                <span class="font-medium text-slate-600">Progress</span>
                <span class="font-semibold">{{ $progress }}%</span>
            </div>

            <div class="w-full bg-slate-200 rounded-full h-2">
                <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $progress }}%"></div>
            </div>
        </div>

        <div class="mt-4 flex justify-between items-center">
            <div class="flex -space-x-2">
                @foreach($project->collaborators->take(3) as $collaborator)
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                        src="{{ $collaborator->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($collaborator->name) }}"
                        alt="{{ $collaborator->name }}">
                @endforeach

                @if($project->collaborators->count() > 3)
                    <span
                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-xs font-medium text-slate-600">
                        +{{ $project->collaborators->count() - 3 }}
                    </span>
                @endif
            </div>

            <div class="text-right">
                <p class="text-xs text-slate-500 mt-1 flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>

                    {{ $project->due_date ? \Carbon\Carbon::parse($project->due_date)->format('M d, Y') : 'No due date' }}
                </p>
            </div>
        </div>
    </div>
</div>