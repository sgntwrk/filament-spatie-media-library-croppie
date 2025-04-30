<?php

namespace JosefBehr\FilamentSpatieMediaLibraryCroppie;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;

class FilamentSpatieMediaLibraryCroppieServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-spatie-media-library-croppie';

    protected array $styles = [
        'filament-spatie-media-library-croppie-style' =>
            __DIR__ . '/../resources/dist/css/filament-spatie-media-library-croppie.css',
    ];

    protected array $beforeCoreScripts = [
        'filament-spatie-media-library-croppie-component-script' =>
            __DIR__ . '/../resources/dist/js/filament-spatie-media-library-croppie.js',
    ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasAssets()
            ->hasViews('filament-spatie-media-library-croppie')
            ->hasTranslations();
    }

    public function packageBooted(): void
    {
        // Register assets
        FilamentAsset::register([
            Css::make('filament-spatie-media-library-croppie-style', __DIR__ . '/../resources/dist/css/filament-spatie-media-library-croppie.css'),
            AlpineComponent::make('filament-spatie-media-library-croppie-component', __DIR__ . '/../resources/dist/js/filament-spatie-media-library-croppie.js'),
        ]);
    }
}
