<div class="mt-4">
    <x-input-label for="desarrolladora_id" :value="'Distribuidoras async'" />
    <select id="desarrolladora_id"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
        name="desarrolladora_id" required>
        @forelse ($distribuidoras as $distribuidora)
        <option value="{{ $distribuidora->id }}"
            {{ old('desarrolladora_id') == $distribuidora->id ? 'selected' : '' }}
            wire:click="getDesarrolladora($event.target.value)">
            {{ $distribuidora->nombre }}
        </option>

        @empty
            No existen distribuidoras
        @endforelse
    </select>
    <x-input-error :messages="$errors->get('desarrolladora_id')" class="mt-2" />
</div>
