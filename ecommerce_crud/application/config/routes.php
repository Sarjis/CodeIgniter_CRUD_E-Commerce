<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['category2'] = 'CategoryController/index';
$route['show/category'] = 'CategoryController/showCategory';
$route['brand2'] = 'BrandController/index';
$route['product2'] = 'ProductController';









$route['default_controller'] = 'welcome';
$route['/'] = 'welcome';

$route['add-to-cart'] = 'CartController/addToCart';
$route['cart/delete/(.+)'] = 'CartController/cartDelete/$1';
$route['cart/show'] = 'CartController/showCart';
$route['cart/update'] = 'CartController/updateCartInfo';
$route['checkout'] = 'CheckoutController/index';
$route['accounts'] = 'Welcome/accounts';
$route['admin'] = 'admin/index';
$route['login'] = 'admin/index';
$route['register'] = 'admin/register';
$route['user/registration'] = 'admin/registration';
$route['admin/login'] = 'admin/loginMethod';
//$route['admin/login'] = 'admin/index';
$route['4236a440a662cc8253d7536e5aa17942'] = 'SuperAdmin/logout';

$route['dashboard'] = 'SuperAdmin/index';
//$route['logout'] = 'SuperAdmin/index';
//category
$route['category/add'] = 'CategoryController/addCategory';
$route['category/manage'] = 'CategoryController/manageCategory';
$route['category/publish/(.+)'] = 'CategoryController/publishCategory/$1';
$route['category/un-publish/(.+)'] = 'CategoryController/unPublishCategory/$1';
$route['category/edit/(.+)'] = 'CategoryController/editCategory/$1';
$route['category/delete/(.+)'] = 'CategoryController/deleteCategory/$1';
$route['category/update'] = 'CategoryController/updateCategoryInfo';
$route['category/save'] = 'CategoryController/saveCategory';
$route['category'] = 'CategoryController/blade2';
//category
//brand
$route['brand/add'] = 'BrandController/addBrand';
$route['brand/save'] = 'BrandController/saveBrand';
$route['brand/manage'] = 'BrandController/manageBrand';
$route['brand/publish/(.+)'] = 'BrandController/publishBrand/$1';
$route['brand/un-publish/(.+)'] = 'BrandController/unPublishBrand/$1';
$route['brand/edit/(.+)'] = 'BrandController/editBrand/$1';
$route['brand/delete/(.+)'] = 'BrandController/deleteBrand/$1';
$route['brand/update'] = 'BrandController/updateBrandInfo';
//brand
////product
$route['product/add'] = 'ProductController/addProduct';
$route['product/save'] = 'ProductController/saveProduct';
$route['product/manage'] = 'ProductController/manageProduct';
$route['product/publish/(.+)'] = 'ProductController/publishProduct/$1';
$route['product/un-publish/(.+)'] = 'ProductController/unPublishProduct/$1';
$route['product/edit/(.+)'] = 'ProductController/editProduct/$1';
$route['product/delete/(.+)'] = 'ProductController/deleteProduct/$1';
$route['product/update'] = 'ProductController/updateProductInfo';
$route['product/details/(.+)'] = 'Welcome/productDetails/$1';
//Product


$route['404_override'] = 'welcome/notFoundPage';
$route['translate_uri_dashes'] = FALSE;
