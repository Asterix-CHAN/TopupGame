@unless ($breadcrumbs->isEmpty())
    <nav class="container mx-auto">
        <ol class="p-2 rounded flex flex-wrap  text-sm text-gray-800">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}" class="text-gray-800 hover:text-gray-500 hover:underline focus:text-slate-800 focus:underline font-semibold">
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li class="">
                        {{ $breadcrumb->title}}
                    </li>
                @endif

                @unless($loop->last)
                    <li class="text-gray-700 px-2">
                        /
                    </li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
