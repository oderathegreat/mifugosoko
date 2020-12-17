<ul class="list_none comment_list mt-4">
    @foreach ($reviews as $review)
        @if (!empty($review->user->id) && !empty($review->product->id))
            <li>
                <div class="comment_img">
                    <img src="{{ $review->user->avatar_url }}" alt="{{ $review->user_name }}" width="60" />
                </div>
                <div class="comment_block">
                    <div class="rating_wrap">
                        <div class="rating">
                            <div class="product_rate" style="width: {{ $review->star * 20 }}%"></div>
                        </div>
                    </div>
                    <p class="customer_meta">
                        <span class="review_author">{{ $review->user_name }}</span>
                        <span class="comment-date">{{ $review->created_at->format('d M, Y') }}</span>
                    </p>
                    <div class="description">
                        <p>{{ $review->comment }}</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </li>
        @endif
    @endforeach
</ul>

@if (count($reviews) > 0)
    <br>
    <div class="mt-3 justify-content-center pagination_style1">
        {!! $reviews->appends(request()->query())->links() !!}
    </div>
    <br>
@endif
