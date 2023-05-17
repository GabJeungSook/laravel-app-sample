<?php

namespace App\Http\Livewire;

use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use App\Models\Information;
use Filament\Tables\Columns\TextColumn;

class SearchData extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Information::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('first_name')->searchable(),
            TextColumn::make('middle_name')->searchable(),
            TextColumn::make('last_name')->searchable(),
            TextColumn::make('address')->searchable(),
        ];
    }

    public function render()
    {
        return view('livewire.search-data');
    }
}
