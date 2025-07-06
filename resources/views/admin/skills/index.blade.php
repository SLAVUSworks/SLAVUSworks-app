@extends('admin.layouts.admin')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Skills</h1>
            <button type="button" onclick="addMainSkill()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Main Skill
            </button>
        </div>

        <form method="POST" action="{{ route('admin.skills.store') }}">
            @csrf
            <div id="skills-container" class="rounded"></div>
            <button type="submit" class="bg-green-600 text-white px-4 py-1 mt-4 rounded">Save Skills</button>
        </form>

        @if ($skills->count())
            <div class="mt-10">
                <h2 class="text-xl font-bold mb-4">Existing Skills</h2>

                <ul class="space-y-4">
                    @foreach ($skills as $main)
                        <li>
                            <div class="flex items-center gap-2">
                                <div class="font-bold text-lg">{{ $main->name }}</div>
                                <a href="{{ route('admin.skills.edit', $main->id) }}"
                                    class="text-sm text-blue-600 hover:underline">Edit</a>
                                <button onclick="deleteSkill({{ $main->id }})" class="text-red-500 hover:text-red-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            @if ($main->children->count())
                                <ul class="relative pl-6 mt-3">
                                    @foreach ($main->children as $i => $sub)
                                        <li class="relative pl-4 pb-4">
                                            @if (!$loop->last)
                                                <div class="absolute left-1 top-2 h-full w-px bg-gray-500"></div>
                                            @endif

                                            <div class="flex items-center gap-2">
                                                <div class="font-semibold text-base">{{ $sub->name }}</div>
                                                <button onclick="deleteSkill({{ $sub->id }})"
                                                    class="text-red-500 hover:text-red-700">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                        stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>


                                            @if ($sub->children->count())
                                                <ul class="pl-6 mt-2 space-y-1">
                                                    @foreach ($sub->children as $set)
                                                        <li class="flex items-start gap-2 text-sm text-gray-700">
                                                            <div class="flex items-center gap-2">
                                                                <span>{{ $set->name }}</span>
                                                                <button onclick="deleteSkill({{ $set->id }})"
                                                                    class="text-red-400 hover:text-red-600">
                                                                    <svg class="w-3 h-3" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M6 18L18 6M6 6l12 12" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <script>
        function deleteSkill(id) {
            Swal.fire({
                title: 'Delete This Skill?',
                text: "If you're deleting Main or Sub Skills, the descendants skills will be deleted too!.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/skills/${id}`, {
                            method: "DELETE",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        }).then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Success', 'Skill Has Been Deleted!', 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Failed', 'Something Wrong.', 'error');
                            }
                        }).catch(() => {
                            Swal.fire('Failed', 'Connection Lost.', 'error');
                        });
                }
            });
        }

        let mainIndex = 0;

        function addMainSkill() {
            const container = document.getElementById('skills-container');
            const div = document.createElement('div');
            div.className = 'border p-4 mt-4';
            div.innerHTML = `
        <label class="font-bold">Main Skill</label>
        <input type="text" name="skills[${mainIndex}][name]" class="w-full border px-2 py-1 mb-2 rounded" required>

        <div id="subskills-${mainIndex}"></div>
        <button type="button" onclick="addSubSkill(${mainIndex})" class="text-sm text-blue-600 mt-1">+ Sub Skill</button>
    `;
            container.appendChild(div);
            mainIndex++;
        }

        function addSubSkill(mainId) {
            const container = document.getElementById(`subskills-${mainId}`);
            const subIndex = container.children.length;
            const div = document.createElement('div');
            div.className = 'border mt-2 p-2 bg-gray-100';
            div.innerHTML = `
        <label class="font-semibold">Sub Skill</label>
        <input type="text" name="skills[${mainId}][children][${subIndex}][name]" class="w-full border px-2 py-1 mb-1 rounded" required>

        <div id="subitems-${mainId}-${subIndex}"></div>
        <button type="button" onclick="addSkillItem(${mainId}, ${subIndex})" class="text-xs text-green-600 mt-1">+ Skill Set</button>
    `;
            container.appendChild(div);
        }

        function addSkillItem(mainId, subId) {
            const container = document.getElementById(`subitems-${mainId}-${subId}`);
            const index = container.children.length;
            const input = document.createElement('input');
            input.type = 'text';
            input.name = `skills[${mainId}][children][${subId}][children][${index}][name]`;
            input.className = 'w-[calc(100%-30px)] ml-[30px] border px-2 py-1 mb-1 rounded';
            input.placeholder = 'Skill name';
            input.required = true;
            container.appendChild(input);
        }
    </script>
@endsection
