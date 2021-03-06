@extends('layouts.app') @section('content')

<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        <a style="outline:10px" href="{{ '/categories'}}" class="btn btn-danger">
          All my categories</a>
          <a style="outline:10px" href="{{ '/clients'}}" class="btn btn-danger">
            All my clients</a>
            <a style="outline:10px" href="{{ '/shipments'}}" class="btn btn-danger">
           All my shipments</a>
      </div>
    </div>
  </div>
</div>
@endsection