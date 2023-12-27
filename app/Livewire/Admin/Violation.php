<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Violation as violationModel;

class Violation extends Component
{
    public $add_modal = false;
    public $edit_modal = false;
    public $name, $strand, $violation, $violation_id;

    public function render()
    {
        return view('livewire.admin.violation', [
            'violations' => violationModel::get(),
        ]);
    }


    public function submit()
    {
        sleep(2);

        $this->validate([
            'name' => 'required',
            'strand' => 'required',
            'violation' => 'required',
        ]);

        violationModel::create([
            'name' => $this->name,
            'strand' => $this->strand,
            'violation' => $this->violation,
        ]);
        $this->add_modal = false;
        $this->reset('name', 'strand', 'violation');
    }

    public function edit($valueId)
    {
        $data = violationModel::where('id', $valueId)->first();
        $this->name = $data->name;
        $this->strand = $data->strand;
        $this->violation = $data->violation;
        $this->violation_id = $data->id;
        $this->edit_modal = true;

    }

    public function submitEdit()
    {
        $data = violationModel::where('id', $this->violation_id)->first();

        $data->update([
            'name' => $this->name,
            'strand' => $this->strand,
            'violation' => $this->violation,
        ]);
        $this->edit_modal = false;
        $this->reset('name', 'strand', 'violation');
    }
}
