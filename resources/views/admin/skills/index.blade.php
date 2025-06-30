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
                            <div class="font-bold text-lg">{{ $main->name }}</div>

                            @if ($main->children->count())
                                <ul class="relative pl-6 mt-3">
                                    @foreach ($main->children as $i => $sub)
                                        <li class="relative pl-4 pb-4">
                                            @if (!$loop->last)
                                                <div class="absolute left-1 top-2 h-full w-px bg-gray-500"></div>
                                            @endif

                                            <div class="flex items-start gap-2">
                                                <div class="w-2 h-2 bg-blue-500 rounded-full mt-1 shrink-0"></div>
                                                <div class="font-semibold text-base">{{ $sub->name }}</div>
                                            </div>

                                            @if ($sub->children->count())
                                                <ul class="pl-6 mt-2 space-y-1">
                                                    @foreach ($sub->children as $set)
                                                        <li class="flex items-start gap-2 text-sm text-gray-700">
                                                            <span
                                                                class="w-1.5 h-1.5 bg-gray-500 rounded-full mt-1 shrink-0"></span>
                                                            <span>{{ $set->name }}</span>
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
