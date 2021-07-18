<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date ;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\NovaRequest;
use OptimistDigital\MultiselectField\Multiselect;
use DigitalCreative\ConditionalContainer\ConditionalContainer;
use DigitalCreative\ConditionalContainer\HasConditionalContainer;
use App\CompanyModel;

class Design extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Design::class;
    use HasConditionalContainer;
    public static $tableStyle = 'tight';
    public static $showColumnBorders = true;

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
        'name',
        'number',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {    
        $RawMaterials = \App\RawMaterial::all()->pluck('name' , 'id');
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('Name','name')->rules('max:50'),
            Number::make('Number' , 'number')->rules('required'),
            Select::make('Gender')->options([
                'Male' => 'Male',
                'Female' => 'Female',
            ])->rules('required'),  

            Date::make('Design Date','publish_date')->rules('required'),
            BelongsTo::make('Season' , 'Season' , 'App\Nova\Season')->showCreateRelationButton() ,
            // TODO ..  
            Multiselect::make('Raw Matrials', 'raw_matrials')->belongsToMany(RawMaterial::class),
            // Multiselect::make('Raw Materials', 'RawMaterial')->options($RawMaterials),
            // Images TODO .. 

            Boolean::make('Is Model!','is_model')->rules('required'),             
            ConditionalContainer::make([  
                //  Text::make('Name','name')->rules('max:50'),
                HasMany::make('CompanyModels'),
               ])
              ->if('is_model == 1'),


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
