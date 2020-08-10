<div class="card">
    <div class="card-header">
        <h4 class="text-center">{{ Auth::user()->name }}</h4>
    </div>
    <img src="{{ Auth::user()->image}}" class="card-img rounded-circle w-50" alt="{{ Auth::user()->name }}">
    <h5>{{ Auth::user()->email }}</h5>
    <p>Role: {{ Auth::user()->role }} </p>
    <a href="/update/{{{ Auth::user()->provider_id }}}" class="btn btn-primary btn-block mt-3">Update Account</a>
</div>
