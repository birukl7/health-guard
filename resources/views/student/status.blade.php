{{-- @extends('home.layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @php
    $tab = ''
    @endphp
    <div class="flex justify-center">
        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Depression</h2>
                <div class="flex justify-between items-center mb-2">
                    <p class="text-gray-600">Score: <span class="font-bold">80%</span></p>
                    <a href="#" class="text-sm text-blue-600 hover:underline">View Details</a>
                </div>
                <button
                    class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Take Test Again
                </button>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Drug Abuse</h2>
                <div class="flex justify-between items-center mb-2">
                    <p class="text-gray-600">Score: <span class="font-bold">75%</span></p>
                    <a href="#" class="text-sm text-blue-600 hover:underline">View Details</a>
                </div>
                <button
                    class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Take Test Again
                </button>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4"></h2>
                <div class="flex justify-between items-center mb-2">
                    <p class="text-gray-600">Score: <span class="font-bold">90%</span></p>
                    <a href="#" class="text-sm text-blue-600 hover:underline">View Details</a>
                </div>
                <button
                    class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Take Test Again
                </button>
            </div>
        </div>
        @if($tab === 'depression')
        @include('student.partials.assessment-questions', ['title' => 'Depression Questions', 'questions' =>
        app('depression_questions')])

        @elseif ($tab === 'drug')
        @include('student.partials.assessment-questions', ['title' => 'Drug Questions', 'questions' =>
        app('drug_questions')])
        @elseif ($tab === 'alcohol')

        @include('student.partials.assessment-questions', ['title' => 'Alcohol Questions', 'questions' =>
        app('alcohol_questions')])
        @endif
    </div>
</div>
@endsection --}}
@extends('home.layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @php
    $user = Auth()->user();
    @endphp
    <div class="flex justify-center">
        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Depression</h2>
                <div class="flex justify-between items-center mb-2">
                    <p class="text-gray-600">Score: <span class="font-bold">{{$user->depressionTracker->score ?? 0}}%</span></p>
                    <a href="#" class="text-sm text-blue-600 hover:underline">View Details</a>
                </div>
                <a href="/depressions/create">
                    <div
                        class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Take Test Again
                    </div>
                </a>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Drug Abuse</h2>
                <div class="flex justify-between items-center mb-2">
                    <p class="text-gray-600">Score: <span class="font-bold">75%</span></p>
                    <a href="#" class="text-sm text-blue-600 hover:underline">View Details</a>
                </div>
                <a href="/drugs/create">
                    <div
                        class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Take Test Again
                    </div>
                </a>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Alcohol</h2>
                <div class="flex justify-between items-center mb-2">
                    <p class="text-gray-600">Score: <span class="font-bold">{{$user->alcoholUseTracker->score ?? 0}}%</span></p>
                    <a href="#" class="text-sm text-blue-600 hover:underline">View Details</a>
                </div>
                <a href="/alcohols/create">
                    <div
                        class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Take Test Again
                    </div>
                </a>
            </div>
        </div>
        {{-- @if($tab === 'depression')
        @include('student.partials.assessment-questions', ['title' => 'Depression Questions', 'questions' =>
        app('depression_questions')])

        @elseif ($tab === 'drug')
        @include('student.partials.assessment-questions', ['title' => 'Drug Questions', 'questions' =>
        app('drug_questions')])
        @elseif ($tab === 'alcohol')

        @include('student.partials.assessment-questions', ['title' => 'Alcohol Questions', 'questions' =>
        app('alcohol_questions')])
        @endif --}}
    </div>
</div>
@endsection