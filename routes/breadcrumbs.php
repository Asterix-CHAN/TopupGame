<?php

use App\Models\Category;
use App\Models\Gallery;
use App\Models\TopupgamePackage;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});
// End Dashboard

// Produk
Breadcrumbs::for('topup-package.index', function (BreadcrumbTrail $trail) {
    $trail->push('Produk', route('topup-package.index'));
});

Breadcrumbs::for('topup-package.edit', function (BreadcrumbTrail $trail, TopupgamePackage $item): void{
    $trail->parent('topup-package.index');
    $trail->push($item->name, route('topup-package.edit', $item));
});
// End Produk

// Category
Breadcrumbs::for('category.index', function (BreadcrumbTrail $trail){
    $trail->push('Category', route('category.index'));
});

Breadcrumbs::for('category.edit', function (BreadcrumbTrail $trail, Category $datas): void{
    $trail->parent('category.index');
    $trail->push($datas->name, route('category.edit', $datas));
});
// End Category

// Gallery
Breadcrumbs::for('gallery.index', function (BreadcrumbTrail $trail){
    $trail->push('Gallery', route('gallery.index'));
});

Breadcrumbs::for('gallery.edit', function (BreadcrumbTrail $trail, Gallery $galeri): void{
    $trail->parent('gallery.index');
    $trail->push($galeri->topupgame_packages_id, route('gallery.edit', $galeri));
});
// End Gallery