<?php
namespace App\Http\Livewire;


use App\Models\User;
use Superhiro\App\Models\Column;
use Superhiro\Views\Components\TableComponent;

class DummyComponent extends TableComponent
{
    public function query()
    {
        return User::query();
    }

    public function columns()
    {
        return [
            Column::make('ID')->searchable()->sortable(),
            Column::make('Created At')->searchable()->sortable(),
            Column::make('Updated At')->searchable()->sortable(),
        ];
    }
}
