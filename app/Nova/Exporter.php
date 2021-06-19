<?php

namespace App\Nova;


use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;


class Exporter extends Resource
{

    public static $model = \App\Exporter::class;
    public static $showColumnBorders = true;
    public static $tableStyle = 'tight';

    public static $title = 'name';

    public static $search = [
        'name',
        'type'

    ];


    public function fields(Request $request)
    {
        return [
            ID::make('ID','id')->sortable(),

            Text::make('Name','name')
            ->rules('required','max:50')
            ->creationRules('unique:exporters,name')
            ->updateRules('unique:exporters,name,{{resourceId}}'),

            Text::make('Type','type')->rules('required','max:50'),

            Number::make('Phone Number','phone_number')
            ->rules('required' ,'min:4','max:13')
            ->creationRules('unique:exporters,phone_number')
            ->updateRules('unique:exporters,phone_number,{{resourceId}}'),

            Text::make('Address', 'address')->rules('required','max:50'),

        ];
    }

    public function cards(Request $request)
    {
        return [];
    }

    public function filters(Request $request)
    {
        return [];
    }

    public function lenses(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
