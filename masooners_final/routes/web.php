<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');
Auth::routes();
Route::post('ajax-request', 'userfrontend\ajaxcontroller@pro_subcategory')->name('ajaxRequest');
Route::get('getideas', 'userfrontend\findindex@index')->name('getideas.open');
Route::get('findprofessional', 'userfrontend\findindex@findprofessional')->name('findprofessional.open');
Route::get('/professionals/{id}', 'userfrontend\findindex@professionals')->name('professionals.open');
Route::get('/profile/{id}', 'userfrontend\findindex@profile')->name('profile.open');
Route::get('/', 'userfrontend\findindex@landingpage')->name('landingpage.open');
Route::get('/form', 'userfrontend\findindex@form')->name('form.open');
Route::get('/shopping', 'userfrontend\findindex@shopping')->name('shopping.open');

Route::post('stepform', 'userfrontend\findindex@inquiry')->name('inquiry.open');

// Customer Login
// Route::delete('customer-logins/destroy', 'userfrontend\CustomerLoginController@massDestroy')->name('customer-logins.massDestroy');
// Route::resource('customer-logins', 'userfrontend\CustomerLoginController');
Route::post('customer-logins-store', 'userfrontend\CustomerLogIn@store')->name('store.customer');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    //query
    Route::get('/query', 'query@index')->name('query.open');

    // suggesttion
    // Route::get('suggesttion/showtest/{suggesttion}', 'SuggestionController@showTest')->name('suggesttion.showTest');
    Route::resource('suggesttion', 'SuggestionController');

    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Product Styles
    Route::delete('product-styles/destroy', 'ProductStylesController@massDestroy')->name('product-styles.massDestroy');
    Route::resource('product-styles', 'ProductStylesController');

    // Awards
    Route::delete('awards/destroy', 'AwardsController@massDestroy')->name('awards.massDestroy');
    Route::post('awards/media', 'AwardsController@storeMedia')->name('awards.storeMedia');
    Route::post('awards/ckmedia', 'AwardsController@storeCKEditorImages')->name('awards.storeCKEditorImages');
    Route::resource('awards', 'AwardsController');

    // Professional Details
    Route::delete('professional-details/destroy', 'ProfessionalDetailsController@massDestroy')->name('professional-details.massDestroy');
    Route::resource('professional-details', 'ProfessionalDetailsController');

    // Professional Profile
    Route::delete('professional-profiles/destroy', 'ProfessionalProfileController@massDestroy')->name('professional-profiles.massDestroy');
    Route::post('professional-profiles/media', 'ProfessionalProfileController@storeMedia')->name('professional-profiles.storeMedia');
    Route::post('professional-profiles/ckmedia', 'ProfessionalProfileController@storeCKEditorImages')->name('professional-profiles.storeCKEditorImages');
    Route::resource('professional-profiles', 'ProfessionalProfileController');

    // Portfolio
    Route::delete('portfolios/destroy', 'PortfolioController@massDestroy')->name('portfolios.massDestroy');
    Route::post('portfolios/media', 'PortfolioController@storeMedia')->name('portfolios.storeMedia');
    Route::post('portfolios/ckmedia', 'PortfolioController@storeCKEditorImages')->name('portfolios.storeCKEditorImages');
    Route::resource('portfolios', 'PortfolioController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Product Sub Category
    Route::delete('product-sub-categories/destroy', 'ProductSubCategoryController@massDestroy')->name('product-sub-categories.massDestroy');
    Route::resource('product-sub-categories', 'ProductSubCategoryController');

    // Pro Sub Category
    Route::delete('pro-sub-categories/destroy', 'ProSubCategoryController@massDestroy')->name('pro-sub-categories.massDestroy');
    Route::post('pro-sub-categories/media', 'ProSubCategoryController@storeMedia')->name('pro-sub-categories.storeMedia');
    Route::post('pro-sub-categories/ckmedia', 'ProSubCategoryController@storeCKEditorImages')->name('pro-sub-categories.storeCKEditorImages');
    Route::resource('pro-sub-categories', 'ProSubCategoryController');

    // Blog Category
    Route::delete('blog-categories/destroy', 'BlogCategoryController@massDestroy')->name('blog-categories.massDestroy');
    Route::resource('blog-categories', 'BlogCategoryController');

    // Create Blog
    Route::delete('create-blogs/destroy', 'CreateBlogController@massDestroy')->name('create-blogs.massDestroy');
    Route::post('create-blogs/media', 'CreateBlogController@storeMedia')->name('create-blogs.storeMedia');
    Route::post('create-blogs/ckmedia', 'CreateBlogController@storeCKEditorImages')->name('create-blogs.storeCKEditorImages');
    Route::resource('create-blogs', 'CreateBlogController');

    // Comments
    Route::delete('comments/destroy', 'CommentsController@massDestroy')->name('comments.massDestroy');
    Route::resource('comments', 'CommentsController');

    // Profile Comment
    Route::delete('profile-comments/destroy', 'ProfileCommentController@massDestroy')->name('profile-comments.massDestroy');
    Route::resource('profile-comments', 'ProfileCommentController');

    // Product Comments
    Route::delete('product-comments/destroy', 'ProductCommentsController@massDestroy')->name('product-comments.massDestroy');
    Route::resource('product-comments', 'ProductCommentsController');

    // Cart
    Route::delete('carts/destroy', 'CartController@massDestroy')->name('carts.massDestroy');
    Route::resource('carts', 'CartController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Order Products
    Route::delete('order-products/destroy', 'OrderProductsController@massDestroy')->name('order-products.massDestroy');
    Route::resource('order-products', 'OrderProductsController');

    // Wishlist
    Route::delete('wishlists/destroy', 'WishlistController@massDestroy')->name('wishlists.massDestroy');
    Route::resource('wishlists', 'WishlistController');

    // Customer Login
    Route::delete('customer-logins/destroy', 'CustomerLoginController@massDestroy')->name('customer-logins.massDestroy');
    Route::resource('customer-logins', 'CustomerLoginController');

    // Profile
    Route::delete('profiles/destroy', 'ProfileController@massDestroy')->name('profiles.massDestroy');
    Route::post('profiles/media', 'ProfileController@storeMedia')->name('profiles.storeMedia');
    Route::post('profiles/ckmedia', 'ProfileController@storeCKEditorImages')->name('profiles.storeCKEditorImages');
    Route::resource('profiles', 'ProfileController');

    // Customer Contact
    Route::delete('customer-contacts/destroy', 'CustomerContactController@massDestroy')->name('customer-contacts.massDestroy');
    Route::resource('customer-contacts', 'CustomerContactController');

    // Messages
    Route::delete('messages/destroy', 'MessagesController@massDestroy')->name('messages.massDestroy');
    Route::resource('messages', 'MessagesController');

    // Idea Category
    Route::delete('idea-categories/destroy', 'IdeaCategoryController@massDestroy')->name('idea-categories.massDestroy');
    Route::post('idea-categories/media', 'IdeaCategoryController@storeMedia')->name('idea-categories.storeMedia');
    Route::post('idea-categories/ckmedia', 'IdeaCategoryController@storeCKEditorImages')->name('idea-categories.storeCKEditorImages');
    Route::resource('idea-categories', 'IdeaCategoryController');

    // Idea Style
    Route::delete('idea-styles/destroy', 'IdeaStyleController@massDestroy')->name('idea-styles.massDestroy');
    Route::resource('idea-styles', 'IdeaStyleController');

    // Ideas
    Route::delete('ideas/destroy', 'IdeasController@massDestroy')->name('ideas.massDestroy');
    Route::post('ideas/media', 'IdeasController@storeMedia')->name('ideas.storeMedia');
    Route::post('ideas/ckmedia', 'IdeasController@storeCKEditorImages')->name('ideas.storeCKEditorImages');
    Route::resource('ideas', 'IdeasController');


    // Order
    // Route::delete('User-Query/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    // Route::resource('orders', 'OrderController');


    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Product Styles
    Route::delete('product-styles/destroy', 'ProductStylesController@massDestroy')->name('product-styles.massDestroy');
    Route::resource('product-styles', 'ProductStylesController');

    // Awards
    Route::delete('awards/destroy', 'AwardsController@massDestroy')->name('awards.massDestroy');
    Route::post('awards/media', 'AwardsController@storeMedia')->name('awards.storeMedia');
    Route::post('awards/ckmedia', 'AwardsController@storeCKEditorImages')->name('awards.storeCKEditorImages');
    Route::resource('awards', 'AwardsController');

    // Professional Details
    Route::delete('professional-details/destroy', 'ProfessionalDetailsController@massDestroy')->name('professional-details.massDestroy');
    Route::resource('professional-details', 'ProfessionalDetailsController');

    // Professional Profile
    Route::delete('professional-profiles/destroy', 'ProfessionalProfileController@massDestroy')->name('professional-profiles.massDestroy');
    Route::post('professional-profiles/media', 'ProfessionalProfileController@storeMedia')->name('professional-profiles.storeMedia');
    Route::post('professional-profiles/ckmedia', 'ProfessionalProfileController@storeCKEditorImages')->name('professional-profiles.storeCKEditorImages');
    Route::resource('professional-profiles', 'ProfessionalProfileController');

    // Portfolio
    Route::delete('portfolios/destroy', 'PortfolioController@massDestroy')->name('portfolios.massDestroy');
    Route::post('portfolios/media', 'PortfolioController@storeMedia')->name('portfolios.storeMedia');
    Route::post('portfolios/ckmedia', 'PortfolioController@storeCKEditorImages')->name('portfolios.storeCKEditorImages');
    Route::resource('portfolios', 'PortfolioController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Product Sub Category
    Route::delete('product-sub-categories/destroy', 'ProductSubCategoryController@massDestroy')->name('product-sub-categories.massDestroy');
    Route::resource('product-sub-categories', 'ProductSubCategoryController');

    // Pro Sub Category
    Route::delete('pro-sub-categories/destroy', 'ProSubCategoryController@massDestroy')->name('pro-sub-categories.massDestroy');
    Route::post('pro-sub-categories/media', 'ProSubCategoryController@storeMedia')->name('pro-sub-categories.storeMedia');
    Route::post('pro-sub-categories/ckmedia', 'ProSubCategoryController@storeCKEditorImages')->name('pro-sub-categories.storeCKEditorImages');
    Route::resource('pro-sub-categories', 'ProSubCategoryController');

    // Blog Category
    Route::delete('blog-categories/destroy', 'BlogCategoryController@massDestroy')->name('blog-categories.massDestroy');
    Route::resource('blog-categories', 'BlogCategoryController');

    // Create Blog
    Route::delete('create-blogs/destroy', 'CreateBlogController@massDestroy')->name('create-blogs.massDestroy');
    Route::post('create-blogs/media', 'CreateBlogController@storeMedia')->name('create-blogs.storeMedia');
    Route::post('create-blogs/ckmedia', 'CreateBlogController@storeCKEditorImages')->name('create-blogs.storeCKEditorImages');
    Route::resource('create-blogs', 'CreateBlogController');

    // Comments
    Route::delete('comments/destroy', 'CommentsController@massDestroy')->name('comments.massDestroy');
    Route::resource('comments', 'CommentsController');

    // Profile Comment
    Route::delete('profile-comments/destroy', 'ProfileCommentController@massDestroy')->name('profile-comments.massDestroy');
    Route::resource('profile-comments', 'ProfileCommentController');

    // Product Comments
    Route::delete('product-comments/destroy', 'ProductCommentsController@massDestroy')->name('product-comments.massDestroy');
    Route::resource('product-comments', 'ProductCommentsController');

    // Cart
    Route::delete('carts/destroy', 'CartController@massDestroy')->name('carts.massDestroy');
    Route::resource('carts', 'CartController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Order Products
    Route::delete('order-products/destroy', 'OrderProductsController@massDestroy')->name('order-products.massDestroy');
    Route::resource('order-products', 'OrderProductsController');

    // Wishlist
    Route::delete('wishlists/destroy', 'WishlistController@massDestroy')->name('wishlists.massDestroy');
    Route::resource('wishlists', 'WishlistController');

    // Customer Login
    Route::delete('customer-logins/destroy', 'CustomerLoginController@massDestroy')->name('customer-logins.massDestroy');
    Route::resource('customer-logins', 'CustomerLoginController');

    // Profile
    Route::delete('profiles/destroy', 'ProfileController@massDestroy')->name('profiles.massDestroy');
    Route::post('profiles/media', 'ProfileController@storeMedia')->name('profiles.storeMedia');
    Route::post('profiles/ckmedia', 'ProfileController@storeCKEditorImages')->name('profiles.storeCKEditorImages');
    Route::resource('profiles', 'ProfileController');

    // Customer Contact
    Route::delete('customer-contacts/destroy', 'CustomerContactController@massDestroy')->name('customer-contacts.massDestroy');
    Route::resource('customer-contacts', 'CustomerContactController');

    // Messages
    Route::delete('messages/destroy', 'MessagesController@massDestroy')->name('messages.massDestroy');
    Route::resource('messages', 'MessagesController');

    // Idea Category
    Route::delete('idea-categories/destroy', 'IdeaCategoryController@massDestroy')->name('idea-categories.massDestroy');
    Route::post('idea-categories/media', 'IdeaCategoryController@storeMedia')->name('idea-categories.storeMedia');
    Route::post('idea-categories/ckmedia', 'IdeaCategoryController@storeCKEditorImages')->name('idea-categories.storeCKEditorImages');
    Route::resource('idea-categories', 'IdeaCategoryController');

    // Idea Style
    Route::delete('idea-styles/destroy', 'IdeaStyleController@massDestroy')->name('idea-styles.massDestroy');
    Route::resource('idea-styles', 'IdeaStyleController');

    // Ideas
    Route::delete('ideas/destroy', 'IdeasController@massDestroy')->name('ideas.massDestroy');
    Route::post('ideas/media', 'IdeasController@storeMedia')->name('ideas.storeMedia');
    Route::post('ideas/ckmedia', 'IdeasController@storeCKEditorImages')->name('ideas.storeCKEditorImages');
    Route::resource('ideas', 'IdeasController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');




});
