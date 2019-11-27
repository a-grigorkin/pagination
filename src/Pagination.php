<?php

namespace AndrewGrigorkin\Pagination;

class Pagination
{
    /**
     * @param array $options
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function generate(array $options = [])
    {
        $options = self::loadOptions($options);

        // first page
        $p['a'] = 1;
        // last page
        $p['b'] = ($options['max'] > 0) ? $options['max'] : $p['a'];
        // current page
        $p['y'] = ($options['current'] >= $p['a'] && $options['current'] <= $p['b']) ? $options['current'] : $p['a'];

        $p['x'] = $p['y'] - $options['offset'];
        $p['z'] = $p['y'] + $options['offset'];

        if (($p['x'] - $options['edge']) <= $p['a'])
        {
            unset($p['x']);
        }

        if (($p['z'] + $options['edge']) >= $p['b'])
        {
            unset($p['z']);
        }

        $params['p'] = $p;
        $params['route'] = $options['route'];
        $params['active'] = $options['css_class_active'];
        $params['inactive'] = $options['css_class_inactive'];

        return view('pagination::generate', $params);
    }

    /**
     * @param array $options
     * @return array
     */
    private static function loadOptions(array $options)
    {
        $defaultOptions['css_class_active'] = 'pagination--active';
        $defaultOptions['css_class_inactive'] = 'pagination--inactive';
        $defaultOptions['current'] = 5;
        $defaultOptions['edge'] = 1;
        $defaultOptions['max'] = 10;
        $defaultOptions['offset'] = 2;
        $defaultOptions['route'] = 'pagination';

        foreach ($options as $key => $option)
        {
            if (isset($defaultOptions[$key]) && gettype($defaultOptions[$key]) == gettype($option))
            {
                $defaultOptions[$key] = $option;
            }
        }

        return $defaultOptions;
    }
}