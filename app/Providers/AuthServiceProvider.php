<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Carbon\Carbon;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Buyer::class => BuyerPolicy::class,
        Seller::class => SellerPolicy::class,
        User::class => UserPolicy::class,
        Transaction::class => TransactionPolicy::class,
        Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        // Passport::tokensExpireIn(Carbon::now()->addDays(15));
        // Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        Passport::enableImplicitGrant();

        Passport::tokensCan([
            'purchase-product' => 'Create a new transaction for a specipic product',
            'manage-product' => 'Create, read, update, and delete product (CRUD)',
            'manage-account' => 'Read your account data, id, name, email, if verified, and if admin (cannot read password). Modify your account data(email and password). Cannot delete your account',
            'read-general' => 'Read general information like purchasing categories, purchased products, selling products, selling categories, your transactions (purchases and sales)',
        ]);
    }
}
