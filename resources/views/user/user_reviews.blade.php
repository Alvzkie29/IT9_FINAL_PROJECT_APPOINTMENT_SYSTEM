@extends('layouts.nav')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">User Reviews</h2>
        <a href="{{ route('user-reviews.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i> Add Your Review
        </a>
    </div>

    <div class="row">
    @forelse ($userReviews as $review)
        <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-sm border-0 rounded-4 h-100 w-100">
                <div class="card-body d-flex flex-column p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="mb-1 fw-semibold">{{ $review->user->firstname }} {{ $review->user->lastname }}</h5>
                            <small class="text-muted">Posted on {{ $review->created_at->format('F j, Y') }}</small>
                        </div>
                        <div class="d-flex align-items-center gap-1 text-warning fs-5">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <p class="mb-0 text-secondary flex-grow-1">{{ $review->review }}</p>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">No reviews yet. Be the first to leave one!</div>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $userReviews->links() }}
</div>
</div>
@endsection
