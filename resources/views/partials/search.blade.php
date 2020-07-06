<form action="{{ route('products.search') }}" class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" value="{{ request()->q ?? '' }}" placeholder="Search" aria-label="Search" name="q">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
</form>
