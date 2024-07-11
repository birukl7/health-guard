@props(['disabled' => false, 'value' => ''])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300  focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500  rounded-md shadow-sm']) !!} value="{{ $value }}" >
