@extends('layouts.app')

@section('content')
    <div class="flex justify-end space-x-6">
        SEARCH BY ID
        <button>import json</button>
        <button>import csv</button>
        <button>fetch 100 players</button>
        <button>auto fetch</button>

        <add-player></add-player>
        <button>add new player</button>
    </div>

    <div class="flex flex-col w-11/12">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-sm">
                    <div class="bg-white px-6 py-3">
                        <slot name="table-title">Players</slot>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200 border-t">
                        <thead class="bg-gray-50">
                        <slot name="table-header-wrapper">
                            <tr class="hidden md:table-row">
                                <th scope="col" class="px-6 py-3 border-r hidden md:table-cell">ID</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-extrabold text-gray-darkest border-r uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-extrabold text-gray-darkest border-r uppercase tracking-wider">
                                    Last Edited
                                </th>
                            </tr>
                        </slot>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($players as $player)
                            <tr>
                                <td class="border-r px-6 py-1 text-center">
                                    {{ $player->id }}
                                </td>
                                <td class="border-r px-6 py-1 whitespace-nowrap cursor-pointer">
                                    <div class="text-sm font-medium text-gray-900 hover:text-blue-600 duration-300">
                                        <a href="{{ route('players.show', $player) }}">{{ $player->full_name }}</a>
                                    </div>
                                <td
                                    class="border-r px-6 py-1 text-center font-medium border-t">
                                        {{ $player->edited_at ? $player->edited_at->diffForHumans() : 'not edited'}}
                                </td>
                            </tr>
                        @empty
                            aasd
                        @endforelse
                        <!-- More people... -->
                        </tbody>
                    </table>
                </div>

                {{ $players->links() }}
            </div>
        </div>
    </div>
@endsection
