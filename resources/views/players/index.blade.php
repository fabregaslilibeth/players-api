@extends('layouts.app')

@section('content')
    <div class="w-10/12 mx-auto">
        <a href="/"><i class="far fa-long-arrow-left mr-3"></i> Back to requirements</a>
    </div>

    <div class="flex justify-end items-start space-x-6">
        <fetch-players></fetch-players>

        <data-import></data-import>

        <add-player></add-player>
    </div>

    <div class="flex flex-col w-11/12 mx-auto">
        <div class="">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-sm">
                    <div class="bg-white px-6 py-3 flex justify-between items-center">
                        <h4 class="font-extrabold text-lg uppercase">Players</h4>

                       <div>
                           <form action="/search" method="get" class="flex border border-primary">
                               <input
                                   type="text"
                                   name="q"
                                   placeholder="Search by ID"
                                   class="border-0 outline-none p-2 bg-white w-full text-xs appearance-none transition-all box-border"
                               >

                               <button type="submit" class="bg-primary px-2 py-1 text-white text-xs">Search</button>
                           </form>

                           @if($errors->any())
                               <p><small class="italic text-red-600">{{$errors->first()}}</small></p>
                           @endif
                       </div>
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
                                    class="px-6 py-3 text-left text-xs font-extrabold text-gray-darkest border-r uppercase tracking-wider">

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
                                </td>
                                <td class="border-r px-6 py-1 text-center">
                                    <form action="{{ route('players.destroy', $player) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="uppercase text-xs">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center p-4">No players found.</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>

               @if(count($players) > 0)
                    {{ $players->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
