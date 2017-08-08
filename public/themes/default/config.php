<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            // You can remove this line anytime.
            $theme->setTitle('Copyright ©  2013 - Laravel.in.th');

            // Breadcrumb template.
            // $theme->breadcrumb()->setTemplate('
            //     <ul class="breadcrumb">
            //     @foreach ($crumbs as $i => $crumb)
            //         @if ($i != (count($crumbs) - 1))
            //         <li><a href="{{ $crumb["url"] }}">{!! $crumb["label"] !!}</a><span class="divider">/</span></li>
            //         @else
            //         <li class="active">{!! $crumb["label"] !!}</li>
            //         @endif
            //     @endforeach
            //     </ul>
            // ');
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function($theme)
        {   $theme->asset()->usePath()->add('progress-bar', 'js/progress-bar.js');
            $theme->asset()->usePath()->add('progress-bar.min', 'js/progress-bar.min.js');
            $theme->asset()->usePath()->add('progress-barminmap', 'js/progress-bar.min.js.map');
            $theme->asset()->usePath()->add('swiper', 'js/swiper.min.js');
            $theme->asset()->usePath()->add('wow', 'js/wow.js');
            $theme->asset()->usePath()->add('wowmin', 'js/wow.min.js');
            $theme->asset()->usePath()->add('global', 'js/global.js');
            $theme->asset()->usePath()->add('swipercss', 'css/swiper.css');
            $theme->asset()->usePath()->add('swipermin', 'css/swiper.min.css');
            $theme->asset()->usePath()->add('style', 'css/style.css');
            $theme->asset()->usePath()->add('time', 'css/timeline.css');
            $theme->asset()->usePath()->add('animate', 'css/animate.css');
            $theme->asset()->usePath()->add('font-awesome', 'css/font-awesome.css');
            $theme->asset()->usePath()->add('font-awesomemin', 'css/font-awesome.min.css');



            // You may use this event to set up your assets.
            // $theme->asset()->usePath()->add('core', 'core.js');
            // $theme->asset()->add('jquery', 'vendor/jquery/jquery.min.js');
            // $theme->asset()->add('jquery-ui', 'vendor/jqueryui/jquery-ui.min.js', array('jquery'));

            // Partial composer.
            // $theme->partialComposer('header', function($view)
            // {
            //     $view->with('auth', Auth::user());
            // });
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => array(

            'default' => function($theme)
            {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            }

        )

    )

);