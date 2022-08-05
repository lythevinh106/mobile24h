<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Order;
use App\Policies\AdminPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\OrderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\TagPolicy;
use App\Trait\admin\OrderAdminService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Trait\admin\UserService;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    use UserService;
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',

        Admin::class => AdminPolicy::class,
        Category::class => CategoryPolicy::class,
        Tag::class => TagPolicy::class,
        Product::class => ProductPolicy::class,
        Role::class => RolePolicy::class,
        Order::class => OrderPolicy::class,
        // Office::class => OfficePolicy::class,
        // Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->defineAdmin();
        $this->defineCategory();
        $this->defineTag();
        $this->defineProduct();
        $this->defineRole();
        $this->defineOrder();
        $this->defineOther();
        $this->definePermission();
    }

    public function defineAdmin()
    {


        Gate::define("admin-list", [AdminPolicy::class, "viewAny"]);
        Gate::define("admin-add", [AdminPolicy::class, "create"]);
        Gate::define("admin-edit", [AdminPolicy::class, "update"]);
        Gate::define("admin-delete", [AdminPolicy::class, "delete"]);
    }

    public function defineCategory()
    {


        Gate::define("category-list", [CategoryPolicy::class, "viewAny"]);
        Gate::define("category-add", [CategoryPolicy::class, "create"]);
        Gate::define("category-edit", [CategoryPolicy::class, "update"]);
        Gate::define("category-delete", [CategoryPolicy::class, "delete"]);
    }


    public function defineTag()
    {


        Gate::define("tag-list", [TagPolicy::class, "viewAny"]);
        Gate::define("tag-add", [TagPolicy::class, "create"]);
        Gate::define("tag-edit", [TagPolicy::class, "update"]);
        Gate::define("tag-delete", [TagPolicy::class, "delete"]);
    }


    public function defineProduct()
    {


        Gate::define("product-list", [ProductPolicy::class, "viewAny"]);
        Gate::define("product-add", [ProductPolicy::class, "create"]);
        Gate::define("product-edit", [ProductPolicy::class, "update"]);
        Gate::define("product-delete", [ProductPolicy::class, "delete"]);
    }


    public function defineRole()
    {


        Gate::define("role-list", [RolePolicy::class, "viewAny"]);
        Gate::define("role-add", [RolePolicy::class, "create"]);
        Gate::define("role-edit", [RolePolicy::class, "update"]);
        Gate::define("role-delete", [RolePolicy::class, "delete"]);
    }

    public function defineOrder()
    {


        Gate::define("order-list", [OrderPolicy::class, "viewAny"]);
        Gate::define("order-add", [OrderPolicy::class, "create"]);
        Gate::define("order-edit", [OrderPolicy::class, "update"]);
        Gate::define("order-delete", [OrderPolicy::class, "delete"]);
    }


    public function defineOther()
    {
        Gate::define("other", function ($user) {

            return  $this->checkPermissionAccess("other", $user);
        });
    }


    public function definePermission()
    {
        Gate::define("permission", function ($user) {

            return  $this->checkPermissionAccess("permission", $user);
        });
    }
}
