@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<span class="flex w-60 js-logo">
  <h1 class="text-3xl text-custom-blue font-bold">H</h1>
  <h1 class="text-3xl text-custom-blue font-bold guard-js">ealth-Guard.</h1>
</span>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
