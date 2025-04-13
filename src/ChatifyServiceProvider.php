<?php
namespace Chatify;

use Chatify\Console\PublishCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;

class ChatifyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('chatify')
            ->hasRoutes([
                'api',
                'web'
            ])
            ->hasAssets()
            ->hasTranslations()
            // ->hasInstallCommand(InstallCommand::class)
            // ->hasCommand(PublishCommand::class)
            ->hasViews('Chatify')
            ->hasConfigFile('chatify')
            ->hasMigrations([
                'create_chatify_channels_table',
                'create_chatify_favorites_table',
                'create_chatify_messages_table',
                'add_active_status_to_users',
                'create_chatify_channel_user_table',
                'add_channel_id_to_users',
                'add_avatar_to_users',
                'add_dark_mode_to_users',
                'add_messenger_color_to_users',
            ])
            ->publishesServiceProvider('SocialiteUserRelationsProvider')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishAssets()
                    ->publishConfigFile()
                    ->publishMigrations();
                //->copyAndRegisterServiceProviderInApp();
            });
    }

    public function packageBooted(): void
    {
        //$mediaClass = config('media-library.media_model', Media::class);

        //$mediaClass::observe(new MediaObserver);
    }

    public function packageRegistered(): void
    {
        app()->bind('ChatifyMessenger', fn() => new \Chatify\ChatifyMessenger);
    }
}
