<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\RawMaterialWarehouse;
use Laravel\Nova\Fields\Text;

class raw_material_warehouse extends Resource
{

    public static $model = RawMaterialWarehouse::class;
    public static $tableStyle = 'tight';
    public static $showColumnBorders = true;


    public static $title = 'id';


    public static $search = [
        'id',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make('ID', 'id')->sortable(),

            Text::make('Type','type')
            ->rules('required','max:100')
            ->creationRules('unique:raw_material_warehouses,type'),
        ];
    }
    public static function label()
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
