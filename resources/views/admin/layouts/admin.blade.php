<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('frontend/css/admin.css') }}">
    <link rel="icon" type="image/x-icon" href="" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.35.1/tagify.min.js"
        integrity="sha512-No0phUWYOZwso6r4rlSus8YNn/jKJt2juI3I5DgaofadLLkShiz1g2tixyrpvvQjG/raT+PhAkY8/mUYWG2EQg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @stack('head')
</head>

<body class="bg-gray-100">
    <div id="app">
        @include('admin.layouts.partials.navbar')
        @include('admin.layouts.partials.sidebar')

        <main class="ml-64 pt-20 p-6 h-screen overflow-y-auto">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: "{{ $error }}"
                        });
                    </script>
                @endforeach
            @endif

            <div class="bg-white p-6 rounded shadow">
                @yield('content')
            </div>
        </main>
    </div>

    @include('admin.layouts.partials.footer')
    @stack('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" />
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hiddenInput = document.getElementById('stacks');
            const tagifyInput = document.getElementById('stacks-tagify');

            const tagify = new Tagify(tagifyInput);

            const raw = hiddenInput.value;
            if (raw) {
                const tags = raw.split(',').map(t => t.trim()).filter(Boolean);
                tagify.addTags(tags);
            }

            tagify.on('change', () => {
                const tags = tagify.value.map(item => item.value);
                hiddenInput.value = tags.join(',');
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: @json(session('success')),
                confirmButtonColor: '#3085d6'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Failed!',
                text: @json(session('error')),
                confirmButtonColor: '#d33'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Invalid Input',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#d33'
            });
        </script>
    @endif
</body>

</html>
