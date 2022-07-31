@extends('layouts.app')

@section('content')
    <div class="w-10/12 mx-auto">
        <div class="my-4">
            <p class="font-bold">Requirements:</p>
            <p>1. Must demonstrate design pattern implementation</p>
            <p>2. Submit your answer thru GitHub or Bitbucket</p>
            <p>3. You can use either PHP and/or JS programming languages</p>

            <div class="font-bold my-3">
                <p>-Github link: <a href="https://github.com/fabregaslilibeth/players-api" target="_blank">https://github.com/fabregaslilibeth/players-api</a>
                </p>
                <p>-Used Laravel and Vuejs</p>
            </div>
        </div>

        <div class="my-4">
            <p class="font-bold">Data Importer Criteria:</p>
            <p>1. Must fetch and store a minimum of 100 players.</p>
            <p class="font-bold mb-3">-Created an uploader for 100 players.</p>
            <p class="font-bold mb-3">-There is a also a way to fetch players from an API. API used is <span
                    class="italic">json server typicode</span></p>

            <p>2. Must accept JSON or CSV format file</p>
            <p class="font-bold mb-3">-Uploader accepts csv, fetches json</p>
            <p>3. The player data must be stored in a database</p>
            <p class="font-bold mb-3">-Csv header must be as follows:</p>
            <pre>Firstname	Second name	Form	Total Points	Influence	Creativity	Threat	ICT Index</pre>
            <p class="font-bold my-5">-Uploaded file will be checked per line, if a player already exists, the uploader
                will ignore it.
                If not, the uploader will store it in the database.</p>
            <p>4. The importer should be constructed in a way it could be called periodically to fetch data from a CRON
                job or similar.</p>
            <p class="font-bold mb-3">-Data can be fetched via a button, but can also be fetched by a command: <span
                    class="underline">"php artisan fetch-players"</span></p>

            <p>5. The importer should be designed so the data provider could be replaced later with minimal impact on
                the codebase.</p>
            <p class="font-bold mb-3">-Typicode is a dummy rest api. It is free so data is limited. I cannot store a lot
                of data, so <span class="underline">every fetch will only get 3 players</span> that are not existing in
                database.</p>
            <p class="font-bold mb-3">-Data source can also be changed via the .env</p>
        </div>

        <div class="my-4">
            <p class="font-bold">RESTful API Criteria: </p>
            <p>1. Get the list of all players with only ID and Full Name. <span class="underline font-bold"><a
                        href="/players" target="_blank">Show players</a></span></p>
            <p>2. Get the full data object of a single Player. The object should contain at least but not limit to id,
                first name, second name, form, total points, influence, creativity, threat, and ICT index.</p>
            <p>3. Get single player should check if player exists by provided ID and return an error.</p>
            <p>4. Ability to add non-existing players</p>
            <p class="font-bold">-There is a button to add non-existing players.</p>
        </div>

        <div class="my-4">
            <p class="font-bold">UX/UI Criteria:</p>
            <p>1. Data must come from the RESTful API</p>
            <p>2. Use CSS preprocessors</p>
            <p class="font-bold">-Used tailwindcss.</p>
        </div>
    </div>
@endsection
