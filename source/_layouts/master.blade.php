<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta name="theme-color" content="#4c51bf">

        <meta property="og:site_name" content="{{ $page->siteName }}"/>
        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }} {{ $page->siteName }}"/>
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:image" content="/assets/img/logo.png"/>
        <meta property="og:type" content="website"/>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">

        <meta name="twitter:image:alt" content="{{ $page->siteName }}">
        <meta name="twitter:card" content="summary_large_image">

        <meta name="docsearch:language" content="en" />
        <meta name="docsearch:version" content="{{ $page->version() }}" />

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <meta name="generator" content="tighten_jigsaw_doc">
        @endif

        <title>{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <!-- <link rel="stylesheet" href="{{ $page->baseUrl . mix('css/main.css', 'assets/build') }}"> -->
        <link rel="stylesheet" href="{{ mix('css/main.css') }}">


        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
        @endif
    </head>

    <body class="flex flex-col justify-between min-h-screen font-sans leading-normal bg-grey-lightest text-grey-darkest">
        <header class="flex items-center h-24 py-4 mb-8 bg-indigo-700 border-b shadow" role="banner">
            <div class="container flex items-center max-w-4xl px-4 mx-auto lg:px-8">
                <div class="flex items-center">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                        <img class="h-10 mr-3 md:h-16" src="/assets/img/tenancy_logo.svg" alt="{{ $page->siteName }}" />

                        {{-- <h1 class="pr-4 my-0 text-lg font-semibold md:text-2xl text-blue-darkest hover:text-blue-dark">{{ $page->siteName }}</h1> --}}
                    </a>
                </div>

                <div class="flex items-center justify-end flex-1 text-right md:pl-10">
                    @if ($page->docsearchApiKey && $page->docsearchIndexName)
                        @include('_nav.search-input')
                    @endif
                </div>


                    <div class="relative inline-block text-left" x-data="{ open: false }" @keydown.window.escape="open = false" @click.away="open = false">
                        <div>
                            <span class="rounded-md shadow-sm">
                            <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                                Options
                                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            </span>
                        </div>
                        <div class="absolute right-0 w-56 mt-2 origin-top-right rounded-md shadow-lg" x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                            <div class="bg-white rounded-md shadow-xs">
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Account settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Support</a>
                                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">License</a>
                                    <form method="POST" action="#">
                                    <button type="submit" class="block w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">
                                        Sign out
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    {{--
                    <div x-data="{ open: true }" @keydown.window.escape="open = false" @click.away="open = false" class="relative inline-block text-left">
                        <div>
                            <span class="rounded-md shadow-sm">
                            <button @click="open = !open" type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                                Version
                                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            </span>
                        </div>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-56 mt-2 origin-top-right rounded-md shadow-lg">
                            <div class="bg-white rounded-md shadow-xs">
                            <div class="py-1"></div>
                                    @foreach($page->versions as $version => $name)
                                        <a href="{{ $page->baseUrl . '/' . $version }}/"
                                        class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900 @if($page->version() === $version) underline @endif">
                                            {{ $name }}
                                        </a>
                                    @endforeach
                            </div>
                            </div>
                        </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            @yield('nav-toggle')
        </header>

        <main role="main" class="flex-auto w-full">
            @yield('body')
        </main>

        <script src="{{ $page->baseUrl . mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')

        <footer class="py-4 mt-12 text-sm text-center bg-white" role="contentinfo">
            <ul class="flex flex-col justify-center md:flex-row list-reset">
                <li class="md:mr-2">
                    &copy; <a href="https://github.com/stancl" title="Samuel Štancl">Samuel Štancl</a> {{ date('Y') }}.
                </li>

                <li>
                    Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                    and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>.
                </li>
            </ul>
        </footer>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    <script>
        // document.getElementById('versionSelect').addEventListener('change', function () {
        //     window.location = document.getElementById('versionSelect').value;
        // });
    </script>
    </body>
</html>
