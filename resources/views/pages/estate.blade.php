@php

use App\Models\DepositCoin;

$logos = DepositCoin::inRandomOrder()
->take(20)
->get('logo_url');

$page_title = 'Real Estate';
$short_description = site('name') . ' finds a home that suits your lifestyle';

@endphp

{{-- layout --}}

<head>
    <style type="text/css">
        .truste_cursor_pointer {
            cursor: pointer;
        }

        .truste_border_none {
            border: none;
        }
    </style>
    <title>Luxury Real Estate and Homes for Sale - {{site('name')}}</title>
    <meta data-n-head="ssr" charset="utf-8">
    <meta data-n-head="ssr" name="viewport" content="width=device-width, initial-scale=1">
    <meta data-n-head="ssr" data-hid="charset" charset="utf-8">
    <meta data-n-head="ssr" data-hid="mobile-web-app-capable" name="mobile-web-app-capable" content="yes">
    <meta data-n-head="ssr" data-hid="apple-mobile-web-app-title" name="apple-mobile-web-app-title"
        content="SIR-Webserver">

    
    <link rel="stylesheet"
        href="https://awsstatic-sothebys-production.gtsstatic.net/_nuxt/styles02b51c72d66327392f3e7a55bd8ef13bbe0c4b53.css">
    
    



    <link rel="apple-touch-icon" href="{{ asset('assets/images/' . site('favicon')) }}">
    <link rel="icon" href="{{ asset('assets/images/' . site('favicon')) }}">
    <meta name="author" content="support@stellar-capital.io">
    <meta name="description" content="{{ $short_description }}">
    <meta property="og:url" content="{{ request()->url }}">
    <meta property="og:title" content="{{ $page_title }} | {{ site('name') }}">
    <meta property="og:description" content="{{ $short_description }}">
    <meta property="og:image" content="{{ asset('assets/images/' . site('cover')) }}">
    <meta name="robots" content="{{ site('robot') }}">
    <style>
        .wave {
            width: 5px;
            height: 100px;
            background: linear-gradient(45deg, rgb(168, 85, 247), rgb(249, 115, 22));
            margin: 10px;
            animation: wave 1s linear infinite;
            border-radius: 20px;
        }

        .wave:nth-child(2) {
            animation-delay: 0.1s;
        }

        .wave:nth-child(3) {
            animation-delay: 0.2s;
        }

        .wave:nth-child(4) {
            animation-delay: 0.3s;
        }

        .wave:nth-child(5) {
            animation-delay: 0.4s;
        }

        .wave:nth-child(6) {
            animation-delay: 0.5s;
        }

        .wave:nth-child(7) {
            animation-delay: 0.6s;
        }

        .wave:nth-child(8) {
            animation-delay: 0.7s;
        }

        .wave:nth-child(9) {
            animation-delay: 0.8s;
        }

        .wave:nth-child(10) {
            animation-delay: 0.9s;
        }

        @keyframes wave {
            0% {
                transform: scale(0);
            }

            50% {
                transform: scale(1);
            }

            100% {
                transform: scale(0);
            }
        }
    </style>

    @stack('css')


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/gradient.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    {{-- material icon cdn --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    {{-- sweet alert css --}}


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&amp;display=swap">
    <link rel="shortcut icon" type="image/png" href="/asset/images/icon/icon.png">
    <link rel="stylesheet" href="/asset/frontend/blue/css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="/asset/frontend/blue/css/all.min.css">
    <link rel="stylesheet" href="/asset/frontend/blue/css/line-awesome.min.css">
    <link rel="stylesheet" href="/asset/frontend/blue/css/lib/slick.css">
    <link rel="stylesheet" href="/asset/frontend/blue/css/lib/odometer.css">

    <link rel="stylesheet" href="/asset/frontend/blue/css/izitoast.min.css">

    <link href="/asset/frontend/blue/css/main.css" rel="stylesheet">

    <link href="/asset/frontend/blue/css/responsive.css" rel="stylesheet">


    <style>
        :root {
            --h-font: 'Montserrat', sans-serif;
            --p-font: 'Poppins', 'sans-serif';
        }
    </style>

    <style>
        .wrapper {
            display: inline-flex;

            height: 100px;
            width: 100%;
            align-items: center;
            justify-content: space-evenly;
            border-radius: 5px;
            padding: 20px 15px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2);
        }

        .wrapper .option {
            background: #fff;
            height: 55px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin: 0 10px;
            border-radius: 5px;
            cursor: pointer;
            padding: 0 10px;
            border: 2px solid lightgrey;
            transition: all 0.3s ease;
        }

        .wrapper .option .dot {
            height: 20px;
            width: 20px;
            background: #d9d9d9;
            border-radius: 50%;
            position: relative;
        }

        .wrapper .option .dot::before {
            position: absolute;
            content: "";
            top: 4px;
            left: 4px;
            width: 12px;
            height: 12px;
            background: var(--clr-main);
            border-radius: 50%;
            opacity: 0;
            transform: scale(1.5);
            transition: all 0.3s ease;
        }

        input[type="radio"] {
            display: none;
        }

        #option-1:checked:checked~.option-1,
        #option-2:checked:checked~.option-2 {
            border-color: var(--clr-main);
            background: var(--clr-main);
        }

        #option-1:checked:checked~.option-1 .dot,
        #option-2:checked:checked~.option-2 .dot {
            background: #fff;
        }

        #option-1:checked:checked~.option-1 .dot::before,
        #option-2:checked:checked~.option-2 .dot::before {
            opacity: 1;
            transform: scale(1);
        }

        .wrapper .option span {
            font-size: 20px;
            color: #808080;
        }

        #option-1:checked:checked~.option-1 span,
        #option-2:checked:checked~.option-2 span {
            color: #fff;
        }
    </style>

    <style>
        #linechart .apexcharts-tooltip {
            background-color: #220700 !important;
            border: 1px solid rgba(255, 255, 255, 0.15)
        }

        .sp_trading_section {
            padding: 120px 0;
        }

        .radio_button_list {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin: -3px -15px;
        }

        .radio_button_list .sp_site_radio {
            padding: 3px 15px;
        }
    </style>
    <style id="apexcharts-css">
        @keyframes opaque {
            0% {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @keyframes resizeanim {

            0%,
            to {
                opacity: 0
            }
        }

        .apexcharts-canvas {
            position: relative;
            user-select: none
        }

        .apexcharts-canvas ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 6px
        }

        .apexcharts-canvas ::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0, 0, 0, .5);
            box-shadow: 0 0 1px rgba(255, 255, 255, .5);
            -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5)
        }

        .apexcharts-inner {
            position: relative
        }

        .apexcharts-text tspan {
            font-family: inherit
        }

        .legend-mouseover-inactive {
            transition: .15s ease all;
            opacity: .2
        }

        .apexcharts-legend-text {
            padding-left: 15px;
            margin-left: -15px;
        }

        .apexcharts-series-collapsed {
            opacity: 0
        }

        .apexcharts-tooltip {
            border-radius: 5px;
            box-shadow: 2px 2px 6px -4px #999;
            cursor: default;
            font-size: 14px;
            left: 62px;
            opacity: 0;
            pointer-events: none;
            position: absolute;
            top: 20px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            white-space: nowrap;
            z-index: 12;
            transition: .15s ease all
        }

        .apexcharts-tooltip.apexcharts-active {
            opacity: 1;
            transition: .15s ease all
        }

        .apexcharts-tooltip.apexcharts-theme-light {
            border: 1px solid #e3e3e3;
            background: rgba(255, 255, 255, .96)
        }

        .apexcharts-tooltip.apexcharts-theme-dark {
            color: #fff;
            background: rgba(30, 30, 30, .8)
        }

        .apexcharts-tooltip * {
            font-family: inherit
        }

        .apexcharts-tooltip-title {
            padding: 6px;
            font-size: 15px;
            margin-bottom: 4px
        }

        .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
            background: #eceff1;
            border-bottom: 1px solid #ddd
        }

        .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
            background: rgba(0, 0, 0, .7);
            border-bottom: 1px solid #333
        }

        .apexcharts-tooltip-text-goals-value,
        .apexcharts-tooltip-text-y-value,
        .apexcharts-tooltip-text-z-value {
            display: inline-block;
            margin-left: 5px;
            font-weight: 600
        }

        .apexcharts-tooltip-text-goals-label:empty,
        .apexcharts-tooltip-text-goals-value:empty,
        .apexcharts-tooltip-text-y-label:empty,
        .apexcharts-tooltip-text-y-value:empty,
        .apexcharts-tooltip-text-z-value:empty,
        .apexcharts-tooltip-title:empty {
            display: none
        }

        .apexcharts-tooltip-text-goals-label,
        .apexcharts-tooltip-text-goals-value {
            padding: 6px 0 5px
        }

        .apexcharts-tooltip-goals-group,
        .apexcharts-tooltip-text-goals-label,
        .apexcharts-tooltip-text-goals-value {
            display: flex
        }

        .apexcharts-tooltip-text-goals-label:not(:empty),
        .apexcharts-tooltip-text-goals-value:not(:empty) {
            margin-top: -6px
        }

        .apexcharts-tooltip-marker {
            width: 12px;
            height: 12px;
            position: relative;
            top: 0;
            margin-right: 10px;
            border-radius: 50%
        }

        .apexcharts-tooltip-series-group {
            padding: 0 10px;
            display: none;
            text-align: left;
            justify-content: left;
            align-items: center
        }

        .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
            opacity: 1
        }

        .apexcharts-tooltip-series-group.apexcharts-active,
        .apexcharts-tooltip-series-group:last-child {
            padding-bottom: 4px
        }

        .apexcharts-tooltip-series-group-hidden {
            opacity: 0;
            height: 0;
            line-height: 0;
            padding: 0 !important
        }

        .apexcharts-tooltip-y-group {
            padding: 6px 0 5px
        }

        .apexcharts-custom-tooltip,
        .apexcharts-tooltip-box {
            padding: 4px 8px
        }

        .apexcharts-tooltip-boxPlot {
            display: flex;
            flex-direction: column-reverse
        }

        .apexcharts-tooltip-box>div {
            margin: 4px 0
        }

        .apexcharts-tooltip-box span.value {
            font-weight: 700
        }

        .apexcharts-tooltip-rangebar {
            padding: 5px 8px
        }

        .apexcharts-tooltip-rangebar .category {
            font-weight: 600;
            color: #777
        }

        .apexcharts-tooltip-rangebar .series-name {
            font-weight: 700;
            display: block;
            margin-bottom: 5px
        }

        .apexcharts-xaxistooltip,
        .apexcharts-yaxistooltip {
            opacity: 0;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #eceff1;
            border: 1px solid #90a4ae
        }

        .apexcharts-xaxistooltip {
            padding: 9px 10px;
            transition: .15s ease all
        }

        .apexcharts-xaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, .7);
            border: 1px solid rgba(0, 0, 0, .5);
            color: #fff
        }

        .apexcharts-xaxistooltip:after,
        .apexcharts-xaxistooltip:before {
            left: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none
        }

        .apexcharts-xaxistooltip:after {
            border-color: transparent;
            border-width: 6px;
            margin-left: -6px
        }

        .apexcharts-xaxistooltip:before {
            border-color: transparent;
            border-width: 7px;
            margin-left: -7px
        }

        .apexcharts-xaxistooltip-bottom:after,
        .apexcharts-xaxistooltip-bottom:before {
            bottom: 100%
        }

        .apexcharts-xaxistooltip-top:after,
        .apexcharts-xaxistooltip-top:before {
            top: 100%
        }

        .apexcharts-xaxistooltip-bottom:after {
            border-bottom-color: #eceff1
        }

        .apexcharts-xaxistooltip-bottom:before {
            border-bottom-color: #90a4ae
        }

        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after,
        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
            border-bottom-color: rgba(0, 0, 0, .5)
        }

        .apexcharts-xaxistooltip-top:after {
            border-top-color: #eceff1
        }

        .apexcharts-xaxistooltip-top:before {
            border-top-color: #90a4ae
        }

        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after,
        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
            border-top-color: rgba(0, 0, 0, .5)
        }

        .apexcharts-xaxistooltip.apexcharts-active {
            opacity: 1;
            transition: .15s ease all
        }

        .apexcharts-yaxistooltip {
            padding: 4px 10px
        }

        .apexcharts-yaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, .7);
            border: 1px solid rgba(0, 0, 0, .5);
            color: #fff
        }

        .apexcharts-yaxistooltip:after,
        .apexcharts-yaxistooltip:before {
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none
        }

        .apexcharts-yaxistooltip:after {
            border-color: transparent;
            border-width: 6px;
            margin-top: -6px
        }

        .apexcharts-yaxistooltip:before {
            border-color: transparent;
            border-width: 7px;
            margin-top: -7px
        }

        .apexcharts-yaxistooltip-left:after,
        .apexcharts-yaxistooltip-left:before {
            left: 100%
        }

        .apexcharts-yaxistooltip-right:after,
        .apexcharts-yaxistooltip-right:before {
            right: 100%
        }

        .apexcharts-yaxistooltip-left:after {
            border-left-color: #eceff1
        }

        .apexcharts-yaxistooltip-left:before {
            border-left-color: #90a4ae
        }

        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after,
        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
            border-left-color: rgba(0, 0, 0, .5)
        }

        .apexcharts-yaxistooltip-right:after {
            border-right-color: #eceff1
        }

        .apexcharts-yaxistooltip-right:before {
            border-right-color: #90a4ae
        }

        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after,
        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
            border-right-color: rgba(0, 0, 0, .5)
        }

        .apexcharts-yaxistooltip.apexcharts-active {
            opacity: 1
        }

        .apexcharts-yaxistooltip-hidden {
            display: none
        }

        .apexcharts-xcrosshairs,
        .apexcharts-ycrosshairs {
            pointer-events: none;
            opacity: 0;
            transition: .15s ease all
        }

        .apexcharts-xcrosshairs.apexcharts-active,
        .apexcharts-ycrosshairs.apexcharts-active {
            opacity: 1;
            transition: .15s ease all
        }

        .apexcharts-ycrosshairs-hidden {
            opacity: 0
        }

        .apexcharts-selection-rect {
            cursor: move
        }

        .svg_select_boundingRect,
        .svg_select_points_rot {
            pointer-events: none;
            opacity: 0;
            visibility: hidden
        }

        .apexcharts-selection-rect+g .svg_select_boundingRect,
        .apexcharts-selection-rect+g .svg_select_points_rot {
            opacity: 0;
            visibility: hidden
        }

        .apexcharts-selection-rect+g .svg_select_points_l,
        .apexcharts-selection-rect+g .svg_select_points_r {
            cursor: ew-resize;
            opacity: 1;
            visibility: visible
        }

        .svg_select_points {
            fill: #efefef;
            stroke: #333;
            rx: 2
        }

        .apexcharts-svg.apexcharts-zoomable.hovering-zoom {
            cursor: crosshair
        }

        .apexcharts-svg.apexcharts-zoomable.hovering-pan {
            cursor: move
        }

        .apexcharts-menu-icon,
        .apexcharts-pan-icon,
        .apexcharts-reset-icon,
        .apexcharts-selection-icon,
        .apexcharts-toolbar-custom-icon,
        .apexcharts-zoom-icon,
        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon {
            cursor: pointer;
            width: 20px;
            height: 20px;
            line-height: 24px;
            color: #6e8192;
            text-align: center
        }

        .apexcharts-menu-icon svg,
        .apexcharts-reset-icon svg,
        .apexcharts-zoom-icon svg,
        .apexcharts-zoomin-icon svg,
        .apexcharts-zoomout-icon svg {
            fill: #6e8192
        }

        .apexcharts-selection-icon svg {
            fill: #444;
            transform: scale(.76)
        }

        .apexcharts-theme-dark .apexcharts-menu-icon svg,
        .apexcharts-theme-dark .apexcharts-pan-icon svg,
        .apexcharts-theme-dark .apexcharts-reset-icon svg,
        .apexcharts-theme-dark .apexcharts-selection-icon svg,
        .apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg,
        .apexcharts-theme-dark .apexcharts-zoom-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomin-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomout-icon svg {
            fill: #f3f4f5
        }

        .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg {
            fill: #008ffb
        }

        .apexcharts-theme-light .apexcharts-menu-icon:hover svg,
        .apexcharts-theme-light .apexcharts-reset-icon:hover svg,
        .apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
        .apexcharts-theme-light .apexcharts-zoomout-icon:hover svg {
            fill: #333
        }

        .apexcharts-menu-icon,
        .apexcharts-selection-icon {
            position: relative
        }

        .apexcharts-reset-icon {
            margin-left: 5px
        }

        .apexcharts-menu-icon,
        .apexcharts-reset-icon,
        .apexcharts-zoom-icon {
            transform: scale(.85)
        }

        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon {
            transform: scale(.7)
        }

        .apexcharts-zoomout-icon {
            margin-right: 3px
        }

        .apexcharts-pan-icon {
            transform: scale(.62);
            position: relative;
            left: 1px;
            top: 0
        }

        .apexcharts-pan-icon svg {
            fill: #fff;
            stroke: #6e8192;
            stroke-width: 2
        }

        .apexcharts-pan-icon.apexcharts-selected svg {
            stroke: #008ffb
        }

        .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
            stroke: #333
        }

        .apexcharts-toolbar {
            position: absolute;
            z-index: 11;
            max-width: 176px;
            text-align: right;
            border-radius: 3px;
            padding: 0 6px 2px;
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .apexcharts-menu {
            background: #fff;
            position: absolute;
            top: 100%;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 3px;
            right: 10px;
            opacity: 0;
            min-width: 110px;
            transition: .15s ease all;
            pointer-events: none
        }

        .apexcharts-menu.apexcharts-menu-open {
            opacity: 1;
            pointer-events: all;
            transition: .15s ease all
        }

        .apexcharts-menu-item {
            padding: 6px 7px;
            font-size: 12px;
            cursor: pointer
        }

        .apexcharts-theme-light .apexcharts-menu-item:hover {
            background: #eee
        }

        .apexcharts-theme-dark .apexcharts-menu {
            background: rgba(0, 0, 0, .7);
            color: #fff
        }

        @media screen and (min-width:768px) {
            .apexcharts-canvas:hover .apexcharts-toolbar {
                opacity: 1
            }
        }

        .apexcharts-canvas .apexcharts-element-hidden,
        .apexcharts-datalabel.apexcharts-element-hidden,
        .apexcharts-hide .apexcharts-series-points {
            opacity: 0
        }

        .apexcharts-datalabel,
        .apexcharts-datalabel-label,
        .apexcharts-datalabel-value,
        .apexcharts-datalabels,
        .apexcharts-pie-label {
            cursor: default;
            pointer-events: none
        }

        .apexcharts-pie-label-delay {
            opacity: 0;
            animation-name: opaque;
            animation-duration: .3s;
            animation-fill-mode: forwards;
            animation-timing-function: ease
        }

        .apexcharts-annotation-rect,
        .apexcharts-area-series .apexcharts-area,
        .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-gridline,
        .apexcharts-line,
        .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-point-annotation-label,
        .apexcharts-radar-series path,
        .apexcharts-radar-series polygon,
        .apexcharts-toolbar svg,
        .apexcharts-tooltip .apexcharts-marker,
        .apexcharts-xaxis-annotation-label,
        .apexcharts-yaxis-annotation-label,
        .apexcharts-zoom-rect {
            pointer-events: none
        }

        .apexcharts-marker {
            transition: .15s ease all
        }

        .resize-triggers {
            animation: 1ms resizeanim;
            visibility: hidden;
            opacity: 0;
            height: 100%;
            width: 100%;
            overflow: hidden
        }

        .contract-trigger:before,
        .resize-triggers,
        .resize-triggers>div {
            content: " ";
            display: block;
            position: absolute;
            top: 0;
            left: 0
        }

        .resize-triggers>div {
            height: 100%;
            width: 100%;
            background: #eee;
            overflow: auto
        }

        .contract-trigger:before {
            overflow: hidden;
            width: 200%;
            height: 200%
        }
    </style>

    <style type="text/css">
        <!--
        a.gflag {
            vertical-align: middle;
            font-size: 16px;
            padding: 1px 0;
            background-repeat: no-repeat;
            background-image: url(//gtranslate.net/flags/16.png);
        }

        a.gflag img {
            border: 0;
        }

        a.gflag:hover {
            background-image: url(//gtranslate.net/flags/16a.png);
        }

        #goog-gt-tt {
            display: none !important;
        }

        .goog-te-banner-frame {
            display: none !important;
        }

        .goog-te-menu-value:hover {
            text-decoration: none !important;
        }

        body {
            top: 0 !important;
        }

        #google_translate_element2 {
            display: none !important;
        }
        -->
    </style>
</head>

<body>

<header aria-label="Application header content" data-fetch-key="data-v-04ebabbd:0" data-v-04ebabbd="">
    
    
</header>
<main>
<section class="Homepage__search" data-v-443be4a3="">
    <div class="Homepage__search-container container" data-v-443be4a3="">
        <div class="grid" data-v-443be4a3="">
            <div class="Homepage__search-item  grid__item default--1-2 lap--1-1 palm--1-1" data-v-443be4a3="">
                <div class="Homepage__search-title u-scroll-enter active" data-v-443be4a3="">
                    <h1 class="Homepage__search-heading u-color-white" style="color: #ffffff;" data-v-443be4a3="">
                        Find a home that suits your lifestyle.
                    </h1>
                </div>
            </div>
            <div class="Homepage__search-item  grid__item default--1-2 lap--1-1 palm--1-1" data-v-443be4a3="">
                <div class="Homepage__search-tabs u-scroll-enter active" data-v-443be4a3="">
                    <div class="ChannelTabs ChannelTabs--light" data-v-0bc7c30b="" data-v-443be4a3=""
                        config="[object Object]">
                        <div class="SmartMenu Channels-tabs u-text-uppercase Channels-tabs--undefined"
                            data-v-d521d7b0="" data-v-0bc7c30b=""><span data-index="sales" tabindex="0"
                                class="Channels-tabs__item is-active" data-v-d521d7b0="">Buy</span><a href="/" data-index="/sell-with-us"
                                class="Channels-tabs__item" data-v-d521d7b0="">Home</a><span data-index="associates"
                                tabindex="0" class="Channels-tabs__item" data-v-d521d7b0=""><a href="mailto: agent@stellar-capital.io">Contact Agent</a></span> <!----></div>
                        <div tabindex="-1" data-fetch-key="2"
                            class="Entity-search__container Entity-search__container--absolute Entity-search--dark"
                            data-v-0bc7c30b=""><button aria-label="Search"
                                class="Entity-search__btn Entity-search__btn--search"><i aria-label="Search"
                                    class="Entity-search__search-icon icon icon-search"></i> <span
                                    class="hide">close</span></button>
                            <div class="Entity-search__geolocation" style="display:;">
                                <p class="Entity-search__geolocation-label" style="display:;">

                                </p>
                            </div>
                            <div aria-haspopup="listbox" role="combobox" aria-owns="el-autocomplete-2624"
                                class="el-autocomplete Entity-search__input Entity-search__input--has-icon">
                                <div class="el-input"><!----><input type="text" autocomplete="Entity-search"
                                        aria-label="Entity search" valuekey="value" popperclass="Search-suggestions"
                                        placeholder="Country, City, Address, Postal Code or ID"
                                        fetchsuggestions="function () { [native code] }" triggeronfocus="true"
                                        debounce="300" placement="bottom-start" class="el-input__inner" role="textbox"
                                        aria-autocomplete="list" aria-controls="id"
                                        aria-activedescendant="el-autocomplete-2624-item--1"><!----><!----><!----><!---->
                                </div>
                                <div role="region" class="el-autocomplete-suggestion el-popper Search-suggestions"
                                    style="width:;display:none;">
                                    <div class="el-scrollbar">
                                        <div class="el-autocomplete-suggestion__wrap el-scrollbar__wrap"
                                            style="margin-bottom: -17px; margin-right: -17px;">
                                            <ul class="el-scrollbar__view el-autocomplete-suggestion__list"
                                                role="listbox" id="el-autocomplete-2624"></ul>
                                        </div>
                                        <div class="el-scrollbar__bar is-horizontal">
                                            <div class="el-scrollbar__thumb" style="transform: translateX(0%);"></div>
                                        </div>
                                        <div class="el-scrollbar__bar is-vertical">
                                            <div class="el-scrollbar__thumb" style="transform: translateY(0%);"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> <button aria-label="Search"
                                class="Entity-search__btn Entity-search__btn--location Entity-search__btn--hidden"><i
                                    aria-label="Search Arrow"
                                    class="Entity-search__arrow-icon icon icon-arroweditable Entity-search__arrow-icon--dark-theme"></i>
                                <span class="hide">close</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-section sp_pt_120 sp_pb_120">
    <div class="about-el"><img src="/asset/frontend/default/images/about/645b90830273d1683722371.png"
            alt="about line image">
    </div>
    <div class="container">
        <div class="row gy-5 align-items-center justify-content-between">
            <div class="col-lg-5" style="overflow: auto;">
                <iframe src="//players.brightcove.net/5699924528001/default_default/index.html?videoId=6148495374001"
                    scrolling="no" title="Virtual Viewings"
                    style="width: 100%; border: none; transition: height 0.1s linear 0s; display: block; height: 369.688px;"
                    allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>
            </div>
            <div class="col-lg-7 ps-lg-5 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s"
                style="visibility: visible; animation-duration: 0.5s; animation-delay: 0.5s; animation-name: fadeInUp;">
                <h2 class="sp_theme_top_title">
                    Stellar Real Estate</h2>
                <p class="fs-lg mt-3">Built on centuries of tradition and dedicated to innovating the luxury real estate
                    industry, {{site('name')}} International Realty offers transformative experiences through a global
                    network of exceptional agents.</p>
                <ul class="sp_check_list mt-4">


                    <li>Experience luxury homes like never before, all from the comfort of yours.</li>
                    <li>Discover' how to find's how to trade opportunities and manage risk</li>
                    <li>Make smarter decisions with experienced market analysts guidance</li>
                    <li>Unlock and tade up to $2.5m capital - keep at least 70% of any profits</li>




                </ul>

            </div>
        </div>
    </div>
</section>



<section class="w-full px-5 md:px-20 py-10 mt-10">
    <div class="w-full  flex justify-center">
        <div class="w-full  md:w-3/4 grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="">


                <h2 class="text-6xl rescron-font-bold">VIEW HOMES, FROM THE COMFORT OF YOURS
                </h2>
                <p class="text-xl text-gray-500 mt-5">
                    Now more than ever we know that people around the world want virtual options when it comes to buying
                    or selling their home. From immersive luxury home tours that can be experienced from the web browser
                    on your phone, computer, or through a wearable headset, to live virtual open houses and more, the
                    {{site('name')}} International Realty® network of luxury real estate experts is ready to meet you
                    where you need us most.
                </p>








            </div>
            <div class="w-full">

                <div>
                    <img class="rounded-lg" src="{{ asset('assets/images/estate/1.png') }}" alt="">
                    <div class="md:hidden h-16"></div>
                </div>
            </div>














            <div class="">


                <h2 class="text-6xl rescron-font-bold">Exclusive Access to Local Experts </h2>
                <p class="text-xl text-gray-500 mt-5">
                    With experts in every part of the world, we are local everywhere, allowing us to walk alongside our
                    clients at every stage of their journey. With innovative technology and unrivaled service, we ensure
                    that your home is connected with buyers, locally and worldwide.
                </p>








            </div>

            <div class="w-full">

                <div>
                    <img class="rounded-lg" src="{{ asset('assets/images/estate/2.png') }}" alt="">
                    <div class="md:hidden h-16"></div>
                </div>
            </div>

            <div class="w-full">

                <div>
                    <iframe
                        src='//players.brightcove.net/5699924528001/default_default/index.html?videoId=6286663702001'
                        scrolling="no" title="Virtual Viewings"
                        style="width: 100%; border: none; transition: height 0.1s linear 0s; display: block; height: 465.688px;"
                        allowfullscreen frameborder=0></iframe>
                </div>
            </div>

            <div class="">


                <h2 class="text-6xl rescron-font-bold">Sell your home with our tailored solution for you.
                </h2>
                <p class="text-xl text-gray-500 mt-5">
                    Connect with our local experts who can create a comprehensive and customized plan for your home that
                    takes into consideration all avenues of marketing.


                </p>







            </div>


        </div>

    </div>


</section>



<iframe src='//players.brightcove.net/5699924528001/default_default/index.html?videoId=6059328301001' scrolling="no"
    title="Virtual Viewings"
    style="width: 100%; border: none; transition: height 0.1s linear 0s; display: block; height: 600px;" allowfullscreen
    frameborder=0></iframe>





</div>
</main>

<!-- footer section start -->
<!-- footer section start -->
<footer class="footer-section">
    <div class="sp_footer_menu_area">
        <div class="back-to-top">
            <div class="back-to-top-inner">
                <a href="#"><i class="las la-arrow-up"></i></a>
            </div>
        </div>

        <div class="container">
            <div class="row gy-4 justify-content-between">

                <div class="col-lg-2 col-6">
                    <div class="sp_footer_item">
                        <h5 class="sp_footer_item_title">Company</h5>

                        <ul class="sp_footer_menu">
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('about') }}">Our Mission</a></li>
                            <li><a href="{{ route('estate') }}">Real Estate</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="sp_footer_item">
                        <h5 class="sp_footer_item_title">Links</h5>
                        <ul class="sp_footer_menu">
                            <li><a href="{{ route('tos') }}">TOS</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                            <li><a href="#">Community</a></li>
                            <li><a href="{{ route('faqs') }}">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="sp_footer_item">
                        <h5 class="sp_footer_item_title">Contact Us</h5>


                        <ul class="sp_social_links mt-2" style="color: #DADADA;">
                            <li>
                                <i class="bi bi-geo-alt-fill"></i> {{ site('address') }}, {{ site('city') }},
                                {{ site('state') }}, {{ site('country') }}
                            </li>
                            <li>
                                <i class="bi bi-telephone-fill"></i> {{ site('phone') }}
                            </li>
                            <li>
                                <i class="bi bi-envelope-fill"></i> {{ site('email') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- footer-top end -->
    <div class="sp_footer_content_area">
        <div class="container">
            <div class="row gy-3">
                <div class="col-12">
                    <div class="footer_content_item">
                        <h6 class="title text-white">MARGIN TRADING DISCLAIMER</h6>
                        <p class="mt-2">
                            Any and all liability for risks resulting from investment transactions or other asset
                            dispositions carried out by the customer based on information received or a market analysis
                            is expressly excluded by {{ site('name') }}. All the information made available here is
                            generally provided to serve as a robot, with obligation and with only specific
                            recommendations for action. It does not constitute and cannot replace investment advice. We
                            therefore recommend that you contact your {{ site('name') }} advisor before carrying out
                            specific transactions and investments.
                        </p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="footer_content_item">
                        <h6 class="title text-white">SOFTWARE DISCLAIMER</h6>
                        <p class="mt-2">
                            All software used in: (a) the integration of hardware device(s); (b) services; (c) and/or
                            enabling software provided to Dialogic in the combination with {{site('name') }}, is
                            provided to Customer “as is” and Dialogic disclaims all warranties with respect to such
                            software to the fullest extent possible.
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="footer_content_item">
                        <h6 class="title text-white">TRADEMARKS DISCLAIMER</h6>
                        <p class="mt-2">
                            All trademarks, logos and brand names are the property of {{site('name')}} owners. All
                            company, product and service names used in this website are for identification purposes. Use
                            of these names,trademarks and brands does imply endorsement.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sp_copy_right_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright 2024 {{ site('name') }}. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>


{{-- cookie consent --}}
<div class="w-full fixed z-50 bottom-0 left-0 hidden" id="cookie-consent">
    <div class="w-full bg-purple-500 p-5">
        <div class="w-full grid grid-cols-1 gap-3  md:flex space-x-2 justify-center items-center">
            <p class="text-center">We use cookies to tailor your experience on {{ site('name') }}. Learn more in
                our <a href="{{ route('privacy') }}">privacy policy</a></p>
            <div class="text-center">
                <a id="consented"
                    class="ts-gray-3 rounded-full shadow border border-slate-800 hover:border-slate-600 cursor-pointer px-2 py-1 hover:scale-110 transition-all"
                    role="button">
                    <span>Accept Cookies</span>

                </a>
            </div>
        </div>
    </div>
</div>

<a href="#" target="_blank" class="fixed bottom-0 right-0 z-50 mb-5">
    <img src="/telegram.png" alt="" class="w-10 h-10 animated-image shadow mr-2">
</a>
<!-- footer section end -->

<!-- footer section end -->
<script src="/asset/frontend/blue/js/lib/jquery.min.js"></script>
<script src="/asset/frontend/blue/js/lib/bootstrap.bundle.min.js"></script>
<script src="/asset/frontend/blue/js/lib/slick.min.js"></script>
<script src="/asset/frontend/blue/js/lib/wow.min.js"></script>
<script src="/asset/frontend/blue/js/lib/jquery.paroller.min.js"></script>
<script src="/asset/frontend/blue/js/lib/TweenMax.min.js"></script>
<script src="/asset/frontend/blue/js/lib/odometer.min.js"></script>
<script src="/asset/frontend/blue/js/lib/viewport.jquery.js"></script>

<script src="/asset/frontend/blue/js/izitoast.min.js"></script>

<script src="/asset/frontend/blue/js/main.js"></script>


<script type="text/javascript">
    function googleTranslateElementInit2() { new google.translate.TranslateElement({ pageLanguage: 'en', autoDisplay: false }, 'google_translate_element2'); }
</script>
<script type="text/javascript"
    src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
    /* <![CDATA[ */
    eval(function (p, a, c, k, e, r) { e = function (c) { return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36)) }; if (!''.replace(/^/, String)) { while (c--) r[e(c)] = k[c] || e(c); k = [function (e) { return r[e] }]; e = function () { return '\\w+' }; c = 1 }; while (c--) if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]); return p }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
    /* ]]> */
