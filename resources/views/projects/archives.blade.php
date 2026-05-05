@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Header -->
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Archives</h1>
            <p class="text-gray-600 mt-2">Gérez vos projets archivés</p>
        </div>

        <!-- Archived Projects Grid -->
        @if($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($projects as $project)
                    <div
                        class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all">
                        <div class="p-6">
                            <!-- Header -->
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-gray-900">{{ $project->title }}</h3>
                                    <span
                                        class="inline-block mt-2 px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                                        <svg class="inline w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 2.523a6 6 0 008.367 8.367z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Archivé
                                    </span>
                                </div>
                            </div>

                            <!-- Description -->
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2 min-h-10">
                                {{ $project->description ?? 'Pas de description' }}</p>

                            <!-- Meta Info -->
                            <div class="text-sm text-gray-500 mb-4 pb-4 border-b border-gray-100">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    {{ $project->tasks->count() }} tâches
                                </span>
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-3">
                                <form method="POST" action="{{ route('projects.restore', $project->id) }}" class="flex-1">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="w-full px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:shadow-md transition-all text-sm font-semibold flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 15L3 9m0 0l6-6m-6 6h12a6 6 0 010 12h-3" />
                                        </svg>
                                        Restaurer
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('projects.forceDelete', $project->id) }}" class="flex-1"
                                    onsubmit="return confirm('Cette action est irréversible. Êtes-vous sûr?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors text-sm font-semibold flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white p-12 rounded-xl shadow-md border border-gray-100 text-center">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9-4v4m0 0H8m4 0h4" />
                </svg>
                <p class="text-gray-500 text-lg font-medium">Aucun projet archivé</p>
                <p class="text-gray-400 mt-2">Vos projets archivés apparaîtront ici</p>
            </div>
        @endif
    </div>
@endsection