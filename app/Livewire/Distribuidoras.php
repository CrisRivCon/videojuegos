<?php

namespace App\Livewire;

use App\Models\Desarrolladora;
use App\Models\Distribuidora;
use Livewire\Attributes\On;
use Livewire\Component;

class Distribuidoras extends Component
{

    public function getDesarrolladora($distribuidora_id)
    {
        $this->dispatch('get-distri', distribuidora_id: $distribuidora_id);
    }

    public function render()
    {
        return view('livewire.distribuidoras', [
            'distribuidoras' => Distribuidora::all(),
        ]);
    }
}
