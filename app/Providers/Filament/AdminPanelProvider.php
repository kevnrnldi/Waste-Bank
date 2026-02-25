<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use Filament\Support\Assets\Css;
use Filament\Support\Colors\Color;
use Filament\Notifications\Notification;
use Filament\Widgets\AccountWidget;
use Filament\Navigation\NavigationItem;
use Filament\Widgets\FilamentInfoWidget;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use DutchCodingCompany\FilamentSocialite\FilamentSocialitePlugin;
use DutchCodingCompany\FilamentSocialite\Provider;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            // ->registration()
            // ->passwordReset()
            ->emailVerification()
            ->profile()
            ->plugins([
                \DutchCodingCompany\FilamentSocialite\FilamentSocialitePlugin::make()
                ->providers([
                    \DutchCodingCompany\FilamentSocialite\Provider::make('google')
                    ->label('Google')
                    // ->icon('heroicon-m-google')
                    ->color('info')
                    ->outlined(false)
                    ->stateless(false)
                ])
                ->registration(true)
                ->createUserUsing(function (string $provider, \Laravel\Socialite\Contracts\User $oauthUser, \DutchCodingCompany\FilamentSocialite\FilamentSocialitePlugin $plugin) {
                        $existingUser = \App\Models\User::where('email', $oauthUser->getEmail())->first();
                    if ($existingUser) {
                        return $existingUser;
                    }

                Notification::make()
                    ->title('Akses Ditolak')
                    ->body('Email akun Google Anda ' . $oauthUser->getEmail() . ' tidak terdaftar.')
                    ->danger()
                    ->persistent()
                    ->send();
                
                    redirect()->to('/admin/login')->throwResponse();

                    })
            ])
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])

            ->navigationItems([
                NavigationItem::make("Logout")
                ->icon('heroicon-o-arrow-left-start-on-rectangle')
                ->url('/logout')
                ->group('Pengaturan')
                ->sort(999),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
            
    }
}
