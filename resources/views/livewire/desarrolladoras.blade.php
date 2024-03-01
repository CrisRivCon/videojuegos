<div class="mt-4">
    <x-input-label for="desarrolladora_id" :value="'Desarrolladoras async'" />
    <select id="desarrolladora_id"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
        name="desarrolladora_id" required>
        @forelse ($desarrolladoras as $desarrolladora)
        <option value="{{ $desarrolladora->id }}"
            {{ old('desarrolladora_id') == $desarrolladora->id ? 'selected' : '' }}>
            {{ $desarrolladora->nombre }}
        </option>

        @empty
        <option>
            No existen desarrolladoras
        </option>
        @endforelse
    </select>
    <x-input-error :messages="$errors->get('desarrolladora_id')" class="mt-2" />
</div>
