@extends('admin.layouts.admin')

@section('title', 'Landing Content List')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Landing Window Content</h1>
            <a href="{{ route('admin.landing-windows.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add New
            </a>
        </div>

        <div class="bg-white shadow rounded overflow-x-auto">
            <table class="min-w-full text-left border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Type</th>
                        <th class="px-4 py-2 border">Title</th>
                        <th class="px-4 py-2 border">Heading</th>
                        <th class="px-4 py-2 border">Subheading</th>
                        <th class="px-4 py-2 border">Image</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($windows as $window)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $window->type }}</td>
                            <td class="px-4 py-2 border">{{ $window->title }}</td>
                            <td class="px-4 py-2 border">{{ $window->heading }}</td>
                            <td class="px-4 py-2 border">{{ $window->subheading }}</td>
                            <td class="px-4 py-2 border">
                                @if ($window->img)
                                    <img src="{{ asset('storage/' . $window->img) }}" alt="Image" class="h-10">
                                @else
                                    <span class="text-gray-500 italic">None</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('admin.landing-windows.edit', $window) }}"
                                    class="text-blue-600 hover:underline mr-3">Edit</a>
                                {{-- Optional delete --}}
                                {{-- <form action="#" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-6">No content found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
