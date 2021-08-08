<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Http\Requests\PackageRequest;

class PackageController extends Controller
{
    public function index()
    {
        return Package::all();
    }
    public function show(Package $package)
    {
       return $package;
    }
    public function store(PackageRequest $request)
    {
        return Package::create($request->validated());
    }
    public function update(PackageRequest $request)
    {
        return Package::create($request->all());
    }
    public function destroy($id)
    {
        Package::destroy($id);
    }
}