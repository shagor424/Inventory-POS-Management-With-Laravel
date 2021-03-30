<?php   

use Illuminate\Support\Facades\Route;

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function(){ 
	Route::get('dashboard','AdminController@index')->name('admin.dashboard');

});

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
	Route::get('dashboard','UserController@index')->name('user.dashboard');

});

//========Item Catagory============
Route::group(['middleware'=>'auth'],function(){
Route::get('admin/contacts', 'backend\ItemCatagoryController@getIndex')->name('item.index');
Route::get('admin/contacts/data', 'backend\ItemCatagoryController@getData');
Route::post('admin/contacts/store', 'backend\ItemCatagoryController@postStore');
Route::post('admin/contacts/update', 'backend\ItemCatagoryController@postUpdate');
Route::post('admin/contacts/delete', 'backend\ItemCatagoryController@postDelete');

//========Users============

	Route::prefix('users')->group(function(){
	Route::get('/view','backend\UserController@view')->name('users.view');
	Route::get('/add','backend\UserController@add')->name('users.add');
	Route::post('/store','backend\UserController@store')->name('users.store');
	Route::get('/edit/{id}','backend\UserController@edit')->name('users.edit');
	Route::post('/update/{id}','backend\UserController@update')->name('users.update');
	Route::get('/delete/{id}','backend\UserController@delete')->name('users.delete');

});

	Route::prefix('profiles')->group(function(){
	Route::get('/view','backend\ProfileController@view')->name('profiles.view');
	Route::get('/edit','backend\ProfileController@edit')->name('profiles.edit');
	Route::post('/store','backend\ProfileController@update')->name('profiles.update');
	Route::get('/password/view','backend\ProfileController@passwordview')->name('profiles.password.view');
	Route::post('/password/update','backend\ProfileController@passwordupdate')->name('profiles.password.update');
});

	//========Suppliers============

	Route::prefix('suppliers')->group(function(){
	Route::get('/view','backend\SupplierController@view')->name('suppliers.view');
	Route::get('/add','backend\SupplierController@add')->name('suppliers.add');
	Route::post('/store','backend\SupplierController@store')->name('suppliers.store');
	Route::get('/edit/{id}','backend\SupplierController@edit')->name('suppliers.edit');
	Route::post('/update/{id}','backend\SupplierController@update')->name('suppliers.update');
	Route::get('/delete/{id}','backend\SupplierController@delete')->name('suppliers.delete');

});

		//========Customers============

	Route::prefix('customers')->group(function(){
	Route::get('/view','backend\CustomerController@view')->name('customers.view');
	Route::get('/add','backend\CustomerController@add')->name('customers.add');
	Route::post('/store','backend\CustomerController@store')->name('customers.store');
	Route::get('/edit/{id}','backend\CustomerController@edit')->name('customers.edit');
	Route::post('/update/{id}','backend\CustomerController@update')->name('customers.update');
	Route::get('/delete/{id}','backend\CustomerController@delete')->name('customers.delete');
	//========Customer Credit Or due============
	Route::get('/credit/customer','backend\CustomerController@creditcustomer')->name('customers.credit');
	Route::get('/credit/customer/pdf','backend\CustomerController@creditcustomerpdf')->name('customers.credit-pdf');
	Route::get('/invoice/customer/edit/{invoice_id}','backend\CustomerController@invoicecustomeredit')->name('customers.invoice-edit');
	Route::post('/invoice/customer/update/{invoice_id}','backend\CustomerController@invoicecustomerupdate')->name('customers.invoice-update');
	Route::get('/invoice/customer/details-pdf/{invoice_id}','backend\CustomerController@invoicecustomerdetailspdf')->name('customers.invoice-details-pdf');

	//========PAID Customer ============
	Route::get('/paid/customer','backend\CustomerController@paidcustomer')->name('customers.paid');
	Route::get('/paid/customer/pdf','backend\CustomerController@paidcustomerpdf')->name('customers.paid-pdf');
	Route::get('/invoice/paid/customer/details-pdf/{invoice_id}','backend\CustomerController@invoicecPaidustomerdetailspdf')->name('customers.paid-invoice-details-pdf');

	Route::get('/customer/wise/report','backend\CustomerController@customerwisereport')->name('customers.wise-report');
	Route::get('/customer/wise/product/report','backend\CustomerController@customerwiseProductreport')->name('customers.wise-product-report');
	Route::get('/customer/wise/credit/report','backend\CustomerController@customerwisecreditreport')->name('customers.wise-credit-report');
	Route::get('/customer/wise/paid/report','backend\CustomerController@customerwisepaidreport')->name('customers.wise-paid-report');



});

		//========Units============

	Route::prefix('unitss')->group(function(){
	Route::get('/view','backend\UnitController@view')->name('unitss.view');
	Route::get('/add','backend\UnitController@add')->name('unitss.add');
	Route::post('/store','backend\UnitController@store')->name('unitss.store');
	Route::get('/edit/{id}','backend\UnitController@edit')->name('unitss.edit');
	Route::post('/update/{id}','backend\UnitController@update')->name('unitss.update');
	Route::get('/delete/{id}','backend\UnitController@delete')->name('unitss.delete');

});
//========Unit ajax============
	Route::prefix('units')->group(function(){
Route::get('/units', 'backend\UnitController@getIndex')->name('units.view');
Route::get('/units/data', 'backend\UnitController@getData')->name('units.getdata');
Route::post('/units/store', 'backend\UnitController@postStore')->name('units.store');
Route::get('/units/edit/{id}', 'backend\UnitController@postedit')->name('units.edit');
Route::post('/units/update/{id}', 'backend\UnitController@postUpdate')->name('units.update');
Route::get('/units/delete/{id}', 'backend\UnitController@postDelete')->name('units.delete');



	//========Category ajax============
	
Route::get('/categories', 'backend\CategoryController@getIndex')->name('categories.view');
Route::get('/categories/data', 'backend\CategoryController@getData')->name('categories.getdata');
Route::post('/categories/store', 'backend\CategoryController@postStore')->name('categories.store');
Route::get('/categories/edit/{id}', 'backend\CategoryController@postedit')->name('categories.edit');
Route::post('/categories/update/{id}', 'backend\CategoryController@postUpdate')->name('categories.update');
Route::get('/categories/delete/{id}', 'backend\CategoryController@postDelete')->name('categories.delete');



	//========SubCategory ajax============
	
Route::get('/subcategories', 'backend\SubCategoryController@getIndex')->name('subcategories.view');
Route::get('/subcategories/data', 'backend\SubCategoryController@getData')->name('subcategories.getdata');
Route::post('/subcategories/store', 'backend\SubCategoryController@postStore')->name('subcategories.store');
Route::get('/subcategories/edit/{id}', 'backend\SubCategoryController@postedit')->name('subcategories.edit');
Route::post('/subcategories/update/{id}', 'backend\SubCategoryController@postUpdate')->name('subcategories.update');
Route::get('/subcategories/delete/{id}', 'backend\SubCategoryController@postDelete')->name('subcategories.delete');



	//========Brand ajax============
	
Route::get('/brands', 'backend\BrandController@getIndex')->name('brands.view');
Route::get('/brands/data', 'backend\BrandController@getData')->name('brands.getdata');
Route::post('/brands/store', 'backend\BrandController@postStore')->name('brands.store');
Route::get('/brands/edit/{id}', 'backend\BrandController@postedit')->name('brands.edit');
Route::post('/brands/update/{id}', 'backend\BrandController@postUpdate')->name('brands.update');
Route::get('/brands/delete/{id}', 'backend\BrandController@postDelete')->name('brands.delete');



	//========SubSubCategory ajax============
	
Route::get('/subsubcategories', 'backend\SubSubCategoryController@getIndex')->name('subsubcategories.view');
Route::get('/subsubcategories/data', 'backend\SubSubCategoryController@getData')->name('subsubcategories.getdata');
Route::post('/subsubcategories/store', 'backend\SubSubCategoryController@postStore')->name('subsubcategories.store');
Route::get('/subsubcategories/edit/{id}', 'backend\SubSubCategoryController@postedit')->name('subsubcategories.edit');
Route::post('/subsubcategories/update/{id}', 'backend\SubSubCategoryController@postUpdate')->name('subsubcategories.update');
Route::get('/subsubcategories/delete/{id}', 'backend\SubSubCategoryController@postDelete')->name('subsubcategories.delete');

});

	//===============Product============
Route::prefix('products')->group(function(){
Route::get('/product/view-product', 'backend\ProductController@view')->name('products.view-product');
Route::get('/product/add-product', 'backend\ProductController@add')->name('products.add-product');
Route::post('/product/store-product', 'backend\ProductController@store')->name('products.store-product');
Route::get('/product/edit{id}', 'backend\ProductController@edit')->name('products.edit-product');
Route::post('/product/update{id}', 'backend\ProductController@update')->name('products.update-product');
Route::get('/product/allview{id}', 'backend\ProductController@allview')->name('products.allview-product');
Route::get('/product/inactive{id}', 'backend\ProductController@inactive')->name('products.inactive-product');
Route::get('/product/active{id}', 'backend\ProductController@active')->name('products.active-product');
Route::get('/product/delete{id}', 'backend\ProductController@delete')->name('products.delete-product');
Route::get('/product/status/{id}/{status}', 'backend\ProductController@productstatus')->name('products.productstatus');

});

//===============Purchase============
Route::prefix('purchases')->group(function(){
Route::get('/purchase/view', 'backend\PurchaseController@view')->name('purchases.view');
Route::get('/purchase/add', 'backend\PurchaseController@add')->name('purchases.add');
Route::post('/purchase/store', 'backend\PurchaseController@store')->name('purchases.store');
Route::get('/purchase/pending-list', 'backend\PurchaseController@pendinglist')->name('purchases.pending-list');
Route::get('/purchase/allview{id}', 'backend\PurchaseController@allview')->name('purchases.allview');
Route::get('/purchase/inactive{id}', 'backend\PurchaseController@inactive')->name('purchases.inactive');
Route::get('/purchase/active{id}', 'backend\PurchaseController@active')->name('purchases.active');
Route::get('/purchase/delete{id}', 'backend\PurchaseController@delete')->name('purchases.delete');
Route::get('/purchase/approve{id}', 'backend\PurchaseController@approve')->name('purchases.approve');
Route::get('daily/purchase/view', 'backend\PurchaseController@dailyview')->name('purchases.daily-report-view');
Route::get('daily/purchase/report', 'backend\PurchaseController@dailyreportpdf')->name('purchases.daily-report-pdf');


});

//===============Invoice============
Route::prefix('invoices')->group(function(){
Route::get('/invoice/view', 'backend\InvoiceController@view')->name('invoices.view');
Route::get('/invoice/add', 'backend\InvoiceController@add')->name('invoices.add');
Route::post('/invoice/store', 'backend\InvoiceController@store')->name('invoices.store');
Route::get('/invoice/pending-list', 'backend\InvoiceController@pendinglist')->name('invoices.pending-list');
Route::get('/invoice/allview{id}', 'backend\InvoiceController@allview')->name('invoices.allview');
Route::get('/invoice/inactive{id}', 'backend\InvoiceController@inactive')->name('invoices.inactive');
Route::get('/invoice/active{id}', 'backend\InvoiceController@active')->name('invoices.active');
Route::get('/invoice/delete{id}', 'backend\InvoiceController@delete')->name('invoices.delete');
Route::get('/invoice/approve{id}', 'backend\InvoiceController@approve')->name('invoices.approve');
Route::post('/invoice/approve-store{id}', 'backend\InvoiceController@approvestore')->name('invoices.approve-store');

Route::get('/invoice/customer{id}', 'backend\InvoiceController@customerinvoice')->name('invoices.customer-invoice-pdf');
Route::get('daily/invoice/view', 'backend\InvoiceController@dailyview')->name('invoices.daily-report-view');
Route::get('daily/invoice/report', 'backend\InvoiceController@dailyreportpdf')->name('invoices.daily-report-pdf');
Route::get('/invoice/daily/report', 'backend\InvoiceController@dailyreport')->name('invoices.daily-report');


});
	//========Stock============
Route::prefix('stocks')->group(function(){
Route::get('/stock/view', 'backend\StockController@stockview')->name('stocks.view');
Route::get('/stock/repport-pdf', 'backend\StockController@stockpdf')->name('stocks.stock-report-pdf');
Route::get('/stock/supplier-view', 'backend\StockController@supplierstockview')->name('stocks.supplier-stock-view');
Route::get('/stock/supplier/repport-pdf', 'backend\StockController@supplierstockpdf')->name('stocks.supplier-stock-report-pdf');
Route::get('/stock/product/repport-pdf', 'backend\StockController@productstockpdf')->name('stocks.product-stock-report-pdf');

});	//========Student============

	Route::prefix('students')->group(function(){
	Route::get('/view','backend\StudentController@view')->name('students.view');
	Route::get('/add','backend\StudentController@add')->name('students.add');
	Route::post('/store','backend\StudentController@store')->name('students.store');
	
});

	//========Order Item============
Route::prefix('items')->group(function(){
Route::get('/contacts', 'backend\OrderCatagoryController@getIndex')->name('items.view');
Route::get('/contacts/data', 'backend\OrderCatagoryController@getData')->name('items.getdata');
Route::post('/contacts/store', 'backend\OrderCatagoryController@postStore')->name('items.store');
Route::get('/contacts/edit/{id}', 'backend\OrderCatagoryController@postedit')->name('items.edit');
Route::post('/contacts/update/{id}', 'backend\OrderCatagoryController@postUpdate')->name('items.update');
Route::get('/contacts/delete/{id}', 'backend\OrderCatagoryController@postDelete')->name('items.delete');

//========Item 2============

Route::get('admin/contacts', 'backend\ItemCatagoryController@getIndex')->name('items.index');
Route::get('admin/contacts/data', 'backend\ItemCatagoryController@getData');
Route::post('admin/contacts/store', 'backend\ItemCatagoryController@postStore');
Route::post('admin/contacts/update', 'backend\ItemCatagoryController@postUpdate');
Route::post('admin/contacts/delete', 'backend\ItemCatagoryController@postDelete');


//========Default Controller Dropdown Dynamic ============
Route::get('/get-category', 'backend\DefaultController@getcategory')->name('get-category');
Route::get('/get-subcategory', 'backend\DefaultController@subgetcategory')->name('get-subcategory');
Route::get('/get-subsubcategory', 'backend\DefaultController@subsubgetcategory')->name('get-subsubcategory');
Route::get('/get-brand', 'backend\DefaultController@getbrand')->name('get-brand');
Route::get('/get-productname', 'backend\DefaultController@getproductname')->name('get-productname');
Route::get('/get-unit', 'backend\DefaultController@getunit')->name('get-unit');
Route::get('/get-unit', 'backend\DefaultController@getunit')->name('get-unit');
Route::get('/get-model', 'backend\DefaultController@getmodel')->name('get-model');
Route::get('/get-size', 'backend\DefaultController@getsize')->name('get-size');
Route::get('/get-color', 'backend\DefaultController@getcolor')->name('get-color');
Route::get('/get-product-code', 'backend\DefaultController@getproductcode')->name('get-product-code');
Route::get('/get-stock', 'backend\DefaultController@getstock')->name('get-stock');
Route::get('/get-warranty-time', 'backend\DefaultController@getwarrantytime')->name('get-warranty-time');

Route::get('/get-product-name', 'backend\DefaultController@getproduct')->name('get-product');

});

});