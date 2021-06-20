<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;

class RawMaterialWarehouse extends Resource
{

    public static $model = \App\RawMaterialWarehouse::class;
    public static $tableStyle = 'tight';
    public static $showColumnBorders = true;


    public static $title = 'type';


    public static $search = [
        'type'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make('ID', 'id')->sortable(),

            Text::make('Type','type')
            ->rules('required','max:100')
            ->creationRules('unique:raw_material_warehouses,type')
            ->updateRules('unique:raw_material_warehouses,type,{{resourceId}}'),
        ];
    }
    public static function label()
    {
        return __('Raw Material Warehouse');
    }
    public static function singularLabel()
    {
        return __('Raw Material Warehouse');
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
