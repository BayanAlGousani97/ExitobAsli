<?php

namespace App\Providers;


use App\Nova\EnterIOBill;
use App\Nova\IOBill;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use App\Nova\City;
use App\Nova\Country;
use App\Nova\Brand;
use App\Nova\Customer;
use App\Nova\Design;
use App\Nova\Exporter;
use App\Nova\ExternalModel;
use App\Nova\HaulageCompany;
use App\Nova\ModelsWarehouse;
use App\Nova\Option;
use App\Nova\OptionValue;
use App\Nova\Order;
use App\Nova\RawMaterial;
use App\Nova\RawMaterialWarehouse;
use App\Nova\Season;
use App\Nova\User;
use App\Nova\Workshop;





class NovaServiceProvider extends NovaApplicationServiceProvider
{

    public function boot()
    {
        parent::boot();
    }

    protected function resources(){
        Nova::resources([
            Brand::class,

            City::class,
            Country::class,
            Customer::class,
            Design::class,
            Exporter::class,
            ExternalModel::class,
            HaulageCompany::class,
            ModelsWarehouse::class,
            Option::class,
            OptionValue::class,
            Order::class,
            RawMaterial::class,
            RawMaterialWarehouse::class,
            Season::class,
            User::class,
            Workshop::class,
            EnterIOBill::class,
            IOBill::class
        ]);
    }
    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new Help,
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \KABBOUCHI\LogsTool\LogsTool(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
