@extends('admin.layouts.admin')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Edit Skill: {{ $skill->name }}</h1>

        <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="border p-4 mt-4 bg-white shadow rounded">
                <label class="font-bold">Main Skill</label>
                <input type="text" name="skills[0][name]" class="w-full border px-2 py-1 mb-2 rounded" required
                    value="{{ $skill->name }}">

                <div id="subskills-0">
                    @foreach ($skill->children as $subIndex => $sub)
                        <div class="border mt-2 p-2 bg-gray-100">
                            <label class="font-semibold">Sub Skill</label>
                            <input type="text" name="skills[0][children][{{ $subIndex }}][name]"
                                class="w-full border px-2 py-1 mb-1 rounded" required value="{{ $sub->name }}">

                            <div id="subitems-0-{{ $subIndex }}">
                                @foreach ($sub->children as $itemIndex => $item)
                                    <input type="text"
                                        name="skills[0][children][{{ $subIndex }}][children][{{ $itemIndex }}][name]"
                                        class="w-[calc(100%-30px)] ml-[30px] border px-2 py-1 mb-1 rounded"
                                        value="{{ $item->name }}" required>
                                @endforeach
                            </div>

                            <button type="button" onclick="addSkillItem(0, {{ $subIndex }})"
                                class="text-xs text-green-600 mt-1">+ Skill Set</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" onclick="addSubSkill(0)" class="text-sm text-blue-600 mt-2">+ Sub Skill</button>
            </div>

            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Save Changes</button>
        </form>
    </div>

    <script>
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
