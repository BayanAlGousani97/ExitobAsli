<?php

namespace App\Nova;


use App\Option;
use App\OptionValue;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Currency as FieldsCurrency;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use NovaAttachMany\AttachMany;
use Pifpif\NovaTextCurrency\Currency;


class RawMaterial extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\RawMaterial::class;
    public static $showColumnBorders = true;
    public static $tableStyle = 'tight';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('Name','name')->rules('required'),
//            BelongsToMany::make('color','color',OptionValue::class),

          //  Select::make('color', 'component')
         //   ->options( OptionValue::query()->where('option_id','=',2)->pluck('value','option_id')->toArray()),

            BelongsTo::make('exporter name','exporter','App\Nova\Exporter')->showCreateRelationButton(),

//           AttachMany::make('component', 'values', \App\Nova\OptionValue::class),

            Text::make('Type','type'),

            Text::make('Code', 'code')->rules('required')
            ->creationRules('unique:raw_materials,code')
            ->updateRules('unique:raw_materials,code,{{resourceId}}'),

            Select::make('Measruing Unit')->options([
                'METER' => 'Meter',
                'KILOGRAM' => 'kilogram',
                'GRAM' => 'gram',
            ])->rules('required'),

            Text::make('Grammage', 'grammage')->rules('required'),

            Number::make('Quantity', 'quantity')->rules('required'),

            Currency::make('Price','price'),
            BelongsTo::make('Warehous name', 'raw_matrial_warehouse','App\Nova\RawMaterialWarehouse')->showCreateRelationButton(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
