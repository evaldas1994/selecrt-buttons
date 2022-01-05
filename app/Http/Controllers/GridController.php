<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class GridController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function saveActiveColumns(Request $request)
    {
        $messageType = 'withSuccess';
        $message = 'grid.saved_successfully';
        $data = $this->getData($request);

        try {
            $this->save($data);
        } catch (\Throwable $exception) {
            $messageType = 'withError';
            $message = 'grid.save_failed';
        }

        return redirect()->back()->{$messageType}(trans($message));
    }

    /**
     * @param $data
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * save data (only for drag and drop functionality)
     */
    private function save($data): void
    {
        \App\Helpers\Classes\Grid::updateOrCreate(request()->get('form'), $data);
    }

    /**
     * @param Request|null $request
     * @return array
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * return data for record creation (only for drag and drop functionality)
     */
    private function getData(?Request $request): array
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
