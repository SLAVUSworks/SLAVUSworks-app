@extends('admin.layouts.admin')

@section('title', 'Experience List')

@section('content')
    <div class="container mx-auto p-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Experience List</h1>
            <a href="{{ route('admin.experience.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add New
            </a>
        </div>

        <div class="bg-white shadow rounded overflow-x-auto">
            <table class="min-w-full text-left border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Job Title</th>
                        <th class="border px-4 py-2">Company</th>
                        <th class="border px-4 py-2">Position</th>
                        <th class="border px-4 py-2">Start Date</th>
                        <th class="border px-4 py-2">End Date</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiences as $experience)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $experience->job_title }}</td>
                            <td class="border px-4 py-2">{{ $experience->company_name }}</td>
                            <td class="border px-4 py-2">{{ $experience->job_position ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $experience->start_date }}</td>
                            <td class="border px-4 py-2">
                                {{ $experience->end_date ?? 'Present' }}
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('admin.experience.edit', $experience->id) }}"
                                    class="text-blue-600 hover:underline">Edit</a> |
                                <form action="{{ route('admin.experience.destroy', $experience->id) }}" method="POST"
                                    class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="text-red-600 hover:underline btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="border px-4 py-2 text-center">No experience found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @push('scripts')
        <script>
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action cannot be undone.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