</script>

<script>
    $(function () {
        'use strict'

        $('.balance').on('click', function (e) {
            e.preventDefault();
            const modal = $('#balance')
            modal.find('input[name = payment]').val($(this).data('id'))
            modal.modal('show')
        })

        $('.chooseBtn').on('click', function (e) {
            e.preventDefault();
            const modal = $('#confirmation')

            modal.find('input[name=payment]').val($(this).data('id'))

            modal.modal('show')
        })
    })
</script>
<script src="/asset/frontend/blue/js/lib/apex.min.js"></script>
<script>
    'use strict'


    let cryptoPrice;

    let currency = $("input[name='currency']:checked").val();

    $('.currency').each(function (index) {
        $('.currency').eq(index).on('click', function () {
            currency = $(this).val();
            fetchCryptocurrencyPrices(currency);
            currentPrice(currency)
        })
    })

    function currentPrice(currency) {

        $.ajax({
            url: "/current-price",
            method: "GET",
            data: {
                currency: currency
            },
            success: function (response) {
                $('#currentPrice').text('Current Price ' + response + '(' + currency + ')')
                $('input[name=trade_cur]').val(currency)
                $('input[name=trade_price]').val(response)
            }
        });

    }

    function updateChart(data) {
        chart.updateSeries([{
            data: data
        }]);
    }

    setInterval(() => {
        fetchCryptocurrencyPrices(currency);
        currentPrice(currency);
    }, 5000);


    $(window).on("load", function () {
        fetchCryptocurrencyPrices(currency);
        currentPrice(currency);
    });


    function fetchCryptocurrencyPrices(currency) {
        $.ajax({
            url: "/get-ticker",
            method: "GET",
            data: {
                currency: currency
            },
            success: function (response) {
                chart.updateSeries([{
                    data: response
                }]);

            }
        });
    }

    var options = {
        series: [{
            data: cryptoPrice
        }],
        chart: {
            type: 'candlestick',
            height: 400
        },
        title: {
            text: 'CandleStick Chart',
            align: 'left',
            style: {
                color: '#ffffff'
            }
        },
        xaxis: {
            type: 'datetime',
            labels: {
                style: {
                    colors: ['#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff']
                }
            }
        },
        yaxis: {
            tooltip: {
                enabled: true
            },
            labels: {
                style: {
                    colors: ['#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff']
                }
            }
        },
        grid: {
            show: true,
            borderColor: '#ffffff26',
            strokeDashArray: 0,
            yaxis: {
                lines: {
                    show: true
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#linechart"), options);
    chart.render();


    $('.order').on('click', function () {

        const modal = $('#order');

        modal.modal('show')
    })
</script>
<script>
    "use strict";


    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('la-eye-slash');
    });


    const togglePasswordConfirm = document.querySelector('#confirmTogglePassword');
    const passwordConfirm = document.querySelector('#password_confirmation');

    togglePasswordConfirm.addEventListener('click', function (e) {
        const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirm.setAttribute('type', type);
        this.classList.toggle('la-eye-slash');
    });


    function submitUserForm() {
        var response = grecaptcha.getResponse();
        if (response.length == 0) {
            document.getElementById('g-recaptcha-error').innerHTML =
                "<span class='sp_text_danger'>Captcha field is required.</span>";
            return false;
        }
        return true;
    }

    function verifyCaptcha() {
        document.getElementById('g-recaptcha-error').innerHTML = '';
    }
</script>


<script>
    $(function () {
        'use strict'
        $(document).on('submit', '#subscribe', function (e) {
            e.preventDefault();
            const email = $('.subscribe-email').val();
            var url = "/subscribe";
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    email: email,
                    _token: "RyETXkt5IEGNdPFZjqhQ125cFSAZd15r6f8booUb"
                },
                success: (response) => {

                    $('.subscribe-email').val('');

                    if (response.success) {

                        iziToast.success({
                            position: 'topRight',
                            message: "Successfully Subscribe",
                        });

                        return
                    }


                    iziToast.error({
                        position: 'topRight',
                        message: "",
                    });

                },
                error: () => {

                    iziToast.error({
                        position: 'topRight',
                        message: "Email is Required",
                    });
                }
            })
        });

        var url = "/change-language";

        $(".changeLang").on('change', function () {

            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
    })
</script>
<script>
    'use strict'





</script>




{{-- all script placements --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- cookie --}}
<script>
    function setCookie(cookieName, cookieValue) {
        var expirationDate = new Date();
        expirationDate.setFullYear(expirationDate.getFullYear() + 10); // Set expiration date to 10 years from now

        var cookieString = cookieName + '=' + cookieValue + '; expires=' + expirationDate.toUTCString() + '; path=/';

        document.cookie = cookieString;
    }


    $('#consented').on('click', function (e) {
        e.preventDefault();
        setCookie('cookie-consent', true);
        $('#cookie-consent').addClass('hidden');
    });
</script>

@yield('scripts')

@stack('scripts')

{{-- hide preloader --}}
<script>
    window.onload = function () {
        $('.preloader').fadeOut(100);
        $('body').remove('h-screen').removeClass('overflow-hidden');
        // Check if the "cookie-consent" cookie exists
        if (!document.cookie.includes('cookie-consent')) {
            $('#cookie-consent').removeClass('hidden');
        }
    };
</script>

{{-- mobile menu trigger --}}
<script>
    var mobileMenu = $('#mobile-menu');
    $(document).on('click', '.mobile-menu-trigger', function (e) {
        e.preventDefault();
        mobileMenu.toggleClass('hidden');
    });
</script>




{{-- fix and shrink header --}}
<script>
    // scroll
    window.addEventListener('scroll', function () {
        const fixedHeader = document.getElementById('fixed-header');
        const scrollPosition = window.scrollY;

        // Adjust the scroll threshold according to your preference
        const scrollThreshold = 100;

        if (scrollPosition >= scrollThreshold) {
            fixedHeader.classList.add('fixed');
            fixedHeader.classList.add('z-40');
            fixedHeader.classList.add('border-b');
            fixedHeader.classList.add('border-slate-800');


        } else {
            fixedHeader.classList.remove('fixed');
            fixedHeader.classList.remove('z-40');
            fixedHeader.classList.remove('border-b');
            fixedHeader.classList.remove('border-slate-800');


        }

    });
</script>

{{-- livechat --}}
{!! json_decode(site('livechat')) !!}





<svg id="SvgjsSvg1080" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
    style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
    <defs id="SvgjsDefs1081"></defs>
    <polyline id="SvgjsPolyline1082" points="0,0"></polyline>
    <path id="SvgjsPath1083"
        d="M456.8276298828125 244.98622857142618L460.86015625 244.98622857142618L460.86015625 244.98622857142618L460.86015625 244.98622857142618L464.8926826171875 244.98622857142618L464.8926826171875 246.77267999999458L460.86015625 246.77267999999458L460.86015625 246.77267999999458L460.86015625 246.77267999999458L456.8276298828125 246.77267999999458L456.8276298828125 244.48622857142618 ">
    </path>
</svg></body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>




@section('scripts')
@endsection