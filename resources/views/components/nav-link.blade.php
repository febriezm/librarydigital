<a {{ $attributes }} class="{{ $active ? 
'border-opacity-100 py-4 border-b-2 border-[#00264A]' : '' }}" 
aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>