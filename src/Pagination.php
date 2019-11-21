<?php

namespace AndrewGrigorkin\Pagination;

class Pagination
{
    /**
     * @param int $y current page
     * @param int $count total number of pages
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function generate(int $y, int $count)
    {
        $p['a'] = 1; // First page.
        $p['b'] = ($count > 0) ? $count : $p['a']; // Last page.
        $p['y'] = ($y >= $p['a'] && $y <= $p['b']) ? $y : $p['a']; // Current page.

        $offset = 2;

        $p['x'] = $p['y'] - $offset;
        $p['z'] = $p['y'] + $offset;

        if (($p['x'] - 1) <= $p['a'])
        {
            unset($p['x']);
        }

        if (($p['z'] + 1) >= $p['b'])
        {
            unset($p['z']);
        }

        return view('pagination::generate', ['pagination' => $p]);
    }
}