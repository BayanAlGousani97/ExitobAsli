<?php

namespace App\Nova;


use EmilianoTisato\NovaBelongsToDepends\NovaBelongsToDepends;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Manmohanjit\BelongsToDependency\BelongsToDependency;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use SimpleSquid\Nova\Fields\AdvancedNumber\AdvancedNumber;

class EnterIOBill extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\EnterIOBill::class;

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
    public function fieldsForCreate(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make('IO bills','IOBill',IOBill::class),
            BelongsTo::make('Code','material',RawMaterial::class)->searchable(),
            /*NovaBelongsToDepends::make('Code','material',RawMaterial::class)->searchable()
                ->options(\App\RawMaterial::all()),
           NovaBelongsToDepends::make('Name','name')
                ->optionsResolve(function ($code){
                return $code->name()->get(['name']);
            })->dependsOn('RawMaterial'),*/

            Text::make('Material Name','name'),
            Text::make('Color','color'),
            AdvancedNumber::make('Price','price'),
            Number::make('Quantity','quantity'),
            AdvancedNumber::make('Net Cost','net_cost')->exceptOnForms()
        ];
    }

    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make('IO bills','IOBill',IOBill::class),
           /*Select::make('Material','material_id')
            ->options(
                \App\RawMaterial::query()->pluck('code','id')->toArray()
            ),*/
            BelongsTo::make('Code','material',RawMaterial::class)->searchable(),
            Text::make('Material Name','name'),
            Text::make('Color','color'),
            AdvancedNumber::make('Price','price'),
            Number::make('Quantity','quantity'),
            AdvancedNumber::make('Net Cost','net_cost')->exceptOnForms()

        ];
    }


    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return '/resources/i-o-bills'  . '/' . $resource->iobill_id;
    }

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
