<section class="newsletter-section">
    <div class="container">
        <div class="newsletter">
            <div class="title">
                <h1>
                    Subscribe to get the Latest<br /> Product Updates
                </h1>
            </div>
            <form action="/newsletter" method="POST">
                @csrf
                <input type="email" name="email" id="email" placeholder="Enter your Email Address" required>
                <button class="subscribe-button" type="submit">Subscribe</button>
            </form>
        </div>
    </div>
</section>
