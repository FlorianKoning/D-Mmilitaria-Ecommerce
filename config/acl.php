<?php 
return [
    /*
    |--------------------------------------------------------------------------
    | ACL Permissions
    |--------------------------------------------------------------------------
    |
    | Here you will define which role has access to which controller.
    | You will also need to specify which function(s) in the controller
    | the role has access to.
    |
    | To give access to a role, you will need to add the (new?) role to the array.
    | Behind the controller's name, you can specify which functions the
    | role can use by putting the function names in an array.
    | 
    |
    | If you want the role to have access to all the functions
    | without typing all the names, just add a "*" in the array.
    | 
    | There is also the "global" option. Here you should put all
    | the controllers and functions that every role has access to.
    */
    "permissions" => [
        "roles" => [
            "super_user" => [
                "CmsDashboardController" => ["*"],
                "CmsProductsController" => ["*"],
                "CmsUserController" => ["*"],
                "CmsCatagoriesController" => ["*"],
                "AjaxController" => ["*"],
                "CmsExtraImagesController" => ["*"],
                "CmsExtraFeaturesController" => ["*"],
                "CmsOrderController" => ["*"],
                "CmsOrderStatusesController" => ["*"],
                "CmsInvoiceController" => ["*"]
            ],
            "administator" => [
                "CmsDashboardController" => ["*"],
                "AjaxController" => ["*"],
                "CmsProductsController" => ["index"],
                "CmsUserController" => ["index"],
                "CmsCatagoriesController" => ["index"]
            ],
            "user" => []
        ],
        "global" => [
            "ContactController" => ["*"],
            "CartController" => ["*"],
            "HomeController" => ["*"],
            "Controller" => ["*"],
            "ProductController" => ["*"],
            "ProfileController" => ["*"],
            "PaymentController" => ["*"],
            "CheckoutController" => ["*"],
            "AjaxController" => ["paymentId"],
            "DownloadController" => ['*']
        ]
    ]
    
];