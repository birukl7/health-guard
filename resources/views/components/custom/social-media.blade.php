@props(['link'=>'#', 'viewBox'=>'0 0 0 0', 'd'=>'' ])

<a class="text-custom-blue hover:text-orange-600"
aria-label="Visit TrendyMinds LinkedIn" href="{{$link}}" target="_blank">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="{{$viewBox}}" class="h-6">
    <path fill="currentColor" d="{{$d}}" >
    </path>
  </svg>
</a>