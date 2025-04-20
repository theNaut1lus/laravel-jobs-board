 {{-- old: <a href={{ $link }}>{{ $slot }}</a> --}}

 {{-- multiple slots, used named slots --}}

 <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

 @props(['href', 'active' => false])

 <a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
     aria-current="{{ $active ? 'page' : 'false' }}" href={{ $href }}>
     {{ $slot }}
 </a>
