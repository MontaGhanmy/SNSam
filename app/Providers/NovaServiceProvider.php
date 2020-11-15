<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use Techouse\TotalRecords\TotalRecords;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
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
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
          new \Tightenco\NovaGoogleAnalytics\PageViewsMetric,
          new \Tightenco\NovaGoogleAnalytics\VisitorsMetric,
          new \Tightenco\NovaGoogleAnalytics\MostVisitedPagesCard,
          new TotalRecords(\App\User::class, __('Total utilisateurs'), now()->addHour()),
          new TotalRecords(\App\Post::class, __('Total articles'), now()->addHour()),
          new TotalRecords(\App\OneKey::class, __('Total entrées OneKey'), now()->addHour()),
          new TotalRecords(\App\Category::class, __('Total Catégories'), now()->addHour()),
          new TotalRecords(\App\Page::class, __('Total Pages'), now()->addHour()),
          new TotalRecords(\App\Invitation::class, __('Total code d\'invitation'), now()->addHour()),

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
                new \Silvanite\NovaToolPermissions\NovaToolPermissions(),
                new \OptimistDigital\MenuBuilder\MenuBuilder(),
                new \Bakerkretzmar\SettingsTool\SettingsTool,
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
