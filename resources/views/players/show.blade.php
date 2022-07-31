@extends('layouts.app')

@section('content')

   <div class="w-10/12 mx-auto">
       <a href="/players" class="text-xs"><i class="far fa-long-arrow-left mr-3"></i> Back to all players</a>

     <div class="border border-gray-300 rounded-md">
         <div class="bg-gray-200">
             <p class="font-extrabold text-lg p-6"> ID {{ $player->id }} : Player Information</p>
         </div>

         <hr>

         <div class="flex w-full px-6">
             <div class="my-4 w-6/12">
                 <p class="font-light text-xs">First name</p>
                 <p class="font-bold text-lg">{{ $player->first_name }}</p>
             </div>

             <div class="my-4 w-6/12">
                 <p class="font-light text-xs">Second name</p>
                 <p class="font-bold text-lg">{{ $player->second_name }}</p>
             </div>
         </div>

         <div class="flex justify-between w-full flex-wrap p-6">
             <div class="my-4 w-1/2">
                 <p class="font-light text-xs">Form</p>
                 <p class="font-bold text-lg">{{ $player->form ? $player->form : 'n/a' }}</p>
             </div>

             <div class="my-4 w-1/2">
                 <p class="font-light text-xs">Total Points</p>
                 <p class="font-bold text-lg">{{ $player->total_points ? $player->total_points : 'n/a' }}</p>
             </div>

             <div class="my-4 w-1/2">
                 <p class="font-light text-xs">Influence</p>
                 <p class="font-bold text-lg">{{ $player->influence ? $player->influence : 'n/a' }}</p>
             </div>

             <div class="my-4 w-1/2">
                 <p class="font-light text-xs">Creativity</p>
                 <p class="font-bold text-lg">{{ $player->creativity ? $player->creativity : 'n/a' }}</p>
             </div>

             <div class="my-4 w-1/2">
                 <p class="font-light text-xs">Threat</p>
                 <p class="font-bold text-lg">{{ $player->threat ? $player->threat : 'n/a' }}</p>
             </div>

             <div class="my-4 w-1/2">
                 <p class="font-light text-xs">ICT Index</p>
                 <p class="font-bold text-lg">{{ $player->ict_index ? $player->ict_index : 'n/a' }}</p>
             </div>
         </div>
     </div>
   </div>
@endsection
