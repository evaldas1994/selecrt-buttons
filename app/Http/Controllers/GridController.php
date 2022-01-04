<?php

namespace App\Http\Controllers;

use App\Models\Grid;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\ProductionCard;
use Illuminate\Support\Facades\URL;

class GridController extends Controller
{
    public function saveActiveColumns(Request $request)
    {
        $message = 'global.reseted_successfully';
        $data = $this->getData($request);

        try {
            $this->save($data);
        } catch (\Throwable $exception) {
            $message = 'global.reset_failed';
        }

        return redirect()->back()->withSuccess(trans($message));
    }

    public function resetActiveColumns()
    {
        $message = 'global.reseted_successfully';
        $data = $this->getData();

        try {
            $this->save($data);
        } catch (\Throwable $exception) {
            $message = 'global.reset_failed';
        }

        return redirect()->back()->withSuccess(trans($message));
    }

    private function save($data): void
    {
        Grid::updateOrCreate([
            'f_userid' => auth()->user()->f_id,
            'f_form' => URL::previous()
        ], $data);
    }

    private function getData(Request $request = null): array
    {
        return [
            'f_userid' => auth()->user()->f_id,
            'f_form' => URL::previous(),
            'f_col_sel' => $this->cleaned($request)
        ];
    }

    private function cleaned($request)
    {
        $gridColumns = ProductionCard::$gridColumns;
        $defaultGridColumns = ProductionCard::$defaultGridColumns;

        $columns = json_decode($request->input('columns'));
//        $columns = Arr::add($columns, count($columns), 'bam');

        if($columns !== null && $columns !== []) {
            foreach ($columns as $key => $column) {
                if(array_search($column, $gridColumns) === false) {
                    Arr::forget($columns, $key);
                }
            }
        }

        if (json_encode($columns) === null || $columns === null) {
            return json_encode($defaultGridColumns);
        }

        return json_encode($columns);
    }
}
