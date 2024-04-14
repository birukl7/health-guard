@extends('home.layout')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 gap-6">
        <h2>{{ $title }}</h2>

        <!-- _agree_disagree_questions.blade.php -->
        @foreach($questions as $question)
        <div class="mb-6">
            <p class="text-lg font-semibold">{{ $question['text'] }}</p>
            <div class="flex justify-between items-center mt-2">
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio text-blue-500" name="question{{ $question['id'] }}"
                        value="agree">
                    <span class="ml-2">Agree</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio text-red-500" name="question{{ $question['id'] }}"
                        value="disagree">
                    <span class="ml-2">Disagree</span>
                </label>
            </div>
        </div>
        @endforeach

        <div class="text-center">
            <button
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Submit
            </button>
        </div>
    </div>
</div>
@endsection