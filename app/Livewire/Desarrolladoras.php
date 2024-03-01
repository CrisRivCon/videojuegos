<?php

namespace App\Livewire;

use App\Models\Desarrolladora;
use App\Models\Distribuidora;
use Livewire\Attributes\On;
use Livewire\Component;

class Desarrolladoras extends Component
{
    public $desarrolladoras;

    #[On('get-distri')]
    public function getDistribuidora($distribuidora_id = null)
    {
        if ($distribuidora_id != null) {
            $this->desarrolladoras = Distribuidora::find($distribuidora_id)->desarrolladoras;
        }
    }

    public function render()
    {
        if($this->desarrolladoras == null) {
            $this->desarrolladoras = Desarrolladora::all();
        }

        return view('livewire.desarrolladoras', [
            'desarrolladoras' => $this->desarrolladoras,
        ]);
    }
}
