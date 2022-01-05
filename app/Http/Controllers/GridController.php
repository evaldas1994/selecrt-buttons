<?php

namespace App\Http\Controllers;

use App\Models\Grid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class GridController extends Controller
{
    public function saveActiveColumns(Request $request)
    {
        $message = 'grid.saved_successfully';
        $data = $this->getData($request);

        try {
            $this->save($data);
        } catch (\Throwable $exception) {
            $message = 'grid.reset_failed';
            return redirect()->back()->withSuccess(trans($message));
        }

        return redirect()->back()->withSuccess(trans($message));
    }

    public function resetActiveColumns()
    {
        $message = 'grid.reseted_successfully';
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
        \App\Helpers\Classes\Grid::updateOrCreate(request()->get('form'),$data);
    }

    private function getData(Request $request = null): array
    {
        return [
            'f_userid' => auth()->user()->f_id,
            'f_form' => request()->get('form'),
            'f_col_sel' => $request === null || $request->get('columns') === null || json_decode($request->input('columns') === null)
                    ? null
                    : $request->input('columns')
        ];
    }
}
