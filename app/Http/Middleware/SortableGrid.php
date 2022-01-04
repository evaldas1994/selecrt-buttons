<?php

namespace App\Http\Middleware;

use App\Helpers\Classes\Grid;
use Closure;
use Illuminate\Http\Request;

class SortableGrid
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->allFilled(['sort', 'direction', 'form'])) {
            Grid::updateOrCreate(
                request()->form,
                ['f_order_field' => request()->sort, 'f_order_direction' => request()->direction]
            );
            return redirect()->back();
        }

        if ($request->has(['sort', 'direction', 'page'])) {
            if ($request->page) {
                return redirect()->to(
                    url()->current() . '?' . http_build_query($request->except(['sort', 'direction']))
                );
            }
        }

        return $next($request);
    }

    /**
     * Remove and make redirection.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $parameter
     *
     * @return mixed
     */
    private function removeFromQueryAndRedirect($request, string $parameter)
    {
        $request->query->remove($parameter);
        return redirect()->to($request->fullUrlWithQuery([]));
    }
}
